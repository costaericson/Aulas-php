<?php
require 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Validação simples
    if (empty($id) || empty($nome) || empty($email)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Prepara e executa a query de atualização
    try {
        $stmt = $conexao->prepare("UPDATE usuario SET nome = ?, email = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $id]);

        // Redireciona de volta para a página principal
        header("Location: formulario.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao atualizar usuário: " . $e->getMessage();
    }

} else {
    // Se não for um POST, redireciona para a página principal
    header("Location: index.php");
    exit;
}
?>