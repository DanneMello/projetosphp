<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperatura em Célcius</title>
</head>
<body>
<form action="" method="POST" >
        Digite a temperatura em fahrenheit:</br> <input name="temperatura" type="text"><br>
        <input type="submit" name="enviar" valuano_atuale="Enviar"> 
    </form>

<?php
    $temperatura = $_POST["temperatura"];
    $enviar = $_POST['enviar'];

if( !empty($temperatura) ) { // @Verificando se os dois campos estão preenchidos

    if( is_numeric($temperatura) ) { // @Verificando se os valores digitados pelo usuário é numéricos, se true ele entra nesse if.
        $celsio = ($temperatura - 32) / 1.8;

        echo "A temperatura atual em Célsius é: $celsio";
        
    } else {

        echo "Digite um valor numérico para continuar";

    }  
    echo "<h1>Ultimo valor digitado:</h1> ";
    echo "<h2>Valor digitado:  $temperatura  </h2>";
 } else {
     echo "Campo vazio!! ";
 }
 ?>
</body>
</html>   