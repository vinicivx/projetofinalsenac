<?php
include('db_connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$address = $_POST['address'];

$query = "INSERT INTO users (name, email, password, address) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('ssss', $name, $email, $password, $address);

if ($stmt->execute()) {
    header('Location: login.html');
} else {
    echo "Erro ao registrar usuário.";
}
?>
