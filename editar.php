<?php

include __DIR__ . "/vendor/autoload.php";

define('TITLE','Editar Vaga');

use \App\Entity\Vaga;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?msg=error');
    exit;
}

//CONSULTA A VAGA
$objVaga = Vaga::getVaga($_GET['id']);

//VALIDAÇÃO DA VAGA
if(!$objVaga instanceof Vaga) {
    header('location: index.php?msg=error');
    exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['status'])) {

    $objVaga->titulo        = trim($_POST['titulo']);
    $objVaga->descricao     = trim($_POST['descricao']);
    $objVaga->status        = trim($_POST['status']);

    $objVaga->atualizar();

    header('location: index.php?msg=success');
    exit;
}

include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/formulario.php";
include __DIR__ . "/includes/footer.php";

?>