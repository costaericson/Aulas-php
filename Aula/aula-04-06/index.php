<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../">Voltar</a><br><br>
</body>
</html>

<?php

// $nomeArquivo = 'Aquivo.txt';

// echo"----------verificando se o arquivo existe----------<br>";
// if (file_exists($nomeArquivo)) {
//     echo "O arquivo $nomeArquivo existe.<br>";
// } else {
//     echo "O arquivo $nomeArquivo não existe.<br>";  
// }
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// $nomeArquivo = __DIR__ . '/Arquivo.txt';

// echo "------passo 2 - criando e escrevendo no arquivo------<br>";

// // Montando a mensagem com a data/hora atual
// $mensagem = "Mensagem criada em " . date('d/m/Y H:i:s') . "\n";

// // Escrevendo a mensagem no arquivo (sobrescreve se já existir)
// if (file_put_contents($nomeArquivo, $mensagem) !== false) {
//     echo "Arquivo $nomeArquivo criado com sucesso!<br>";
//     echo "Conteúdo escrito: $mensagem<br>";
// } else {
//     echo "Erro ao criar o arquivo $nomeArquivo <br>";
// }

// echo "<br>";

// echo "------passo 3 - lendo o arquivo------<br>";

// if(file_exists('Arquivo.txt')){
//     $conteudoAtual = file_get_contents('Arquivo.txt');
//     if ($conteudoAtual !== false) {
//         echo "Conteúdo atual do arquivo: <br>";
//         echo nl2br($conteudoAtual); // nl2br converte quebras de linha em <br> para exibição HTML
//     } else {
//         echo "Erro ao ler o arquivo Arquivo.txt <br>";
//     }
// }

// echo"------Passo 4 - adicionando mais conteúdo ao arquivo------<br>";
// $nomeArquivo = __DIR__ . '/Arquivo.txt';
// $novaMensagem = "Nova mensagem adicionada em " . date('d/m/Y H:i:s') . "\n";
// $outraMensagem = "Outra mensagem adicionada em " . date('d/m/Y H:i:s') . "\n";

// if(file_put_contents($nomeArquivo, $novaMensagem, FILE_APPEND)!== false){
//     echo "Nova mensagem adicionada com sucesso!<br>";
// } else {
//     echo "Erro ao adicionar nova mensagem ao arquivo $nomeArquivo <br>";
// }

// if(file_put_contents($nomeArquivo, $outraMensagem, FILE_APPEND) !== false){
//     echo "Outra mensagem adicionada com sucesso!<br>";
// } else {
//     echo "Erro ao adicionar outra mensagem ao arquivo $nomeArquivo <br>";   
// }

// // Lendo o conteúdo atualizado do arquivo
// if(file_exists($nomeArquivo)){
//     $conteudoAtual = file_get_contents($nomeArquivo);
//     if ($conteudoAtual !== false) {
//         echo "Conteúdo atualizado do arquivo: <br>";
//         echo nl2br($conteudoAtual); // nl2br converte quebras de linha em <br> para exibição HTML
//     } else {
//         echo "Erro ao ler o arquivo $nomeArquivo <br>";
//     }
// } else {
//     echo "O arquivo $nomeArquivo não existe.<br>";
// }
?>

<!-- sudo chmod -R 777 /opt/lampp/htdocs/Aula -->