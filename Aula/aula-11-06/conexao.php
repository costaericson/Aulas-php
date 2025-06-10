<?php

// Detalhes da conexão com o banco de dados
$host = 'localhost';        // Endereço do servidor MySQL
$usuario_db = 'root';       // Usuário do MySQL (padrão do XAMPP é 'root')
$senha_db = '';             // Senha do MySQL (padrão do XAMPP é em branco)
$nome_banco = 'cadastro';   // Nome do banco de dados que criamos
$charset = 'utf8mb4';       // Charset para suportar caracteres especiais

// DSN (Data Source Name) - String de conexão
$dsn = "mysql:host=$host;dbname=$nome_banco;charset=$charset";

// Opções do PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Tenta estabelecer a conexão
    $conexao = new PDO($dsn, $usuario_db, $senha_db, $options);
} catch (PDOException $e) {
    // Se ocorrer um erro, exibe a mensagem e encerra o script
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

?>