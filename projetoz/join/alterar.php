<?php
require_once 'conexao.php';     // @Chamando o arquivo responsável pela conexão com o DB
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando a classe 'Banco' 

$id_produto = 0;        // @Definindo id_produto com valor 0

// @Verificação de segurança para verificar se o produto que o usuário quer alterar existe no DB
if(isset($_GET['id_produto']) && empty($_GET['id_produto']) == false) {  
    $id_produto = addslashes($_GET['id_produto']);      

// @Verificando se o usuário enviou o formulário completo
    if(isset($_POST['idProduto']) && empty($_POST['idProduto']) == false &&  
        isset($_POST['idCategoriaProduto']) && empty($_POST['idCategoriaProduto']) == false &&
        isset($_POST['dataCadastro']) && empty($_POST['dataCadastro']) == false &&
        isset($_POST['nomeProduto']) && empty($_POST['nomeProduto']) == false &&
        isset($_POST['valorProduto']) && empty($_POST['valorProduto']) == false ) { 

// @Pegando os valores informados no formulário e salvando nas seguintes váriaveis
        $newIdProduto = addslashes($_POST['idProduto']);
        $newIdCategoriaProduto = addslashes($_POST['idCategoriaProduto']);
        $newDataCadastro = addslashes($_POST['dataCadastro']);
        $newNomeProduto = addslashes($_POST['nomeProduto']);
        $newValorProduto = addslashes($_POST['valorProduto']);

// @Alterando os valores do registro informado pelo usuário
        $banco->update("tb_produto", array( 
            "id_produto" =>$newIdProduto,
            "id_categoria_produto" => $newIdCategoriaProduto,
            "data_cadastro" => $newDataCadastro,
            "nome_produto" => $newNomeProduto,
            "valor_produto" => $newValorProduto
        ), array("id_produto"=>$id_produto));

        header("Location: index.php");      // @Feita as alterações, o usuário será redirecionado para a página inicial

        }

// @Selecionando o produto do banco para ser alterado
        $banco->query("SELECT * FROM tb_produto WHERE id_produto = $id_produto ");
        if ($banco->numRows() > 0){     // @Caso exista mais de um registro com o informado, será executao um foreach para montar minha query

            foreach($banco->result() as $tb_produto) {      // @Montando um array $id_produto onde armazenará os dados do produto informado pelo usuário
             }
        } 

}   else {

echo "Error";       // @Caso não exista esse id no banco, o sistema mostrará essa menssagem
    
   }

?>

<!-- Criando um formulário html -->

<form method="POST">
    Nome do produto:</br>
        <input type="text" name="nomeProduto"  required name=nomeProduto value="<?php echo $tb_produto['nome_produto']; ?>" /></br></br>
    
    Id do produto: </br>
        <input type="number" name="idProduto" required name=idProduto value="<?php echo $tb_produto['id_produto']; ?>" /></br></br>
    
    Id da categoria do produto:</br>
        <input type="number" name="idCategoriaProduto" required name=idCategoriaProduto value="<?php echo $tb_produto['id_categoria_produto']; ?>" /></br></br>
    
    Data do cadastro:</br>
        <input type="date" name="dataCadastro" /></br></br>
    
    Valor do produto R$:</br>
        <input type="number" step="0.01" name="valorProduto" value="<?php echo $tb_produto['valor_produto']; ?>" /></br></br></br>
    
    <input type="submit" value="Atualizar" /></br>
</form>

