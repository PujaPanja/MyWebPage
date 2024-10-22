<?php
// Connect to MySQL
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

$sql = "SELECT * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($pass, $row['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials.";
    }
} else {
    echo "Invalid credentials.";
}

$conn->close();
?>
