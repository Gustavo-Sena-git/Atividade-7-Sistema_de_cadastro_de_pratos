<?php
    require_once "../config/conexao.php";

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    $usuario_id = $_POST["usuario_id"];

    if($nome == ""|| $email == ""){
        echo "Preencha todos os campos";
    }


    $sql = "insert into pratos (nome, descricao, preco, categoria, usuario_id) values (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);


    $stmt->bind_param(
        "ssdsi", 
        $nome,
        $descricao,
        $preco,
        $categoria,
        $usuario_id

    );

    if($stmt->execute()){
        echo"Usuario cadastrado";
    } else{
        echo"Erro de cadastro";
    }

    $stmt->close();
    $conexao->close();


?>