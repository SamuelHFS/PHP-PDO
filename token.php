<?php

if(isset($_POST['recuperaremail'])){

$novasenha = substr(md5(atime()), 0, 20 );
}
echo substr(md5(time()), 0, 10);
?>
