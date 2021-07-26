<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eleições</title>
</head>
<body>
 <h3> Eleições para síndico </h3>   
 <label> Selecione o seu candidato enao foi</label>
 <?php
 if(!isset($_COOKIE["c1"])) {
     setcookie("c1", 0);
     setcookie("c2", 0);
     setcookie("c3", 0);
     setcookie($n, 0);
     setcookie("contador", 1);
     setcookie($x, 1);
     setcookie("vencedor", 0);
 }
 do{     

    setcookie("contador", $_COOKIE("contador")+1);
       }
 ?>
 <form mathod="post" action="">
     <label> Candidato: </label>
     <select name="candidato">
     <option value="x">[--SELECIONE--]</option>
         <option value="1">Sebastião</option>
         <option value="2">Marta</option>
         <option value="3">Miranda</option>
     </select>
<input type="submit" value="votar" name="voto">
</form>

<?php
if(!isset($_COOKIE["c1"])) {
    setcookie("c1", 0);
    setcookie("c2", 0);
    setcookie("c3", 0);
    setcookie("n", 0);
    setcookie("contador", 1);
    setcookie("x", 1);
    setcookie("vencedor", 0);
}
do{     

   setcookie("contador", $_COOKIE("contador")+1);
      }

if(isset($_POST['voto'])){

    $candidato = $_POST['candidato'];

    switch($candidato){
        case(1): 
            echo 'Votou em Sebastião'; setcookie("c1", $_COOKIE("c1")+1); break;
        case(2): 
            echo 'Votou em Marta'; setcookie("c2", $_COOKIE("c2")+1); break;
        case(3): 
            echo 'Votou em Miranda'; setcookie("c3", $_COOKIE("c3")+1); break;
        default: 
            echo 'Nulo'; setcookie($n, $_COOKIE($n)+1);  break;
    
    }

}while($_COOKIE["contador"] < 5);

    if($_COOKIE["vencedor"] <= $_COOKIE["c1"]){
        setcookie("vencedor", $_COOKIE["c1"]);
        $nomeVencedor = "Sebastião";
    }
    if($_COOKIE["vencedor"]  <= $_COOKIE["c2"]){
        setcookie("vencedor", $_COOKIE["c2"]);
        $nomeVencedor = "Sebastião";
    }
    if($_COOKIE["vencedor"]  <= $_COOKIE["c3"]){
        setcookie("vencedor", $_COOKIE["c3"]);
        $nomeVencedor = "Sebastião";
    
}
echo "<br>Síndico eleito: $nomevencedor , com "vencedor""
?>
</body>


<!--//$sql .= "'".$_POST['nome']."',";
$idade = 25;

switch($idade){
  case (idade < 18): echo "Menor de Idade";
}

 $idade = 25;

switch($idade){
    case ($idade < 18): echo "Menor de Idade"; break;
    case ($idade > 18): echo "Maior de Idade"; break;
    default: echo "Está no limbo";
  }


  repetir estrutura php -->
</html>