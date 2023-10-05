<?php
// Require e Use
use ExemploCrudPoo\Produto;
use ExemploCrudPoo\Fabricante;

require_once "../vendor/autoload.php";

// Criação dos objetos
$fabricante = new Fabricante;
$produto = new Produto;

// Sanitização e capturando dado.
$produto->setId($_GET['id']);

// Chamando os metodos e guardando numa variavel
$dadosDoProduto = $produto->lerUmProduto();
$dadosDoFabricante = $fabricante->lerFabricantes();

if(isset($_POST['atualizar'])){

    // Sanitização
    $produto->setNome($_POST['nome']); 
    
    $produto->setPreco($_POST['preco']); 

    $produto->setQuantidade($_POST['quantidade']);

    $produto->setFabricanteId($_POST['fabricante_id']);

    $produto->setDescricao($_POST['descricao']);

    // Chamada do metodo
    $produto->atualizarProduto();

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço:</label>
                <input value="<?=$produto['preco']?>"
                type="number" min="10" max="10000" step="0.01"
                 name="preco" id="preco" required>
            </p>
            <p>
                <label for="quantidade">Quantidade:</label>
                <input value="<?=$produto['quantidade']?>"
                type="number" min="1" max="100"
                 name="quantidade" id="quantidade" required>
            </p>
            <p>
                <label for="fabricante">Fabricante:</label>
                <select name="fabricante" id="fabricante" required>
                    <option value=""></option>
        
                    <?php foreach( $listaDeFabricantes as $fabricante ) { ?>
                        <option <?php if($produto["fabricante_id"] === $fabricante["id"]) echo " selected "; ?>
                        value="<?=$fabricante['id']?>">
                            <?=$fabricante['nome']?>
                        </option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label for="descricao">Descrição:</label> <br>
                <textarea name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
            </p>
            <button type="submit" name="atualizar">Atualizar produto</button>
        </form>
        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>
    
</body>
</html>