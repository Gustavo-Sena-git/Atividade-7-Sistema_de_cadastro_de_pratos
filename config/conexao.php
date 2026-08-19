<?php

$conexao = new mysqli("localhost", "root", "", "sistema_restaurante_2026");

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");

?>