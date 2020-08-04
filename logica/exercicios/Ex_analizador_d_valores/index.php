<?php
// @Pegando os dados informados pelo usuário através do metodo POST
$nome = $_POST["nome"];
$valor1 = $_POST["valor1"];
$valor2 = $_POST["valor2"];
$valor3 = $_POST["valor3"];
$valor4 = $_POST["valor4"];
$valor5 = $_POST["valor5"];
$enviar = $_POST['enviar'];

$nome = strtoupper($nome);  // @Transformando os caracteres recebidos para maiúsculos.

$soma = $valor1 + 
            $valor2 + 
                $valor3 + 
                    $valor4 + 
                        $valor5;

$media = ($valor1 + 
            $valor2 + 
                $valor3 + 
                    $valor4 + 
                        $valor5) / 5;

// @Inicializando variaveis que irei utilizá-las a seguir para armazenar a quantidade dos valores divísiveis por 5.
$V_1_div_p_5 = 0;
$V_2_div_p_5 = 0;
$V_3_div_p_5 = 0;
$V_4_div_p_5 = 0;
$V_5_div_p_5 = 0;

// @Inicializando variaveis que irei utilizá-las a seguir para armazenar a quantidade dos valores NULL's.
$V_1_NULL = 0;
$V_2_NULL = 0;
$V_3_NULL = 0;
$V_4_NULL = 0;
$V_5_NULL = 0;

// @Inicializando variaveis que irei utilizá-las a seguir para armazenar a quantidade dos valores PARES.
$par_1 = 0;
$par_2 = 0;
$par_3 = 0;
$par_4 = 0;
$par_5 = 0;

if( is_numeric($valor1) &&   // @Verificando se o valor informado pelo usuário é um valor numérico
    is_numeric($valor2) && 
    is_numeric($valor3) && 
    is_numeric($valor4) && 
    is_numeric($valor5)) {


// @Verificando os divisiveis por 3 
        if (($valor1 % 5) == 0 ) {
            $V_1_div_p_5 ++;
        }   

            if (($valor2 % 5) == 0) {
                    $V_2_div_p_5 ++;
                }  
                 
                    if (($valor3 % 5) == 0) {
                        $V_3_div_p_5 ++;
                    }  

                        if (($valor4 % 5) == 0) {
                            $V_4_div_p_5 ++;
                        }   

                            if (($valor5 % 5) == 0) {
                                $V_5_div_p_5 ++;
                            }

        $div_p_5 =  $V_1_div_p_5 +    // @Atribuindo o valores á váriavel que armazenará a quantidade dos valores divisiveis por 5
                        $V_2_div_p_5 + 
                            $V_3_div_p_5 + 
                                $V_4_div_p_5 + 
                                    $V_5_div_p_5 ;


// @Verificando a quantidade de valores NULL's
        if (($valor1) == 0) {
            $V_1_NULL ++;
        }   

            if (($valor2) == 0) {
                $V_2_div_p_5 ++;
            }  

                if (($valor3) == 0) {
                    $V_3_NULL ++;
                }   
                
                    if (($valor4) == 0) {
                        $V_4_NULL ++;
                    } 

                        if (($valor5) == 0) {
                            $V_5_NULL ++;
                        }

        $Qtt_NULL = $V_1_NULL +    // @Atribuindo o valores á váriavel que armazenará os valores nulos 
                        $V_2_NULL + 
                            $V_3_NULL + 
                                $V_4_NULL + 
                                    $V_5_NULL ;


// @Verificando a quantidade de pares
        if (($valor1 % 2) == 0 ) {
            $par_1 ++;
        }   

            if (($valor2 % 2) == 0) {
                $par_2 ++;
                }  
                
                    if (($valor3 % 2) == 0) {
                        $par_3 ++;
                    }  

                        if (($valor4 % 2) == 0) {
                            $par_4 ++;
                        }   

                            if (($valor5 % 2) == 0) {
                                $par_5 ++;
                            }

        $total_pares =  $par_1 +    // @Atribuindo o valores á váriavel que armazenará a quantidade dos valores divisiveis por 5
                            $par_2 + 
                                $par_3 + 
                                    $par_4 + 
                                        $par_5 ;                          



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

echo "$nome, escolheu os seguintes valores $valor1 \ $valor2 \ $valor3 \ $valor4 \ $valor5 </br> ";
    echo "A soma de todos os valores é: $soma </br>";
        echo "A média dos valores é: $media </br>";
            echo "Existem $div_p_5, <b>divisiveis por 5 </b> dentre os valores informado por $nome </br>";
                echo "Existem $Qtt_NULL, <b>nulos</b> dentre os valores informado por $nome </br>";
                    echo "Existem $total_pares, de números <b>pares</b> dentre os valores informado por $nome </br>";




                

?>