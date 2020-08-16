<?php
require_once 'produto.php';

$produto = new Produto('');

$produto->setIdProduto('');
$produto->setIdCategoriaProduto('77');
$produto->setDataCadastro('2020.08.15');
$produto->setNomeProduto('monza');
$produto->setValorProduto('3550.55');
$produto->salvar();

echo "Produto inserido com sucesso";
?>