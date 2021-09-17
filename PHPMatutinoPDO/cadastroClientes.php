<?php
include_once './controller/ClientesController.php';
include_once './model/Clientes.php';
include_once './model/Mensagem.php';
include_once './bd/Conecta.php';
$ce = new Clientes();
$msg = new Mensagem();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro Salão & Barbearia Neves</title>
    <link rel="stylesheet" href="./css/styleProjetin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font/awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <div class="container">

        <div class="title"><span><b>C</b></span>adastro</div>


        <?php
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if (isset($_POST['cadastrar'])) {
            $senha = trim($_POST['senha']);
            if ($senha != "") {

                $nome = $_POST['nome'];
                $sexo = $_POST['sexo'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
            }


            $cc = new ClientesController();
            unset($_POST['cadastrar']);
            $msg = $cc->inserirClientes(

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


        ?>




        <form method="post" action="">
            <div class="detalhes-usuario">
                <div class="input-box">

                    <?php
                    if ($ce != null) {
                        echo $ce->getId();
                    ?>

                        <input type="hidden" name="idclientes" value="<?php echo $ce->getId() ?>">
                    <?php
                    }
                    ?>
                    <span>Nome Completo</span>
                    <input type="text" placeholder="Digite seu nome" name="nome" required value="<?php echo $ce->getNome(); ?>">
                </div>

                <div class="input-box">
                    <span class="detalhes">Email</span>
                    <input type="email" placeholder="Digite seu email" name="email" required value="<?php echo $ce->getEmail(); ?>">
                </div>


                <div class="input-box">
                    <span class="detalhes">Telefone Celular </span>
                    <input type="text" placeholder="Digite seu telefone celular" name="telefone" required value="<?php echo $ce->getTelefone(); ?>">
                </div>
                <div class="input-box">
                    <span class="detalhes">Senha</span>
                    <input type="password" placeholder="Digite sua senha" name="senha" id="senha" required value="<?php echo $ce->getSenha(); ?>">

                </div>

                <span class="p-viewer2">
                    <i class="fa fa-eye" aria-hidden="true" id="olho" style="color: #000000;" onclick="toggle()"></i>
                    <i class="far fa-eye-slash" id="risco" onclick="toggle()"></i>
                </span>

            </div>

            <div class="genero">
                <input type="radio" name="sexo" id="ponto-1" value="Masculino" value="<?php echo $ce->getSexo(); ?>" required>
                <input type="radio" name="sexo" id="ponto-2" value="Feminino" value="<?php echo $ce->getSexo(); ?>" required>
                <span class="seu-genero">Gênero</span>
                <div class="categoria">
                    <label for="ponto-1">
                        <span class="ponto um"></span>
                        <span class="generoMas">Masculino</span>
                    </label>
                    <label for="ponto-2" name="sexo" value="Feminino">
                        <span class="ponto dois"></span>
                        <span class="generoMas" value="Feminino">Feminino</span>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn efeito-btn" name="cadastrar">Cadastrar</button>
        </form>
    </div>

    <script>
        function toggle() {
            var x = document.getElementById("senha");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById("risco").style.display = "inline-block";
                document.getElementById("olho").style.display = 'none';
                document.getElementById("risco").style.color ='#000000';
                document.getElementById("olho").style.color ='#000000';
            } else {
                x.type = "password";
                document.getElementById("risco").style.display = 'none';
                document.getElementById("olho").style.display = 'inline-block';
                document.getElementById("risco").style.color ='#000000';
                document.getElementById("olho").style.color ='#000000';
            }
        }
    </script>


</body>

</html>