<?php
$frutas = ["maçã", "banana", "laranja", "uva", "abacaxi"];

$cores = [ "verde", "amarelo", "vermelho", "azul", "roxo" ];

$numeros = [1, 2, 3, 4, 5];
// Exemplo de array associativo
$carro = [
    "marca" => "Ford",
    "modelo" => "Fiesta",
    "ano" => 2020,
    "cor" => "azul" 
];

echo "<h1>Exemplo de Arrays</h1>";
echo $frutas[0]. "<br>";//maçâ
echo $frutas[1]. "<br>";//banana
echo $frutas[2]. "<br>";//laranja
echo $frutas[3]. "<br>";//uva
echo $frutas[4]. "<br>";//abacaxi
echo "<h2>Array de Cores</h2>";

foreach($cores as $cor){
    echo $cor . "<br>";
}

echo "<h2>Array Associativos</h2>";
echo $carro["marca"] . "<br>"; // Ford
echo $carro["modelo"] . "<br>"; // Fiesta
echo $carro["ano"] . "<br>"; // 2020
echo $carro["cor"] . "<br>"; // azul
echo "<hr>";
foreach($carro as $chave => $valor) {
    echo "$chave: $valor <br>";
}

//modificando o array

$carro["marca"] = "Chevrolet";
$carro["modelo"] = "Raptor";
$carro["ano"] = 2025;
$carro["cor"] = "preto";
echo "<h2>Array Associativos Modificado</h2>";

foreach($carro as $chave => $valor) {
    echo "$chave: $valor <br>";
}
echo "<hr>";

//matriz
$matrizFrutas = [
    ["maçã", "banana", "laranja"],//posicao 0 primeiro elemento
    ["verde", "amarelo", "vermelho"],//posicao 1 segundo elemento
    ["azul", "roxo", "preto"]//posicao 2 terceiro elemento
];

echo "<h2>Matriz de Frutas</h2>";
echo $matrizFrutas[0][0]."<br>";// maçã
echo $matrizFrutas[1][1]."<br>";// amarelo
echo $matrizFrutas[0][2]."<br>";// laranja
echo"<hr>";
foreach($matrizFrutas as $linha) {
    foreach($linha as $fruta) {
        echo $fruta . "<br>";
    }
}

//matriz array associativo
$matrizCarros = [
    [
        "marca" => "Ford",
        "modelo" => "Fiesta",
        "ano" => 2020,
        "cor" => "azul"
    ],
    [
        "marca" => "Chevrolet",
        "modelo" => "Onix",
        "ano" => 2021,
        "cor" => "preto"
    ],
    [
        "marca" => "Volkswagen",
        "modelo" => "Gol",
        "ano" => 2019,
        "cor" => "branco"
    ],
    [
        "marca" => "Fiat",
        "modelo" => "Palio",
        "ano" => 2018,
        "cor" => "vermelho"
    ]
];

echo "<h2>Matriz de Carros</h2>";

echo $matrizCarros[0]['modelo'] . "<br>"; // Fiesta
echo $matrizCarros[1]['marca'] . "<br>"; // Chevrolet
echo $matrizCarros[2]['ano'] . "<br>"; // 2019
echo $matrizCarros[3]['cor'] . "<br>"; // vermelho

echo "<hr>";
// Exibindo todos os carros da matriz

foreach($matrizCarros as $carro) {
    echo "Marca: " . $carro['marca'] . "<br>";
    echo "Modelo: " . $carro['modelo'] . "<br>";
    echo "Ano: " . $carro['ano'] . "<br>";
    echo "Cor: " . $carro['cor'] . "<br>";
    echo "<hr>";
}

?>