<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do usuário</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex flex-column align-items-start">
    <h1 class="text-decoration-none navbar-brand mb-0 text-dark">Área do usuário</h1>
    <div class="w-100 border-bottom mt-2"></div>
</div>
<?php
    if ($usuario=true) {
        <div class="border border-2 rounded-1">
            echo "<p>Nome:$nome</p>"
            echo "<p>Email:$email</p>"
            echo "<p>Endereço:$endereço</p>"
        </div>
    } else {
        <div class="border border-2 rounded-1">
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        echo "<h1 class='mb-4'>Login realizado com sucesso!</h1>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        // Normalmente, você não exibiria a senha, isso é apenas para fins de exemplo
        echo "<p><strong>Senha:</strong> $password</p>"; 
    }
    
?>
</body>
</html>