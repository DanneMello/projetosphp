<!DOCTYPE HTML>
<html lang = "pt-br">
<head>
   <title>Exemplo</title>
   <meta charset = "UTF-8">
</head>
<body>
<form action="" method="POST" >
      Digite seu nome:</br> <input name="valor1" type="text"><br>
      Digite seu sobrenome:</br> <input name="valor2" type="text"><br>
      <input type="submit" name="enviar" value="Enviar"> 
</form>
<!--   <form action="" method="post" >
      Primeiro Numero: <input name="num1" type="text"><br>
      Segundo numero: <input name="num2" type="text"><br>
      <input type="submit" name="operacao" value="+">     
      <input type="submit" name="operacao" value="-">     
      <input type="submit" name="operacao" value="*">     
      <input type="submit" name="operacao" value="/">        
    </form> 
-->    
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

/*
   $a = $_POST['num1'];
   $b = $_POST['num2'];
   $op= $_POST['operacao'];

   
   if( !empty($op) ) {
      if($op == '+')
         $c = $a + $b;
      else if($op == '-')
         $c = $a - $b;
      else if($op == '*')
         $c = $a*$b;
      else
         $c = $a/$b;

      echo "O resultado da operação é: $c";

   }
*/

?>       
</body>
</html>