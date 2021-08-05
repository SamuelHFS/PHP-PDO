<?php

class Pessoa {
    
    private $idPessoa;
    private $nome;
    private $dtNasc;
    private $login;
    private $senha;
    private $perfil;
    private $email;
    private $cpf;
    private $fkEndereco;
    
    

    function getNome() {
        return $this->nome;
    }

    function getDtNasc() {
        return $this->dtNasc;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDtNasc($dtNasc) {
        $this->dtNasc = $dtNasc;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }



    /**
     * Get the value of idPessoa
     */ 
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    /**
     * Set the value of idPessoa
     *
     * @return  self
     */ 
    public function setIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa;

        return $this;
    }

    /**
     * Get the value of fkEndereco
     */ 
    public function getFkEndereco()
    {
        return $this->fkEndereco;
    }

    /**
     * Set the value of fkEndereco
     *
     * @return  self
     */ 
    public function setFkEndereco($fkEndereco)
    {
        $this->fkEndereco = $fkEndereco;

        return $this;
    }
}
