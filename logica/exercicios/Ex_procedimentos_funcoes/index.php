<?php
require_once'conexao.php';

$nome = $_POST["nome"];
$email = $_POST["e-mail"];
$peso = $_POST["peso"];
$sexo = $_POST["tipoSexo"];
$anoNasc = $_POST["anoNasc"];
$cabelo = $_POST["corCabelo"];

// @Função para calcular a idade da pessoa com os dados obtidos do meu DB
function idade ($anoNasc) {
    $anoNasc = new DateTime($anoNasc);
            $dataAtual = new DateTime();
                    $idade = $dataAtual->diff($anoNasc);
                            return $idade->y;
}

$idade = idade($anoNasc); // @Atribuindo a variavel $idade o resultado retornado pela funão idade.

$nome = strtoupper($nome);  // @Transformando os caracteres recebidos para maiúsculos.
echo "Nome: $nome</br> 
    E-mail: $email</br> 
        Peso: $peso Kg</br> 
            Sexo: $sexo</br> 
                Idade: $idade</br> 
                    Cabelo: $cabelo</br> 
";

// @Inserindo os dados informados pelo usuário no meu BD
$sql = "INSERT INTO pessoa SET nome = '$nome', anoNasc = '$anoNasc', peso = '$peso', sexo = '$sexo',  email = '$email', cabelo = '$cabelo' ";
$sql = $pdo->query($sql);

echo "Usuário inserido com sucesso!";

// @Selecionando todos os dados da tabela pessoa do meu BD
$total = 0;
$sql = "SELECT * FROM pessoa  ";
$sql = $pdo->query($sql);
$total = $sql->rowCount(); // @Contando quantas listas tem na minha tabela

// @Inicializando as váriaveis que irei armazenar os dados 



// @Usando um foreach para pegar os conteúdos salvos no DB e atribuir as variáveis
foreach ( $sql->fetchAll() as $row ) { 

    $nome = $row["nome"];
    $email = $row["e-mail"];
    $peso = $row['peso'];
    $sexo = $row["tipoSexo"];
    $anoNasc = $row["anoNasc"];
    $cabelo = $row['corCabelo'];


}


?>