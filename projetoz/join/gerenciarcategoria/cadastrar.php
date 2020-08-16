<?php
require_once '../conexao.php';
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco


// @Criei um formulário html para coletar as informações inseridas
echo "
<form action='cadastrar.php' method='POST'>
    Id da categoria:</br>
        <input type='number' name'idCategoria' required name=idCategoria /></br></br>
    
    Nome da categoria:</br>
        <input type='text' name='nomeCategoria'  required name=nomeCategoria/></br></br>
    
    <input type='submit' value='Cadastrar categoria' /></br>
</form>

";

// @Verificando se o usuário enviou o formulário completo
if(isset($_POST['idCategoria']) && empty($_POST['idCategoria']) == false &&  
    isset($_POST['nomeCategoria']) && empty($_POST['nomeCategoria']) == false ) { 

// @Recebendo os dados informado pelo usuário
    $idCategoria = addslashes($_POST['idCategoria']);
    $nomeCategoria = addslashes($_POST['nomeCategoria']);

// @Inserindo dados informados pelo usuário no DB
    $banco->insert("tb_categoria_produto", array( 
        "id_categoria_planejamento" =>$idCategoria,
        "nome_categoria" => $nomeCategoria,
    ));

    header("Location: index.php"); // @Depois de inserido um novo produto, o usuário será redirecionado para a página inicial

}
?>