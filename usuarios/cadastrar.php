<?php
    require_once "../config/conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if($nome == ""|| $email == ""){
        echo "Preencha todos os campos";
    }


    $sql = "insert into usuarios (nome, email) values (?, ?)";

    $stmt = $conexao->prepare($sql);


    $stmt->bind_param("ss", $nome, $email);

    if($stmt->execute()){
        echo"Usuario cadastrado";
    } else{
        echo"Erro de cadastro";
    }

    $stmt->close();
    $conexao->close();


?>