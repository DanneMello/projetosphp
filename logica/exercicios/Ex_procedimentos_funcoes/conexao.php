<?php

// @Abaixo estou atribuindo ás váriaveis $dsn, $dbuser e $dbpass a localização do meu DB e meu login em senha.
$banco = "mysql:dbname=logica;host=127.168.0.1";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO($banco, $dbuser, $dbpass); // @Aqui estou usando as váriaveis por questão de uma melhor visualização do meu código.
    echo"Conectado ao DB.</br>";
} catch(PDOException $e){
    echo "Conexão com o banco FALHOU:".$e->getMessage();

}


?>