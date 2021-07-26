<?php
#require_once "C:/xampp/htdocs/ProAcademia/PHP/dao/daopessoa.php";
#require_once 'C:/xampp/htdocs/ProAcademia/PHP/model/Pessoa.php';

require_once 'C:/xampp/htdocs/PAcademia/PHP/dao/daopessoa.php';
require_once 'C:/xampp/htdocs/PAcademia/PHP/model/Pessoa.php';





class PessoaController{
    public function inserirPessoa($nome, $dtNasc, $login, $senha, $perfil, $email, $cpf ){
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);


        
        $daoPessoa = new daoPessoa();
         return $daoPessoa->inserir($pessoa);
    }
}