<?php
namespace ExemploCrudPoo;
use PDO;

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