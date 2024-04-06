<?php
include '../../Back-end/produtoController.php';

// Carrega o produto
$produto = null;
$id_produto = null;
if(isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    $retorno = listarProdutoPorId($id_produto);
    $produto = json_decode($retorno, true);
}

// Atualiza no banco
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id'])) {
        $id_produto = $_POST['id'];
        $codigo = $_POST['codigo'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];
        $garantia = $_POST['garantia'];
        
        // Atualiza o produto apenas se o ID estiver definido
        if($id_produto !== null) {
            atualizarProduto($id_produto, $codigo, $descricao, $status, $garantia);
        }
        
        // Redireciona para a lista de produtos após a atualização
        header("Location: /api-ordem-de-servico/Front-end/Produto/listarProdutos.php");
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
    <title>Editar Produto</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>

<div class="container">
    <h2>Editar Produto</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $produto['codigo']; ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $produto['descricao']; ?>">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="<?php echo $produto['statusproduto']; ?>">
        </div>
        <div class="form-group">
            <label for="garantia">Garantia:</label>
            <input type="text" class="form-control" id="garantia" name="garantia" value="<?php echo $produto['tempo_garantia']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</body>
</html>
