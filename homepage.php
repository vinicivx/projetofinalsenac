<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinicin's Store</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Helvetica+Neue:wght@900&display=swap');

        .navbar-custom {
            background-color: white;
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
            /* Ajuste o tamanho conforme necessário */
        }

        /* Estilos para o segundo nav */
        .navbar-custom-2 {
            background-color: white;
            border-bottom: 1px solid #ccc;
            height: 50px;
            /* Defina a altura desejada */
        }

        .navbar-custom-2 p {
            margin: 0;
            padding: 10px;
            font-size: 1rem;
            /* Ajuste o tamanho da fonte conforme necessário */
        }
    </style>
</head>

<body class="bg-light bg-gradient">
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <form action="/search" method="get" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="query" placeholder="Buscar" required class="form-control mr-2">
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
                <a href="login.php"><img class="ml-4" src="imagens/utilidades/user-2935527_1280.png" alt="User"></a>
                <a href="carrinho.php"><img class="ml-4" src="imagens/utilidades/shopping-cart-349544_1280.png" alt="Cart"></a>
            </div>            
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-custom-2">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="camisetas.php" class="text-decoration-none">
                <p>camisetas</p>
            </a>
            <a href="bermudas.php" class="text-decoration-none">
                <p>bermudas</p>
            </a>
            <a href="casacos.php" class="text-decoration-none">
                <p>casacos</p>
            </a>
        </div>
    </nav>
    <div class="text-center mb-3">
        <img src="imagens/utilidades/wallpaper.png" alt="wallpaper" style="width: 1500px;">
    </div>
    <div class="mt-3 mb-3 text-center">
        <div class="border rounded p-3 d-inline-block" style="width: 400px; height: 420px; vertical-align: top;">
            <a href="#">
                <img class="w-100" src="imagens/camisas/thug preta 2022.png" alt="Camisa Thug Nine Corp 2022">
                <p class="m-0 text-center">CAMISETA THUG CORP</p>
            </a>
        </div>
        <div class="border rounded p-3 d-inline-block ml-5" style="width: 400px; height: 420px; vertical-align: top;">
            <a href="#">
                <img class="w-100" src="imagens/camisas/thug diabo anjo.png" alt="CAMISETA BALANCE">
                <p class="m-0 text-center">CAMISETA BALANCE</p>
            </a>
        </div>
        <div class="border rounded p-3 d-inline-block ml-5" style="width: 400px; height: 420px; vertical-align: top;">
            <a href="#">
                <img class="w-100" src="imagens/camisas/High_Tee_Bug_Sand_Back.png" alt="Tee Bug Sand">
                <p class="m-0 text-center">CAMISETA TEE BUG SAND</p>
            </a>
        </div>

    </div>
    <nav class="navbar navbar-expand-lg navbar-custom-2">
        <p>© 2024 Vinicin's Store. Todos os direitos reservados. Vinicin's Store Comércio de Roupas e Acessórios Ltda </p>

    <!-- Script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>