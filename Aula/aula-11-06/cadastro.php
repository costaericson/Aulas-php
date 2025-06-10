<?php

// 1. Inclui o arquivo de conexão
require 'conexao.php';

// 2. Verifica se a requisição foi feita pelo método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 3. Obtém e sanitiza os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $idade = htmlspecialchars($_POST['idade']);
    $email = htmlspecialchars($_POST['email']);

    // 4. Valida se os campos são válidos
    if ($nome && $idade && $email) {
        
        // 5. Prepara a consulta SQL com placeholders
        $sql = "INSERT INTO users (nome, idade, email) VALUES (:nome, :idade, :email)";
        $stmt = $conexao->prepare($sql);

        // 6. Vincula os valores
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':idade', $idade, PDO::PARAM_INT);
        $stmt->bindValue(':email', $email);

        // 7. Executa a consulta
        try {
            if ($stmt->execute()) {
                // 8. Redireciona de volta para o formulário em caso de sucesso
                header('Location: formulario.php');
                exit;
            }
        } catch (PDOException $e) {
            echo "Erro ao executar a consulta: " . $e->getMessage();
        }

    } else {
        echo "Por favor, preencha todos os campos corretamente.";
    }
}
?>