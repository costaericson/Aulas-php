
<?php

// Inicia a sessão para poder usar $_SESSION
session_start();

// Verifica se a variável de sessão 'lista_nomes' existe
// Se não existir, inicializa como array vazio
if (!isset($_SESSION['lista_nomes'])) {
    $_SESSION['lista_nomes'] = [];
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Nomes com Sessão</title>

    <!-- Estilos embutidos para a página -->
    <style>
        /* Garante que padding e border não aumentem a largura total dos elementos */
        * {
            box-sizing: border-box;
        }

        /* Estilo geral do corpo da página */
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        /* Container central com aparência de cartão */
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        /* Títulos */
        h2 {
            margin-top: 0;
            color: #333;
        }

        /* Formulário alinhado com Flexbox */
        form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        /* Campo de entrada de texto */
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        /* Botão de envio */
        input[type="submit"] {
            background-color: #2e86de;
            color: #fff;
            border: none;
            padding: 10px 18px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        /* Efeito hover no botão de envio */
        input[type="submit"]:hover {
            background-color: #1b4f72;
        }

        /* Botão de limpar lista */
        .limpar-btn {
            display: inline-block;
            margin-top: 10px;
            background-color: #e74c3c;
            color: #fff;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        /* Efeito hover no botão de limpar */
        .limpar-btn:hover {
            background-color: #c0392b;
        }

        /* Lista de nomes */
        ul {
            list-style-type: decimal;
            padding-left: 20px;
        }

        /* Estilo de cada item da lista */
        li {
            margin-bottom: 6px;
            font-size: 1em;
        }

        /* Texto informativo e discreto */
        .aviso {
            color: #777;
            font-style: italic;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<!-- Container central da aplicação -->
<div class="container">
    <h2>Cadastro de Nomes</h2>

    <!-- Formulário para adicionar novo nome -->
    <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="nome" placeholder="Digite um nome" required>
        <input type="submit" value="Adicionar">
    </form>

    <h2>Lista de Nomes</h2>

<?php
if (!empty($_SESSION['lista_nomes'])) {
    echo "<ul>";
    foreach ($_SESSION['lista_nomes'] as $nome) {
        echo "<li>" . htmlspecialchars($nome) . "</li>"; // por segurança
    }
    echo "</ul>";
    
    // Corrigido: concatenação e aspas corretas
    echo "<a class='limpar-btn' href='" . $_SERVER['PHP_SELF'] . "?acao=limpar'>Limpar Lista</a>";
} else {
    echo "<p class='aviso'>Nenhum nome cadastrado ainda.</p>";
}
?>
    <!-- Informação ao usuário sobre a natureza temporária dos dados -->
    <p class="aviso">A lista é temporária e será perdida quando a sessão encerrar.</p>
</div> 

</body>
</html>
<?php


// Verifica se o formulário foi enviado via POST e se o campo 'nome' não está vazio
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !empty(trim($_POST['nome']))) {
    // Limpa e protege o valor inserido para evitar XSS
    $novo_nome = htmlspecialchars(trim($_POST['nome']));

    // Adiciona o nome à lista armazenada na sessão
    $_SESSION['lista_nomes'][] = $novo_nome;

    // Redireciona para a mesma página para evitar reenvio do formulário ao atualizar
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Verifica se o usuário clicou para limpar a lista (?acao=limpar)
if (isset($_GET['acao']) && $_GET['acao'] === 'limpar') {
    // Esvazia a lista de nomes da sessão
    $_SESSION['lista_nomes'] = [];

    // Redireciona para a mesma página para limpar os parâmetros da URL
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>