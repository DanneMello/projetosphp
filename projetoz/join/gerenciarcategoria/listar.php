<?php
require_once '../conexao.php';     // @Chamando o arquivo conexão
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

$banco->query("SELECT * FROM tb_categoria_produto ");
echo'<a href="../index.html">Página inicial </a></br></br>';        //@Voltar para a página inicial

if ($banco->numRows() > 0){     // @Caso não retorne nenhum resultado do DB, o programa não executará esse trecho de código

    foreach($banco->result() as $tb_categoria ) {        // @Aqui estou usando um foreach para percorrer toda minha array 
        echo "Nome da categoria: " . $tb_categoria['nome_categoria'] . "<hr>";
        echo "Id da categoria: ". $tb_categoria ['id_categoria_planejamento']. "</br>";
    }

} else {
    echo "Sem resultado no DB";
}

?>