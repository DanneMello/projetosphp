<?php
$nome = $_POST["nome"];
$valor = $_POST["valor"];
$enviar = $_POST['enviar'];
$nome = strtoupper($nome);  // @Transformando os caracteres recebidos para maiúsculos.
$count = 1;
$countDiv = 0;

do {

    if($valor % $count == 0) { // @Verificando se o resto da divisão do valor informado pelo usuário dividido pelo contador for igual a 0, Se sim, será incrementado mais um na váriavel $countDiv
        $countDiv ++;
    }

    $count ++;
} while ($count <= $valor);

if($countDiv == 2) { // @Se for divisiveis apenas 2 vezes, no caso por 1 e ele mesmo, é considerado um primo
    echo "</br><h1 style='text-align: center'> $valor </h1><h2 style='text-align: center'> É um número primo</h2>";

    } else {         // @Senão não
        echo "</br><h1 style='text-align: center'> $valor </h1><h2 style='text-align: center'> Não é considerado um número primo por ser divisível mais de 2 vezes</h2>";
        
    }

?>