<?php
$nome = $_POST["nome"];
$valor = $_POST["valor"];
$enviar = $_POST['enviar'];
$nome = strtoupper($nome);  // @Transformando os caracteres recebidos para maiúsculos.

// @Escolhendo as opçãos
if($valor == 1 ) { 

    for($count=1; $count<=10; $count++) {
        echo "$count | ";
    } 

} else if ($valor == 2) {
    for($count=10; $count>=1; $count--) {
        echo "$count | ";
    }

} else if ($valor == 3){
            echo "FAZER NADA? SÈRIOO??";
} else {
    echo "Sabe ler não? Escolha uma dentre as opções (1, 2 ou3)";
}


?>