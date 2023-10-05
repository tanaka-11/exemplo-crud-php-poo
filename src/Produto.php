<?php
// Namespace e use
namespace ExemploCrudPoo;
use PDO, Exception;

// Criando a classe
final class Produto {
    // Criação das propriedades.
    private int $id;
    private string $nome;
    private string $descricao;
    private float $preco;
    private int $quantidade;
    private int $fabricante_id;

    // Propriedade de conexão
    private PDO $conexao;

    // Metodo de conexão
    public function __construct(){
        $this->conexao = Database::conecta();
    }

    // Metodo para exibir dados dos Produtos.
    // public function lerProdutos():array {
    //     $sql = "SELECT 
    //                 *,
    //                 produtos.nome AS produto,
    //                 fabricantes.nome AS fabricante,
    //                 (produtos.preco * produtos.quantidade) AS total
    //             FROM produtos INNER JOIN fabricantes
    //             ON produtos.fabricante_id = fabricantes.id
    //             ORDER BY produto";
    
    //     try {
    //         $consulta = $this->conexao->prepare($sql);
    //         $consulta->execute();
    //         $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    //     } catch (Exception $erro) {
    //         die("Erro ao carregar produtos: ".$erro->getMessage());
    //     }
    //     return $resultado;
    // }


}    