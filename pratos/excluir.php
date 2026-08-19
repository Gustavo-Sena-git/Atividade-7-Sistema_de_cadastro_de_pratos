<?php
require_once "../config/conexao.php";

$id = $_GET["id"] ?? '';

if (empty($id)) {
    echo "ID inválido para exclusão.";
    exit;
}

$sql = "DELETE FROM pratos WHERE id = ?";
$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Erro ao excluir prato: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>