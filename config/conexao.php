<?php
    $conexao = new mysqli("localhost", "root", "root", "restaurante");

    if ($conexao->connect_error){
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    $conexao->set_charset("utf8");
?>