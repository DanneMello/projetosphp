<?php
include_once("conexao.php");
    $perg1 = $_POST["perg1"];
    $perg2 = $_POST["perg2"];
    $perg3 = $_POST["perg3"];
    $perg4 = $_POST["perg4"];

    $resultado = 0;


    if(!isset($perg1) || !isset($perg2) || !isset($perg3) || !isset($perg4) ) {
    echo "Complete o questionário. :/ ";
    } else {

    
    $sql = "SELECT * FROM clientes";
    $sql = $pdo->query($sql);

    $sql = "INSERT INTO clientes SET faixaEtaria = '$perg1', tipoConvenio = '$perg2', faixaSalarial = '$perg3', motEmprestimo = '$perg4' ";
        $sql = $pdo->query($sql);
        echo "usuário inserido com sucesso";

    if($sql->rowCount() > 0) {

        foreach($sql->fetchAll() as $cliente) {
            echo " Quantidade de: ".$cliente["faixaEtaria"]."<hr>";

        }

    } else {
        echo "Não há usuários cadastrados no banco<hr>";
    }

    /*
    * @Se o formulário estiver completo vai cair aqui
    */ 
        
    if(isset($perg1)) { // @Aqui primeiro defini as variáveis que vão armazenar os valores de após as pesquisas.
            $ate30 = 0;
            $de30a50 = 0;
            $de50a65 = 0;
            $acima65 = 0;
            if($perg1 == "opt1") {
            $ate30 ++;
            echo "ate30: ".$ate30;
        } else if($perg1 == "opt2") {
            $de30a50 ++;
            echo "de30a50: ".$de30a50;
        } else if($perg1 == "opt3") {
            $de50a65 ++;
            echo "de50a65: ".$de50a65 ;
        } else {
            $acima65 ++;
            echo "acima65: ".$acima65 ;
        }
    }

    echo "<br/>";

        if(isset($perg2)) { // @Aqui primeiro defini as variáveis que vão armazenar os valores de após as pesquisas.
            $inss = 0;
            $siape = 0;
            $fa = 0;
            $outros = 0;

            if($perg2 == "opt1") { // @Aqui estou pegando a alternativa escolhida pelo usuário
                $inss ++;
                echo "Faz parte do Inss: ".$inss;
            } else if($perg2 == "opt2") {
                $siape ++;
                echo "Faz parte do Siape: ".$siape;
            } else if($perg2 == "opt3") {
                $fa ++;
                echo "Faz parte das forças armadas: ".$fa;
            } else {
                $outros ++;
                echo "Possui outros convênios". $outros;
            }
        }

            echo "<br/>";

        if(isset($perg3)) { // @Aqui primeiro defini as variáveis que vão armazenar os valores de após as pesquisas.
            $ate2sm = 0;
            $de2a4sm = 0;
            $de4a6sm = 0;
            $acima6sm = 0;
            if($perg3 == "opt1") {
                $ate2sm ++;
                echo  "Até 2 salários mínimos: ".$ate2sm;
            } else if($perg3 == "opt2") {
                $de2a4sm ++;
                echo "Entre 2 e 4 salários mínimos: ".$de2a4sm;
            } else if($perg3 == "opt3") {
                $de4a6sm ++;
                echo "Entre 4 a 6 salários mínimos: ".$de4a6sm;
            } else {
                $acima6sm++;
                echo "Acima de 6 salários mínimos: ". $acima6sm;
            }

        }
            echo "<br/>";

        if(isset($perg4)) { // @Aqui primeiro defini as variáveis que vão armazenar os valores de após as pesquisas.
            $pg_contas = 0;
            $ref_casa = 0;
            $comp_carro = 0;
            $outro = 0;
            if($perg4 == "opt1") {
                $pg_contas ++;
                echo "Pagar contas".$pg_contas;
            } else if($perg4 == "opt2") {
                $ref_casa ++;
                echo "Reformar casa: ".$ref_casa;
            } else if($perg4 == "opt3") {
                $comp_carro ++;
                echo "Compra de carro: ".$comp_carro;
            } else {
                $outro ++;
                echo "outros".$outro;
            }
        }
        echo "<hr>";
        echo "A pergunta 1 é do tipo: ".gettype($perg1)."<hr>";
        echo "A pergunta 2 é do tipo: ".gettype($perg2)."<hr>";
        echo "A pergunta 3 é do tipo: ".gettype($perg3)."<hr>";
        echo "A pergunta 4 é do tipo: ".gettype($perg4)."<hr>";


}


?>