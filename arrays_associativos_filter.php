<?php
$pessoas = [
    ['nome' => 'Julio', 'idade' => 26],
    ['nome' => 'Ana Paula', 'idade' => 19],
    ['nome' => 'Gabriela', 'idade' => 14],
    ['nome' => 'Kamilla', 'idade' => 23],
    ['nome' => 'Sabrina', 'idade' => 17]
];

$maioresDeIdade = array_filter($pessoas, function ($p) {
    return $p['idade'] > 18;
});

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

$totalIdadeMenores = array_reduce($menoresDeIdade, function ($acumulador, $x) {
    $acumulador += $x['idade'];
    return $acumulador;
});

$mediaIdadeMenores = $totalIdadeMenores / count($menoresDeIdade);

echo "------------------------------------\n";
echo "A média da idade dos menores de idade é: ";
echo number_format($mediaIdadeMenores, 2, '.', '.') . " anos.\n";

$totalIdadeMaiores = array_reduce($maioresDeIdade, function ($acumulador, $x) {
    $acumulador += $x['idade'];
    return $acumulador;
});

$mediaIdadeMaiores = $totalIdadeMaiores / count($maioresDeIdade);
echo "A média da idade dos maiores de idade é: ";
echo number_format($mediaIdadeMaiores, 2, '.', '.') . " anos.\n";

//Para ordenar os nomes em ordem alfabética
function orderByAscNome($acumulador, $atual)
{
    return $acumulador['nome'] > $atual['nome'];
}

uasort($pessoas, 'orderByAscNome');

echo "------------------------------------\n";
echo "Nomes em ordem alfabética: \n";
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
foreach ($pessoas as $value) {
    echo "Nome: " . $value['nome'] . ' - ' . "Idade: " . $value['idade'] . " anos. \n";
}
