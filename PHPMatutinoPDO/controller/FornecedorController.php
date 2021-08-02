<?php
#include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/dao/DaoFornecedor.php';
#include_once 'C:/xampp/htdocs/ProAcademia/PHPMatutinoPDO/model/Fornecedor.php';

include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/dao/DaoFornecedor.php';
include_once 'C:/xampp/htdocs/PAcademia/PHPMatutinoPDO/model/Fornecedor.php';

class FornecedorController {
    
    public function inserirFornecedor($nomeFornecedor, $logradouro,  $complemento, $bairro,
$cidade, $uf, $cep, $representante, $email, $telFixo, $telCel){
        $fornecedor = new Fornecedor();
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setLogradouro($logradouro);
       
        $fornecedor->setComplemento($complemento);
        $fornecedor->setBairro($bairro);
        $fornecedor->setCidade($cidade);
        $fornecedor->setUf($uf);
        $fornecedor->setCep($cep);
        $fornecedor->setRepresentante($representante);
        $fornecedor->setEmail($email);
        $fornecedor->setTelFixo($telFixo);
        $fornecedor->setTelCel($telCel);
        
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->inserir($fornecedor);
    }
    
    //método para atualizar dados de produto no BD
    public function atualizarFornecedor($idfornecedor, $nomeFornecedor, $logradouro,  $complemento, $bairro,
    $cidade, $uf, $cep, $representante, $email, $telFixo, $telCel){
        $fornecedor = new Fornecedor();
        $fornecedor->setIdFornecedor($idfornecedor);
        $fornecedor->setNomeFornecedor($nomeFornecedor);
        $fornecedor->setLogradouro($logradouro);
      
        $fornecedor->setComplemento($complemento);
        $fornecedor->setBairro($bairro);
        $fornecedor->setCidade($cidade);
        $fornecedor->setUf($uf);
        $fornecedor->setCep($cep);
        $fornecedor->setRepresentante($representante);
        $fornecedor->setEmail($email);
        $fornecedor->setTelFixo($telFixo);
        $fornecedor->setTelCel($telCel);
        
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->atualizarFornecedorDAO($fornecedor);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarFornecedores(){
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->listarFornecedoresDAO();
    }
    
    //método para excluir produto
    public function excluirFornecedor($idfornecedor){
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->excluirFornecedorDAO($idfornecedor);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarFornecedorId($idfornecedor){
        $daoFornecedor = new DaoFornecedor();
        return $daoFornecedor->pesquisarFornecedorIdDAO($idfornecedor);
    }
    
    //método para editar produto
    //public function editarProduto($id){
        //$daoProduto = new DaoProduto();
        //return $daoProduto->editarProdutoDAO($id);
   // }
    
    //método para limpar formulário
    public function limpar(){
        return $fo = new Fornecedor();
    }
}
