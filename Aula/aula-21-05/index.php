<?php


$nome = 'Lucas';
$sobreNome = 'Silva';
$idade = 20;
$peso = 75.8;
$altura = 1.75;
$casado = true;
$filhos = false;

echo"<h1>Meu nome é $nome</h1>";
echo"<h2>Eu tenho $idade anos</h2>";
echo"<h3>Eu peso $peso kg</h3>";
echo"<h4>Eu tenho $altura m de altura</h4>";
echo"<h5>Eu sou casado? ".($casado ? "sim":"não"). "</h5>";
echo"<h6>Eu tenho filhos? ".($filhos ? "sim":"não"). "</h6>";

if ($idade > 18) {
    echo "<h1>Você é maior de idade</h1>";
} else {    
    echo" <h1>Você é menor de idade</h1>";
}
$array = [];

$array.push($array, "Lucas");

for ($i = 0; $i < 10; $i++) {
    echo "<h1>Contando: $i</h1>";
}

// echo "Meu nome é $nome e tenho $idade anos";
//http://localhost/Aula/aula-21-05



?>