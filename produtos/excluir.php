<?php
// require do autoload, chamada do use e criação do objeto.
use ExemploCrudPoo\Produto;
require_once "../vendor/autoload.php";
$produto = new Produto;

// Sanitização e captura de dado.
$produto->setId($_GET['id']);  

// Chamada de metodo
$produto->excluirProduto();

header("location:visualizar.php");