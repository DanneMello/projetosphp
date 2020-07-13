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
        Digite sua nota 1:</br> <input name="nota1" type="text"><br>
        Digite sua nota 2:</br> <input name="nota2" type="text"><br>
        Digite sua nota 3:</br> <input name="nota3" type="text"><br>
        Digite sua média: </br> <input name="media" type="text"><br>
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
<?php
// @Pegando os valores informados pelo usuário via método POST
    $nome = $_POST["nome"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];
    $media = $_POST["media"];
    $enviar = $_POST['enviar'];

if( !empty($nota1) && is_numeric($nota1) && !empty($nota2) && is_numeric($nota2) && !empty($nota3) && is_numeric($nota3) && !empty($media) && is_numeric($media)) { // @Verificando se os dois campos estão preenchidos
    $nota_final = ($nota1 + $nota2 + $nota3) / 3;
    $nota_final = number_format($nota_final, 1); //@aqui estou usando a função do próprio PHP para estipular a quantidade de casa que quero mostrar após a virgula.

    if($nota_final >= $media) {

        echo "Parabéns $nome, sua média foi $nota_final e você foi aprovado com sucesso!! \o/";

    } else if(($nota_final >= 50) && ($nota_final < 70)) {
        echo "$nome, você PEGOU RECUPERAÇÃO!! ficou com $nota_final ponto";
            if($nota_final > 1) {
                echo "s";
            }
    } else {
        echo "$nome, você foi REPROVADO(a)!! Ficou com $nota_final ponto";
            if($nota_final > 1) { // @Se a quantidade de pontos forem maior que 1, acrescenta o s no final da palavra "ponto".
                echo "s.";
            } else {
                echo "."; // @Senão acrescenta apenas o "." .
        }
    }

} else {
     echo "Digite um valor numérico para continuar: ";
 }
 ?>
</body>
</html>   