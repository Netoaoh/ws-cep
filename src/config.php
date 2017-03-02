<?php

namespace Netoaoh\CEP;

/**
 * @brief Classe responsável por armazenar as configurações da Biblioteca
 */
abstract class Config{

  /**
   * Parametros de configuração
   *
   * @var [type]
   */
  protected static $config = [
    "api_url"=>"https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl"
  ];

}
?>
