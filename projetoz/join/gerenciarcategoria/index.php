<?php
require_once '../conexao.php';
$banco = new Banco("localhost", "produtos", "root", "");        // @Instanciando minha classe Banco

$banco->query("SELECT * FROM tb_categoria_produto ");
echo '
<a href="cadastrar.php">Adicionar nova categoria </a></br>
<a href="listar.php">Listar categorias </a></br></br>

<table border="0" width="100%">
    <tr>
        <th> Id da categoria:</th>
        <th>Nome da categoria:</th>
        <th>Gerenciar categoria:</th>

    </tr>

</table> 
';

if ($banco->numRows() > 0){     // @Caso não retorne nenhum resultado do DB, o programa não executará esse trecho de código

    foreach($banco->result() as $tb_categoria) {        // @Aqui estou usando um foreach para percorrer toda minha array e printar em forma de tabela os valores
        echo "<table border='0' width='100%'> <tr>";
        echo "<td> ". $tb_categoria['id_categoria_planejamento']. "</td>";
        echo "<td> " . $tb_categoria['nome_categoria'] . "</td>";

        echo '<td> <a href="alterar.php?id_categoria_planejamento='.$tb_categoria['id_categoria_planejamento']. '"> Alterar </a>-
                
                <a href="excluir.php?id_categoria_planejamento='.$tb_categoria['id_categoria_planejamento']. '"> Excluir </a>-
              
              </td> ';

        echo " </tr> </table>";
    }

} else {
    echo "Sem resultado no DB";
}

?>