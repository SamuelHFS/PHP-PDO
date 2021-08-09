<?php

include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Mensagem.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Endereco.php';

class DaoPessoa
{

    public function inserir(Pessoa $pessoa){
    
        $conn = new Conecta();
        $msg = new Mensagem();
        
        $conecta = $conn->conectadb();
        if ($conecta) {

            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getLogin();
            $senha = $pessoa->getSenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();
           

            $cep = $pessoa->getFkEndereco()->getCep();
            $logradouro = $pessoa->getFkEndereco()->getLogradouro();
            $complemento = $pessoa->getFkEndereco()->getComplemento();
            $bairro = $pessoa->getFkEndereco()->getBairro();
            $cidade = $pessoa->getFkEndereco()->getCidade();
            $uf = $pessoa->getFkEndereco()->getUf();
             //$msg->setMsg("$logradouro, $complemento, $cep");
            try {
                //processo para pegar o idendereco da tabela endereco, conforme 
                //o cep, o logradouro e o complemento informado.
                $st = $conecta->prepare("select idEndereco "
                        . "from endereco where cep = ? and "
                        . "logradouro = ? and complemento = ? limit 1");
                $st->bindParam(1, $cep);
                $st->bindParam(2, $logradouro);
                $st->bindParam(3, $complemento);
                if($st->execute()){
                    if($st->rowCount() > 0){
                        //$msg->setMsg("".$st->rowCount());
                        while($linha = $st->fetch(PDO::FETCH_OBJ)){
                            $fkEndereco = $linha->idEndereco;
                        }
                        //$msg->setMsg("$fkEnd");
                        $msg->setMsg($nome, $dtNasc, $login, $senha, $perfil, $email, $cpf, $fkEndereco );
                    }else{
                        $st2 = $conecta->prepare("insert into "
                        . "endereco values (null,?,?,?,?,?,?)");
                        //TEM QUE ESTAR NA MESMA ORDEM DO BANCO DE DADOS
                $st2->bindParam(1, $cep);
                $st2->bindParam(2, $logradouro);
                $st2->bindParam(3, $complemento);
                $st2->bindParam(4, $bairro);
                $st2->bindParam(5, $cidade);
                $st2->bindParam(6, $uf);
                $st2->execute();

                $st3 = $conecta->prepare("select idEndereco "
                    . "from endereco where cep = ? and "
                    . "logradouro = ? and complemento = ? limit 1");
                $st3->bindParam(1, $cep);
                $st3->bindParam(2, $logradouro);
                $st3->bindParam(3, $complemento);
                if($st3->execute()){
                    if($st3->rowCount() > 0){
                        $msg->setMsg("".$st3->rowCount());
                        while($linha = $st3->fetch(PDO::FETCH_OBJ)){
                            $fkEndereco= $linha->idEndereco;
                        }
                        //$msg->setMsg("$fkEnd");
                    }
                }

            }


                //processo para inserir os dados de pessoa
                $stmt = $conecta->prepare("insert into pessoa values "
                    . "(null,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $dtNasc);
                $stmt->bindParam(3, $login);
                $stmt->bindParam(4, $senha);
                $stmt->bindParam(5, $perfil);
                $stmt->bindParam(6, $email);
                $stmt->bindParam(7, $cpf);
                $stmt->bindParam(8, $fkEndereco);
                $stmt->execute();

                }
                $msg->setMsg($nome, $dtNasc, $login, $senha, $perfil, $email, $cpf, $fkEndereco );
               // $msg->setMsg("<p style='color: green;'>"
                       // . "Dados Cadastrados com sucesso</p>");
                
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

     //método para atualizar dados da tabela produto
     public function atualizarPessoaDAO(Pessoa $pessoa)
     
     {
         $conn = new Conecta();
         $msg = new Mensagem();
         $conecta = $conn->conectadb();
         if ($conecta) {
             $idpessoa = $pessoa->getIdPessoa();
             $nome= $pessoa->getnome();
              $dtNasc = $pessoa->getDtNasc();
             $login = $pessoa->getLogin();
             $senha = $pessoa->getSenha();
             $perfil = $pessoa->getPerfil();
             $email= $pessoa->getEmail();
             $cpf = $pessoa->getCpf();

             $cep = $pessoa->getFkEndereco()->getCep();
             $logradouro = $pessoa->getFkEndereco()->getLogradouro();
             $complemento = $pessoa->getFkEndereco()->getComplemento();
             $bairro = $pessoa->getFkEndereco()->getBairro();
             $cidade = $pessoa->getFkEndereco()->getCidade();
             $uf = $pessoa->getFkEndereco()->getUf();
             

            
             try {
                 
                 $st = $conecta->prepare("select idEndereco "
                     . "from endereco where cep = ? and "
                     . "logradouro = ? and complemento = ? limit 1");
                 $st->bindParam(1, $cep);
                 $st->bindParam(2, $logradouro);
                 $st->bindParam(3, $complemento);
                 $fkEndereco = "";
                 if ($st->execute()) {
                     if ($st->rowCount() > 0) {
                         //$msg->setMsg("".$st->rowCount());
                         while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                            $fkEndereco= $linha->idEndereco;
                         }
                         //$msg->setMsg("$fkEnd");
                     } else {
                         $st2 = $conecta->prepare("insert into "
                             . "endereco values (null,?,?,?,?,?,?)");
                         $st2->bindParam(1, $logradouro);
                         $st2->bindParam(2, $complemento);
                         $st2->bindParam(3, $bairro);
                         $st2->bindParam(4, $cidade);
                         $st2->bindParam(5, $uf);
                         $st2->bindParam(6, $cep);
                         $st2->execute();
 
                         $st3 = $conecta->prepare("select idEndereco "
                             . "from endereco where cep = ? and "
                             . "logradouro = ? and complemento = ? limit 1");
                         $st3->bindParam(1, $cep);
                         $st3->bindParam(2, $logradouro);
                         $st3->bindParam(3, $complemento);
                         if ($st3->execute()) {
                             if ($st3->rowCount() > 0) {
                                 $linha = $st3->fetch(PDO::FETCH_OBJ);
                                 $fkEndereco = $linha->idEndereco;
                             }
                         }
                     }
                 }
                 $stmt = $conecta->prepare("update pessoa set"
                     . "nome = ?,"
                     . "dtNasc = ?, "
                     . "login = ?, "
                     . "senha = ?, "
                     . "perfil = ?, "
                     . "email = ?, "
                     . "cpf = ?, "
                     . "fkEndereco = ? "
                     . "where idpessoa = ?");
                 $stmt->bindParam(1, $nome);
                 $stmt->bindParam(2, $dtNasc);
                 $stmt->bindParam(3, $login);
                 $stmt->bindParam(4, $senha);
                 $stmt->bindParam(5, $perfil);
                 $stmt->bindParam(6, $email);
                 $stmt->bindParam(7, $cpf);
                 $stmt->bindParam(8, $fkEndereco);
                 $stmt->bindParam(9, $idpessoa);
                 $stmt->execute();

                 
                 $msg->setMsg("<p style='color: blue;'>"
                     . "Dados atualizados com sucesso</p>");
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
//método para carregar lista de produtos do banco de dados
public function listarPessoasDAO()
{
    $msg = new Mensagem();
    $conn = new Conecta();
    $conecta = $conn->conectadb();
    if ($conecta) {
        try {
            $rs = $conecta->query("select * from pessoa inner join endereco "
                . " on pessoa.fkEndereco = endereco.idEndereco");
            $lista = array();
            $a = 0;
            if ($rs->execute()) {
                if ($rs->rowCount() > 0) {
                    while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                        
                        $pessoa = new Pessoa();
                        $pessoa->setIdPessoa($linha->idpessoa);
                        $pessoa->setNome($linha->nome);
                        $pessoa->setDtNasc($linha->dtNasc);
                        $pessoa->setLogin($linha->login);
                        $pessoa->setSenha($linha->senha);
                        $pessoa->setPerfil($linha->perfil);
                        $pessoa->setEmail($linha->email);
                        $pessoa->setCpf($linha->cpf);
                        
                        
                        $endereco = new Endereco();
                        $endereco->setIdEndereco($linha->idEndereco);
                        $endereco->setCep($linha->cep);
                        $endereco->setLogradouro($linha->logradouro);
                        $endereco->setComplemento($linha->complemento);
                        $endereco->setBairro($linha->bairro);
                        $endereco->setCidade($linha->cidade);
                        $endereco->setUf($linha->uf);
                        

                        

                        $pessoa->setfkEndereco($endereco);
                        $lista[$a] = $pessoa;
                        $a++;


                    }
                }
            }
        } catch (Exception $ex) {
            $msg->setMsg($ex);
        }
        $conn = null;
        return $lista;
    }
}

//método para excluir produto na tabela produto
public function excluirPessoaDAO($id){
    $conn = new Conecta();
    $conecta = $conn->conectadb();
    $msg = new Mensagem();
    if($conecta){
        try {
            

            $stmt = $conecta->prepare("delete from pessoa"
                    . "where idpessoa = ?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados excluídos com sucesso.</p>");
        } catch (Exception $ex) {
            $msg->setMsg($ex);
        }
    }else{
        $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
    }
    $conn = null;
    return $msg;

}

//método para os dados de produto por id
public function pesquisarPessoaIdDAO($id)
{
    $msg = new Mensagem();
    $conn = new Conecta();
    $conecta = $conn->conectadb();
    $pessoa = new Pessoa();
    if ($conecta) {
        try {
            $rs = $conecta->prepare("select * from pessoa inner join endereco "
                . " on pessoa.fkEndereco = endereco.idEndereco where "
                . "idpessoa = ? limit 1");
            $rs->bindParam(1, $id);
            if ($rs->execute()) {
                if ($rs->rowCount() > 0) {
                    while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {

                        $endereco = new Endereco();
                        $endereco->setLogradouro($linha->logradouro);
                        $endereco->setComplemento($linha->complemento);
                        $endereco->setBairro($linha->bairro);
                        $endereco->setCidade($linha->cidade);
                        $endereco->setUf($linha->uf);
                        $endereco->setCep($linha->cep);

                        $pessoa->setIdPessoa($linha->idpessoa);
                        $pessoa->setNome($linha->nome);
                        $pessoa->setDtNasc($linha->dtNasc);
                        $pessoa->setLogin($linha->login);
                        $pessoa->setSenha($linha->senha);
                        $pessoa->setPerfil($linha->perfil);
                        $pessoa->setEmail($linha->email);
                        $pessoa->setCpf($linha->cpf);
                        $pessoa->setfkEndereco($endereco);
                        
                    }
                }
            }
        } catch (Exception $ex) {
            $msg->setMsg($ex);
        }
        $conn = null;
    } else {
        echo "<script>alert('Banco inoperante!')</script>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
         URL='../PHPMatutinoPDO/cadastro.php'\">";
    }
    return $pessoa;
}
}