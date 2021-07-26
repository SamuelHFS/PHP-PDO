<?php
include_once 'LivroController.php';

$id = $_REQUEST['id'];
$lc = new LivroController();
$lc->pesquisarLivroId($id);

header("Location: ../cadastrolivro.php");
exit;