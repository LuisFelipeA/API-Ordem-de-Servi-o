<?php

require_once 'conexao.php';

// Inserir
function inserirCliente($nome, $cpf, $endereco) {
    $conexao = conectarBanco();
    $query = "INSERT INTO telecontrol.clientes (nome, cpf, endereco) VALUES ($1, $2, $3)";
    $valores = array($nome, $cpf, $endereco);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }
    else {
        return listarIdUltimoClienteCadastrado();
    }

    pg_close($conexao);
    
}

// Listar Todos Clientes
function listarClientes() {
    $conexao = conectarBanco();
    $query = "SELECT * FROM telecontrol.clientes";
    $resultado = pg_query($conexao, $query);

    if ($resultado) {
        $clientes = array();
        while ($cliente = pg_fetch_assoc($resultado)) {
            $clientes[] = $cliente;
        }
        return json_encode($clientes);
    } else {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}

// Listar Por ID
function listarClientePorId($id) {
    $conexao = conectarBanco();
    $query = "SELECT * FROM telecontrol.clientes WHERE id = $1";
    $valores = array($id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if ($resultado) {
        if (pg_num_rows($resultado) > 0) {
            $cliente = pg_fetch_assoc($resultado);
            return json_encode($cliente);
        } else {
            return json_encode(array("error" => "Cliente não encontrado"));
        }
    } else {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}


// Atualizar
function atualizarCliente($id, $nome, $cpf, $endereco) {
    $conexao = conectarBanco();
    $query = "UPDATE telecontrol.clientes SET nome = $1, cpf = $2, endereco = $3 WHERE id = $4";
    $valores = array($nome, $cpf, $endereco, $id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}

// Excluir
function excluirCliente($id) {
    $conexao = conectarBanco();
    $query = "DELETE FROM telecontrol.clientes WHERE id = $1";
    $valores = array($id);
    $resultado = pg_query_params($conexao, $query, $valores);

    if (!$resultado) {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}

// Verifica se um cliente está cadastrado
function clienteCadastrado($cliente_id) {
    $retornoClientes = listarClientes();
    $clientes = json_decode($retornoClientes, true);

    foreach ($clientes as $cliente) {
        if ($cliente['id'] == $cliente_id) {
            return true;
        }
    }

    return false;
}

// Buscar ultimo Cliente Criado

function listarIdUltimoClienteCadastrado() {
    $conexao = conectarBanco();
    $query = "SELECT MAX(id) FROM telecontrol.clientes";
    $resultado = pg_query($conexao, $query);

    if ($resultado) {
        $id = pg_fetch_result($resultado, 0, 0);
        return json_encode(array("id" => $id));
    } else {
        return json_encode(array("error" => pg_last_error($conexao)));
    }

    pg_close($conexao);
}




// function listarIdUltimoClienteCadastrado() {
//     $conexao = conectarBanco();
//     $query = "SELECT MAX(id) FROM telecontrol.clientes";
//     $resultado = pg_query($conexao, $query);

//     if ($resultado) {
//         $id = pg_fetch_result($resultado, 0);
//         return json_encode(array("id" => $id));
//     } else {
//         return json_encode(array("error" => pg_last_error($conexao)));
//     }

//     pg_close($conexao);
// }

?>