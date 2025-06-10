<?php
// Assumindo que este é seu arquivo principal, como "index.php" ou "listagem.php"
require 'conexao.php';

// Prepara e executa a consulta para selecionar os dados
try {
    $stmt = $conexao->prepare("SELECT * FROM usuario ORDER BY nome ASC");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar usuários: " . $e->getMessage();
    $usuarios = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        /* CSS para os botões de ação (adicione ao seu arquivo estilo.css) */
        .cadastro-acoes {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .cadastro-acoes form {
            margin: 0;
        }
        .cadastro-botao-acao {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            border: none;
            cursor: pointer;
            text-align: center;
        }
        .cadastro-botao-editar {
            background-color: #ffc107; /* Amarelo */
        }
        .cadastro-botao-editar:hover {
            background-color: #e0a800;
        }
        .cadastro-botao-deletar {
            background-color: #dc3545; /* Vermelho */
        }
        .cadastro-botao-deletar:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="cadastro-container">
        <form action="cadastro.php" method="post" class="cadastro-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" required>
            <button type="submit">Cadastrar</button>
        </form>

        <h2 class="cadastro-titulo-usuarios">Usuários Cadastrados</h2>
        
        <?php if (count($usuarios) > 0): ?>
            <table class="cadastro-tabela">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th> </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                            <td class="cadastro-acoes">
                                <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" class="cadastro-botao-acao cadastro-botao-editar">Editar</a>

                                <form action="deletar_usuario.php" method="post" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');">
                                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                    <button type="submit" class="cadastro-botao-acao cadastro-botao-deletar">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="cadastro-nenhum">Nenhum usuário cadastrado.</p>
        <?php endif; ?>

        <a href="../" class="cadastro-voltar">Voltar</a>
    </div>

</body>
</html>