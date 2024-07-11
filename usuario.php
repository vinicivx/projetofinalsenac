<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Usuário não encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do usuário</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-info {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .home-link, .logout-link {
            display: inline-block;
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            transition: background-color 0.3s;
        }
        .home-link:hover, .logout-link:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 class="text-dark mt-5 mb-4">Área do usuário</h1>
                <div class="user-info">
                    <p><strong>Nome:</strong> <?php echo $user['name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>Endereço:</strong> <?php echo $user['address']; ?></p>
                </div>

                <a href="homepage.php" class="home-link mt-4">Página inicial</a>
                <a href="logout.php" class="logout-link mt-4">Sair</a>
            </div>
        </div>
    </div>
</body>
</html>
