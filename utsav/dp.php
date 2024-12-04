<?php
// db.php
$host = 'localhost';
$username = 'root'; // Default XAMPP username
$password = '';     // Default XAMPP password (leave empty)
$dbname = 'inventory_db'; // Name of the database to be created

// Connect to MySQL
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create the INVENTORY table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS INVENTORY (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    category VARCHAR(50),
    quantity INT,
    price DECIMAL(10, 2)
)";
if ($conn->query($table_sql) === TRUE) {
    echo "Table 'INVENTORY' created successfully or already exists.<br>";
} else {
    die("Error creating table: " . $conn->error);
}
?>
