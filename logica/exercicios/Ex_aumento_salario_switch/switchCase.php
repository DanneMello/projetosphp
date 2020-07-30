<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Switch_Case</title>
</head>
<body>
    <h1>XXX Software</h1> 
    <p> Pensando no bem estar de nossos colaboradores, resolvemos dar um Up nos seus salários de acordo com o número de dependentes que cada um possui.</p>
<form action="" method="POST" >
        Digite o nome do funcionário:</br> <input name="nome" type="text"><br>
        Digite o salário do mesmo:</br> <input name="salario" type="text"><br>
        Digite a quantidade de dependentes:</br> <input name="dependente" type="text"><br>
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
<?php
// @Pegando os valores informados pelo usuário via método POST
    $nome = $_POST["nome"];
    $salario = $_POST["salario"];
    $dependente = $_POST["dependente"];
    $enviar = $_POST['enviar'];

if( !empty($salario) && is_numeric($dependente) ) { // @Verificando se os dois campos estão preenchidos

    $novoSalario = 0;

    switch ($dependente) { // @Definindo o valor do novo salário do funcionário de acordo com o número de seus dependentes.
        case 0:
            $novoSalario = $salario + ($salario * 3 / 100);
        break;

        case 1:  
        case 2:
        case 3:
            $novoSalario = $salario + ($salario * 5 / 100);
        break;

        case 4:  
        case 5:
        case 6:
            $novoSalario = $salario + ($salario * 10 / 100);
        break;
        case 7:  
        case 8:
        case 9:
            $novoSalario = $salario + ($salario * 15 / 100);
        break;

        default:
            $novoSalario = $salario + ($salario * 20 / 100);
    }

    echo "O novo salário do(a) funcionário(a) $nome é: $novoSalario ";

 } else {
     echo "Digite um valor numérico para continuar: ";
 }
 ?>
</body>
</html>   