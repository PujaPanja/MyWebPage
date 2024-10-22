<?php

$servername = "localhost";
$username = "Puja";
$password = "Test1234";
$dbname = "userDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    if ($conn->errno == 1062) {
        echo "User already exists!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
