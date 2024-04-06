<?php
include '../../Back-end/clienteController.php';

$id_cliente = $_GET['id'];

excluirCliente($id_cliente);

header("Location: /api-ordem-de-servico/Front-end/Cliente/listarClientes.php");
exit();
?>
