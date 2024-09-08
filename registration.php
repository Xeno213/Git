<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "register";

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$age = $_POST['age'];
$gender = $_POST['gender'];

$sql = "INSERT INTO users (name, email, password, age, gender) VALUES ('$name', '$email', '$password', '$age', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
