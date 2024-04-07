<?php
include '../../Back-end/ordemDeServicoController.php';
include '../../Back-end/produtoController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_ordem = $_POST['numero_ordem'];
    $data_abertura = $_POST['data_abertura'];
    $produto_id = $_POST['produto_id'];
    $cliente_id = $_POST['cliente_id'];

    if (produtoCadastrado($produto_id)) {
        inserirOrdemDeServico($numero_ordem, $data_abertura, $produto_id, $cliente_id);
        header("Location: /api-ordem-de-servico/Front-end/Ordem de Servico/listarOrdensDeServico.php");
        exit();
    } else {
        $mensagemErro = "Erro: O produto com o ID $produto_id não está cadastrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Ordem de Serviço</title>
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
                    <h1 class="card-title">Incluir Ordem de Serviço</h1>
                    <?php if (!empty($mensagemErro)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensagemErro; ?>
                    </div>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="numero_ordem" class="form-label">Numero</label>
                            <input type="text" class="form-control" id="numero_ordem" name="numero_ordem">
                        </div>
                        <div class="mb-3">
                            <label for="data_abertura" class="form-label">Data Abertura</label>
                            <input type="date" class="form-control" id="data_abertura" name="data_abertura">
                        </div>
                        <div class="mb-3">
                            <label for="produto_id" class="form-label">Produto</label>
                            <input type="text" class="form-control" id="produto_id" name="produto_id">
                        </div>
                        <div class="mb-3">
                            <label for="cliente_id" class="form-label">Cliente</label>
                            <input type="text" class="form-control" id="cliente_id" name="cliente_id">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
