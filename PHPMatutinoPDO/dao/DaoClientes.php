<?php

include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Clientes.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Mensagem.php';

class DaoClientes
{

    public function inserir(Clientes $clientes)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
       
        if ($conecta) {
            
            $senha = $clientes->getSenha();
            $nome = $clientes->getNome();
            $sexo = $clientes->getSexo();
            $email = $clientes->getEmail();
            $telefone = $clientes->getTelefone();
            try {
                $stmt = $conecta->prepare("insert into clientes values "
                    . "(null,md5(?),?,?,?,?)");
                
                $stmt->bindParam(1, $senha);
                $stmt->bindParam(2, $nome);
                $stmt->bindParam(3, $sexo);
                $stmt->bindParam(4, $email);
                $stmt->bindParam(5, $telefone);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                    . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
}
 
           