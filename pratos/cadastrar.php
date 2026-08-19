<?php
require_once "../config/conexao.php";

$nome       = $_POST["nome"] ?? '';
$descricao  = $_POST["descricao"] ?? '';
$preco      = $_POST["preco"] ?? '';
$categoria  = $_POST["categoria"] ?? '';
$usuario_id = $_POST["usuario_id"] ?? '';
$preco = str_replace(',', '.', $preco);

if (empty($nome) || empty($descricao) || empty($preco) || empty($categoria) || empty($usuario_id)) {
    echo "Preencha todos os campos obrigatórios!";
    exit;
}

$sql = "INSERT INTO pratos (nome, descricao, preco, categoria, usuario_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "ssdsi", 
    $nome,
    $descricao,
    $preco,
    $categoria,
    $usuario_id
);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>