-- ========================================
-- DATABASE SETUP FILE
-- ========================================
-- Run this in phpMyAdmin: http://localhost/phpmyadmin
-- Click "SQL" tab, paste this code, click "Go"

-- ========================================
-- CREATE DATABASE
-- ========================================

CREATE DATABASE IF NOT EXISTS products_db;

USE products_db;

-- ========================================
-- CREATE PRODUCTS TABLE
-- ========================================

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ========================================
-- INSERT SAMPLE DATA
-- ========================================

INSERT INTO bookings
(user_id, facility_id, booking_date, start_time, end_time, status)
VALUES
(2, 101, '2026-02-16', '09:00:00', '11:00:00', 'pending'),
(3, 101, '2026-02-16', '11:00:00', '13:00:00', 'pending'),
(4, 102, '2026-02-17', '10:00:00', '12:00:00', 'pending');

-- ========================================
-- VERIFICATION (Optional)
-- ========================================
-- SELECT * FROM products;
-- DESCRIBE products;

-- Setup complete! Your database is ready to use.
