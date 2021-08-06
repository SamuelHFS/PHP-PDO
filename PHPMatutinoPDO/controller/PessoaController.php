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


    //método para atualizar dados de produto no BD
    public function atualizarPessoa($idpessoa, $nome, $dtNasc, $login, $senha, $perfil, $email, $cpf, 
            $logradouro, $complemento, $bairro, $cidade, $uf, $cep){
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        
        $pessoa = new Pessoa();
        $pessoa->setIdPessoa($idpessoa);
        $pessoa->setNome($nome);
        $pessoa->setDtNasc($dtNasc);
        $pessoa->setLogin($login);
        $pessoa->setsenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
        
                
        $pessoa->setFkEndereco($endereco);
        
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->atualizarPessoaDAO($pessoa);
    }
    //método para carregar a lista de produtos que vem da DAO
    public function listarPessoas(){
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->listarPessoasDAO();
    }
    
    //método para excluir produto
    public function excluirPessoa($id){
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->excluirPessoaDAO($id);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarPessoaId($id){
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->pesquisarPessoaIdDAO($id);
    }
    
    //método para limpar formulário
    public function limpar(){
        return $pe = new Pessoa();
    }
    
}