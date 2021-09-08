<?php
include_once './controller/ClientesController.php';
include_once './model/Clientes.php';
include_once './model/Mensagem.php';
$ce = new Clientes();
$msg = new Mensagem();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro Salão & Barbearia Neves</title>
    <link rel="stylesheet" href="./css/styleProjetin.css">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    
    <div class="container">
        
        <div class="title" ><span><b>C</b></span>adastro</div>
        
        <?php
        if(isset($_POST['cadastrar'])){
            $login = trim($_POST['login']);
            if ($login != ""){
            
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            $sexo = $_POST['sexo'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            $cc = new ClientesController();
            unset($_POST['cadastar']);
            $msg = $cc->inserirClientes(
                $login,
                $senha,
                $nome,
                $sexo,
                $email,
                $telefone
            );
            echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastroClientes.php'\">";
            }
        }
        ?>

        <form method="post" action="">
            <div class="detalhes-usuario">
                <div class="input-box">
                    
                    <?php
                    if($ce != null){
                        echo $ce->getId();
                        ?>
                        
                    <input type="hidden" name="idclientes"
                    value="<?php echo $ce->getId() ?>">
                    <?php
                    }
                    ?>
                    <spam >Nome Completo</spam>
                    <input type="text" placeholder="Digite seu nome" name="nome" value="<?php echo $ce->getNome(); ?>">
                </div>
                <div class="input-box">
                    <spam class="detalhes">Login</spam>
                    <input type="text" placeholder="Digite seu login" name="login" value="<?php echo $ce->getLogin(); ?>">
                </div>
                <div class="input-box">
                    <spam class="detalhes">Email</spam>
                    <input type="email" placeholder="Digite seu email" name="email" value="<?php echo $ce->getEmail(); ?>">
                </div>
                <div class="input-box">
                    <spam class="detalhes">Telefone</spam>
                    <input type="text" placeholder="Digite seu telefone" name="telefone" value="<?php echo $ce->getTelefone(); ?>">
                </div>
                <div class="input-box">
                    <spam class="detalhes">Senha</spam>
                    <input type="password" placeholder="Digite sua senha" name="senha" value="<?php echo $ce->getSenha(); ?>">
                </div>
                <div class="input-box">
                    <spam class="detalhes">Confirmar Senha</spam>
                    <input type="password" placeholder="Confirme sua senha" name="senha2" >
                </div>
            </div>
            <div class="genero">
                <input type="radio" name="sexo" id="ponto-1" value="<?php echo $ce->getSexo() ;?>">
                <input type="radio" name="sexo" id="ponto-2" value="<?php echo $ce->getSexo();?>">
                <span class="seu-genero">Gênero</span>
                <div class="categoria">
                    <label for="ponto-1" >
                        <span class="ponto um"></span>
                        <span class="generoMas" >Masculino</span>
                    </label>
                    <label for="ponto-2" >
                        <span class="ponto dois" ></span>
                        <span class="generoMas" >Feminino</span>
                    </label>
                </div>
            </div> 
            
            
            <button type="submit" class="btn efeito-btn" name="cadastrar">Cadastrar</button>
        
        </form>
    
    </div>
    

    <a class="whatsapp-link"
    href="https://web.whatsapp.com/send?phone=559891355162"
    target="_blank">
    <i class="fa fa-whatsapp"></i>
</a>
</body>

</html>