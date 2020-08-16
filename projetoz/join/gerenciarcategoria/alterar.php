<?php
require_once '../conexao.php';    // @Chamando o arquivo responsável pela conexão com o DB
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando a classe 'Banco' 

$idCategoria = 0;        // @Definindo id_categoria com valor 0

// @Verificação de segurança para verificar se o categoria que o usuário quer alterar existe no DB
if(isset($_GET['id_categoria_planejamento']) && empty($_GET['id_categoria_planejamento']) == false) {  
    $idCategoria  = addslashes($_GET['id_categoria_planejamento']);     

// @Verificando se o usuário enviou o formulário completo
    if(isset($_POST['idCategoria']) && empty($_POST['idCategoria']) == false &&  
        isset($_POST['idCategoria']) && empty($_POST['idCategoria']) == false ) { 

        $newIdCategoria = addslashes($_POST['idCategoria']);       // @Pegando os valores informados no formulário e salvando nas seguintes váriaveis
        $newNomeCategoria = addslashes($_POST['nomeCategoria']);

// @Alterando os valores do registro informado pelo usuário
        $banco->update("tb_categoria_produto", array( 
            "id_categoria_planejamento" =>$newIdCategoria,
            "nome_categoria" => $newNomeCategoria,
        ), array("id_categoria_planejamento"=>$idCategoria));

        header("Location: index.php");      // @Feita as alterações, o usuário será redirecionado para a página inicial

        }

// @Selecionando o categoria do banco para ser alterado
        $banco->query("SELECT * FROM tb_categoria_produto WHERE id_categoria_planejamento = $idCategoria ");
        if ($banco->numRows() > 0){     // @Caso exista mais de um registro com o informado, será executao um foreach para montar minha query

            foreach($banco->result() as $tb_categoria) {      // @Montando um array $id_categori onde armazenará os dados do categoria informado pelo usuário
             }
        } 

}   else {

echo "Error";       // @Caso não exista esse id no banco, o sistema mostrará essa menssagem
    
   }

?>

<!-- Criando um formulário html -->

<form method="POST">
    Nome da categoria:</br>
        <input type="text" name="nomeCategoria"  required name=nomeCategoria value="<?php echo $tb_categoria['nome_categoria']; ?>" /></br></br>
    
    Id da categoria: </br>
        <input type="number" name="idCategoria" required name=idCategoria value="<?php echo $tb_categoria['id_categoria_planejamento']; ?>" /></br></br>
    
    <input type="submit" value="Atualizar categoria" /></br>
</form>

