<?php
require_once '../conexao.php';     // @Chamando o arquivo conexão
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

$banco->query("SELECT * FROM tb_produto ");
echo'<a href="index.php">Página inicial </a></br></br>';        //@Voltar para a página inicial


if ($banco->numRows() > 0){     // @Caso não retorne nenhum resultado do DB, o programa não executará esse trecho de código

    foreach($banco->result() as $tb_produto) {        // @Aqui estou usando um foreach para percorrer toda minha array 
        echo "Id do produto: ". $tb_produto['id_produto']. "</br>";
        echo "Id da categoria do produto: " . $tb_produto['id_categoria_produto'] . "</br>";
        echo "Data de cadastro ". $tb_produto['data_cadastro']. "</br>";
        echo "Nome do produto: " . $tb_produto['nome_produto'] . "</br>";
        echo "Valor do produto: " . $tb_produto['valor_produto'] . "<hr>";
    }

} else {
    echo "Sem resultado no DB";
}

?>