<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            flex-direction: column; /* Para alinhar o formulário e o resultado */
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin-bottom: 20px; /* Espaço entre o container e o resultado */
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        form input[type="text"] {
            width: calc(100% - 22px); /* 100% menos o padding e a borda */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        form button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .result {
            background-color: #e9ecef;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #333;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px; /* Espaço entre o resultado e o container */
        }
        .error{
            background-color: #f8d7da; /* Cor de fundo para mensagens de erro */
            color: #721c24; /* Cor do texto para mensagens de erro */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px; /* Espaço entre o resultado e o container */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Calculadora de IMC</h1>
        <form action="" method="POST">
            <label for="peso">Digite seu peso (kg):</label>
            <input type="text" name="peso" id="peso" required>
            <br>
            <label for="altura">Digite sua altura (metros):</label>
            <input type="text" name="altura" id="altura" required>
            <br>
            <button type="submit">Calcular IMC</button>
        </form>
    </div>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Substituir vírgulas por pontos
        $peso = str_replace(',', '.', $peso);
        $altura = str_replace(',', '.', $altura);

        // Verifica se os valores são numéricos
        if(is_numeric($peso) && is_numeric($altura) && $altura > 0){
            //calcular IMC

            $imc = $peso / ($altura * $altura);
            echo "<div class='result'>Seu IMC é: " . number_format($imc, 2) . "</div>";
        }else {
            echo "<div class='error'>Por favor, insira valores válidos para peso e altura.</div>";
        }
    }




?>

   

</body>
</html>