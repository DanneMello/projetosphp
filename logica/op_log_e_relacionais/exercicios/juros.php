<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxação</title>
</head>
<body>
<form action="" method="POST" >
        Digite o valor do empréstimo desejado:</br> <input name="valor" type="text"><br>
        Digite a quantidade de parcelas:</br> <input name="parcela" type="text"><br>
        Digite a taxa de juros:</br> <input name="juros" type="text"><br>

        <input type="submit" name="enviar" value="Enviar"> 
    </form>
<?php
// @Pegando os valores informados pelo usuário via método POST
    $valor = $_POST["valor"];
    $parcela = $_POST["parcela"];
    $juros = $_POST["juros"];
    $enviar = $_POST['enviar'];

if( !empty($valor) && is_numeric($valor) ) { // @Verificando se os dois campos estão preenchidos
/*  $juros = $juros / 100;
    $valor_total = $juros + $valor;
    $valor_parcela = $valor_total / $parcela; 
*/
/*
    // @Juros compostos
    $juros = $juros/100;
    $valor_parcela = $valor * pow((1 + $juros), $parcela);
    $valor_parcela = number_format($valor_parcela / $parcela);
    $valor_total = $valor_parcela * $parcela;
*/   
    $juros_original = $juros; // @Declarando essa variável apenas p printar o valor do juros informado pelo usuário
    
    // @Juros simples
    $juros = $juros/100; 
    $valor_parcela = $valor * (1 + $juros * $parcela);
    $valor_parcela = number_format($valor_parcela / $parcela);
    $valor_total = $valor_parcela * $parcela;

    echo "Com um juros de $juros_original%, o valor total ficará R$ $valor_total em apenas $parcela vezes de apenas R$ $valor_parcela ";
    echo "<h2>Valor digitado: R$ $valor</h2>";
 } else {
     echo "Campo vazio!! Digite um valor numérico para continuar: ";
 }
 ?>
</body>
</html>   