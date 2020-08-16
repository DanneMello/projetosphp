<?php
require_once 'conexao.php'; // @Chamando meu arquivo responsável pela conexao com o DB
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

// @Verificação de segurança
if(isset($_GET['id_produto']) && empty($_GET['id_produto']) == false) {  
    $id_produto = addslashes($_GET['id_produto']);

    $banco->delete("tb_produto", array("id_produto"=> $id_produto) );
    header("Location: index.php"); // @Depois de inserido um novo produto, o usuário será redirecionado para a página inicial

} else {
    echo "Error";
    //header("Location: index.php"); // @Caso não tenha nenhum Id_Produto selecionado o usuário será redirecionado para a página inicial
}



?>