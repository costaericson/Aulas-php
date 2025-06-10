<?php
require 'conexao.php';

$id = $_GET['id'];
$usuario = null;

// Busca os dados do usuário a ser editado
try {
    $stmt = $conexao->prepare("SELECT * FROM usuario WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar usuário: " . $e->getMessage();
}

// Se o usuário não for encontrado, redireciona para a página principal
if (!$usuario) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="cadastro-container">
        <h2 class="cadastro-titulo-usuarios">Editar Usuário</h2>
        <form action="atualizar_usuario.php" method="post" class="cadastro-form">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
            
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            
            <button type="submit">Atualizar</button>
            <a href="index.php" class="cadastro-voltar" style="margin-top:0; margin-left: 10px;">Cancelar</a>
        </form>
    </div>
</body>
</html>