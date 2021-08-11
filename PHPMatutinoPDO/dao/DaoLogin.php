<?php
require_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/bd/Conecta.php';
require_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Mensagem.php';
require_once 'C:/xampp/htdocs/PHPPD/PHPMatutinoPDO/model/pessoa/Pessoa.php';

class DaoLogi{
    public function validarLogin($login, $senha){
        $conn = new Conecta();
        $msg = new Mensagem();
        $pessoa = new Pessoa();
        $conecta = $conn->conectadb();
        if($conecta){
            try{
                $st = $conecta->prepare("select * from pessoa where login = ? "
                . "and senha = ? limit 1");
                $st->bindParam(1, $login);
                $st->bindParam(2, $senha);
                
                
                if($st->execute()){
                    if($st->rowCount()>0){
                    while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                        $pessoa->setIdPessoa($linha->idpessoa);
                        $pessoa->setNome($linha->nome);
                        $pessoa->setLogin($linha->login);
                        $pessoa->setPerfil($linha->perfil);
            } 
            return $pessoa;
        }else{
            $msg->setMsg("<p style='color: red;'>"
            . "Usuário não encontrado. </p>");
            return $msg;
        }
        
        } 
    }catch (Exception $ex) {
        $msg->setMsg($ex);
        return $msg;
  
                }

        }else{
            $msg->setMsg("<p style='color: red;'>"
            . "Erro na conexão com o banco de dados. </p>");
            return $msg;
        }
    }
}
