<?php
Class Produto{

    private $id;
    private $nome;
    private $vlrCompra;
    private $vlrVenda;
    private $qtdEstoque;
    
    function setId($id){
        $this->id = $id;
    }
    function getId(){
        return $this->id;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function getNome(){
        return $this->nome;
    }
    function setVlrCompra($vlrCompra){
        $this->vlrCompra = $vlrCompra;
    }
    function getVlrCompra(){
        return $this->vlrCompra;
    }
    function setVlrVenda($vlrVenda){
        $this->vlrVenda = $vlrVenda;
    }
    function getVlrVenda(){
        return $this->vlrVenda;
    }
    function setEstoque($qtdEstoque){
        $this->qtdEstoque = $qtdEstoque;
    }
    function getEstoque(){
        return $this->qtdEstoque;
    }




}