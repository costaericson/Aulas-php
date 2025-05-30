<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            text-decoration: none;
            display: block;
            width: 100px;
            text-align: center;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            background-color: #28a745;
            border-radius: 8px;
            margin: 20px auto;
        }
        a:hover {
            color: #fff;
            background-color: #218838;
        }
        .success{
            width: 300px;
            margin: 0 auto;
            font-weight: bold;
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .error {
            width: 300px;
            margin: 0 auto;
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align:center;
        }
        .error p {
            margin: 0;
        }
        .error ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .error li {
            margin-bottom: 5px;
        }
        .error li::before {
            content: "⚠️ ";
            color: #721c24;
        }
    </style>

</head>
<body>
    <form action="" method="POST" ><!-- Formulário para receber os dados do usuário -->
        <label for="nome">Nome:</label><!-- Rótulo para o campo de nome -->
        <input type="text" id="nome" name="nome" required><!-- Campo de entrada de texto para o nome, obrigatório -->
        <label for="idade">Idade: </label><!-- Rótulo para o campo de idade -->
        <input type="number" id="idade" name="idade" required min="0"><!-- Campo de entrada numérica para a idade, obrigatório e com valor mínimo 0 -->
        <label for="email">Email:</label><!-- Rótulo para o campo de email -->
        <input type="email" id="email" name="email" required><!-- Campo de entrada de email, obrigatório -->
        <label for="senha">Senha:</label><!-- Rótulo para o campo de senha -->
        <input type="password" id="senha" name="senha" required><!-- Campo de entrada de senha, obrigatório -->
        <button type="submit">Enviar</button><!-- Botão para enviar o formulário -->
    </form>
   <a href="../">Voltar</a><!-- Link para voltar à página anterior -->
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $erros = [];
    if(empty($nome) || empty($idade) || empty($email) || empty($senha)){
        $erros[] = "Todos os campos são obrigatórios. <br>";   
    }
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false ){
        $erros[] = "Email inválido. <br>";
    }
    if(filter_var($idade, FILTER_VALIDATE_INT) === false || $idade < 0){
        $erros[] = "Idade inválida. <br>";
    }
    if(strlen($senha) < 6){
        $erros[] = "A senha deve ter pelo menos 6 caracteres. <br>";
    }
    if(!empty($erros)){
        echo"<div class='error'>";
        foreach($erros as $erro){
            echo $erro;
        }
        echo "</div>";
    }
    else {
        echo "<div class='success'>";
        echo "Nome: $nome <br>";
        echo "Idade: $idade <br>";
        echo "Email: $email <br>";
        echo "Senha: $senha <br>";
        echo "</div>";

    }
        
}

?>