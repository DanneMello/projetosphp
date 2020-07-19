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
    while ($i <$count) {
        $i = $i + $salto;
        echo $i ;
        echo "<hr>\\";
    }

} else {
     echo "Digite um valor numérico para continuar: "; // @Caso o usuário não digitar um valor numérico, esta menssagem irá aparecer.
 }
 ?>
</body>
</html>   