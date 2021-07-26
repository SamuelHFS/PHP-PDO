<?php

#include_once 'C:/xampp/htdocs/PAcademia/PHP/bd/conecta01.php'; #casa
#include_once 'C:/xampp/htdocs/PAcademia/PHP/model/produto.php'; #casa

include_once  'C:/xampp/htdocs/ProAcademia/PHP/bd/conecta.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/Produto.php';






class DaoProduto {
    
    public function inserir(Produto $produto){
        $conn = new Conecta();
        if($conn->conectadb()){
            $nome = $produto->getNome();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getEstoque();
            $sql = "insert into produto values (null, '$nome',"
                    . "'$vlrCompra', '$vlrVenda', '$qtdEstoque')";
            $resp = mysqli_query($conn->conectadb(), $sql) or 
                    die($conn->conectadb());
            if($resp){
                $msg = "<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>";
            }else{
                $msg = $resp;
            }
        }else{
            $msg = "<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
    }
    
    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO(){
        $conn = new Conecta();
        if($conn->conectadb()){
            $sql = "select * from produto";
            $query = mysqli_query($conn->conectadb(), $sql);
            $result = mysqli_fetch_array($query);
            $lista = array();
            $a = 0;
            if ($result) {
                do {
                    $produto = new Produto();
                    $produto->setId($result['id']);
                    $produto->setNome($result['nome']);
                    $produto->setVlrCompra($result['vlrCompra']);
                    $produto->setVlrVenda($result['vlrVenda']);
                    $produto->setEstoque($result['qtdEstoque']);
                    $lista[$a] = $produto;
                    $a++;
                } while ($result = mysqli_fetch_array($query));
            }
            mysqli_close($conn->conectadb());
            return $lista;
        }
    }
}

