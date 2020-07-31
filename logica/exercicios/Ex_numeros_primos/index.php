<?php
$nome = $_POST["nome"];
$valor = $_POST["valor"];
$enviar = $_POST['enviar'];
$nome = strtoupper($nome);  // @Transformando os caracteres recebidos para maiúsculos.
$count = 1;
$coutDiv = 0;


    do {
        if( $valor % $count == 0) {
            $coutDiv =$coutDiv + 1;
        }
        $count = $count + 1;

    } while($count < $valor);

         echo "Existe $coutDiv  ";


// echo "<hr>$nome!! Segue o fatorial de $valor = $count <b> - </b>";


?>