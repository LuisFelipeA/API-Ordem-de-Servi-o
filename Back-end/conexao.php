<?php

function conectarBanco() {

    $servidor = "localhost";
    $porta = "5432";
    $banco_de_dados = "postgres";
    $usuario = "postgres";
    $senha = "1234";

    // Estabelece a conexão
    $conexao = pg_connect("host=$servidor port=$porta dbname=$banco_de_dados user=$usuario password=$senha");

    // Verifica se a conexão foi estabelecida com sucesso
    if (!$conexao) {
        die("Não foi possível conectar ao servidor PostgreSQL");
    }

    // Retorna o objeto de conexão
    return $conexao;
}

?>
