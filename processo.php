<?php
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Clientes.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Mensagem.php';






//Recebe dados via get
$email = $_GET['email'];

//Verificando se algo foi digitado:
if ($email>"1"){
$query = $pdo("SELECT * FROM clientes WHERE $email='email'");
$numeros = $pdo ($query);
if ($numeros>"0"){
echo "Tem uma informação cadastrada!";   //Sucesso
}
else{
echo "Não tem nenhuma informação cadastrada!"; //Erro
}
}
//Fim
?>