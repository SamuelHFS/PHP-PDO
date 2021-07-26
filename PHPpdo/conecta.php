<?php

$endereco = 'localhost';
$usuario = 'root';
$senha = '12345';
$banco = 'academiaProjetinFelas';

$link = mysqli_connect($endereco,$usuario,$senha,$banco)
or die('Erro: '.mysqli_error($link));



$sql = "INSERT INTO cadastro VALUES";
$sql .= "(null,";
$sql .= "'".$_POST['nome']."',";
$sql .= "'".$_POST['email']."',";
$sql .= "'".$_POST['senha']."',";
$sql .= "'".$_POST['telefone']."',";
$sql .= "'".$_POST['cpf']."',"; 
$sql .= "'".$_POST['sexo']."',";
$sql .= "'".$_POST['cidade']."',"; 
$sql .= "'".$_POST['cep']."',";
$sql .= "'".$_POST['endereco']."',"; 
$sql .= "'".$_POST['nascimento']."',";
$sql .= "'".$_POST['estado']."')";



$consulta = mysqli_query($link,$sql);


if(!$consulta)
{
    die('Erro: ' .mysqli_error($link));
}
else
{
    echo 'Cadastro Concluído';
}




?>