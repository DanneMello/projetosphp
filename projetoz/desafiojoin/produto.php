<?php
// @Criando minha classe PRODUTO
class Produto {
    // @Declarando minhas propriedades privadas para quando eu alterar esses dados aqui, automaticamente serão alterados lá no DB
    private $id_produto;
    private $id_categoria_produto;
    private $data_cadastro;
    private $nome_produto;
    private $valor_produto;

    private $pdo; // @Metodo privado para realizar a conexão com o DB

// @Criando meu construtor
    public function __construct($i) {
        try {
            $this->pdo = new PDO("mysql:dbname=produtos;host=localhost", "root", "");     // @Realizando a conexão com o DB dentro do try catch                
            echo "Conexão com o DB Ok!</br></br>";
        } catch(PDOException $e) {
            echo "Falhou a conexão ".$e->getMessage();
        }

        if(!empty($i)) {
            $sql = "SELECT * FROM tb_produto WHERE id_produto = ?"; // @AQui no lugar dos ?,será substituído por valores reais posteriormente
            $sql = $this->pdo->prepare($sql); // @Estou utilizando o prepare, pois estou enviando para ele uma extrutura de como será minha query
            $sql->execute(array($i));

            // @Verificando se existe algum valor no meu array
            if($sql->rowCount() > 0) {
                $data = $sql->fetch(); // @Estou usando o fetchl para pegar o resultado que está vindo de minha query
                $this->id_produto = $data['id_produto'];
                $this->id_categoria_produto = $data['id_categoria_produto'];
                $this->data_cadastro = $data['data_cadastro'];
                $this->nome_produto = $data['nome_produto'];
                $this->valor_produto = $data['valor_produto'];           
            }
        }
    }

    // @Definindo os metodos básicos para que minhas propriedades funcionem
    public function setIdProduto($ip) {
        $this->idproduto = $ip;
    }

    public function getIdProduto() { // @No caso como é um id eu não posso alterar (Não é recomedonda)
        return $this->idproduto;
    }


    public function setIdCategoriaProduto($icp) {
        $this->idcategoriaproduto = $icp;
    }

    public function getIdCategoriaProduto() { // @No caso como é um id eu não posso alterar (Não é recomedonda)
        return $this->idcategoriaproduto;
    }


    public function setDataCadastro($dc) {
        $this->datacadastro = $dc;
    }

    public function getDataCadastro() {
        return $this->DataCadastro;
    }


    public function setNomeProduto($np) {
        $this->nomeproduto = $np;
    }

    public function getNomeProduto() {
        return $this->nomeproduto;
    }


    public function setValorProduto($vp) {
        $this->valorproduto = $vp;
    }

    public function getValorProduto() {
        return $this->valorproduto;
    }

    public function salvar() {       // @Esse método salvar será responsável por salvar as alterações feita no banco
        if(!empty($this->id_produto)) {         // @Se meu this->id_produto estiver preenchido, isso quer dizer que estou alterando um usuário existente. Caso contrário estarei adicionando 
            $sql = "UPDATE tb_produto SET       
                id_categoria_produto = ?, 
                data_cadastro = ?, 
                nome_produto = ?, 
                valor_produto = ? 
                WHERE id_produto = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->id_categoria_produto,        // @Aqui estou mandando as informações que serão alteradas
                                $this->data_cadastro,
                                $this->nome_produto,
                                $this->valor_produto,
                                $this->id_produto));
        } else {        // @Aqui estou inserindo um novo produto
            $sql = "INSERT INTO tb_produto SET       
            id_categoria_produto = ?, 
            data_cadastro = ?, 
            nome_produto = ?, 
            valor_produto = ?,
            id_produto = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($this->id_categoria_produto,        // @Aqui estou mandando as informações que serão alteradas
                            $this->data_cadastro,
                            $this->nome_produto,
                            $this->valor_produto,
                            $this->id_produto));
        }
    }
}

?>