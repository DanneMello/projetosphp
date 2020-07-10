<!DOCTYPE HTML>
<html lang = "pt-br">
<head>
   <title>Operadores lógicos e relacionais</title>
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

if( !empty($val1) && !empty($val2) ) {

    if( is_numeric($val1) && is_numeric($val2)) { // @Verificando se os valores digitados pelo usuário é numéricos, se true ele entra nesse if.
           if( $val1 > $val2 ) {
               echo "O primeiro valor [$val1] é maior que o segundo [$val2] </br>";
           } else if( $val1 < $val2 ) {
               echo "O segundo valor [$val2] é maior que o primeiro[$val1] </br>";
           }
           if( $val1 == $val2 ) {
                echo "Os valores [$val1] e [$val2] são idênticos: </br>";
            } else if( $val1 != $val2 ) {
                echo "Os valores [$val2] e [$val1] são diferentes: </br>";
            }
    } else {

        echo "Digite um valor numérico para continuar";

    }  
    echo "<h1>Ultimos valores digitados:</h1> ";
    echo "<h2>Valores digitados:  $val1 ". " " ."$val2 </h2>";

 }
?>
</body>
</html>