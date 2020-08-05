<?php
// @Incluindo o arquivo onde é responsavel pela conexão com o DB
include_once("conexao.php");

// @Pegando tos os valores digitado através do navegador pelo usuário
$nome = $_POST["nome"];
$sexo = $_POST["tipoSexo"];
$anoNasc = $_POST["anoNasc"];
$corCabelo = $_POST["corCabelo"];
$enviar = $_POST['enviar'];

// @Função para calcular a idade da pessoa com os dados obtidos do meu DB
function idade ($anoNasc) {
        $anoNasc = new DateTime($anoNasc);
                $dataAtual = new DateTime();
                        $idade = $dataAtual->diff($anoNasc);
                                return $idade->y;
}

$idade = idade($anoNasc); // @Atribuindo a variavel $idade o resultado retornado pela funão idade.

// @Verificando se o questionário foi preenchido corretamente
        if(!isset($nome) || !isset($sexo) || !isset($anoNasc) || !isset($corCabelo) ) {

                echo "Complete o questionário. :/ ";

        } else {

                echo "Nome: " . $nome . "</br>";
                echo "Sexo: " . $sexo . "</br>";
                echo  "Idade: " . $idade. "</br>";
                echo "Cabelo: " . $corCabelo . "</br></br>";
                
// @Inserindo os dados informados pelo usuário no meu BD
                $sql = "INSERT INTO pessoa SET nome = '$nome', sexo = '$sexo', anoNasc = '$anoNasc', corCabelo = '$corCabelo' ";
                $sql = $pdo->query($sql);

// @Selecionando todos os dados da tabela pessoa do meu BD
                $total = 0;
                $sql = "SELECT * FROM pessoa  ";
                $sql = $pdo->query($sql);
                $total = $sql->rowCount(); // @Contando quantas listas tem na minha tabela

// @Inicializando as váriaveis que irei armazenar os dados 
                $masc_maior_18_cabelo_preto = 0;
                $fem_entre_25_e_30_loira = 0;
                $outra_categoria = 0;

// @Usando um foreach para pegar os conteúdos salvos no DB e atribuir as variáveis
                foreach ( $sql->fetchAll() as $row ) { 

                        $corCabelo = $row['corCabelo'];
                        $anoNasc = $row['anoNasc'];            
                        $sexo = $row['sexo'];

                        if(  ($sexo == 'masculino') && ($idade >= 18) && ($corCabelo == 'preto')  ) {
                                $masc_maior_18_cabelo_preto ++ ;

                                        } else if (  ($sexo == 'feminino') && ($idade >= 25) && ($idade <= 30) &&  ($corCabelo == 'loiro')  ) {
                                                $fem_entre_25_e_30_loira ++ ;

                                                } else  {
                                                        $outra_categoria ++;
                                                                
                        }

                }

                        echo "Número atual de pessoas salvas no meu banco: $total<hr>";
                                echo "Existem $masc_maior_18_cabelo_preto homem(ns), com idade maior que 18 anos e com cabelo preto  </br>";
                                        echo "Existem $fem_entre_25_e_30_loira mulher(es), com idade entre 25 e 30 anos e com cabelo loiro  </br>";
                                                echo "Existem $outra_categoria, que não se encaixam nos requisitos  </br>";
                                                        echo "Número atual de pessoas salvas no meu banco: $total<hr>";

        }
?>