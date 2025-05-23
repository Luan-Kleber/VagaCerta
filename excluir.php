<?php

include __DIR__ . "/vendor/autoload.php";

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
if(isset($_POST['excluir'])) {

    $objVaga->excluir();

    header('location: index.php?msg=success');
    exit;
}

include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/confirmar-exclusao.php";
include __DIR__ . "/includes/footer.php";

?>