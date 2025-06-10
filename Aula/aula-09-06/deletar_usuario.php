<?php
require 'conexao.php';

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    if (empty($id)) {
        echo "ID do usuário não fornecido.";
        exit;
    }

    // Prepara e executa a query de deleção
    try {
        $stmt = $conexao->prepare("DELETE FROM usuario WHERE id = ?");
        $stmt->execute([$id]);

        // Redireciona de volta para a página principal
        header("Location: formulario.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao deletar usuário: " . $e->getMessage();
    }

} else {
    // Se não for um POST, redireciona para a página principal
    header("Location: index.php");
    exit;
}
?>