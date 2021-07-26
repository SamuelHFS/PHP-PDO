<?php

$idade = 19;
$altura = 1.80;
$peso = 90;
$imc = $peso /($altura ^ 2);
$nome = "Samuel";
$ativado = true;


if($ativado == true){
    print_r("Nome: " . $nome . "<br>");
    echo ("Imc: " );
    echo number_format ($imc , 0)   . "<br>";

}

?>
