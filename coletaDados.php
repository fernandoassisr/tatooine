<?php
/**
 * Solicitar e entregar protocolos
 * 
 * @author Fernando de Assis 
 * @access public
 * @since 2019
 */

namespace dados;

class ColetaDados
{
    private $url;

     /*
     * Construtor da Classe
     */
    public function __construct() {
        //Em caso de mudança do valor da url
        $this->setUrl('https://swapi.co/api/starships/');
    }
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl(){
        return $this->url;
    }

     /*
     * Importar dados a partir de uma url de requisição
     * @param  String $urlRequest  Url com padrão de requisição
     * @return array Estrutura com dados retornados pela requisição
     */
    public function importar($urlRequest) {
        $curlResult = curl_init($urlRequest);
        curl_setopt($curlResult, CURLOPT_CONNECTTIMEOUT ,0); 
        curl_setopt($curlResult, CURLOPT_TIMEOUT, 3600);
        set_time_limit(0);
        curl_setopt($curlResult, CURLOPT_RETURNTRANSFER, true); 
        $bodyReturn = curl_exec($curlResult);
        if ($erro = curl_errno($curlResult)) {
            $this->enviarErro();
        }
        curl_close($curlResult);
        $result = json_decode($bodyReturn, true);
        return $result;
    }

    /**
     * Mostra mensagem em caso de erro
     * @param  string $error Mensagem de erro
     * @return void
     */
    public function enviarErro() {
        echo "<br>Houve um problema ao conectar com o serviço. Tente novamente ou entre em 
            contato com a equipe do sistema.<br>";
        die();
    }

    /**
     * Solicita os dados de acordo com uma data de entrada e uma de saida
     * @return array Dados referentes a solicitação
     */
    function solicitaDados() {
        return $this->importar($this->url);    
    }
}