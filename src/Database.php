<?php
namespace ExemploCrudPoo;

use PDO, Exception;

abstract class Database {
    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "vendas_php-poo";

    private static PDO $conexao;

    // Método de conexão ao banco utilizando o self
    public static function conecta():PDO {
        try {
            self::$conexao = new PDO(
                "mysql:host=".self::$servidor.";dbname=".self::$banco.";charset=utf8",self::$usuario, self::$senha
            ); 
            
            self::$conexao->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
            );
    
        } catch(Exception $erro){
            die("Deu ruim: ".$erro->getMessage());
        }

        return self::$conexao;
    }

} // FIM

// Database::conecta();

