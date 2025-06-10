<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Universal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin-bottom: 20px;
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

        form input[type="text"],
        form select { /* Estilo para o select */
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        form button {
            background-color: #007bff; /* Azul para o botão de calcular */
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
            background-color: #d1ecf1; /* Azul claro para resultados */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #0c5460;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            border: 1px solid #bee5eb;
        }

        .error {
            background-color: #f8d7da; /* Vermelho claro para erros */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #721c24;
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Calculadora Universal</h1>
        <form action="" method="GET">
            <label for="numero1">Digite o primeiro número:</label>
            <input type="text" name="numero1" id="numero1" required>
            <br>
            <label for="operacao">Escolha a operação:</label>
            <select name="operacao" id="operacao" required>
                <option value="soma">Adição (+)</option>
                <option value="subtracao">Subtração (-)</option>
                <option value="multiplicacao">Multiplicação (*)</option>
                <option value="divisao">Divisão (/)</option>
            </select>
            <br>
            <label for="numero2">Digite o segundo número:</label>
            <input type="text" name="numero2" id="numero2" required>
            <br>
            <button type="submit">Calcular!</button>
        </form>
    </div>

    <?php
    
       $numero1 = $_GET['numero1'];
       $numero2 = $_GET['numero2'];
       $operacao = $_GET['operacao'];

       switch ($operacao){
        case 'soma':
            $resultado = $numero1 + $numero2;
            echo "<div class='result'>Resultado: $resultado</div>";
            break;
        case 'subtracao':
            $resultado = $numero1 - $numero2;
            echo "<div class='result'>Resultado: $resultado</div>";
            break;
        case 'multiplicacao':
            $resultado = $numero1 * $numero2;
            echo "<div class='result'>Resultado: $resultado</div>";
            break;
        case 'divisao':
            if($numero2 == 0 ){
                echo "<div class='error'>Erro: Divisão por zero não é permitida!</div>";
            } else {
                $resultado = $numero1 / $numero2;
                echo "<div class='result'>Resultado: $resultado</div>";
            }
       }



?>

   

</body>
</html>