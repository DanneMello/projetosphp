<?php
// @Pegando tos os valores digitado através do navegador pelo usuário
include_once("conexao.php");

$nome = $_POST["nome"];
$sexo = $_POST["tipoSexo"];
$anoNasc = $_POST["anoNasc"];
$corCabelo = $_POST["corCabelo"];
$enviar = $_POST['enviar'];
$nome = strtoupper($nome);  // @Transformando os caracteres recebidos para maiúsculos.

// @Verificando se o questionário foi preenchido corretamente
if(!isset($nome) || !isset($sexo) || !isset($anoNasc) || !isset($corCabelo) ) {

        echo "Complete o questionário. :/ ";

        } else {
        echo $nome, "</br>";
        echo $sexo , "</br>";
        echo $anoNasc, "</br>";
        echo $corCabelo, "</br></br>";

        
// @Inserindo os dados informados pelo usuário no meu BD
        $sql = "INSERT INTO pessoa SET nome = '$nome', sexo = '$sexo', anoNasc = '$anoNasc', corCabelo = '$corCabelo' ";
        $sql = $pdo->query($sql);

// @Selecionando todos os dados da tabela pessoa do meu BD
        $total = 0;
        $sql = "SELECT * FROM pessoa  ";
        $sql = $pdo->query($sql);
        $total = $sql->rowCount(); // @Contando quantas listas tem na minha tabela

        echo "Número atual de pessoas salvas no meu banco: $total";

}
?>