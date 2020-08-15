<?php
require_once "conexao.php"; // @Chamando o arquivo responsável pela conexão com o DB

$banco = new Banco("localhost", "produtos", "root", "");

$banco->query("SELECT * FROM tb_categoria_produto ");

if ($banco->numRows() > 0){ // @Caso não retorne nenhum resultado do DB, o programa não executará esse trecho de código

    foreach($banco->result() as $tb_categoria_produto) { // @Aqui estou usando um foreach para percorrer toda minha array 

        echo "ID: ". $tb_categoria_produto['id_categoria_planejamento']. "</br>";
        echo "Categoria: " . $tb_categoria_produto['nome_categoria'] . "</br>";
        echo "Código do produto: ". $tb_categoria_produto['PK_tb_categoria_produto']. "<hr/>";
    }
} else {
    echo "Sem resultado no DB";
}

$banco->insert("tb_categoria_produto", array( // @Inserindo dados 
    "id_categoria_planejamento" =>'',
    "nome_categoria" => 'esporte',
    "PK_tb_categoria_produto" => '3'
));

echo "Inserido com sucesso! ";

?>