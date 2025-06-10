<?php
// 1. Incluir o arquivo de conexão
require 'conexao.php';

// 2. Prepara e executa a consulta para selecionar todos os usuários
try {
    $stmt = $conexao->prepare("SELECT * FROM users ORDER BY nome ASC");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(); // Busca todos os usuários
} catch (PDOException $e) {
    echo "Erro ao buscar usuários: " . $e->getMessage();
    $usuarios = []; // Garante que $usuarios seja um array
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        .container { max-width: 800px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        form { display: flex; flex-direction: column; gap: 10px; margin-bottom: 30px; }
        input, button { padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background-color: #007BFF; color: white; cursor: pointer; border: none; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Formulário de Cadastro</h1>
        
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            
            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
            
            <button type="submit">Cadastrar</button>
        </form>

        <hr>

        <h2>Usuários Cadastrados</h2>
        <?php if(count($usuarios) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['idade']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum usuário cadastrado ainda.</p>
        <?php endif; ?>
    </div>

</body>
</html>
