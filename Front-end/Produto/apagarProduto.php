<?php
include '../../Back-end/produtoController.php';

$id_produto = $_GET['id'];
    
excluirProduto($id_produto);
    
header("Location: /api-ordem-de-servico/Front-end/Produto/listarProdutos.php");
exit();

?>
