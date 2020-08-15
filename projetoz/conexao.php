<?php
class Banco {   // @Criando classe banco (CRUD) que será responsável por efetuar a conexão com o DB
    private $pdo;   // @Criando uma variável privada para guardar a conexão com o DB
    private $numRows;
    private $arrays;
    
    public function __construct($host, $dbname, $dbuser, $dbpass) {   // @Criando um método publico onde irei fazer a conexão com o DB
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpass);    // @Criando um construtor 'CRUD' de mySql dentro do try catch                
            echo "Conexão com o DB Ok!</br></br>";
        } catch(PDOException $e) {
            echo "Falhou a conexão".$e->getMessage();
        }
    }

    public function query($sql) {
        $query = $this->pdo->query($sql); // @Criando minha query 
        $this->numRows = $query->rowCount();
        $this->array = $query->fetchAll(); // @Como não sei quantos itens vai retornar da minha consulta, estou usando o fetchAll que retornará todos os itens para minha array
    }

    public function result() {
        return $this->array;    // @Aqui o método result está retornando a array
    }

    public function numRows() {
        return $this->numRows;
    }

    public function insert($table, $data) { // @Aqui estou criando o método insert
        if( !empty($table) && ( is_array($data) && count($data) > 0 ) ) { // @Fazendo uma verificação dupla se a tabela foi preenchida e se $data é uma array e se tem algo nela
            $sql = "INSERT INTO " .$table. " SET "; // @Montando minha query       
            $dados = array(); // @Criei uma variavel auxiliar 'array' 
            foreach($data as $chave => $valor) { // @Foreach para pegar cada campo da minha tabela
                $dados[] = $chave." = '".addslashes($valor)."'"; // @Aqui estou usando o addslashes só para não dar problema com as aspas simples, feito isso terei um array com todo os campos que irão ser inserido 
            }
            $sql = $sql.implode(", ", $dados); // @Implode concatenando com minha extrutura inicial
            $this->pdo->query($sql); // @Executando meu insert

        }

    }
}

?>