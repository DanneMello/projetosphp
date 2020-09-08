<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css">
        <title> Formulário CRUD </title>
    </head>

<body>

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

/*  Iniciando as variáveis para calcular a porcentagem de cada TIPO DE CONVÊNIO de acordo com a faixa etária */
            $inss_Ate30 =0;
            $inss_30_A_50 =0;
            $inss_50_A_65 =0;
            $inss_Acima_65 =0;

            $siape_Ate30 =0;
            $siape_30_A_50 =0;
            $siape_50_A_65 =0;
            $siape_Acima_65 =0;

            $FA_Ate30 =0;
            $FA_30_A_50 =0;
            $FA_50_A_65 =0;
            $FA_Acima_65 =0;

            $outros_Ate30 =0;
            $outros_30_A_50 =0;
            $outros_50_A_65 =0;
            $outros_Acima_65 =0;

/*  Iniciando as variáveis para calcular a porcentagem de cada FAIXA SALARIAL de acordo com a faixa etária*/
            $ate_2_SM_Ate30 =0;
            $ate_2_SM_De_30_A_50 =0;
            $ate_2_SM_De_50_A_65=0;
            $ate_2_SM_Acima_65=0;

            $de_2_A_4_SM_Ate_30 =0;
            $de_2_A_4_SM_De_30_A_50 =0;
            $de_2_A_4_SM_De_50_A_65 =0;
            $de_2_A_4_SM_Acima_65 =0;

            $de_4_A_6_SM_Ate_30 =0;
            $de_4_A_6_SM_De_30_A_50 =0;
            $de_4_A_6_SM_De_50_A_65 =0;
            $de_4_A_6_SM_Acima_65 =0;
            
            $acima_6_SM_Ate_30 =0;
            $acima_6_SM_De_30_A_50 =0;
            $acima_6_SM_De_50_A_65 =0;
            $acima_6_SM_Acima_65 =0;

/*  Iniciando as variáveis para calcular a porcentagem dos MOTIVOS DO EMPRÉSTIMO de acordo com a faixa etária*/
            $pagar_Conta_Ate30 =0;
            $pagar_Conta_De_30_A_50 =0;
            $pagar_Conta_De_50_A_65=0;
            $pagar_Conta_Acima_65=0;

            $reforma_Casa_Ate_30 =0;
            $reforma_Casa_De_30_A_50 =0;
            $reforma_Casa_De_50_A_65 =0;
            $reforma_Casa_Acima_65 =0;

            $Aq_Veiculo_Ate_30 =0;
            $Aq_Veiculo_De_30_A_50 =0;
            $Aq_Veiculo_De_50_A_65 =0;
            $Aq_Veiculo_Acima_65 =0;

            $outro_Mot_Emp_Ate_30 =0;
            $outro_Mot_Emp_De_30_A_50 =0;
            $outro_Mot_Emp_De_50_A_65 =0;
            $outro_Mot_Emp_Acima_65 =0;

