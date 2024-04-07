<?php
include '../../Back-end/ordemDeServicoController.php';

// Carrega a Ordem de Serviço
$ordemDeServico = null;
$id_ordemDeServico = null;
if(isset($_GET['id'])) {
    $id_ordemDeServico = $_GET['id'];
    $retorno = listarOrdemDeServicoPorId($id_ordemDeServico);
    $ordemDeServico = json_decode($retorno, true);
}

// Atualiza no banco
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['ordem_servico_id'])) {
        $id_ordemDeServico = $_POST['ordem_servico_id'];
        $numero_ordem = $_POST['numero_ordem'];
        $data_abertura = $_POST['data_abertura'];
        $produto_id = $_POST['produto_id'];
        $cliente_id = $_POST['cliente_id'];

        if($id_ordemDeServico !== null) {
            atualizarOrdemDeServico($id_ordemDeServico, $numero_ordem, $data_abertura, $produto_id, $cliente_id);
        }
        
        header("Location: /api-ordem-de-servico/Front-end/Ordem de Servico/listarOrdensDeServico.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ordem de Serviço</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>

<div class="container">
    <h2>Editar Ordem de Serviço</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="ordem_servico_id" value="<?php echo $ordemDeServico['ordem_servico_id']; ?>">
        <div class="form-group">
            <label for="numero_ordem">Numero:</label>
            <input type="text" class="form-control" id="numero_ordem" name="numero_ordem" value="<?php echo $ordemDeServico['numero_ordem']; ?>">
        </div>
        <div class="form-group">
            <label for="data_abertura">Data Abertura:</label>
            <input type="date" class="form-control" id="data_abertura" name="data_abertura" value="<?php echo $ordemDeServico['data_abertura']; ?>">
        </div>
        <div class="form-group">
            <label for="produto_id">Produto:</label>
            <input type="text" class="form-control" id="produto_id" name="produto_id" value="<?php echo $ordemDeServico['produto_id']; ?>">
        </div>
        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <input type="text" class="form-control" id="cliente_id" name="cliente_id" value="<?php echo $ordemDeServico['cliente_id']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</body>
</html>
