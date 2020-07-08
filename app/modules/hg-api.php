<?php
class HG_API {
    private $key = null;
    private $error = false;
    
    function __construct($key = null) {
        if(!empty($key)) $this->key =$key;       
    }
    // @Função genérica para fazer qualquer chamada via json.
    function request ( $endpoint = '', $params = array() ) {
        $url = 'https://api.hgbrasil.com/" . $endpoint . "?key=" .$this->key. "&format=json';

        if( is_array($params) ) { // @Fazendo uma verificação caso necessário utilizar outros parâmetros 
            foreach($params as $key => $value) { // @
                if (empty($value)) continue; // @Verificando se for vazio. Se sim vou para o próximo each.
                $url .= $key . '=' . urlencode ($value).'&';  
            }
            $url = substr($url, 0, -1);
            $response = @file_get_contents ($url); // @Este Arroba antes do file_get_contents é para caso der um errro na chamada da url, ignorar e continuar o script
            $this->error = false;
            return json_decode($response, true);

        } else {

            $this->error = true;
            return false;
        }
    }
    // @Função para retornar possíveis erros 
    function is_error () {
        return $this->error;
    }
    // @Função mais específica para retornar o valor do dólar
    function dolar_quotation() {
        $data = $this->request('finance/quotations');
        
        if( !empty($data) && is_array($data['results']['currencies']['USD']) ) {
            $this->error = false;
            return $data['results']['currencies']['USD'];
        } else {
            $this->error = true;
            return false;
        }
    
    }

}


?>