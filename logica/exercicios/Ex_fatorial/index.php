<?php
$nome = $_POST["nome"];
$valor = $_POST["valor"];
$enviar = $_POST['enviar'];
$nome = strtoupper($nome);  // @Transformando os caracteres recebidos para maiúsculos.
$count = 0;
$fatorial =1;

if(is_numeric($valor) ) {  // @Verificando se o valor informado pelo usuário é um valor numérico
    $count = $valor;

    do {
            $fatorial = $fatorial * $count;  // @Calculando o fatorial.
            $count -- ;

    } while ($count >= 1);

    echo "<hr>$nome!! Segue o fatorial de $valor = <b>$fatorial</b>";


} else {
// @Abaixo apenas estou aplicando um HTML e um CSS para deixar a resposta mais bonita.    
    echo "
        <h1 style= '
            color: #FF4500;
            text-align: center;'>
                <p style= 'color: #1E90FF'>
                    <b>
                        $nome !! 
                    </b>               
                </p>
                <b>$valor ??  </b> Por acaso isso é um valor numérico?</br>
                Digite um valor numérico para poder calcular o fatorial
        </h1>
    ";
}


?>