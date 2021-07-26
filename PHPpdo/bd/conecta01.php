<?php

class Conecta{
#bd do cadastra produto
    private $url = "localhost:3306";
    private  $user = "root";
    private  $password = "senac"; #mudarSenha12345
    private  $base = "dbphp";
    
    

    public function conectadb(){
        return mysqli_connect($this->url, $this->user, 
                $this->password, $this->base);
    }
}