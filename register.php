<?php
session_start();

$servername = 'localhost';
$username = "root";
$password = "";
$dbname = 'users';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "Username already exists.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            if ($stmt->execute()) {
                echo "Registration successful. <a href='login.php'>Login here</a>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: left;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #7393B3;
            color: white;
            padding: 20px 0;
            margin: 0 0 20px 0;
        }
        a {
            color: #7393B3;
            text-decoration: none;
            font-size: 18px;
        }
        a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Register to Reb's GPU Shop</h1>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="confirm_password">Confirm:</label>
        <input type="password" name="confirm_password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
