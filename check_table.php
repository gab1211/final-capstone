<?php
require_once 'db_connect.php';

try {
    // Check if table exists
    $stmt = $conn->query("SHOW TABLES LIKE 'patient_details'");
    if ($stmt->rowCount() == 0) {
        // Create the table if it doesn't exist
        $conn->exec("CREATE TABLE IF NOT EXISTS patient_details (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            name VARCHAR(255),
            birthdate DATE,
            sex VARCHAR(10),
            address TEXT,
            civil_status VARCHAR(50),
            nationality VARCHAR(100),
            religion VARCHAR(100),
            mobile_number VARCHAR(20),
            email VARCHAR(255),
            blood_type VARCHAR(5),
            emergency_contact_name VARCHAR(255),
            emergency_contact_relationship VARCHAR(100),
            allergies TEXT,
            past_medical_condition TEXT,
            current_medication TEXT,
            obstetric_history TEXT,
            number_of_pregnancies INT,
            number_of_deliveries INT,
            last_menstrual_period DATE,
            expected_delivery_date DATE,
            previous_pregnancy_complication TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )");
        echo "Table patient_details created successfully\n";
    } else {
        echo "Table patient_details already exists\n";
    }
    
    // Show table structure
    $stmt = $conn->query("DESCRIBE patient_details");
    echo "\nTable structure:\n";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['Field'] . " - " . $row['Type'] . "\n";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?> 