<!DOCTYPE html>
<html lang="pt-br">

   <head>
       <meta charset="utf-8"/>
       <link rel="stylesheet" href="style.css">
       <title>Formulário CRUD</title>
   </head>

   <body >


<?php
// @Pegando tos os valores digitado através do navegador pelo usuário
include_once("conexao.php");

    $perg1 = $_POST["perg1"];
    $perg2 = $_POST["perg2"];
    $perg3 = $_POST["perg3"];
    $perg4 = $_POST["perg4"];

// @Verificando se o questionário foi preenchido corretamente
    if(!isset($perg1) || !isset($perg2) || !isset($perg3) || !isset($perg4) ) {

        echo "Complete o questionário. :/ ";

        } else {

// @Inserindo os dados informados pelo usuário no meu BD
            $sql = "INSERT INTO clientes SET faixaEtaria = '$perg1', tipoConvenio = '$perg2', faixaSalarial = '$perg3', motEmprestimo = '$perg4' ";
            $sql = $pdo->query($sql);

// @Selecionando todos os dados da tabela clientes do meu BD
            $total = 0;
            $n = 0;
            $sql = "SELECT * FROM clientes  ";
            $sql = $pdo->query($sql);
            $total = $sql->rowCount(); // @Contando quantas listas tem na minha tabela

// @Inicializando as variáveis que irei utilizar para armazenar a quantidade de votos para cada pergunta.
            $Qt_FxE_A =0;
            $Qt_FxE_B =0;
            $Qt_FxE_C =0;
            $Qt_FxE_D =0;
            
            $Qt_TiConv_A =0;
            $Qt_TiConv_B =0;
            $Qt_TiConv_C =0;
            $Qt_TiConv_D =0;

            $Qt_FxS_A =0;
            $Qt_FxS_B =0;
            $Qt_FxS_C =0;
            $Qt_FxS_D =0;

            $Qt_MotEmp_A =0;
            $Qt_MotEmp_B =0;
            $Qt_MotEmp_C =0;
            $Qt_MotEmp_D =0;


// @Inicializando as variaveis que irei usar para guardar a quantidade de votos por faixa etária de acordo com a opção escolhida.
            $inss_Ate30 =0;
            $inss_30_A_50 =0;
            $inss_50_A_65 =0;
            $inss_Acima_65 =0;




// @Buscando todos os dados da minha tabela e criando uma array "$row"             
            foreach ($sql->fetchAll() as $row) {
            
// @Atribuindo ás váriaveis abaixo os valores de cada coluna salvas no BD
            $id = $row['id'];
            $faixaEtaria = $row['faixaEtaria'];
            $tipoConvenio = $row['tipoConvenio'];            
            $faixaSalarial = $row['faixaSalarial'];
            $motEmprestimo = $row['motEmprestimo'];


// @Atribuindo valores para cada váriavel de acordo com o resultado salvo nas váriaveis que estão armazenando os valores das colunas da tabela "clientes".
                if($faixaEtaria == "a") {

                    $Qt_FxE_A ++;

                        } else if (($faixaEtaria)=="b") {

                            $Qt_FxE_B ++;
        
                                } else if (($faixaEtaria)=="c") {

                                    $Qt_FxE_C ++;

                                        } else {

                                            $Qt_FxE_D ++;    
                }

                
                if($tipoConvenio == "a") {

                    $Qt_TiConv_A ++;

                        } else if ($tipoConvenio == "b") {

                            $Qt_TiConv_B ++;
        
                                } else if ($tipoConvenio =="c") {

                                    $Qt_TiConv_C ++;

                                        } else {

                                            $Qt_TiConv_D ++;    
                }


                if($faixaSalarial == "a") {

                    $Qt_FxS_A ++;

                        } else if ($faixaSalarial == "b") {

                            $Qt_FxS_B ++;
        
                                } else if ($faixaSalarial =="c") {

                                    $Qt_FxS_C ++;

                                        } else {

                                            $Qt_FxS_D ++;    
                }


                if($motEmprestimo == "a") {

                    $Qt_MotEmp_A ++;

                        } else if ($motEmprestimo == "b") {

                            $Qt_MotEmp_B ++;
        
                                } else if ($motEmprestimo =="c") {

                                    $Qt_MotEmp_C ++;

                                        } else {

                                            $Qt_MotEmp_D ++;    
                }


// @Aqui estou comparando o tipo de convênio para cada faixa etária e atribuindo o valor á uma váriavel contadora.

                if( ($row['tipoConvenio'] == "a") && ($row['faixaEtaria'] == "a") ) {
                                
                    $inss_Ate30 ++;

                        } else if ( ($row['tipoConvenio'] == "a") && ($row['faixaEtaria'] == "b") < ($Qt_TiConv_A) ) {

                            $inss_30_A_50 ++;

                                } else if ( ($row['tipoConvenio'] == "a") && ($row['faixaEtaria'] == "c") < ($Qt_TiConv_A) ) {

                                    $inss_50_A_65 ++;

                                        } else {

                                            $inss_Acima_65 ++;    
                }


    


        }




/*
// @Aplicando a regra de 3 para mostrar a porcentagem obtida da pesquisa e formatando as casas decimais.
        $Qt_FxE_A = ($Qt_FxE_A / $total) * 100;
        $Qt_FxE_B = ($Qt_FxE_B / $total) * 100;
        $Qt_FxE_C = ($Qt_FxE_C / $total) * 100;
        $Qt_FxE_D = ($Qt_FxE_D / $total) * 100;
        
        $Qt_TiConv_A = ($Qt_TiConv_A / $total) * 100;
        $Qt_TiConv_B = ($Qt_TiConv_B / $total) * 100;
        $Qt_TiConv_C = ($Qt_TiConv_C / $total) * 100;
        $Qt_TiConv_D = ($Qt_TiConv_D / $total) * 100;

        $Qt_FxS_A = ($Qt_FxS_A / $total) * 100;
        $Qt_FxS_B = ($Qt_FxS_B / $total) * 100;
        $Qt_FxS_C = ($Qt_FxS_C / $total) * 100;
        $Qt_FxS_D = ($Qt_FxS_D / $total) * 100;

        $Qt_MotEmp_A = ($Qt_MotEmp_A / $total) * 100;
        $Qt_MotEmp_B = ($Qt_MotEmp_B / $total) * 100;
        $Qt_MotEmp_C = ($Qt_MotEmp_C / $total) * 100;
        $Qt_MotEmp_D = ($Qt_MotEmp_D / $total) * 100;

*/


/*
        echo " <h2 style='color: #A020F0 ; text-align: center;' > TOTAL DE PESQUISAS REALIZADAS: </h2>" . " <h1 style='color: #4B0082 ;text-align: center;'> $total </h1> <hr>";

            echo "<h2>FAIXA ETÁRIA</h2>";
            echo "<b>ATÉ 30 ANOS:</b>  ".number_format($Qt_FxE_A,)."%</br>";       
            echo "<b>DE 30 A 50 ANOS:</b>  ".number_format($Qt_FxE_B, 2)."%</br>";
            echo "<b>DE 50 A 65 ANOS:</b>  ".number_format($Qt_FxE_C, 2)."%</br>";
            echo "<b>ACIMA DE 65 ANOS:</b>  ".number_format($Qt_FxE_D, 2)."%<hr></br>";

            echo "<h2>TIPO DO CONVÊNIO</h2>";
            echo "<b> INSS:</b>  ".number_format($Qt_TiConv_A, 2)."%</br>";
            echo "<b>SIAPE:</b>  ".number_format($Qt_TiConv_B, 2)."%</br>";
            echo "<b> FORÇAS ARMADAS:</b>  ".number_format($Qt_TiConv_C, 2)."%</br>";
            echo "<b>OUTROS:</b>  ".number_format($Qt_TiConv_D, 2)."%<hr></br>";

            echo "<h2>FAIXA SALARIAL</h2>";
            echo "<b>ATÉ 2 SALÁRIOS MÍNIMOS:</b>  ".number_format($Qt_FxS_A, 2)."%</br>";
            echo "<b> DE 2 A 4 SALÁRIOS MÍNIMOS:</b>  ".number_format($Qt_FxS_B, 2)."%</br>";
            echo "<b>DE 4 A 6 SÁLARIOS MÍNIMOS:</b>  ".number_format($Qt_FxS_C, 2)."%</br>";
            echo "<b>ACIMA DE 6 SÁLARIOS MÍNIMOS:</b>  ".number_format($Qt_FxS_D, 2)."%<hr></br>";

            echo "<h2>MOTIVO DO EMPRÉSTIMO</h2>";
            echo "<b>PAGAR CONTAS:</b>  ".number_format($Qt_MotEmp_A, 2)."%</br>";
            echo "<b>REFORMA DA CASA:</b>  ".number_format($Qt_MotEmp_B, 2)."%</br>";
            echo "<b>AQUISIÇÃO DE VEÍCULO:</b>  ".number_format($Qt_MotEmp_C, 2)."%</br>";
            echo "<b>OUTROS:</b>  ".number_format($Qt_MotEmp_D, 2)."%<hr></br>";

            echo "<h2>VOCÊ ESCOLHEU AS SEGUINTES OPÇÕES: </h2>";
            echo "<b>SEU ID É:</b>  ".$id."</br>";
            echo "<b>FAIXA ETÁRIA:</b>  ".$faixaEtaria."</br>";
            echo "<b>TIPO CONVÊNIO:</b>  ".$tipoConvenio."</br>";
            echo "<b>FAIXA SALARIAL:</b>  ".$faixaSalarial."</br>";
            echo "<b>MOTIVO DO EMPRÉSTIMO:</b>  ".$motEmprestimo."</br>";

*/         
        echo "
            <table width='1000' border='1px' style=' margin:auto; 
            background: #7B68EE;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)' >
        

                <tr bgcolor=' #00FF00'>
                <td height='40' COLSPAN='6' 
                style=' text-align: center;
                font-size: 30px;'>

                    <b>FAIXA ETÁRIA</b></td>

                </tr>
        
                <td width='101' height='40'><b>TOTAL:</b></td>
                <td width='113' bgcolor=' #FF4500' style=' text-align: center; font-size: 35px;'> <b> " . $total . "</b></td>
                <td width='140' style=' text-align: center; font-size: 20px;'>ATÉ 30: " . number_format($Qt_FxE_A, ) . "</td>
                <td width='85'  style=' text-align: center; font-size: 20px;'>DE 30 A 50: " .number_format($Qt_FxE_B, ). "</td>
                <td width='140' style=' text-align: center; font-size: 20px;'>DE 50 A 65: ".number_format($Qt_FxE_C, )."</td>
                <td width='85'  style=' text-align: center; font-size: 20px;'>ACIMA DE 65: ".number_format($Qt_FxE_D, )."</td>
        
                </tr>
        
                <tr bgcolor=' #8A2BE2'>
                <td height='40' COLSPAN='6' 
                style=' text-align: center; 
                font-size: 30px;'>

                <b>TIPO DO CONVÊNIO</b></td>

                </tr>
        
                <tr>
                <td><b>INSS</b></td>
                <td height='40'> ".number_format($Qt_TiConv_A, )." </td>
                <td>".$inss_Ate30."</td>
                <td>".$inss_30_A_50."</td>
                <td>".$inss_50_A_65."</td>
                <td> ".$inss_Acima_65."</td>               
                </tr>
        
                <tr>        
                <td><b>SIAPE</b></td>
                <td height='40'> ".number_format($Qt_TiConv_B, )." </td>
                <td> ?% ATÉ 30</td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65</td>
                <td> ?% ACIMA DE 65</td>                
                </tr>
        
                <tr>        
                <td><b>FORÇAS ARMADAS</b></td>
                <td height='40'> ".number_format($Qt_TiConv_C, )." </td>
                <td> ?% ATÉ 30</td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65</td>
                <td> ?% ACIMA DE 65</td>                
                </tr>
        
                <tr>       
                <td><b>OUTROS</b></td>
                <td height='40'> ".number_format($Qt_TiConv_D, )." </td>
                <td> ?% ATÉ 30</td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65</td>
                <td> ?% ACIMA DE 65</td>               
                </tr>
        
                <tr bgcolor=' #8A2BE2'>
                <td height='40' COLSPAN='6' 
                style=' text-align: center; 
                font-size: 30px;'>
                
                <b>FAIXA SALARIAL</b></td>

                </tr>
        
                <tr>
                <td><b>ATÉ 2 SALÁRIOS MÍNIMOS</b></td>
                <td height='40'> ".number_format($Qt_FxS_A, )." </td>
                <td> ?% ATÉ 30</td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65 </td>
                <td> ?% ACIMA DE 65</td>        
                </tr>
        
                <tr>                
                <td><b>DE 2 A 4 SALÁRIOS MÍNIMOS</b></td>
                <td height='40'> ".number_format($Qt_FxS_B, )." </td>
                <td> ?% ATÉ 30</td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65 </td>
                <td> ?% ACIMA DE 65</td>        
                </tr>
        
                <tr>                
                <td><b>DE 4 A 6 SALÁRIOS MÍNIMOS</b></td>
                <td height='40'> ".number_format($Qt_FxS_C, )." </td>
                <td> ?% ATÉ 30</td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65 </td>
                <td> ?% ACIMA DE 65</td>       
                </tr>
        
                <tr>                
                <td><b>ACIMA DE 6 SALÁRIOS MÍNIMOS</b></td>
                <td height='40'> ".number_format($Qt_FxS_D, )." </td>
                <td> ?% ATÉ 30</td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65 </td>
                <td> ?$ ACIMA DE 65</td>        
                </tr>
        
                <tr bgcolor=' #8A2BE2'>
                <td height='40' COLSPAN='6' 
                style=' text-align: center; 
                font-size: 30px;'> 
                
                <b>MOTIVO DO EMPRÉSTIMO</b> </td>

                </tr>
        
                <tr>
                <td><b>PAGAR CONTA</b></td>
                <td height='40'> ".number_format($Qt_MotEmp_A, )." </td>
                <td> ?% ATÉ 30 </td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65</td>
                <td> ?% ACIMA DE 65</td>
                </tr>
        
                <tr>
                <td><b>REFORMA NA CASA</b></td>
                <td height='40'> ".number_format($Qt_MotEmp_B, )." </td>
                <td> ?% ATÉ 30 </td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65</td>
                <td> ?% ACIMA DE 65</td>
                </tr>
        
                <tr>
                <td><b>AQUISIÇÃO DE VEÍCULOS</b></td>
                <td height='40'> ".number_format($Qt_MotEmp_C, )." </td>
                <td> ?% ATÉ 30 </td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65</td>
                <td> ?% ACIMA DE 65</td>
                </tr>
        
                <tr>
                <td><b>OUTROS</b></td>
                <td height='40'> ".number_format($Qt_MotEmp_D, )." </td>
                <td> ?% ATÉ 30 </td>
                <td> ?% DE 30 A 50</td>
                <td> ?% DE 50 A 65</td>
                <td> ?% ACIMA DE 65</td>
                </tr>
        
        
        
        
            </table>
        
        
        
        
        ";
        


    }






?>


   </body>
</html>
