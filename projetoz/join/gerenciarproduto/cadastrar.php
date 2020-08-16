<?php
require_once '../conexao.php';
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco


// @Criei um formulário html para coletar as informações inseridas
echo "
<form action='cadastrar.php' method='POST'>
    Id do produto:</br>
        <input type='number' name'idProduto' required name=idProduto /></br></br>
    
    Id da categoria do produto:</br>
        <input type='number' name='idCategoriaProduto' required name=idCategoriaProduto/></br></br>
    
    Data do cadastro:</br>
        <input type='date' name='dataCadastro' /></br></br>
    
    Nome do produto:</br>
        <input type='text' name='nomeProduto'  required name=nomeProduto/></br></br>
    
    Valor do produto R$:</br>
        <input type='number' step='0.01' name='valorProduto' /></br></br></br>
    
    <input type='submit' value='Cadastrar' /></br>
</form>

";

// @Verificando se o usuário enviou o formulário completo
if(isset($_POST['idProduto']) && empty($_POST['idProduto']) == false &&  
    isset($_POST['idCategoriaProduto']) && empty($_POST['idCategoriaProduto']) == false &&
    isset($_POST['dataCadastro']) && empty($_POST['dataCadastro']) == false &&
    isset($_POST['nomeProduto']) && empty($_POST['nomeProduto']) == false &&
    isset($_POST['valorProduto']) && empty($_POST['valorProduto']) == false ) { 

// @Recebendo os dados informado pelo usuário
    $idProduto = addslashes($_POST['idProduto']);
    $idCategoriaProduto = addslashes($_POST['idCategoriaProduto']);
    $dataCadastro = addslashes($_POST['dataCadastro']);
    $nomeProduto = addslashes($_POST['nomeProduto']);
    $valorProduto = addslashes($_POST['valorProduto']);

// @Inserindo dados informados pelo usuário no DB
    $banco->insert("tb_produto", array( 
        "id_produto" =>$idProduto,
        "id_categoria_produto" => $idCategoriaProduto,
        "data_cadastro" => $dataCadastro,
        "nome_produto" => $nomeProduto,
        "valor_produto" => $valorProduto
    ));

    header("Location: index.php"); // @Depois de inserido um novo produto, o usuário será redirecionado para a página inicial

}
?>