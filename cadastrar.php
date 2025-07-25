<?php

include __DIR__ . "/vendor/autoload.php";

define('TITLE','Cadastrar Vaga');

use \App\Entity\Vaga;

$objVaga = new Vaga;

if(isset($_POST['titulo'], $_POST['descricao'], $_POST['status'])) {

    $objVaga->titulo        = trim($_POST['titulo']);
    $objVaga->descricao     = trim($_POST['descricao']);
    $objVaga->status        = trim($_POST['status']);

    $objVaga->cadastrar();

    header('location: index.php?msg=success');
    exit;
}

include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/formulario.php";
include __DIR__ . "/includes/footer.php";

?>