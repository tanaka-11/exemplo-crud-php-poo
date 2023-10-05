<?php
// require do autoload, chamada do use e criação do objeto.
use ExemploCrudPoo\Fabricante;
require_once "../vendor/autoload.php";
$fabricante = new Fabricante;

// Sanitização direto da classe.
$fabricante->setId($_GET['id']);

// Chamando o metodo
$fabricante->excluirFabricante();

// Retorno
header("location:visualizar.php");

