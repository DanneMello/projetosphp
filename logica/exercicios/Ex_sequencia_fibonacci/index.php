<?php
// @Sequência de fibonacci
$nome = $_POST["nome"];
$Qt_Numero = $_POST['valor'];
$count =1;
$anterior =0;
$atual =1;
$proximo =1;

echo "<h2>$nome, você digitou $Qt_Numero e abaixo segue a sequência dos valores.</h2></br>";
for ($count; $count < $Qt_Numero; $count++) {
    echo "  $proximo  | ";
        $proximo = $atual + $anterior;
            $anterior = $atual;
                $atual = $proximo;
}

?>