<?php
#include_once 'C:/xampp/htdocs/PAcademia/PHP/dao/daoproduto.php'; #casa
#include_once 'C:/xampp/htdocs/PAcademia/PHP/model/produto.php'; #casa
include_once  'C:/xampp/htdocs/ProAcademia/PHP/dao/daoproduto.php'; 
include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/Produto.php';

class ProdutoController {
    
    public function inserirProduto($nome, $vlrCompra, 
            $vlrVenda, $qtdEstoque){
        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setVlrCompra($vlrCompra);
        $produto->setVlrVenda($vlrVenda);
        $produto->setEstoque($qtdEstoque);
        
        $daoProduto = new DaoProduto();
        return $daoProduto->inserir($produto);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarProdutos(){
        $daoProduto = new DaoProduto();
        return $daoProduto->listarProdutosDAO();
    }
}
