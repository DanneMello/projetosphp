<?php
// @Pegando os valores informados pelo usuário via método POST
    $nome = $_POST["nome"];
    $tabuada = $_POST["tabuada"];
    $enviar = $_POST['enviar'];

if(isset($enviar) && is_numeric($tabuada) ) { // @Verificando se os dois campos estão preenchidos corretamente, caso contrário pedirá ao usuário que volte a digitar os dados corretamente.

    $count = 1; // @Iniciando a variável count com 1 para começar a multiplicação a partir do 1
    $resposta = 0; //@Será atribuido a respostas
    $nome = strtoupper($nome); // @Convertendo os caracteres para Maiúsculas

// @Abaixo estou criando umma tabelinha em HTML junto com um CSS, através do próprio PHP 
    echo "<table 
        style=' 
        
            margin:auto;
            height: 50px;
            width: 390; 
            border: 1px;
            background: #00FF00;
            position: auto;
            text-align: center;
            align-items: center
            transform: translate(-50%, -50%)' >

            <tr>
                <td><b>TABUADA ESCOLHIDA PELO <b> $nome </b>FOI: <td  bgcolor='#1E90FF' width='40'> $tabuada </td></td>            
            </tr>  
                       
        </table> ";

    do {
        $resposta = $tabuada * $count;  // @Variavel resposta receberá a multiplicação da tabuada escolhida pelo usuário com a variável contadora e acada loop será incrementada 1.

            echo "
            <body bgcolor='#87CEEB'  >
                <table
                    style='                 
                        margin:auto;
                        height: 50px;
                        width: auto; 
                        border: 1px;
                        background: #59F;
                        position: auto;
                        text-align: center;
                        align-items: center
                        transform: translate(-50%, -50%);
                    ' >

                        <tr>
                            <td width='80' bgcolor=' #1E90FF' ><b> $tabuada </b></td><td width='50' bgcolor='#A020F0' ><b> X </b></td><td width='80' bgcolor='#DA70D6' ><b> $count </b></td><td width='80' bgcolor='#A020F0' ><b> = </b></td><td  width='80'  bgcolor=' #FF8C00'> <b>$resposta</b> </td>                         
                        </tr>  
                                                
                    </table>
                </body>
            
            </br>";

        $count ++;

    } while ($count <= 10); // @Enquanto for menor que ou igual a 10 o loop executará

 } else {

     echo "Digite um valor numérico no campo TABUADA para continuar: ";
 }

?>