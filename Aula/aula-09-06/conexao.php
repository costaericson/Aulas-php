<?php

//Detalhes conexão com o banco de dados 
$host = 'localhost'; // Endereço do servidor MySQL
$usuario = 'root'; // Usuário do MySQL
$senha = ''; // Senha do MySQL
$nome_banco = 'cadastro'; // Nome do banco de dados
$charset = 'utf8mb4'; // Charset para suportar caracteres especiais

// Cria a conexão   - DSN (Data Source Name) - de onde vem os dados
$dsn = "mysql:host=$host;dbname=$nome_banco;chartset=$charset";// String de conexão

//opcoes para otimizar a conexao e verificar erros
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erro
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Define o modo de busca padrão como associativo
    PDO::ATTR_EMULATE_PREPARES => false, // Desativa a emulação de prepared statements
    PDO::ATTR_STRINGIFY_FETCHES => false, // Não converte valores numéricos para strings
];

// Tenta estabelecer a conexão com o banco de dados

try{
    $conexao = new PDO ($dsn, $usuario, $senha,$options);
    // echo "Conexão estabelecida com sucesso!"; // Mensagem de sucesso opcional

}catch(\PDOExeption $e){// Captura a exceção caso ocorra um erro na conexão
   
    // Se ocorrer um erro, exibe uma mensagem de erro
    // echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    // exit; // Encerra o script se a conexão falhar
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}