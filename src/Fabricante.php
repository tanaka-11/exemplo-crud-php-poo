<?php
namespace ExemploCrudPoo;
use PDO, Exception;

final class Fabricante {
    // Criando as propriedades da classe Fabricante.
    private int $id;
    private string $nome;

    // Propriedade de conexão herdando recursos PDO da classe Database(Dependência).
    private PDO $conexao;

    public function __construct(){
        //*Obs. Todo objeto de Fabricante automaticamente recebe o método (conecta) da classe Database.
        $this->conexao = Database::conecta();
    }

    // Criando metodo para exibir dados dos Fabricantes.
    public function lerFabricantes():array {
        $sql = "SELECT * FROM fabricantes ORDER BY nome";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro: ".$erro->getMessage());
        }    
    
        return $resultado;
    } 
    








   // Getters e Setters
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        $this->nome = $nome;
        return $this;
    }
}