-- First, modify the status column to be more specific
ALTER TABLE bookings 
MODIFY COLUMN status ENUM('PENDING', 'CONFIRMED', 'REJECTED', 'CANCELLED', 'COMPLETED') 
DEFAULT 'PENDING' 
NOT NULL;

-- Add an index on the status column for better performance
ALTER TABLE bookings 
ADD INDEX idx_status (status);

-- Add a processed_at timestamp to track when the status was last changed
ALTER TABLE bookings 
ADD COLUMN processed_at TIMESTAMP NULL DEFAULT NULL;

-- Add a processed_by column to track which doctor processed the booking
ALTER TABLE bookings 
ADD COLUMN processed_by INT NULL,
ADD FOREIGN KEY (processed_by) REFERENCES users(id) ON DELETE SET NULL;

-- Add a processing_notes column for any additional information
ALTER TABLE bookings 
ADD COLUMN processing_notes TEXT NULL; 