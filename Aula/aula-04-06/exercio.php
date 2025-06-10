<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="email"], textarea {
            width: 300px;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        textarea { height: 100px; resize: vertical; }
        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover { background-color: #0056b3; }
        .mensagem-status { margin-top: 20px auto; padding: 10px; border-radius: 5px;}
        .sucesso { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;}
        .erro { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;}
    </style>
</head>
<body>

    <h1>Formulário de Contato</h1>
    <p>Envie-nos sua mensagem preenchendo os campos abaixo.</p>

    <form action="" method="POST">
        <div>
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome_usuario" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email_usuario" required>
        </div>
        <div>
            <label for="mensagem">Sua Mensagem:</label>
            <textarea id="mensagem" name="mensagem_usuario" required></textarea>
        </div>
        <div>
            <input type="submit" value="Enviar Mensagem">
        </div>
    </form>

</body>
</html>

<?php
date_default_timezone_set('America/Fortaleza');

$nomeArquivo = "logs.txt";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = htmlspecialchars(trim($_POST['nome_usuario']));
    $email = htmlspecialchars(trim($_POST['email_usuario']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem_usuario']));// sanitiza os dados recebidos
    $date = date('d/m/Y H:i:s');// pega a data e hora atual

    if(!empty($nome)){
        $mensagemFormatadaParaArquivo = str_replace("\r\n", "\n", $mensagem);
        $mensagemFormatadaParaArquivo = str_replace("\n", " | QuebraLinha | ", $mensagemFormatadaParaArquivo);


        $linha = "Nome: $nome | Email: $email | Mensagem: $mensagemFormatadaParaArquivo | Data: $date\n";
        $linha = str_replace("\n", " | QuebraLinha | ", $linha);

         if(file_put_contents($nomeArquivo, $linha, FILE_APPEND) !== false){
            echo "<div class='mensagem-status sucesso'>Mensagem enviada com sucesso!</div>";
        } else {
            echo "<div class='mensagem-status erro'>Erro ao enviar a mensagem. Tente novamente mais tarde.</div>";
        }


    }
    if(file_exists($nomeArquivo)){
        $conteudoAtual = file_get_contents($nomeArquivo);
        if ($conteudoAtual !== false) {
             $conteudoComQuebras = str_replace(' | QuebraLinha | ', '<br>', $conteudoAtual);

            echo "<div class='mensagem-status'>Conteúdo atual do arquivo: <br>";
            echo nl2br($conteudoComQuebras); // nl2br converte quebras de linha em <br> para exibição HTML
            echo "</div>";
        } else {
            echo "<div class='mensagem-status erro'>Erro ao ler o arquivo $nomeArquivo</div>";
        }
    } else {
        echo "<div class='mensagem-status erro'>O arquivo $nomeArquivo não existe.</div>";
    }

    
}





?>