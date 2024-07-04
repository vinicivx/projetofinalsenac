<?php
// Incluir o arquivo de conexão com o banco de dados
include('db_connection.php');

// Inicializar variáveis para pesquisa
$search_query = "";
$search_results = array();

// Verificar se houve uma pesquisa enviada via GET
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];

    // Consulta SQL para buscar camisetas que correspondem à pesquisa
    $query = "SELECT * FROM camisas WHERE nome LIKE ?";
    $stmt = $conn->prepare($query);
    $search_term = "%$search_query%";
    $stmt->bind_param('s', $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    // Armazenar resultados da pesquisa em um array
    while ($row = $result->fetch_assoc()) {
        $search_results[] = $row;
    }
} else {
    // Consulta SQL para selecionar todas as camisas do catálogo
    $query = "SELECT * FROM camisas";
    $result = $conn->query($query);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Camisetas - Vinicin's Store</title>
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
                        <input type="text" name="query" placeholder="Buscar" value="<?php echo htmlspecialchars($search_query); ?>" class="form-control mr-2">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <img src="imagens/magnifying-glass-1976105_1280.png" alt="Pesquisar">
                    </button>
                </form>
            </div>
            <a href="homepage.html" class="mx-auto text-decoration-none">
                <h1 class="navbar-brand mb-0 text-dark">VINICIN'S STORE</h1>
            </a>
            <div class="d-flex align-items-center">
                <a href="usuario.php"><img class="ml-4" src="imagens/utilidades/user-2935527_1280.png" alt="User"></a>
                <a href="carrinho.php"><img class="ml-4" src="imagens/utilidades/shopping-cart-349544_1280.png" alt="Cart"></a>
            </div>            
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Catálogo de Camisetas</h1>

        <div class="row">
            <?php
            if (!empty($search_results)) {
                // Exibir resultados da pesquisa
                foreach ($search_results as $row) {
                    echo '
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="' . $row['imagem'] . '" class="card-img-top" alt="' . $row['nome'] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['nome'] . '</h5>
                                <p class="card-text"><strong>R$ ' . number_format($row['preco'], 2, ',', '.') . '</strong></p>
                                <a href="#" class="btn btn-primary btn-block">Comprar</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            } else {
                // Exibir todas as camisetas do catálogo
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="' . $row['imagem'] . '" class="card-img-top" alt="' . $row['nome'] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['nome'] . '</h5>
                                <p class="card-text"><strong>R$ ' . number_format($row['preco'], 2, ',', '.') . '</strong></p>
                                <a href="#" class="btn btn-primary btn-block">Comprar</a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <p>© 2024 Vinicin's Store. Todos os direitos reservados. Vinicin's Store Comércio de Roupas e Acessórios Ltda </p>
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
