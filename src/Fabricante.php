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

    // Metodo para exibir dados dos Fabricantes.
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
    
    // Metodo para inserir Fabricante.
    public function inserirFabricante():void {
        $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao inserir: ".$erro->getMessage());
        }
    
    }
    
    // Metodo para exibir dados de UM fabricante.
    public function lerUmFabricante():array {
        $sql = "SELECT * FROM fabricantes WHERE id = :id";
    
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao carregar: ".$erro->getMessage());
        }
    
        return $resultado;
    } 

    // Metodo para atualizar dados de UM fabricante.
    public function atualizarFabricante():void {
        $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";
        
        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao atualizar: ".$erro->getMessage());
        }
    } 
    







   // Getters e Setters
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        // Sanitizando com o filter_var. 
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        return $this;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): self {
        // Sanitizando com o filter_var pois não se trata de um formulario para usar o post.
        $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this;
    }
}

    