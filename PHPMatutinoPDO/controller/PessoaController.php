<?php
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/dao/daoPessoa.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Pessoa.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Endereco.php';

#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/dao/DaoFornecedor.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Fornecedor.php';

class PessoaController {
    
    public function inserirPessoa($nome, $dtNasc, $login, 
    $senha, $perfil, $email, $cpf, $cep, $logradouro,
    $complemento, $bairro, $cidade, $uf){
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);


        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
 
        $pessoa->setFkEndereco($endereco);

        $daoPessoa = new DaoPessoa();
        return $daoPessoa->inserir($pessoa);
    }
    
}