<?php
/**
 * @brief Exemplo de utilização retornando dados no formato JSON
 */


// Carregando as classes
require_once '../vendor/autoload.php';

// Adicionar a classe CEP
use Netoaoh\CEP\CEP;
use Netoaoh\CEP\Format;

// CEP de consulta
$cep = "12312312";

// Instancia da classe CEP
$info = new CEP();

// Executando método consultaCEP
$data = $info->consultaCEP($cep, Format::JSON);

// Exibindo os dados na tela
print_r($data);

?>
