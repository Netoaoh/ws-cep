<?php
namespace Netoaoh\CEP;

/**
 * @brief Classe abstrata que define os formatos de exportação
 */
abstract class Format {
  /**
   * Constante que define o formato OBJ
   *
   * @var integer
   */
  const OBJ = 0;

  /**
   * Constante que define o formato JSON
   *
   * @var integer
   */
  const JSON = 1;
}
