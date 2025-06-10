<?php
// Lógica para excluir dados
if (isset($_POST['delete'])) {
    $line_to_delete = $_POST['line'];
    $file_lines = file('dados.txt');
    $file_to_delete = fopen('dados.txt', 'w');
    foreach ($file_lines as $line) {
        if (trim($line) != trim($line_to_delete)) {
            fwrite($file_to_delete, $line);
        }
    }
    fclose($file_to_delete);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
// Lógica para salvar dados
if (isset($_POST['submit'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);

    if (!empty($nome) && !empty($email)) {
        $file = fopen('dados.txt', 'a');
        fwrite($file, "$nome;$email;$telefone\n");
        fclose($file);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
//001
 // Função para exibir dados
 function exibirDados() {
    if (file_exists('dados.txt')) {
        $file = fopen('dados.txt', 'r');
        while (($line = fgets($file)) !== false) {
            $dados = explode(';', trim($line));
            // print_dump($dados); // Para depuração, pode ser removido depois
            echo "<tr>";
            echo "<td>" . (isset($dados[0]) ? htmlspecialchars($dados[0]) : '') . "</td>";
            echo "<td>" . (isset($dados[1]) ? htmlspecialchars($dados[1]) : '') . "</td>";
            echo "<td>" . (isset($dados[2]) ? htmlspecialchars($dados[2]) : '') . "</td>";
            echo "<td>
                <form method='post' action=''>
                    <input type='hidden' name='line' value='" . htmlspecialchars($line) . "'>
                    <button type='submit' name='delete'>Apagar</button>
                </form>
                </td>";
            echo "</tr>";
        }
        fclose($file);
    }
}
//002
// Função para exibir dados
// function exibirDados() {
//     if (file_exists('dados.txt')) {
//         $file = fopen('dados.txt', 'r');
//         while (($line = fgets($file)) !== false) {
//             $dados = explode(';', trim($line));
//             echo "<tr>";
//             echo "<td>" . (isset($dados[0]) ? htmlspecialchars($dados[0]) : '') . "</td>";
//             echo "<td>" . (isset($dados[1]) ? htmlspecialchars($dados[1]) : '') . "</td>";
//             echo "<td>" . (isset($dados[2]) ? htmlspecialchars($dados[2]) : '') . "</td>";
//             echo "<td>
//                     <form method='post' action=''>
//                         <input type='hidden' name='line' value='" . htmlspecialchars($line) . "'>
//                         <button type='submit' name='delete'>Apagar</button>
//                     </form>
//                   </td>";
//             echo "</tr>";
//         }
//         fclose($file);
//     }
// }
            
            
            
// //             exibirDados(); 
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Dados</title>
    <?php // //estilização da página ?>
    <style>
        /* Estilo geral para o corpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            color: #333;
            padding: 20px;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        table, th, td {
            border: none; /* removendo bordas tradicionais */
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e6f2e6;
        }

        /* Formulário */
        form {
            max-width: 450px;
            margin: 20px auto 40px;
            padding: 30px 25px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        form input {

            width: 93.5%;
            
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1.8px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        form input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px #4CAF50;
        }

        form button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            border-radius: 6px;
            font-size: 1.1em;
            color: white;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #45a049;
        }

        /* Responsividade */
        @media (max-width: 500px) {
            form {
                padding: 20px 15px;
            }

            th, td {
                padding: 10px 8px;
                font-size: 0.9em;
            }
        }

    </style>
</head>
<body>

    <h2>Cadastro de Dados</h2>
    <form action=""  method="POST"> 
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone"><br>

        <button type="submit" name="submit">Cadastrar</button>
    </form>

   
    <h2>Dados Cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<!-- Início do PHP -->"; // Para depuração, pode ser removido depois

           
            
//             exibirDados();
            exibirDados();
            
            ?>
        
            
        </tbody>
    </table>
</body>
</html>


