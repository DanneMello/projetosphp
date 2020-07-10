<!DOCTYPE HTML>
<html lang = "pt-br">
<head>
   <title>Operadores lógicos e comandos de entradas com Php</title>
   <meta charset = "UTF-8">
</head>
<body>
<form action="" method="POST" >
      Digite o primeiro valor:</br> <input name="valor1" type="text"><br>
      Digite o segundo valor:</br> <input name="valor2" type="text"><br>
      <input type="submit" name="enviar" value="Enviar"> 
</form>

<?php

$val1 = $_POST["valor1"];
$val2 = $_POST["valor2"];
$enviar = $_POST['enviar'];

if( !empty($enviar) ) {
    if( is_numeric($val1) && is_numeric($val2)) { // @Verificando se os valores digitados pelo usuário é numéricos, se true ele entra nesse if.
            $op = $val1 + $val2;
            echo "</br>A soma entre os dois valores é: $op";
    } else {
        echo "O valor digitado não é numérico: ";
    }

    echo "<h1>Ultimos valores digitados:</h1> ";
    echo "<h2>Valores digitados:  $val1 ". " " ."$val2 </h2>";
 }
?>       
</body>
</html>