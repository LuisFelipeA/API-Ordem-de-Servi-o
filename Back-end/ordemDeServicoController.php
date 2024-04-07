<?php

require_once 'conexao.php';

// Inserir
function inserirOrdemDeServico($numero_ordem, $data_abertura, $produto_id, $cliente_id) {
    $conexao = conectarBanco();
    $query = "INSERT INTO telecontrol.ordem_servico (numero_ordem, data_abertura, produto_id, cliente_id) VALUES ($1, $2, $3, $4)";
    $valores = array($numero_ordem, $data_abertura, $produto_id, $cliente_id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}

// Listar Todos OrdemDeServicos
function listarOrdemDeServicos() {
    $conexao = conectarBanco();
    $query = "SELECT os.id as ordem_servico_id, os.numero_ordem, os.data_abertura, 
                 c.id as cliente_id, c.nome, c.cpf, c.endereco,
                 p.id as produto_id, p.codigo, p.descricao, 
                 p.statusProduto, p.tempo_garantia
          FROM telecontrol.ordem_servico os 
          JOIN telecontrol.clientes c ON c.id = os.cliente_id 
          JOIN telecontrol.produtos p ON p.id = os.produto_id";

    //$query = "SELECT * FROM telecontrol.ordem_servico os JOIN telecontrol.clientes c ON c.id = os.cliente_id JOIN telecontrol.produtos p ON p.id = os.produto_id ";
    $resultado = pg_query($conexao, $query);

    if ($resultado) {
        $ordem_servico = array();
        while ($produto = pg_fetch_assoc($resultado)) {
            $ordem_servico[] = $produto;
        }
        return json_encode($ordem_servico);
    } else {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}

// Listar Por ID
function listarOrdemDeServicoPorId($id) {
    $conexao = conectarBanco();
    $query = "SELECT os.id as ordem_servico_id, os.numero_ordem, os.data_abertura, 
                    c.id as cliente_id, c.nome, c.cpf, c.endereco,
                    p.id as produto_id, p.codigo, p.descricao, 
                    p.statusProduto, p.tempo_garantia
                FROM telecontrol.ordem_servico os 
                    JOIN telecontrol.clientes c ON c.id = os.cliente_id 
                    JOIN telecontrol.produtos p ON p.id = os.produto_id
                WHERE os.id = $1";
    $valores = array($id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if ($resultado) {
        if (pg_num_rows($resultado) > 0) {
            $produto = pg_fetch_assoc($resultado);
            return json_encode($produto);
        } else {
            return json_encode(array("error" => "Ordem De Servico não encontrado"));
        }
    } else {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}


// Atualizar
function atualizarOrdemDeServico($id, $numero_ordem, $data_abertura, $produto_id, $cliente_id) {
    $conexao = conectarBanco();
    $query = "UPDATE telecontrol.ordem_servico SET numero_ordem = $1, data_abertura = $2, produto_id = $3, cliente_id = $4 WHERE id = $5";
    $valores = array($numero_ordem, $data_abertura, $produto_id, $cliente_id, $id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}


// Excluir
function excluirOrdemDeServico($id) {
    $conexao = conectarBanco();
    $query = "DELETE FROM telecontrol.ordem_servico WHERE id = $1";
    $valores = array($id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}


?>