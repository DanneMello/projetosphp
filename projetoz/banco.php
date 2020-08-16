<?php
class Usuarios {    
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:dbname=blog;host=127.0.0.1", "root", "");
        } catch(PDOException $e) {
            echo "FALHA: ".$e->getMessage();
        }
    }

    public function selecionar ($id) {
        // $sql = "SELECT * FROM usuarios WHERE id= '$id"; // @Pode-se usar 
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id"); // @Toda vez que eu começar a usar o "prepare", ele simplesmtente vai começar a montar minha query
        $sql->bindValue(":id", $id); // @No bindValue ele vai pegar o VALOR da variável $id e associa com o :id.
        $sql->execute(); // @Aqui sim ele vai começar a montar minha query
    
        $array = array();
        if($sql->rowCount() > 0) { // @Se houver retorno de algum resultado ele vai preencher a array
            $array = $sql->fetch(); // @Criando uma array que será vazia incialmente
        }
        return $array;
    }
    // @Outra forma diferente de usar o pdoStatement
    public function inserir($nome, $email, $senha) {

        $sql = $this->db->prepare("INSERT INTO usuarios SET 
            nome = :nome, /* @Aqui estou montando com apelidos, os quais vou trocar pelo valor das váriaveis */
            email = :email,
            senha = :senha");

        $sql->bindParam(":nome", $nome); // @No bindParam ele vai pegar a variavel $nome e vai associar ela diretamente com o :nome.
        $sql->bindParam(":email", $email); 
        $sql->bindValue(":senha", md5($senha)); // @Como estou usando um md5 aqui, tenho que usar o bindValue porque vou apenas pegar o valor da senha que no caso não é uma váriavel.
        $sql->execute(); // @Aqui estou mandando o execute vazio.

    }
    public function atualizar($nome, $email, $senha, $id) {

        $sql = $this->db->prepare("UPDATE usuarios SET    /* @Aqui vou troca as interrogações ao executar o execute que vou trocar os valores pelo que vou especificar. */
            nome =?, 
            email = ?, 
            senha = ?   
            WHERE id = ?");
        $sql->execute(array($nome, $email, md5($senha), $id));
    }

    public function excluir($id) { // @Função pra deletar um usuário específico /// OBS: quando não souber o nome da tabela ou do usuário específico melhor não usar.
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        $sql->bindValue(1, $id); // @Aqui estou usando o 1 como primeiro parâmetro (id).
        $sql->execute();
    }
}












?>