<?php

class Conecta{


#bd do cadstro pessoal
    private $url = "localhost:3306";
    private  $user = "root";
    private  $password = "senac"; #mudarSenha12345
    private  $base = "produto1"; #mudarParaPRODUTO1

    

    public function conectadb(){
        return mysqli_connect($this->url, $this->user, 
                $this->password, $this->base);
    }
}