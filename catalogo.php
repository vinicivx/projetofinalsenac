<?php
session_start();
include ('db_connection.php');

$query = "SELECT * FROM camisas";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Camisas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-custom {
            background-color: #fff;
            border-bottom: 1px solid #ccc;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .form-inline .form-control,
        .navbar-custom .form-inline .btn {
            color: #000;
        }

        .navbar-custom .form-inline .btn img,
        .navbar-custom .navbar-brand img,
        .navbar-custom .d-flex img {
            width: 30px;
            height: 30px;
        }

        .navbar-custom .navbar-brand {
            font-family: 'Helvetica Neue', sans-serif;
            font-weight: 900;
            font-size: 1.5rem;
        }

        .card {
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 300px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 10px;
        }

        .card-text {
            color: #555;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            border-top: 1px solid #dee2e6;
            font-size: 0.9rem;
            color: #777;
            text-align: center;
        }
        
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <form action="camisetas.php" method="get" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="query" placeholder="Buscar" class="form-control mr-2">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <img src="imagens/magnifying-glass-1976105_1280.png" alt="Pesquisar">
                    </button>
                </form>
            </div>
            <a href="homepage.php" class="mx-auto text-decoration-none">
                <h1 class="navbar-brand mb-0 text-dark">VINICIN STORE</h1>
            </a>
            <div class="d-flex align-items-center">
                <a href="usuario.php"><img class="ml-4" src="imagens/utilidades/user-2935527_1280.png" alt="User"></a>
                <a href="carrinho.php"><img class="ml-4" src="imagens/utilidades/shopping-cart-349544_1280.png"
                        alt="Cart"></a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-custom-2">
            <div class="container d-flex justify-content-left align-items-center">
                <h1 class="mb-2">Catálogo de Bermudas</h1>
            </div>
        </nav>
        <?php
        if ($result->num_rows > 0) {
            ?>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo $row['imagem']; ?>" class="card-img-top" alt="<?php echo $row['nome']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nome']; ?></h5>
                                <p class="card-text"><strong>R$
                                        <?php echo number_format($row['preco'], 2, ',', '.'); ?></strong></p>
                                <a href="#" class="btn btn-primary btn-block">Comprar</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php
        } else {
            echo "deu ruim";
        }
        ?>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <p>© 2024 Vinicin's Store. Todos os direitos reservados. Vinicin's Store Comércio de Roupas e Acessórios
                Ltda </p>
        </div>
    </footer>

    <!-- Script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>