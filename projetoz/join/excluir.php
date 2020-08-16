<?php
require_once 'conexao.php'; // @Chamando o arquivo conexão
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

// @Verificação básica de segurança
if(isset($_GET['id_produto']) && empty($_GET['id_produto']) == false) {  
    $id_produto = addslashes($_GET['id_produto']);

    $banco->delete("tb_produto", array("id_produto"=> $id_produto) );
    header("Location: index.php");      // @Depois de inserido um novo produto, o usuário será redirecionado para a página inicial

} else {
    echo "Erro ao tentar excluir o registro. Volte para a página anterior.";        // @Caso ocorra um erro ao tentar excluir, o sistema mostrará essa menssagem para o usuário
}

?>