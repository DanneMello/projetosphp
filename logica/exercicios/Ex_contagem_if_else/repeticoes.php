<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Extrutura de Repetições</title>
</head>
<body>
<form action="" method="POST" >
        Digite seu Nome:</br> <input name="nome" type="text"><br>
        Quer contar até quantos?:</br> <input name="count" type="text"><br>
        Digite o número de saltos desejados</br> <input name="salto" type="text"><br>

        <input type="submit" name="enviar" value="Enviar"> 
    </form>
<?php
// @Pegando os valores informados pelo usuário via método POST
    $nome = $_POST["nome"];
    $count = $_POST["count"];
    $salto = $_POST["salto"];
    $enviar = $_POST['enviar'];

if( !empty($count) && is_numeric($count) && // @Verificando se os dois campos estão preenchidos
    !empty($salto) && is_numeric($salto)) {

    $numSaltos = $count / $salto;
    echo "O(a) $nome quer contar até $count, saltando de $salto em $salto. Numero de repetições é: $numSaltos" . "</br>";
    $i = 0;
    $soma = 0;
    $maiorValor = 0;
    $menorValor = 0;
    while ($i <$count) {
        $i = $i + $salto;
        $soma = $soma + $i; //@Atribuindo os valores na váriavel $soma a cada loop
        echo $i ;  //@Printando o valor da váriavel $i a cada loop
        echo "</br>";
    }
    if ($soma > $maiorValor ) { // @Aqui estou fazendo a verificação para saber qual é o maior valor

        $maiorValor = $soma;
    }

    if ($soma < $menorValor) { // @Aqui estou fazendo a verificação para saber qual é o menor valor

        $menorValor = $soma;
    }
    echo "<hr>" . "A soma de de todos os loops [$numSaltos] é igual a: ". $soma . ". </br> A cada loop será acrescentado o valor que ela estará valendo";
    echo "<hr>";
    echo "Maior valor é: $maiorValor </br>";
    echo "Menor valor é: $menorValor </br>";


} else {
     echo "Digite um valor numérico para continuar: "; // @Caso o usuário não digitar um valor numérico, esta menssagem irá aparecer.
 }
 ?>
</body>
</html>   