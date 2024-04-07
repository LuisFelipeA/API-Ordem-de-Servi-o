<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../Back-end/produtoController.php';

    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $statusProduto = $_POST['statusproduto'];
    $garantia = $_POST['garantia'];

    inserirProduto($codigo, $descricao, $statusProduto, $garantia);

    header("Location: listarProdutos.php");
    exit();

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Produto</title>
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
                    <h1 class="card-title">Incluir Produto</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao">
                        </div>
                        <div class="mb-3">
                            <label for="statusproduto" class="form-label">Status</label>
                            <input type="text" class="form-control" id="statusproduto" name="statusproduto">
                        </div>
                        <div class="mb-3">
                            <label for="garantia" class="form-label">Garantia (Mês)</label>
                            <input type="text" class="form-control" id="garantia" name="garantia">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
