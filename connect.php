<?php
	//PDOでデータベースに接続する処理を記載
	// Database credentials
$host = 'localhost'; // or the server IP address
$db = 'your_database_name';
$user = 'your_username';
$pass = 'your_password';

// Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $user, $pass);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set the default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Connected successfully";
} catch (PDOException $e) {
    // If there is an error, catch it and display the message
    echo "Connection failed: " . $e->getMessage();
}
?>