// @Buscando todos os dados da minha tabela e criando uma array "$row"             
            foreach ($sql->fetchAll() as $row) {

// @Atribuindo ás váriaveis abaixo os valores de cada coluna salvas no BD
                $id = $row['id'];
                $faixaEtaria = $row['faixaEtaria'];
                $tipoConvenio = $row['tipoConvenio'];            
                $faixaSalarial = $row['faixaSalarial'];
                $motEmprestimo = $row['motEmprestimo'];

// @Atribuindo valores para cada váriavel de acordo com o resultado salvo nas váriaveis que estão armazenando os valores das colunas da tabela "clientes".
                if( $faixaEtaria == "a" ) {

                    $Qt_FxE_A ++;

                        } else if ( $faixaEtaria == "b" ) {

                            $Qt_FxE_B ++;
        
                                } else if (  $faixaEtaria  == "c" ) {

                                    $Qt_FxE_C ++;

                                        } else {

                                            $Qt_FxE_D ++;    
                }

                
                if( $tipoConvenio == "a" ) {

                    $Qt_TiConv_A ++;

                        } else if ( $tipoConvenio == "b" ) {

                            $Qt_TiConv_B ++;
        
                                } else if ( $tipoConvenio =="c" ) {

                                    $Qt_TiConv_C ++;

                                        } else {

                                            $Qt_TiConv_D ++;    
                }


                if( $faixaSalarial == "a" ) {

                    $Qt_FxS_A ++;

                        } else if ( $faixaSalarial == "b" ) {

                            $Qt_FxS_B ++;
        
                                } else if ( $faixaSalarial =="c" ) {

                                    $Qt_FxS_C ++;

                                        } else {

                                            $Qt_FxS_D ++;    
                }


                if( $motEmprestimo == "a" ) {

                    $Qt_MotEmp_A ++;

                        } else if ( $motEmprestimo == "b" ) {

                            $Qt_MotEmp_B ++;
        
                                } else if ( $motEmprestimo =="c" ) {

                                    $Qt_MotEmp_C ++;

                                        } else {

                                            $Qt_MotEmp_D ++;    
                }

// @Aqui estou comparando o TIPO DO CONVÊNIO para cada faixa etária e atribuindo o valor á uma váriavel contadora.
                if( ( $tipoConvenio == "a" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $inss_Ate30 ++;

                        } else if ( ( $tipoConvenio == "a" ) && ( $faixaEtaria == "b" ) ) {

                            $inss_30_A_50 ++;

                                } else if ( ( $tipoConvenio == "a" ) && ( $faixaEtaria == "c" ) ) {

                                    $inss_50_A_65 ++;

                                        } else {

                                            $inss_Acima_65 ++;    
                }


                if( ( $tipoConvenio == "b" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $siape_Ate30 ++;

                        } else if ( ( $tipoConvenio == "b" ) && ( $faixaEtaria == "b" ) ) {

                            $siape_30_A_50 ++;

                                } else if ( ( $tipoConvenio == "b" ) && ( $faixaEtaria == "c" ) ) {

                                    $siape_50_A_65 ++;

                                        } else {

                                            $siape_Acima_65 ++;    
                }

                if( ( $tipoConvenio == "c" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $FA_Ate30 ++;

                        } else if ( ( $tipoConvenio == "c" ) && ( $faixaEtaria == "b" ) ) {

                            $FA_30_A_50 ++;

                                } else if ( ( $tipoConvenio == "c" ) && ( $faixaEtaria == "c" ) ) {

                                    $FA_50_A_65 ++;

                                        } else {

                                            $FA_Acima_65 ++;    
                }

                if( ( $tipoConvenio == "d" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $outros_Ate30 ++;

                        } else if ( ( $tipoConvenio == "d" ) && ( $faixaEtaria == "b" ) ) {

                            $outros_30_A_50 ++;

                                } else if ( ( $tipoConvenio == "d" ) && ( $faixaEtaria == "c" ) ) {

                                    $outros_50_A_65 ++;

                                        } else {

                                            $outros_Acima_65 ++;    
                }


// @Aqui estou comparando a faixa salarial para cada faixa etária e atribuindo o valor á uma váriavel contadora.                 
                if( ( $faixaSalarial == "a" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $ate_2_SM_Ate30 ++;

                        } else if ( ( $faixaSalarial == "a" ) && ( $faixaEtaria == "b" ) ) {

                            $ate_2_SM_De_30_A_50 ++;

                                } else if ( ( $faixaSalarial == "a" ) && ( $faixaEtaria == "c" ) ) {

                                    $ate_2_SM_De_50_A_65 ++;

                                        } else {

                                            $ate_2_SM_Acima_65 ++;    
                }

                if( ( $faixaSalarial == "b" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $de_2_A_4_SM_Ate_30 ++;

                        } else if ( ( $faixaSalarial == "b" ) && ( $faixaEtaria == "b" ) ) {

                            $de_2_A_4_SM_De_30_A_50 ++;

                                } else if ( ( $faixaSalarial == "b" ) && ( $faixaEtaria == "c" ) ) {

                                    $de_2_A_4_SM_De_50_A_65 ++;

                                        } else {

                                            $de_2_A_4_SM_Acima_65 ++;    
                }

                if( ( $faixaSalarial == "c" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $de_4_A_6_SM_Ate_30 ++;

                        } else if ( ( $faixaSalarial == "c" ) && ( $faixaEtaria == "b" ) ) {

                            $de_4_A_6_SM_De_30_A_50 ++;

                                } else if ( ( $faixaSalarial == "c" ) && ( $faixaEtaria == "c" ) ) {

                                    $de_4_A_6_SM_De_50_A_65 ++;

                                        } else {

                                            $de_4_A_6_SM_Acima_65 ++;    
                }

                if( ( $faixaSalarial == "d" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $acima_6_SM_Ate_30 ++;
    
                        } else if ( ( $faixaSalarial == "d" ) && ( $faixaEtaria == "b" ) ) {

                            $acima_6_SM_De_30_A_50 ++;

                                } else if ( ( $faixaSalarial == "d" ) && ( $faixaEtaria == "c" ) ) {

                                    $acima_6_SM_De_50_A_65 ++;

                                        } else {

                                            $acima_6_SM_Acima_65 ++;    
                }

// @Aqui estou comparando o MOTIVO DO EMPRÉSTIMO para cada faixa etária e atribuindo o valor á uma váriavel contadora.
                if( ( $motEmprestimo == "a" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $pagar_Conta_Ate30 ++;

                        } else if ( ( $motEmprestimo == "a" ) && ( $faixaEtaria == "b" ) ) {

                            $pagar_Conta_De_30_A_50 ++;

                                } else if ( ( $motEmprestimo == "a" ) && ( $faixaEtaria == "c" ) ) {

                                    $pagar_Conta_De_50_A_65 ++;

                                        } else {

                                            $pagar_Conta_Acima_65 ++;    
                }

                if( ( $motEmprestimo == "b" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $reforma_Casa_Ate_30 ++;

                        } else if ( ( $motEmprestimo == "b" ) && ( $faixaEtaria == "b" ) ) {

                            $reforma_Casa_De_30_A_50 ++;

                                } else if ( ( $motEmprestimo == "b" ) && ( $faixaEtaria == "c" ) ) {

                                    $reforma_Casa_De_50_A_65 ++;

                                        } else {

                                            $reforma_Casa_Acima_65 ++;    
                }

                if( ( $motEmprestimo == "c" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $Aq_Veiculo_Ate_30 ++;

                        } else if ( ( $motEmprestimo == "c" ) && ( $faixaEtaria == "b" ) ) {

                            $Aq_Veiculo_De_30_A_50 ++;

                                } else if ( ( $motEmprestimo == "c" ) && ( $faixaEtaria == "c" ) ) {

                                    $Aq_Veiculo_De_50_A_65 ++;

                                        } else {

                                            $Aq_Veiculo_Acima_65 ++;    
                }

                if( ( $motEmprestimo == "d" ) && ( $faixaEtaria == "a" ) ) {
                                        
                    $outro_Mot_Emp_Ate_30 ++;

                        } else if ( ( $motEmprestimo == "d" ) && ( $faixaEtaria == "b" ) ) {

                            $outro_Mot_Emp_De_30_A_50 ++;

                                } else if ( ( $motEmprestimo == "d" ) && ( $faixaEtaria == "c" ) ) {

                                    $outro_Mot_Emp_De_50_A_65 ++;

                                        } else {

                                            $outro_Mot_Emp_Acima_65 ++;    
                }


        }

// @Aplicando a regrinha de 3 para pegar a porcentagem de cada valor.

/*Motivo do empréstimo */
        $pagar_Conta_Ate30 = ($pagar_Conta_Ate30 / $total) * 100;
        $pagar_Conta_De_30_A_50 = ($pagar_Conta_De_30_A_50 / $total) * 100;
        $pagar_Conta_De_50_A_65 = ($pagar_Conta_De_50_A_65 / $total) * 100;
        $pagar_Conta_Acima_65 = ($pagar_Conta_Acima_65 / $total) * 100;

        $reforma_Casa_Ate_30 = ($reforma_Casa_Ate_30 / $total) * 100;
        $reforma_Casa_De_30_A_50 = ($reforma_Casa_De_30_A_50 / $total) * 100;
        $reforma_Casa_De_50_A_65 = ($reforma_Casa_De_50_A_65 / $total) * 100;
        $reforma_Casa_Acima_65 = ($reforma_Casa_Acima_65 / $total) * 100;

        $Aq_Veiculo_Ate_30 = ($Aq_Veiculo_Ate_30  / $total) * 100;
        $Aq_Veiculo_De_30_A_50 = ($Aq_Veiculo_De_30_A_50 / $total) * 100;
        $Aq_Veiculo_De_50_A_65 = ($Aq_Veiculo_De_50_A_65 / $total) * 100;
        $Aq_Veiculo_Acima_65 = ($Aq_Veiculo_Acima_65  / $total) * 100;

        $outro_Mot_Emp_Ate_30 = ($outro_Mot_Emp_Ate_30 / $total) * 100;
        $outro_Mot_Emp_De_30_A_50 = ($outro_Mot_Emp_De_30_A_50 / $total) * 100;
        $outro_Mot_Emp_De_50_A_65 = ($outro_Mot_Emp_De_50_A_65 / $total) * 100;
        $outro_Mot_Emp_Acima_65 = ($outro_Mot_Emp_Acima_65 / $total) * 100;

/*Faixa salarial*/
        $ate_2_SM_Ate30 = ($ate_2_SM_Ate30 / $total) * 100;
        $ate_2_SM_De_30_A_50 = ($ate_2_SM_De_30_A_50 / $total) * 100;
        $ate_2_SM_De_50_A_65 = ($ate_2_SM_De_50_A_65 / $total) * 100;
        $ate_2_SM_Acima_65 = ($ate_2_SM_Acima_65 / $total) * 100;

        $de_2_A_4_SM_Ate_30 = ($de_2_A_4_SM_Ate_30 / $total) * 100;
        $de_2_A_4_SM_De_30_A_50 = ($de_2_A_4_SM_De_30_A_50 / $total) * 100;
        $de_2_A_4_SM_De_50_A_65 = ($de_2_A_4_SM_De_50_A_65 / $total) * 100;
        $de_2_A_4_SM_Acima_65 = ($de_2_A_4_SM_Acima_65 / $total) * 100;

        $de_4_A_6_SM_Ate_30 = ($de_4_A_6_SM_Ate_30 / $total) * 100;
        $de_4_A_6_SM_De_30_A_50 = ($de_4_A_6_SM_De_30_A_50 / $total) * 100;
        $de_4_A_6_SM_De_50_A_65 = ($de_4_A_6_SM_De_50_A_65 / $total) * 100;
        $de_4_A_6_SM_Acima_65 = ($de_4_A_6_SM_Acima_65 / $total) * 100;
                
        $acima_6_SM_Ate_30 = ($acima_6_SM_Ate_30 / $total) * 100;
        $acima_6_SM_De_30_A_50 = ($acima_6_SM_De_30_A_50 / $total) * 100;
        $acima_6_SM_De_50_A_65 = ($acima_6_SM_De_50_A_65 / $total) * 100;
        $acima_6_SM_Acima_65 = ($acima_6_SM_Acima_65 / $total) * 100;

/*Tipo do convênio*/ 
        $inss_Ate30 = ($inss_Ate30 / $total) * 100;
        $inss_30_A_50 = ($inss_30_A_50 / $total) * 100;
        $inss_50_A_65 = ($inss_50_A_65 / $total) * 100;
        $inss_Acima_65 = ($inss_Acima_65 / $total) * 100;

        $siape_Ate30 = ($siape_Ate30 / $total) * 100;
        $siape_30_A_50 = ($siape_30_A_50 / $total) * 100;
        $siape_50_A_65 = ($siape_50_A_65 / $total) * 100;
        $siape_Acima_65 = ($siape_Acima_65 / $total) * 100;

        $FA_Ate30 = ($FA_Ate30 / $total) * 100;
        $FA_30_A_50 = ($FA_30_A_50 / $total) * 100;
        $FA_50_A_65 = ($FA_50_A_65 / $total) * 100;
        $FA_Acima_65 = ($FA_Acima_65 / $total) * 100;

        $outros_Ate30 = ($outros_Ate30 / $total) * 100;
        $outros_30_A_50 = ($outros_30_A_50 / $total) * 100;
        $outros_50_A_65 = ($outros_50_A_65 / $total) * 100;
        $outros_Acima_65 = ($outros_Acima_65 / $total) * 100;

// @Aplicando a regra de 3 para mostrar a porcentagem obtida da pesquisa e formatando as casas decimais.
        $Qt_FxE_A = ($Qt_FxE_A / $total) * 100;  // ATÉ 30
        $Qt_FxE_B = ($Qt_FxE_B / $total) * 100;  // DE 30 A 50
        $Qt_FxE_C = ($Qt_FxE_C / $total) * 100;  // DE 50 A 65
        $Qt_FxE_D = ($Qt_FxE_D / $total) * 100;  // ACIMA DE 65
                
        $Qt_TiConv_A = ($Qt_TiConv_A / $total) * 100;  // INSS
        $Qt_TiConv_B = ($Qt_TiConv_B / $total) * 100;  // SIAPE
        $Qt_TiConv_C = ($Qt_TiConv_C / $total) * 100;  // FORÇAS ARMADAS
        $Qt_TiConv_D = ($Qt_TiConv_D / $total) * 100;  // OUTROS

        $Qt_FxS_A = ($Qt_FxS_A / $total) * 100;  // ATÉ 2 SM
        $Qt_FxS_B = ($Qt_FxS_B / $total) * 100;  // DE 2 A 4 SM
        $Qt_FxS_C = ($Qt_FxS_C / $total) * 100;  // DE 4 A 6 SM
        $Qt_FxS_D = ($Qt_FxS_D / $total) * 100;  // ACIMA DE 6 SM

        $Qt_MotEmp_A = ($Qt_MotEmp_A / $total) * 100;  // PAGAR CONTA
        $Qt_MotEmp_B = ($Qt_MotEmp_B / $total) * 100;  // REFORMA CASA
        $Qt_MotEmp_C = ($Qt_MotEmp_C / $total) * 100;  // AQUISIÇÃO VEÍCULO
        $Qt_MotEmp_D = ($Qt_MotEmp_D / $total) * 100;  // OUTROS
            
            echo "
	               <table 
                    width='1000' 
                    border='1px'  
                    style=' 
                        margin:auto; 
                        background: #1E90FF;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        margin-right: -50%;
                        transform: translate(-50%, -50%);               
                    ' >
				
                    <tr bgcolor=' #00FF00'>

                        <td
                            height='40' 
                            COLSPAN='6'
                            style='
                                text-align: center;
                                font-size: 40px;
                            '>
	
					
                                <b> RESULTADO DA PESQUISA </b>
                        </td>

                    </tr>
                

                        <tr bgcolor='  #4F4F4F'>
                            <td 
                                height='40'
                                COLSPAN='6' 
                                    style='
                                        text-align: center;
                                        font-size: 30px;
                                    '>

                                        <b> FAIXA ETÁRIA </b>
                            </td>

                        </tr>

                        <tr>
                            <td width='101' height='40'><b>TOTAL:</b></td>
                                <td width='113' bgcolor=' #FF4500' style=' text-align: center; font-size: 35px;'> <b> " . $total . "</b></td>
                                    <td width='140' style=' text-align: center; font-size: 20px;'>ATÉ 30: " . number_format($Qt_FxE_A, 2) . "%</td>
                                        <td width='85'  style=' text-align: center; font-size: 20px;'>DE 30 A 50: " .number_format($Qt_FxE_B, 2). "%</td>
                                            <td width='140' style=' text-align: center; font-size: 20px;'>DE 50 A 65: ".number_format($Qt_FxE_C, 2)."%</td>
                                                <td width='85'  style=' text-align: center; font-size: 20px;'>ACIMA DE 65: ".number_format($Qt_FxE_D, 2)."%</td>       
                        </tr>
                
                        <tr bgcolor=' #4F4F4F'>
                        <td
                            height='40'
                            COLSPAN='6' 
                            style='
                                text-align: center; 
                                font-size: 30px;
                            '>

                                <b> TIPO DO CONVÊNIO </b>
                        </td>

                        </tr>
                
                        <tr>
                            <td><b>INSS</b></td>
                            <td height='40'> ".number_format($Qt_TiConv_A, 2)."% </td>
                                <td>".number_format($inss_Ate30, 2)."%</td>
                                    <td>".number_format($inss_30_A_50, 2)."%</td>
                                        <td>".number_format($inss_50_A_65, 2)."%</td>
                                            <td> ".number_format($inss_Acima_65, 2)."%</td>               
                        </tr>
                
                        <tr>        
                            <td><b>SIAPE</b></td>
                            <td height='40'> ".number_format($Qt_TiConv_B, 2)."% </td>
                                <td> ".number_format($siape_Ate30, 2)."% </td>
                                    <td> ".number_format($siape_30_A_50, 2)."% </td>
                                        <td> ".number_format($siape_50_A_65, 2)."% </td>
                                            <td> ".number_format($siape_Acima_65, 2)."% </td>                
                        </tr>
                
                        <tr>        
                            <td><b>FORÇAS ARMADAS</b></td>
                                <td height='40'> ".number_format($Qt_TiConv_C, 2)."% </td>
                                    <td> ".number_format($FA_Ate30, 2)."% </td>
                                        <td> ".number_format($FA_30_A_50, 2)."% </td>
                                            <td> ".number_format($FA_50_A_65, 2)."% </td>
                                                <td> ".number_format($FA_Acima_65, 2)."% </td>                
                        </tr>
                
                        <tr>       
                            <td><b>OUTROS</b></td>
                                <td height='40'> ".number_format($Qt_TiConv_D, 2)."% </td>
                                    <td> ".number_format($outros_Ate30, 2)."% </td>
                                        <td> ".number_format($outros_30_A_50, 2)."% </td>
                                            <td> ".number_format($outros_50_A_65, 2)."% </td>
                                                <td> ".number_format($outros_Acima_65, 2)."% </td>               
                        </tr>
                
                        <tr bgcolor=' #4F4F'>
                            <td
                                height= '50'
                                COLSPAN='6' 
                                style='
                                    text-align: center; 
                                    font-size: 30px;
                                '>
                            
                                    <b> FAIXA SALARIAL </b>
                            </td>

                        </tr>


                        <tr>
                            <td><b>ATÉ 2 SALÁRIOS MÍNIMOS</b></td>
                                <td height='40'> ".number_format($Qt_FxS_A, 2)."% </td>
                                    <td> ".number_format($ate_2_SM_Ate30, 2)."% </td>
                                        <td> ".number_format($ate_2_SM_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($ate_2_SM_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($ate_2_SM_Acima_65, 2)."% </td>        
                        </tr>
                
                        <tr>                
                            <td><b>DE 2 A 4 SALÁRIOS MÍNIMOS</b></td>
                                <td height='40'> ".number_format($Qt_FxS_B, 2)."% </td>
                                    <td> ".number_format($de_2_A_4_SM_Ate_30 , 2)."% </td>
                                        <td> ".number_format($de_2_A_4_SM_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($de_2_A_4_SM_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($de_2_A_4_SM_Acima_65, 2)."% </td>        
                        </tr>
                
                        <tr>                
                            <td><b>DE 4 A 6 SALÁRIOS MÍNIMOS</b></td>
                                <td height='40'> ".number_format($Qt_FxS_C, 2)."% </td>
                                    <td> ".number_format($de_4_A_6_SM_Ate_30, 2)."% </td>
                                        <td> ".number_format($de_4_A_6_SM_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($de_4_A_6_SM_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($de_4_A_6_SM_Acima_65, 2)."% </td>       
                        </tr>
                
                        <tr>                
                            <td><b>ACIMA DE 6 SALÁRIOS MÍNIMOS</b></td>
                                <td height='40'> ".number_format($Qt_FxS_D, 2)."$ </td>
                                    <td> ".number_format($acima_6_SM_Ate_30, 2)."% </td>
                                        <td> ".number_format($acima_6_SM_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($acima_6_SM_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($acima_6_SM_Acima_65, 2)."% </td>        
                        </tr>
                
                        <tr bgcolor=' #4F4F4F'>

                            <td
                                height='40'
                                COLSPAN='6' 
                                style=' 
                                    text-align: center; 
                                    font-size: 30px;
                                '> 
                                
                                    <b> MOTIVO DO EMPRÉSTIMO </b> 
                            </td>

                        </tr>

                        <tr>
                            <td><b>PAGAR CONTA</b></td>
                                <td height='40'> ".number_format($Qt_MotEmp_A, 2)."% </td>
                                    <td> ".number_format($pagar_Conta_Ate30, 2)."% </td>
                                        <td> ".number_format($pagar_Conta_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($pagar_Conta_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($pagar_Conta_Acima_65, 2)."% </td>
                        </tr>
                
                        <tr>
                            <td><b>REFORMA NA CASA</b></td>
                                <td height='40'> ".number_format($Qt_MotEmp_B, 2)."% </td>
                                    <td> ".number_format($reforma_Casa_Ate_30, 2)."% </td>
                                        <td> ".number_format($reforma_Casa_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($reforma_Casa_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($reforma_Casa_Acima_65, 2)."% </td>
                        </tr>
                
                        <tr>
                            <td><b>AQUISIÇÃO DE VEÍCULOS</b></td>
                                <td height='40'> ".number_format($Qt_MotEmp_C, 2)."% </td>
                                    <td> ".number_format($Aq_Veiculo_Ate_30, 2)."% </td>
                                        <td> ".number_format($Aq_Veiculo_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($Aq_Veiculo_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($Aq_Veiculo_Acima_65, 2)."% </td>
                        </tr>
                
                        <tr>
                            <td><b>OUTROS</b></td>
                                <td height='40'> ".number_format($Qt_MotEmp_D, 2)."% </td>
                                    <td> ".number_format($outro_Mot_Emp_Ate_30, 2)."% </td>
                                        <td> ".number_format($outro_Mot_Emp_De_30_A_50, 2)."% </td>
                                            <td> ".number_format($outro_Mot_Emp_De_50_A_65, 2)."% </td>
                                                <td> ".number_format($outro_Mot_Emp_Acima_65, 2)."% </td>
                        </tr>
                       
                </table>
              
        ";
        
    }

?>

</body>

</html>