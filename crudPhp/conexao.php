<?php

// @Abaixo estou atribuindo ás váriaveis $dsn, $dbuser e $dbpass a localização do meu DB e meu login em senha.
$banco = "mysql:dbname=pesquisa;host=127.168.0.1";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO($banco, $dbuser, $dbpass); // @Aqui estou usando as váriaveis por questão de uma melhor visualização do meu código.

} catch(PDOException $e){
    echo "Conexão com o banco FALHOU:".$e->getMessage();

}


?>