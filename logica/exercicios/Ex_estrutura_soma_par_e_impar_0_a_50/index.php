<?php
require 'conexao.php';
// @Pegando os valores informados pelo usuário via método POST
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $email = $_POST["e-mail"];
    $enviar = $_POST['enviar'];

// @Verificando se o questionário foi preenchido corretamente
if(!isset($nome) || !isset($valor) || !isset($email) ) {

    echo "Complete o questionário. :/ ";

} else {
// @Inserindo os dados informados pelo usuário no meu BD
        $sql = "INSERT INTO users SET nome = '$nome', email = '$email', valor = '$valor' ";
        $sql = $pdo->query($sql);

// @Selecionando todos os dados da tabela pessoa do meu BD
        $total = 0;
        $sql = "SELECT * FROM users  ";
        $sql = $pdo->query($sql);
        $total = $sql->rowCount(); // @Contando quantas listas tem na minha tabela

// @Inicializando as váriaveis que irei armazenar os dados 
        $total_0_A_50 = 0 ;
        $somaImpar = 0 ;
        $somaPar = 0 ;

// @Usando um foreach para pegar os conteúdos salvos no DB e atribuir as variáveis
        foreach ( $sql->fetchAll() as $row ) { 

                $nome = $row['nome'];
                $valor = $row['valor'];            
                $email = $row['email'];

            if( ($valor > 0) && ($valor < 50) ) {
                $total_0_A_50 ++;

// @Somando todos os valores impares e pares entre 0 e 50.
                    if($valor % 2 == 0) {
                        $somaPar += $valor;
                            } else {
                                $somaImpar += $valor;
                            }

            }

        }
        echo "</br>Total de usuários salvos no DB: $total";
            echo "Existem $total_0_A_50 entre 0 e 50 valores registrados no DB.";
                echo "</br>a soma dos números IMPARES digitados é: $somaImpar";
                    echo "</br>a soma dos números PARES digitados é: $somaPar";

        echo "<h1>Abaixo só mostrando um loop utilizando laço de repetições aninhados</h1>";

            for($count1=1; $count1<=3; $count1++){
                for($count2=1; $count2<=3; $count2++) {
                    echo "$count1 $count2</br>";
                }
            }
}
?>