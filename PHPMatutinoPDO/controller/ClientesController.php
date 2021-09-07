<?php

include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/dao/DaoClientes.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Clientes.php';

class ClientesController {
    
    public function inserirClientes($login, $senha, 
            $nome, $sexo, $email, $telefone){
        $clientes = new Clientes();
        $clientes->setLogin($login);
        $clientes->setSenha($senha);
        $clientes->setNome($nome);
        $clientes->setSexo($sexo);
        $clientes->setEmail($email);
        $clientes->setTelefone($telefone);
        
        $daoClientes = new DaoClientes();
        return $daoClientes->inserir($clientes);
    }
}
