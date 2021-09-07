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
                    <label >Nome Completo</label>
                    <input type="text" placeholder="Digite seu nome" name="nome" value="<?php echo $ce->getNome(); ?>">
                </div>
                <div class="input-box">
                    <label class="detalhes">Login</label>
                    <input type="text" placeholder="Digite seu login" name="login" value="<?php echo $ce->getLogin(); ?>">
                </div>
                <div class="input-box">
                    <label class="detalhes">Email</label>
                    <input type="email" placeholder="Digite seu email" name="email" value="<?php echo $ce->getEmail(); ?>">
                </div>
                <div class="input-box">
                    <label class="detalhes">Telefone</label>
                    <input type="text" placeholder="Digite seu telefone" name="telefone" value="<?php echo $ce->getTelefone(); ?>">
                </div>
                <div class="input-box">
                    <label class="detalhes">Senha</label>
                    <input type="password" placeholder="Digite sua senha" name="senha" value="<?php echo $ce->getSenha(); ?>">
                </div>
                <div class="input-box">
                    <label class="detalhes">Confirmar Senha</label>
                    <input type="password" placeholder="Confirme sua senha" name="senha2" >
                </div>
                <div class="input-box">
                    <label class="detalhes">Sexo</label>
                    <input type="text" placeholder="Confirme seu sexo" name="sexo"  value="<?php echo $ce->getSexo(); ?>">
                </div>
            </div>
            
            <button type="submit" class="btn efeito-btn" name="cadastarclientes">Cadastrar</button>
        
        </form>
    
    </div>
    

    <a class="whatsapp-link"
    href="https://web.whatsapp.com/send?phone=559891355162"
    target="_blank">
    <i class="fa fa-whatsapp"></i>
</a>
</body>

</html>