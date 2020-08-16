<?php
require_once '../conexao.php';
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

$banco->query("SELECT * FROM tb_produto ");
echo '
<a href="cadastrar.php">Adicionar novo produto </a></br>
<a href="listar.php">Listar produtos </a></br></br>

<table border="0" width="100%">
    <tr>
        <th> Id do produto:</th>
        <th> Id da categoria:</th>
        <th>Data cadastrado:</th>
        <th>Nome do prduto:</th>
        <th>Valor do produto:</th>
        <th>Gerenciar produtos:</th>

    </tr>

</table> 
';

if ($banco->numRows() > 0){     // @Caso não retorne nenhum resultado do DB, o programa não executará esse trecho de código

    foreach($banco->result() as $tb_produto) {        // @Aqui estou usando um foreach para percorrer toda minha array e printar em forma de tabela os valores
        echo "<table border='0' width='100%'> <tr>";
        echo "<td> ". $tb_produto['id_produto']. "</td>";
        echo "<td> " . $tb_produto['id_categoria_produto'] . "</td>";
        echo "<td> ". $tb_produto['data_cadastro']. "</td>";
        echo "<td> " . $tb_produto['nome_produto'] . "</td>";
        echo "<td> " . $tb_produto['valor_produto'] . "</td>";

        echo '<td> <a href="alterar.php?id_produto='.$tb_produto['id_produto']. '"> Alterar </a>-
                
                <a href="excluir.php?id_produto='.$tb_produto['id_produto']. '"> Excluir </a>-
              
              </td> ';

        echo " </tr> </table>";
    }

} else {
    echo "Sem resultado no DB";
}

?>