<?php

class Conecta{

    private $url = "localhost";
    private  $user = "root";
    private  $password = "senac";  #mudarSenha12345
    private  $base = "dbphplivro";
    
    

    public function conectadb(){
        $pdo = null;
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=$base', $user, $password);
        } catch (Exception $ex){
            echo "<script>alert('Error na conexão')</script>";

        }
        return $pdo;
    }
}