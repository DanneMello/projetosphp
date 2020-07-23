<?php
// @Pegando tos os valores digitado através do navegador pelo usuário
include_once("conexao.php");
    $perg1 = $_POST["perg1"];
    $perg2 = $_POST["perg2"];
    $perg3 = $_POST["perg3"];
    $perg4 = $_POST["perg4"];

    $resultado = 0;

// @Verificando se o questionário foi preenchido corretamente
    if(!isset($perg1) || !isset($perg2) || !isset($perg3) || !isset($perg4) ) {
    echo "Complete o questionário. :/ ";
    } else {

    

// @Inserido os dados informados pelo usuário no meu BD
    $sql = "INSERT INTO clientes SET faixaEtaria = '$perg1', tipoConvenio = '$perg2', faixaSalarial = '$perg3', motEmprestimo = '$perg4' ";
    $sql = $pdo->query($sql);
    echo "usuário inserido com sucesso<hr>";

// @Selecionando todos os dados da tabela clientes do meu BD
    $total = 0;
    $n = 0;
    $sql = "SELECT * FROM clientes ";
    $sql = $pdo->query($sql);
    $total = $sql->rowCount(); // @Contando quantas listas tem na minha tabela

    echo "O número de usuários cadastrados no meu Banco é: <b>". $total."</b><hr>";

// @Buscando todos os dados da minha tabela e criando uma array "$row" 
    foreach ($sql->fetchAll() as $row) {
        echo "Cliente = ".$n."</br>";
        echo " - Id : ". $row['id']."</br>";
        echo " - Faixa etária : ". $row['faixaEtaria']."</br>";
        echo " - Faixa salarial : ". $row['faixaSalarial']."</br>";
        echo " - Motivo do empréstimo : ". $row['motEmprestimo']."</br>";

        echo "</br><hr>";
        $n++;
    }


}


?>