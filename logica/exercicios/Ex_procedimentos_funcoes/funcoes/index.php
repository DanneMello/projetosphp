<?php
$nome = $_POST["nome"];
$valor1 = $_POST["valor1"];
$valor2 = $_POST["valor2"];
$valor3 = $_POST["valor3"];

// @Função para pegar o maior valor
function maiorValor($a, $b, $c) {
    $maiorValor = $a ;

        if ($maiorValor < $b) {
            $maiorValor = $b ;
        }

            if ($maiorValor < $c) {
                $maiorValor = $c ;
            }
    return $maiorValor;
}

// @Função para pegar o menor valor
function menorValor($a, $b, $c) {
    $menorValor = $a;

        if($menorValor > $b) {
            $menorValor = $b;
        }

            if ($menorValor > $c) {
                $menorValor = $c;
            }
    return $menorValor;
}

// @Função para verificar se os números informados pelo usuário é par ou impar
function numParImpar ($a, $b, $c) {
    $v1 =0;
    $v2 =0;
    $v3 =0;

        if (($a % 2) == 0) {
        echo "Valor $a é um número par </br>";

        } else {
            echo "Valor $a é impar: </br>";
            }

                if (($b % 2) == 0) {
                echo "Valor $b é um número par </br>"; 

                } else {
                    echo "Valor $b é impar: </br>";
                    }

                        if (($c % 2) == 0) {
                        echo "Valor $c é um número par </br>";   
                        } else {
                            echo "Valor $c é impar: </br>";
                            }
}


//@Função para somar os valores
function somaValores($a, $b, $c) {
    $soma = $a + $b + $c;
return $soma;
}



echo "Maior valor informado é: ".maiorValor($valor1, $valor2, $valor2);
    echo "</br>";
        echo "Menor valor informado é: ".menorValor($valor1, $valor2, $valor2);
            echo "</br>";
                echo "A soma de todos os valores é : ". somaValores($valor1, $valor2, $valor3);
                    echo "</br>";
                        echo numParImpar($valor1, $valor2, $valor3);
                            echo "</br>";


?>