<?php
require_once 'conexao.php'; // @Chamando meu arquivo responsável pela conexao com o DB
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

// @Verificação de segurança
if(isset($_GET['id_produto']) && empty($_GET['id_produto']) == false) {  

    echo "Error";
    //header("Location: index.php"); // @Caso não tenha nenhum Id_Produto selecionado o usuário será redirecionado para a página inicial
}



?>