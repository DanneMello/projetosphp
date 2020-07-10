<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxação</title>
</head>
<body>
<form action="" method="POST" >
        Digite os valores totais das compras:</br> <input name="valor_total" type="text"><br>
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
<?php
    $valor_total = $_POST["valor_total"];
    $enviar = $_POST['enviar'];

if( !empty($valor_total) ) { // @Verificando se os dois campos estão preenchidos

    if( is_numeric($valor_total) ) { // @Verificando se os valores digitados pelo usuário é numéricos, se true ele entra nesse if.
        $imposto = ($valor_total * 60) / 100;
        echo "Levando em conta que a taxa de imposto é de 60%, o valor total a ser pago é de: US$$imposto";    
    } else {
        echo "Digite um valor numérico para continuar";
    }  
    
    echo "<h1>Ultimo valor digitado:</h1> ";
    echo "<h2>Valor digitado: US$$valor_total </h2>";
 } else {
     echo "Campo vazio!! ";
 }
 ?>
</body>
</html>   