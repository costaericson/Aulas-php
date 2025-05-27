<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Multiplicação</title>
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

        form input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        form button {
            background-color: #28a745; /* Cor verde para botões de ação */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #218838;
        }

        .result {
            background-color: #d4edda; /* Cor verde clara para resultados positivos */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #155724; /* Cor de texto verde escura */
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da; /* Cor vermelha clara para erros */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #721c24; /* Cor de texto vermelha escura */
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Calculadora de Multiplicação</h1>
        <form action="" method="GET">
            <label for="numero1">Digite o primeiro número:</label>
            <input type="text" name="numero1" id="numero1" required>
            <br>
            <label for="numero2">Digite o segundo número:</label>
            <input type="text" name="numero2" id="numero2" required>
            <br>
            <button type="submit">Multiplicar!</button>
        </form>
    </div>

 

</body>
</html>