<?php
// require do autoload, chamada do use e criação do objeto.
require_once "../vendor/autoload.php";
use ExemploCrudPoo\Fabricante;
$fabricante = new Fabricante;

// Sanitização direto da classe.
$fabricante->setId($_GET['id']);

// Chamando o metodo
$fabricante->excluirFabricante();

// Retorno
header("location:visualizar.php");

