<?php
require_once "conexao.php";     // @Chamando o arquivo responsável pela conexão com o DB

$banco = new Banco("localhost", "produtos", "root", "");        // @Conectando ao DB

$banco->query("SELECT * FROM tb_categoria_produto ");

if ($banco->numRows() > 0){     // @Caso não retorne nenhum resultado do DB, o programa não executará esse trecho de código

    foreach($banco->result() as $tb_categoria_produto) {        // @Aqui estou usando um foreach para percorrer toda minha array 

        echo "ID: ". $tb_categoria_produto['id_categoria_planejamento']. "</br>";
        echo "Categoria: " . $tb_categoria_produto['nome_categoria'] . "</br>";
        echo "Código do produto: ". $tb_categoria_produto['PK_tb_categoria_produto']. "<hr/>";
    }

} else {
    echo "Sem resultado no DB";
}

/*
$banco->insert("tb_categoria_produto", array(       // @Inserindo dados 
    "id_categoria_planejamento" =>'',
    "nome_categoria" => 'esporte',
    "PK_tb_categoria_produto" => '3'
));

echo "Inserido com sucesso! ";
*/
 
/*
// @Atualizando dados do DB e especificando o 3° parâmetro (No caso estou passando o id_categoria_planejamento" =>'5') 
$banco->update("tb_categoria_produto", 
    array("nome_categoria"=>'animal'), 
    array("id_categoria_planejamento"=>'3'));

*/

$banco->delete("tb_categoria_produto", array("id_categoria_planejamento"=>'6') );

?>