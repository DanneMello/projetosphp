<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo_IMC</title>
</head>
<body>
<form action="" method="POST" >

        Digite seu Nome:</br> <input name="nome" type="text"><br>
        Digite seu peso:</br> <input name="peso" type="text"><br>
        Digite sua altura (m):</br> <input name="altura" type="text"><br>
        <input type="submit" name="enviar" value="Enviar"> 

    </form>
<?php
// @Pegando os valores informados pelo usuário via método POST
    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $enviar = $_POST['enviar'];

if( !empty($peso) && is_numeric($altura) ) { // @Verificando se os dois campos estão preenchidos
    $imc = $peso / ($altura * $altura);

    echo "$nome, seu índice de massa corporal é de: $imc </br>";

    if($imc < 18.5) {
        echo "Você está abaixo do peso: ";

    } else if (($imc >= 18.5) && ($imc < 25)) {
        echo "Parabéns!! Estás com o peso ideal: \o/ ";

    } else if (($imc >= 25) && ($imc < 30)) {
        echo "Olha o sobrepeso amigo(a): ";

    } else if (($imc >= 30) && ($imc < 35)) {
        echo "Obesidade grau I ";

    } else if (($imc >= 35) && ($imc < 40)) {
        echo "Obesidade grau II ";

    } else {
        echo "Obesidade grau III";
    }

 } else {
     echo "Digite um valor numérico para continuar: ";
 }
 
 ?>
</body>
</html>   