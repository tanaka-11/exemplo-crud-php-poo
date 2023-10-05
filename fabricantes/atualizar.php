<?php
// Fazendo require do autoload, use da classe e criação de objeto.
require_once "../vendor/autoload.php";
use ExemploCrudPoo\Fabricante;
$fabricante = new Fabricante;

// Sanitização direto da classe (setId).
$fabricante->setId($_GET['id']);

// Guardando os dados numa variavel com o nome diferente do objeto.
$dadosDofabricante = $fabricante->lerUmFabricante();

if( isset($_POST['atualizar']) ){
    // Sanitização direto da classe (setNome).
    $fabricante->setNome($_POST['nome']);

    // Chamando o metodo de atualizar o fabricante.
    $fabricante->atualizarFabricante();

    header("location:visualizar.php?status=sucesso");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualização</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT/UPDATE</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$dadosDofabricante['id']?>">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$dadosDofabricante['nome']?>" required type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">
                Atualizar fabricante</button>
        </form>
        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>

</body>
</html>