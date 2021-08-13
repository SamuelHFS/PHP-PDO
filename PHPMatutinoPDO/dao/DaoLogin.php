<?php
require_once '../bd/Conecta.php';
include_once '../model/Pessoa.php';

class DaoLogin {

    public function validarLoginDAO($login, $senha){
        $conn = new Conecta();
        $pessoa = new Pessoa();

        $conecta = $conn->conectadb();
    if ($conecta){
    try{
        $st = $conecta->prepare("SELECT * FROM pessoa where "
        . "login = ? and senha = ? limit 1");
        $st->bindParam(1, $login);
        $st->bindParam(2, $senha);

        if($st->execute()){
            if()
        }
}
    }
}