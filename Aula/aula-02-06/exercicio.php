<?php
session_start();

// Inicializa a lista de pessoas na sessão, se ainda não existir
if (!isset($_SESSION['pessoa'])) {
    $_SESSION['pessoa'] = [
        'nome' => [],
        'idade' => [],
        'cidade' => [] // Adicione esta linha
    ];
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
</head>
<body>

    <!-- Formulário para adicionar nome e idade -->
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" required> 
        <label for="idade">Idade: </label>
        <input type="number" id="idade" name="idade" required>
        <label for="cidade">Cidade: </label> 
        <input type="text" id="cidade" name="cidade" required> <button type="submit" name="acao" value="adicionar">Adicionar</button>
    </form>
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <button type="submit" name="acao" value="limpar">Limpar Lista</button>
    </form>

    <h2>Lista de Pessoas</h2>  
    <?php
    if (!empty($_SESSION['pessoa']['nome'])) {
        echo "<ol type='1'>";
        for ($i = 0; $i < count($_SESSION['pessoa']['nome']); $i++) {
            $nome = $_SESSION['pessoa']['nome'][$i];
            $idade = $_SESSION['pessoa']['idade'][$i];
            $cidade = $_SESSION['pessoa']['cidade'][$i]; // Adiciona a cidade
            echo "<li>Nome: $nome | Idade: $idade | Cidade: $cidade </li>";
        }
        echo "</ol>";
    } else {
        echo "<p>Nenhum nome cadastrado ainda.</p>";
    }
    ?> 
    
</body>
</html>
<?php
// Processa o envio do formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Linha 41 original
        if (isset($_POST['acao']) && $_POST['acao'] === 'adicionar') { // Novacondição para adicionar
            if (isset($_POST['nome'], $_POST['idade'])) {
                $nome = trim($_POST['nome']);
                $idade = trim($_POST['idade']);
                $cidade = trim($_POST['cidade']); // Adiciona a cidade
            if (!empty($nome) && !empty($idade)) {
                $_SESSION['pessoa']['nome'][] = htmlspecialchars($nome);
                $_SESSION['pessoa']['idade'][] = htmlspecialchars($idade);
                $_SESSION['pessoa']['cidade'][] = htmlspecialchars($cidade); // Adiciona a cidade
                // Redireciona para evitar reenvio ao atualizar
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "<script>alert('Por favor, preencha todos os campos
                para adicionar.');</script>";
            }
            }
        } elseif (isset($_POST['acao']) && $_POST['acao'] === 'limpar') { //Nova condição para limpar
            // Opção 1: Destruir apenas a variável 'pessoa' da sessão
                unset($_SESSION['pessoa']);
            // Opção 2: Reinicializar a variável 'pessoa' (como no início do script)
            // $_SESSION['pessoa'] = ['nome' => [], 'idade' => []];
            // Opção 3: Destruir a sessão inteira (cuidado, isso remove TUDO da sessão)
            // session_destroy();
            // session_start(); // É bom reiniciar a sessão se você for continuar usando-a na mesma página
            // Redireciona para atualizar a visualização
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
        }
    }
?>

