<?php
namespace ExemploCrudPoo;
use PDO, Exception;

abstract class Utilitarios {
    public static function formatarPreco( float $valor ):string {
        $valorFormatado = number_format($valor, 2, ",", ".");
        return "R$ " . $valorFormatado;
    }
}    