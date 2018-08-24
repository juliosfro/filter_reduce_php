<?php
// Array associativo de pessoas.
$pessoas = [
    ['nome' => 'Julio', 'idade' => 26],
    ['nome' => 'Ana Paula', 'idade' => 19],
    ['nome' => 'Gabriela', 'idade' => 14],
    ['nome' => 'Kamilla', 'idade' => 23],
    ['nome' => 'Sabrina', 'idade' => 17]
];

// Filtrando apenas as pessoas que são maiores de idade.
$maioresDeIdade = array_filter($pessoas, function ($p) {
    return $p['idade'] > 18;
});

// Filtrando apenas as pessoas que são menores de idade.
$menoresDeIdade = array_filter($pessoas, function ($p) {
    return $p['idade'] < 18;
});

echo "Maiores de idade: \n";
echo "------------------------------------\n";
foreach ($maioresDeIdade as $value) {
    echo "Nome: " . $value['nome'] . ' - ' . "Idade: " . $value['idade'] . " anos.\n";
}

echo "------------------------------------\n";
echo "Menores de idade: \n";
foreach ($menoresDeIdade as $value) {
    echo "Nome: " . $value['nome'] . ' - ' . "Idade: " . $value['idade'] . " anos.\n";
}

// Somando as idades de todas as pessoas que são de menor.
$totalIdadeMenores = array_reduce($menoresDeIdade, function ($acumulador, $x) {
    $acumulador += $x['idade'];
    return $acumulador;
});

// Calculando a média da idade das pessoas que são de menor.
$mediaIdadeMenores = $totalIdadeMenores / count($menoresDeIdade);

echo "------------------------------------\n";
echo "A média da idade dos menores de idade é: ";
echo number_format($mediaIdadeMenores, 2, '.', '.') . " anos.\n";

// Somando a idade das pessoas que são maiores de idade.
$totalIdadeMaiores = array_reduce($maioresDeIdade, function ($acumulador, $x) {
    $acumulador += $x['idade'];
    return $acumulador;
});

// Calculando a média da idade das pessoas que são de maior.
$mediaIdadeMaiores = $totalIdadeMaiores / count($maioresDeIdade);
echo "A média da idade dos maiores de idade é: ";
echo number_format($mediaIdadeMaiores, 2, '.', '.') . " anos.\n";

// Ordenando os nomes das pessoas em ordem alfabética.
function orderByAscNome($acumulador, $atual)
{
    return $acumulador['nome'] > $atual['nome'];
}

// Usando a função uasort que está chamando a função de call-back para ordenar o array de pessoas.
uasort($pessoas, 'orderByAscNome');

echo "------------------------------------\n";
echo "Nomes em ordem alfabética: \n";

// Imprimindo a lista de nomes em ordem alfabética.
foreach ($pessoas as $value) {
    echo $value['nome'] . "\n";
}

echo "------------------------------------\n";
echo "Idades da menor para a maior: \n";

function orderByAscIdade($acumulador, $atual)
{
    return $acumulador['idade'] > $atual['idade'];
}

uasort($pessoas, 'orderByAscIdade');

foreach ($pessoas as $value) {
    echo "Nome: " . $value['nome'] . ' - ' . "Idade: " . $value['idade'] . " anos. \n";
}

echo "------------------------------------\n";
echo "Idades da maior para a menor: \n";

function orderByDescIdade($acumulador, $atual)
{
    return $acumulador['idade'] < $atual['idade'];
}

uasort($pessoas, 'orderByDescIdade');
$idadeByDesc = array();

foreach ($pessoas as $value) {
    array_push($idadeByDesc, $value);
}

foreach ($idadeByDesc as $value) {
    echo "Nome: " . $value['nome'] . ' - ' . "Idade: " . $value['idade'] . " anos. \n";
}

echo "------------------------------------\n";
echo "As duas pessoas mais velhas se chamam: \n";
for ($i = 0; $i < 2; $i++) {
    echo $i + 1 . '. ' . $idadeByDesc[$i]['nome'] . ' - ' . $idadeByDesc[$i]['idade'] . " anos.\n";
}

echo "------------------------------------\n";

// Podemos usar a função filter combinada com a função map.
$maioresDeIdade = array_filter(array_map(function ($x) {
    if ($x['idade'] > 18) return $x;
}, $pessoas));

// Usando a função filter combinada com a função map para retornar as pessoas que são menores de idade.
$menoresDeIdade = array_filter(array_map(function ($x) {
    if ($x['idade'] < 18) return $x;
}, $pessoas));

echo "Quantidade de maiores de idade: " . count($maioresDeIdade) . "\n";
echo "Quantidade de menores de idade: " . count($menoresDeIdade) . "\n";
