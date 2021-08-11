<?php
require_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/dao/DaoLogin.php';
require_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Mensagem.php';
require_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Pessoa.php';


$login = $_REQUEST['login'];
$senha = $_REQUEST['senha'];

$daoLogin = new DaoLogin();
$resposta1 = new Pessoa();
$resposta2 = new Mensagem();
$resposta1 = $daoLogin->validarLogin($login, $senha);
$resposta2 = $daoLogin->validarLogin($login, $senha);

if($resposta1 != null){

}else{
    return $resposta2;
}


$daoLogin->validarLogin( $login, $senha)

