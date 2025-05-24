<?php
include 'db_config.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials.";
    }
} else {
    echo "User not found.";
}
?>