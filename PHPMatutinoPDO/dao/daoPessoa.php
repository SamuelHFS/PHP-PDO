<?php

include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/bd/Conecta.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/model/Mensagem.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/model/Endereco.php';

#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/bd/Conecta.php';
#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Produto.php';
#include_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Mensagem.php';

#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/bd/Conecta.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Produto.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Mensagem.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Fornecedor.php';


class DaoPessoa
{

    public function inserir(Pessoa $pessoa, Endereco $endereco)
    {
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
            $fkEndereco = $pessoa->getFkEndereco();

            $cep = $endereco->getCep();
            $logradouro = $endereco->getLogradouro();
            $complemento = $endereco->getComplemento();
            $bairro = $endereco->getBairro();
            $cidade = $endereco->getCidade();
            $uf = $endereco->getUf();

            try {
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

                $stmt = $conecta->prepare("insert into endereco values "
                . "(null,?,?,?,?,?,?)");

                $stmt->bindParam(1, $cep);
                $stmt->bindParam(2, $logradouro);
                $stmt->bindParam(3, $complemento);
                $stmt->bindParam(4, $bairro);
                $stmt->bindParam(5, $cidade);
                $stmt->bindParam(6, $uf);
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

    //método para atualizar dados da tabela produto
    public function atualizarPessoaDAO(Pessoa $pessoa)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $idpessoa = $pessoa->getIdpessoa();
            $nome = $pessoa->getNome();
            $dtNasc = $pessoa->getDtNasc();
            $login = $pessoa->getLogin();
            $senha = $pessoa->getSenha();
            $perfil = $pessoa->getPerfil();
            $email = $pessoa->getEmail();
            $cpf = $pessoa->getCpf();
            $fkEndereco = $pessoa->getFkEndereco();
            try {
                $stmt = $conecta->prepare("update pessoa set "
                    . "nome = ?,"
                    . "dtNasc = ?,"
                    . "login = ?, "
                    . "senha = ?, "
                    . "perfil = ?, "
                    . "email = ?, "
                    . "cpf = ?, "
                    . "fkEndereco = ? "
                    . "where idpessoa= ?");
                    $stmt->bindParam(1, $nome);
                    $stmt->bindParam(2, $dtNasc);
                    $stmt->bindParam(3, $login);
                    $stmt->bindParam(4, $senha);
                    $stmt->bindParam(5, $perfil);
                    $stmt->bindParam(6,  $email);
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
                $rs = $conecta->query("SELECT * FROM pessoa inner join endereco "
                    . "on pessoa.fkEndereco = endereco.idEndereco order by pessoa.idpessoa asc " );
                $lista = array();
                $a = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $pessoa = new Pessoa();
                            $pessoa->setIdpessoa($linha->idpessoa);
                            $pessoa->setNome($linha->nome);
                            $pessoa->setDtNasc($linha->dtNasc);
                            $pessoa->setLogin($linha->login);
                            $pessoa->setSenha($linha->senha);
                            $pessoa->setPerfil($linha->perfil);
                            $pessoa->setEmail($linha->email);
                            $pessoa->setCpf($linha->cpf);

                            $Ende = new Endereco();
                            $Ende->setIdEndereco($linha->idEndereco);
                            $Ende->setCep($linha->cep);
                            $Ende->setLogradouro($linha->logradouro);
                        
                            $Ende->setComplemento($linha->complemento);
                            $Ende->setBairro($linha->bairro);
                            $Ende->setCidade($linha->cidade);
                            $Ende->setUf($linha->uf);
                            
                            $pessoa->setFkEndereco($Ende);

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
    public function excluirPessoaDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $stmt = $conecta->prepare("delete from pessoa "
                    . "where idpessoa = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para os dados de produto por id
    public function pesquisarPessoaIdDAO($id)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $pessoa = new Pessoa();
        if ($conecta) {
            try {
                $rs = $conecta->prepare("select * from pessoa inner join endereco on pessoa.fkEndereco = enedereco.idEndereco where pessoa.idpessoa = ?"
                    );
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $pessoa->setIdpessoa($linha->idpessoa);
                            $pessoa->setNome($linha->nome);
                            $pessoa->setDtNasc($linha->dtNasc);
                            $pessoa->setLogin($linha->login);
                            $pessoa->setSenha($linha->senha);
                            $pessoa->setPerfil($linha->perfil);
                            $pessoa->setEmail($linha->email);
                            $pessoa->setCpf($linha->cpf);

                            $Ende = new Endereco();
                            $Ende->setIdEndereco($linha->idEndereco);
                            $Ende->setCep($linha->cep);
                            $Ende->setLogradouro($linha->logradouro);
                        
                            $Ende->setComplemento($linha->complemento);
                            $Ende->setBairro($linha->bairro);
                            $Ende->setCidade($linha->cidade);
                            $Ende->setUf($linha->uf);
                            
                            $pessoa->setFkEndereco($Ende);
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
			 URL='../PHPMatutino01/cadastroProduto.php'\">";
        }
        return $pessoa;
    }
}
