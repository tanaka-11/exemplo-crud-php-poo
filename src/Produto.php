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
    public function lerProdutos():array {
        $sql = "SELECT 
                    produtos.id,
                    produtos.nome AS produto,
                    produtos.preco,
                    produtos.quantidade,
                    fabricantes.nome AS fabricante,
                    (produtos.preco * produtos.quantidade) AS total
                FROM produtos INNER JOIN fabricantes
                ON produtos.fabricante_id = fabricantes.id
                ORDER BY produto";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao carregar produtos: ".$erro->getMessage());
        }
        
        return $resultado;
    }
    


    // Getters e Setters

    // ID
    public function getId():int {
        return $this->id;
    }

    
    public function setId(int $id):self {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

   
    // NOME
    public function getNome():string {
        return $this->nome;
    }

   
    public function setNome(string $nome):self {
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    // DESCRIÇÃO
    public function getDescricao():string {
        return $this->descricao;
    }

    public function setDescricao(string $descricao):self {
        $this->descricao = filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }

    // PREÇO
    public function getPreco():float {
        return $this->preco;
    }

    public function setPreco(float $preco):self {
        $this->preco = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        return $this;
    }
    
    // QUANTIDADE
    public function getQuantidade():int {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade):self {
        $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    // FABRICANTE_ID    
    public function getFabricanteId():int {
        return $this->fabricante_id;
    }

    public function setFabricanteId(int $fabricante_id):self {
        $this->fabricante_id = filter_var($fabricante_id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    // CONEXAO
    public function getConexao():PDO {
        return $this->conexao;
    }

    public function setConexao(PDO $conexao):self {
        $this->conexao = $conexao;
        return $this;
    }
}    