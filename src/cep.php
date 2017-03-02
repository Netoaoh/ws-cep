<?php

namespace Netoaoh\CEP;

use SoapClient;
use Netoaoh\CEP\Format;

/**
 * @brief Classe responsável por consultar o webservice dos correios retornando
 * o endereço a partir do CEP.
 */
class CEP extends Config{

  /**
   * Variável que armazena o endereço do webservice dos correios
   *
   * @var [string]
   */
  private $apiUrl;

  /**
   * Construtor da classe CEP
   *
   * @method __construct
   *
   * @param  [Array]      $config Array que sobrescreve as configurações padrão da biblioteca (parametro opcional)
   */
  public function __construct($config = NULL){

    //  Verifica se foram informados os parametros de configuração
    /*if($config != NULL){
      //  Define a url da API
      $this->apiUrl = $config["api_url"];
    } else {*/
      // Recuperando a url da API na configuração
      $this->apiUrl = parent::$config["api_url"];
    //}
  }

  /**
   * @brief Método que consulta o CEP na API
   *
   * @method consultaCEP
   *
   * @param  [string]      $cep    CEP que será consultado
   * @param  [Format]      $format Formato desejado para o retorno
   *
   * @return [JSON/OBJECT]         Retorna no formato informado na variável $format
   */
  public function consultaCEP($cep, $format = Format::OBJ){

    try {
      //  Removendo os espaços em branco e caracteres indesejados
      $cep = str_replace("-", "", trim($cep));

      // Instância da classe SoapClient
      $data = new SoapClient($this->apiUrl);

      // Consultando método consultaCEP
      $result = $data->consultaCEP(array("cep"=>$cep));

      // Armazenando o retorno para que seja convertido no formato solicitado
      $return = $result->return;

    } catch (\Exception $e) {

      // Armazenando o objeto error com a mensagem de erro para que seja convertido no formato solicitado
      $return = (object) ["error"=>$e->getMessage()];
    }

    //  Verificando o formato solicitado
    switch($format){
      case Format::JSON:
        //  Convertendo para o formato JSON
        $return = json_encode((array)$return);
      break;
    }

    //  Retornando os dados convertidos
    return $return;
  }
}
?>
