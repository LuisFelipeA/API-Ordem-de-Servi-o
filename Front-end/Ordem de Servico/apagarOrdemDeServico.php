<?php
include '../../Back-end/ordemDeServicoController.php';

$id_ordemDeServico = $_GET['id'];
echo($id_ordemDeServico);
excluirOrdemDeServico($id_ordemDeServico);

header("Location: /api-ordem-de-servico/Front-end/Ordem de Servico/listarOrdensDeServico.php");
exit();
?>
