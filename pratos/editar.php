<?php
require_once "../config/conexao.php";

$id        = $_POST["id"] ?? '';
$nome       = trim($_POST["nome"] ?? '');
$descricao  = trim($_POST["descricao"] ?? '');
$preco      = $_POST["preco"] ?? '';
$categoria  = $_POST["categoria"] ?? '';


if (empty($id) || empty($nome) || empty($descricao) || empty($preco) || empty($categoria)) {
    echo "Preencha todos os campos obrigatórios!";
    exit;
}

$preco = str_replace(',', '.', $preco);

$sql = "UPDATE pratos SET nome = ?, descricao = ?, preco = ?, categoria = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);

$stmt->bind_param("ssdsi", $nome, $descricao, $preco, $categoria, $id);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Erro ao atualizar prato: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>