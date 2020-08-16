<?php
require_once '../conexao.php'; // @Chamando o arquivo conexão
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

// @Verificação básica de segurança
if(isset($_GET['id_categoria_planejamento']) && empty($_GET['id_categoria_planejamento']) == false) {  
    $id_categoria_planejamento = addslashes($_GET['id_categoria_planejamento']);

    $banco->delete("tb_categoria_produto", array("id_categoria_planejamento"=> $id_categoria_planejamento) );
    header("Location: index.php");      // @Depois de inserido um novo produto, o usuário será redirecionado para a página inicial

} else {
    echo "Erro ao tentar excluir o registro. Volte para a página anterior.";        // @Caso ocorra um erro ao tentar excluir, o sistema mostrará essa menssagem para o usuário
}

?>