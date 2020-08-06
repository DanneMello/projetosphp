<?php
/*
@Corrigindo provas

*/
$gabarito = array(
    "pergunta01" => 'a',
    "pergunta02" => 'b',
    "pergunta03" => 'c',
    "pergunta04" => 'd',
    "pergunta05" => 'e'
);

$aluno1 = array (
    "nome" => 'Cicrano',
    "questao01" => 'b',
    "questao02" => 'c',
    "questao03" => 'a',
    "questao04" => 'e',
    "questao05" => 'd',
);

$aluno2 = array (
    "nome" => 'Fulano',
    "questao01" => 'c',
    "questao02" => 'c',
    "questao03" => 'e',
    "questao04" => 'a',
    "questao05" => 'd',
);

$aluno3 = array (
    "nome" => 'Beltrano',
    "questao01" => 'b',
    "questao02" => 'a',
    "questao03" => 'c',
    "questao04" => 'e',
    "questao05" => 'a',
);

$resultado = array_diff($gabarito, $aluno2);

//echo $resultado;



$aluno4 = array (1,2,3,4,'lol',5);
var_dump($aluno4);
var_dump($aluno3);
?>