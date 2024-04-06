<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../Back-end/clienteController.php';
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $resultado = inserirCliente($nome, $cpf, $endereco);
    header("Location: /api-ordem-de-servico/Front-end/Cliente/listarClientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Cliente</title>
    <link rel='stylesheet' href='../assets/css/bootstrap.css'>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <link rel='stylesheet' href='../assets/css/css.css'>
</head>

<body class="bg">

    <?php require_once "../navBar.php"; ?>

    <div class="container cont-marg">
        <div class="row justify-content-md-start">
            <div class="col-md-12 col-lg-12">
                <div class="card glass p-4" style="width: 100%; margin-top: 2px">
                    <h1 class="card-title">Incluir Cliente</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
