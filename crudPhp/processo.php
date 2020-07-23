<?php
// @Pegando tos os valores digitado através do navegador pelo usuário
include_once("conexao.php");
    $perg1 = $_POST["perg1"];
    $perg2 = $_POST["perg2"];
    $perg3 = $_POST["perg3"];
    $perg4 = $_POST["perg4"];

    $resultado = 0;


    if(!isset($perg1) || !isset($perg2) || !isset($perg3) || !isset($perg4) ) {
    echo "Complete o questionário. :/ ";
    } else {

    

// @Inserido os dados informados pelo usuário no meu BD
    $sql = "INSERT INTO clientes SET faixaEtaria = '$perg1', tipoConvenio = '$perg2', faixaSalarial = '$perg3', motEmprestimo = '$perg4' ";
        $sql = $pdo->query($sql);
        echo "usuário inserido com sucesso<hr>";

//@Selecionando todos os dados da tabela clientes do meu BD
    $sql = "SELECT COUNT(*) FROM clientes ";
    $sql = $pdo->query($sql);


    if($sql->rowCount() > 0) {
    
    
        foreach($sql->fetchAll() as $cliente) {
            
            echo " Faixa etária: ".$cliente["faixaEtaria"]."</br>"." Tipo de convênio: ".$cliente["tipoConvenio"]."</br>"." Faixa salarial: ".$cliente["faixaSalarial"]."</br>"." Motivo do empréstimo: ".$cliente["motEmprestimo"]."</br>";

            echo "<hr><hr>";
        }
    

    } else {
        echo "Não há usuários cadastrados no banco<hr>";
    }

}


?>