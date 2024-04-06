<?php

require_once 'conexao.php';

// Inserir
function inserirProduto($codigo, $descricao, $statusProduto, $tempo_garantia) {
    $conexao = conectarBanco();
    $query = "INSERT INTO telecontrol.produtos (codigo, descricao, statusProduto, tempo_garantia) VALUES ($1, $2, $3, $4)";
    $valores = array($codigo, $descricao, $statusProduto, $tempo_garantia);
    $resultado = pg_query_params($conexao, $query, $valores);
    pg_close($conexao);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }
}

// Listar Todos Produtos
function listarProdutos() {
    $conexao = conectarBanco();
    $query = "SELECT * FROM telecontrol.produtos";
    $resultado = pg_query($conexao, $query);

    if ($resultado) {
        $produtos = array();
        while ($produto = pg_fetch_assoc($resultado)) {
            $produtos[] = $produto;
        }
        return json_encode($produtos);
    } else {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}

// Listar Por ID
function listarProdutoPorId($id) {
    $conexao = conectarBanco();
    $query = "SELECT * FROM telecontrol.produtos WHERE id = $1";
    $valores = array($id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if ($resultado) {
        if (pg_num_rows($resultado) > 0) {
            $produto = pg_fetch_assoc($resultado);
            return json_encode($produto);
        } else {
            return json_encode(array("error" => "Produto não encontrado"));
        }
    } else {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}


// Atualizar
function atualizarProduto($id, $codigo, $descricao, $statusProduto, $tempo_garantia) {
    $conexao = conectarBanco();
    $query = "UPDATE telecontrol.produtos SET codigo = $1, descricao = $2, statusProduto = $3, tempo_garantia = $4 WHERE id = $5";
    $valores = array($codigo, $descricao, $statusProduto, $tempo_garantia, $id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);

}

// Excluir
function excluirProduto($id) {
    $conexao = conectarBanco();
    $query = "DELETE FROM telecontrol.produtos WHERE id = $1";
    $valores = array($id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}


?>