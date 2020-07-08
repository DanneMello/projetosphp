<?php
require 'template.php';

$array = array(
    "titulo"=>  "Titulo do meu template: ",
    "nome"=>    "Danny",
    "idade"=>   29
);

$tpl = new Template('template.phtml');
$tpl->render($array);

?>