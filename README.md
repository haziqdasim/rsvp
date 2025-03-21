🛠 Step 1: Create the Database
CREATE DATABASE rsvp_db;

🛠 Step 2: Select the Database
USE rsvp_db;

Step 3: Create the rsvp Table
CREATE TABLE rsvp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    time_slot VARCHAR(20) NOT NULL
);

🛠 Step 4: Insert Sample Data (Optional)
INSERT INTO rsvp (name, time_slot) VALUES
('John Doe', '11:00 AM'),
('Jane Smith', '1:00 PM'),
('Alice Johnson', '3:00 PM');
