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
           

            $cep = $pessoa->getfkEndereco()->getCep();
            $logradouro = $pessoa->getfkEndereco()->getLogradouro();
            $complemento = $pessoa->getfkEndereco()->getComplemento();
            $bairro = $pessoa->getfkEndereco()->getBairro();
            $cidade = $pessoa->getfkEndereco()->getCidade();
            $uf = $pessoa->getfkEndereco()->getUf();
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
                $stmt->bindParam(6,  $email);
                $stmt->bindParam(7, $cpf);
                $stmt->bindParam(8, $fkEndereco);
                $stmt->execute();

                }
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