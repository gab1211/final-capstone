<?php
// Start session at the very beginning
session_start();

// Prevent any output before JSON response
ob_start();

// Set proper headers
header('Content-Type: application/json');

// Include database connection
require_once 'db_connect.php';

// Enable error logging but disable display
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    ob_end_clean();
    echo json_encode([
        'success' => false,
        'message' => 'User not logged in'
    ]);
    exit();
}

// Get request data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    ob_end_clean();
    echo json_encode([
        'success' => false,
        'message' => 'Invalid JSON data'
    ]);
    exit();
}

$appointmentId = $data['appointment_id'] ?? null;

if (!$appointmentId) {
    ob_end_clean();
    echo json_encode([
        'success' => false,
        'message' => 'Appointment ID is required'
    ]);
    exit();
}

try {
    // Start transaction
    $conn->beginTransaction();

    // First, verify that the appointment belongs to the logged-in user
    $stmt = $conn->prepare("
        SELECT a.*, pd.user_id 
        FROM appointments a
        JOIN patient_details pd ON a.patient_id = pd.id
        WHERE a.id = :appointment_id
    ");
    
    $stmt->execute(['appointment_id' => $appointmentId]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$appointment) {
        throw new Exception('Appointment not found');
    }

    if ($appointment['user_id'] != $_SESSION['user_id']) {
        throw new Exception('Unauthorized to cancel this appointment');
    }

    // Update the appointment status to cancelled
    $stmt = $conn->prepare("
        UPDATE appointments 
        SET status = 'cancelled', 
            updated_at = CURRENT_TIMESTAMP 
        WHERE id = :appointment_id
    ");

    $result = $stmt->execute(['appointment_id' => $appointmentId]);

    if (!$result) {
        throw new Exception('Failed to cancel appointment');
    }

    // Create notification for the cancellation
    try {
        $notificationTitle = 'Appointment Cancelled';
        $notificationMessage = sprintf(
            "Your appointment for %s on %s at %s has been cancelled.",
            $appointment['service_type'],
            date('F j, Y', strtotime($appointment['appointment_date'])),
            date('h:i A', strtotime($appointment['appointment_time']))
        );

        $stmt = $conn->prepare("
            INSERT INTO notifications (
                user_id, 
                type, 
                title, 
                message, 
                appointment_id, 
                status,
                created_at
            ) VALUES (?, 'appointment', ?, ?, ?, 'cancelled', CURRENT_TIMESTAMP)
        ");

        $stmt->execute([
            $_SESSION['user_id'],
            $notificationTitle,
            $notificationMessage,
            $appointmentId
        ]);
    } catch (Exception $e) {
        // Log the notification error but don't fail the appointment cancellation
        error_log("Error creating notification: " . $e->getMessage());
    }

    // Commit transaction
    $conn->commit();

    // Clear any output buffer
    ob_end_clean();

    // Return success response
    echo json_encode([
        'success' => true,
        'message' => 'Appointment cancelled successfully'
    ]);

} catch (Exception $e) {
    // Rollback transaction on error
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
    
    error_log("Error in cancel_appointment.php: " . $e->getMessage());
    
    // Clear any output buffer
    ob_end_clean();
    
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?> 