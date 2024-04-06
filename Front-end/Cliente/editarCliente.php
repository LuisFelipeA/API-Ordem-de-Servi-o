<?php
include '../../Back-end/clienteController.php';

// Carrega o cliente
$cliente = null;
$id_cliente = null;
if(isset($_GET['id'])) {
    $id_cliente = $_GET['id'];
    $retorno = listarClientePorId($id_cliente);
    $cliente = json_decode($retorno, true);
}

// Atualiza no banco
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id'])) {
        $id_cliente = $_POST['id'];
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        
        // Atualiza o cliente apenas se o ID estiver definido
        if($id_cliente !== null) {
            atualizarCliente($id_cliente, $nome, $cpf, $endereco);
        }
        
        // Redireciona para a lista de clientes após a atualização
        header("Location: /api-ordem-de-servico/Front-end/Cliente/listarClientes.php");
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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>

<div class="container">
    <h2>Editar Cliente</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cliente['cpf']; ?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $cliente['endereco']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</body>
</html>
