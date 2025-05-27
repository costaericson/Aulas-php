<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        form{
            display: flex;/*Alinha os elementos do formulario*/
            flex-direction: column;/*Alinha os elementos do formulario na vertical*/
            width: 300px;/*Largura do formulario*/
            margin: 0 auto;/*Centraliza o formulario na tela*/
            padding: 20px;/*Espaçamento interno do formulario*/
            background-color: #f9f9f9;/*Cor de fundo do formulario*/
            border-radius: 8px;/*Borda arredondada do formulario*/
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);/*Sombra do formulario*/
            border: 1px solid #ddd;/*Borda do formulario*/
        }
        input[type="text"]{
            padding:10px;/*Espaçamento interno do input*/
            margin-bottom: 10px;/*Espaçamento entre os inputs*/
            border: 1px solid #ccc;/*Borda do input*/
            border-radius: 4px;/*Borda arredondada do input*/

        }
        label{
            margin-bottom: 5px;/*Espaçamento entre o label e o input*/
            font-weight: bold;/*Negrito no label*/
        }
        button{
            padding: 10px;/*Espaçamento interno do botão*/
            background-color: #28a745;/*Cor de fundo do botão*/
            color:white;/*Cor do texto do botão*/
            border: none;/*Remove a borda do botão*/
            border-radius: 4px;/*Borda arredondada do botão*/
            cursor: pointer;/*Cursor de ponteiro ao passar o mouse sobre o botão*/
        }
        button:hover{
            background-color: #218838;/*Cor de fundo do botão ao passar o mouse*/
        }
        a{
            text-decoration: none;/*Remove o sublinhado do link*/
            display: inline-block;/*Exibe o link como um bloco*/
            margin-top: 20px;/*Espaçamento acima do link*/
            color: #fff;/*Cor do texto do link*/
            text-decoration: none;/*Remove o sublinhado do link*/
            margin: 20px auto;/*Centraliza o link na tela*/
            font-weight: bold;/*Negrito no link*/
            padding: 10px;/*Espaçamento interno do link*/
            background-color: #28a745;/*Cor de fundo do link*/
            border-radius: 8px;/*Borda arredondada do link*/
        }
        a:hover{
            color: #fff;/*Cor do texto do link ao passar o mouse*/
            background-color: #218838;/*Cor de fundo do link ao passar o mouse*/
        }
        select{
            padding: 10px;/*Espaçamento interno do select*/
            margin-bottom: 10px;/*Espaçamento entre os selects*/
            border: 1px solid #ccc;/*Borda do select*/
            border-radius: 4px;/*Borda arredondada do select*/
            background-color: #fff;/*Cor de fundo do select*/
            font-size: 16px;/*Tamanho da fonte do select*/
            color: #333;/*Cor do texto do select*/
            font-family: Georgia, serif;
        }
        select option{
            padding: 10px;/*Espaçamento interno das opções do select*/
            background-color: #fff;/*Cor de fundo das opções do select*/
            color: #333;/*Cor do texto das opções do select*/
        }
        div{
           
            padding: 10px;/*Espaçamento interno do div*/
            background-color: #f1f1f1;/*Cor de fundo do div*/
            border-radius: 4px;/*Borda arredondada do div*/
            border: 1px solid #ddd;/*Borda do div*/
            width: 300px;/*Largura do div*/
            margin: 10px auto;/*Centraliza o div na tela*/
            font-weight: bold;/*Negrito no texto do div*/
            text-align: center;/*Alinha o texto do div ao centro*/
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);/*Sombra do formulario*/
            border: 1px solid #ddd;/*Borda do formulario*/


        }
    </style>
</head>
<body>

<form action="" method = "post">
    <label for="nome" name="nome">Nome: </label>
    <input type="text" name="nome" id ="nome" required> 
    <label for="idade" name="idade" id="idade">Idade: </label>
    <input type="text" name="idade" id="idade" required> 
    <select name="sexo" id="">
        <option value="Maculino">Macho</option>
        <option value="Feminino">Fêmea</option>
        <option value="Outro">Outro</option>
    </select>

    <button type="submit">Enviar</button>

    <a href="../"> Voltar </a>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = htmlspecialchars($_POST['nome']);
    $idade = htmlspecialchars($_POST['idade']);
    $sexo = htmlspecialchars($_POST['sexo']);

    //verificar se os nomes foram preenchidos
    if(empty($nome) || empty($idade)){
        echo"<div> Por favor preencha todos os campos. </div>";
    }else{
        echo "<div> Nome: $nome </div>";
        echo "<div> Idade: $idade </div>";
        echo "<div> Sexo: $sexo </div>";
    }
    
}


?>



    
</body>
</html>