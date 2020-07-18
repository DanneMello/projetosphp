<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Média de Notas com SWITCH</title>
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

if( !empty($nota1) && is_numeric($nota1) && // @Verificando se os dois campos estão preenchidos
    !empty($nota2) && is_numeric($nota2) && 
    !empty($nota3) && is_numeric($nota3) && 
    !empty($media) && is_numeric($media)) { 

    $mediaDeNotas = ($nota1 + $nota2 + $nota3) / 3;
    $mediaDeNotas = number_format($mediaDeNotas, 1); // @Aqui estou só fazendo o arredondando a nota com uma casa depois da virgula

    switch ($mediaDeNotas) { // @Aqui estou atribuindo um conceito de acordo com a média de notas do aluno
        case (($mediaDeNotas >=90) && ($mediaDeNotas <=100));
            $conceito = 'A';
    break;
        case (($mediaDeNotas >=80) && ($mediaDeNotas <90));
            $conceito = 'B';
    break;
        case (($mediaDeNotas >=70) && ($mediaDeNotas <80));
            $conceito = 'C';
    break;
        case (($mediaDeNotas >=70) && ($mediaDeNotas <=50));
            $conceito = 'D';
    break;
        case ($mediaDeNotas <50) ;
            $conceito = 'F';
    break;
    }
    echo "$nome sua pontuação é: $mediaDeNotas e você ficou com o conceito $conceito </br>";

    if($conceito == 'A') { // @Aqui estou apenas escrevendo uma mensagem de acordo com o o conceito do aluno
        echo "Aprovado com sucesso, PARABÉNS!!!";
    } else if ($conceito == 'B') {
        echo "Aprovado Parabéns!!";
    } else if ($conceito == 'C') {
        echo "Aprovado!!";
    } else if ($conceito == 'D') {
        echo "VOCÊ PEGOU RECUPERAÇÂO";
    } else {
        echo "REPROVADO! :/";
    }


} else {
     echo "Digite um valor numérico para continuar: ";
 }
 ?>
</body>
</html>   