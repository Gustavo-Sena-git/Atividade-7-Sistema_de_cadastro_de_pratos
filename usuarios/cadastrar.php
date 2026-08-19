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

    if ($stmt->execute()) {
    header("Location: ../index.php"); // Use ../ para voltar para a raiz
    exit();
    } else {
        echo "Erro de cadastro no banco: " . $stmt->error; // Exibe o erro exato do MySQLi
    }

    $stmt->close();
    $conexao->close();


?>