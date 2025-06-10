<?php

// incluir conexao com o banco de dados
require'conexao.php';

// Verifica se o formulário foi enviado via POST (maiúsculo)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário e sanitiza para evitar XSS
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);

    // Verifica se os campos estão preenchidos
    if (!empty($nome) && !empty($email)) {
        // Prepara a consulta SQL para inserir os dados
        $sql = "INSERT INTO usuario(nome, email) VALUES (:nome, :email)";

        // Prepara a execução da consulta - stmt = statement
        $stmt = $conexao->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);

        // Executa a consulta
        try {
            if ($stmt->execute()) {
                // Se a inserção for bem-sucedida, redireciona para o formulário
                header('Location: formulario.php');
                exit;
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        } catch (PDOException $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

?>
