<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>

</head>
<body>

<form action="" method="POST" >

        Digite o ano em que você nasceu:</br> <input name="ano_nasc" type="text"><br>
        Digite o ano em que estamos:</br> <input name="ano_atual" type="text"><br>
        <input type="submit" name="enviar" valuano_atuale="Enviar"> 
    
    </form>

<?php

    $ano_nasc = $_POST["ano_nasc"];
    $ano_atual = $_POST["ano_atual"];
    $enviar = $_POST['enviar'];

if( !empty($ano_nasc) && !empty($ano_atual) ) {

    if( is_numeric($ano_nasc) && is_numeric($ano_atual)) { // @Verificando se os valores digitados pelo usuário é numéricos, se true ele entra nesse if.
        
        $idade = $ano_atual - $ano_nasc;

        echo "Você tem $idade anos";
        
    } else {

        echo "Digite um valor numérico para continuar";

    }

    echo "<h1>Ultimos valores digitados:</h1> ";
    echo "<h2>Valores digitados:  $ano_nasc ". " " ."$ano_atual </h2>";

 } else {

     echo "Preencha corretamente os campos: ";
 }
 ?>
</body>
</html>   