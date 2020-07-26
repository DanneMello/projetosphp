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
        Digite o ano em que nasceu:</br> <input name="ano_nasc" type="text"><br>
        Digite o ano que deseja tirar sua habilitação:</br> <input name="ano_atual" type="text"><br>
        <input type="submit" name="enviar" value="Enviar"> 

    </form>
<?php
// @Pegando os valores informados pelo usuário via método POST
    $nome = $_POST["nome"];
    $ano_nasc = $_POST["ano_nasc"];
    $ano_atual= $_POST["ano_atual"];
    $enviar = $_POST['enviar'];

if( !empty($ano_nasc) && is_numeric($ano_atual) ) { // @Verificando se os dois campos estão preenchidos
    $idade = $ano_atual - $ano_nasc; 
    $maior_idade = $ano_atual - $ano_nasc;
    $idade_q_falta = 18 - $maior_idade; // @Variável para guardar os anos que falta p atingir a maior idade.

    if($maior_idade >= 18) {
        echo "Parabéns, sua idade é $idade e Já pode ir preso!! Também pode tirar sua Habilitação:";

    } else {
        echo "Então... Você só tem $idade anos e ainda não pode tirar sua Habilitação, falta $idade_q_falta ano";
        
        if($idade_q_falta > 1) { // @Se for maior que um, vai add um "s" no final de "ano";
            echo "s";
        }
    }
 } else {
     echo "Digite um valor numérico para continuar: ";
 }
 ?>
</body>
</html>   