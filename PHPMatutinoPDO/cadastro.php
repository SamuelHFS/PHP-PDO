<?php
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/controller/PessoaController.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Pessoa.php';
include_once './model/Endereco.php';
include_once './model/Mensagem.php';

$pe = new Pessoa();
$en = new Endereco();
$msg = new Mensagem();
$pe->setfkEndereco($en);
$btEnviar = FALSE;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            padding: 10px 20px 10px 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
    <script>
            function mascara(t, mask){
                var i = t.value.length;
                var saida = mask.substring(1,0);
                var texto = mask.substring(i)
                
                if (texto.substring(0,1) != saida){
                    t.value += texto.substring(0,1);
                }
            }
        </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-8 offset-2">

                <div class="card-header bg-dark text-center text-white border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Cliente
                </div>
                <?php
                //envio dos dados para o BD

                if (isset($_POST['cadastrar'])) {
                    $nome = trim($_POST['nome']);
                    if ($nome != ""){
                    $idpessoa = $_POST['idpessoa'];
                    $nome = $_POST['nome'];
                    $dtNasc = $_POST['dtNasc'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $perfil = $_POST['perfil'];
                    $cpf = $_POST['cpf'];
                    $email = $_POST['email'];
                    $cep = $_POST['cep'];
                    $logradouro = $_POST['logradouro'];
                    $complemento = $_POST['complemento'];
                    $bairro = $_POST['bairro'];
                    $cidade = $_POST['cidade'];
                    $uf = $_POST['uf'];

                    $pe = new PessoaController();
                    unset($_POST['cadastrar']);
                    $msg = $pe->inserirPessoa(
                        $nome,
                        $dtNasc,
                        $login,
                        $senha,
                        $perfil,
                        $email,
                        $cpf, 
                        $cep, 
                        $logradouro , 
                        $complemento , 
                        $bairro, 
                        $cidade, 
                        $uf
                    );
                    echo $msg->getMsg();
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastro.php'\">";
                }
            }
            
                ?>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6"><br>
                           
                                <label>Nome Completo</label>
                                <input class="form-control" type="text" name="nome" value="<?php echo $pe->getNome(); ?>">
                                <label>Data de Nascimento</label>
                                <input class="form-control" type="date" name="dtNasc" value="<?php echo $pe->getDtNasc(); ?>">
                                <label>E-Mail</label>
                                <input class="form-control" type="email" name="email" value="<?php echo $pe->getEmail(); ?>">
                                <label>CPF</label>
                                <input class="form-control" type="text" name="cpf" value="<?php echo $pe->getCpf(); ?>">
                            </div>

                            <div class="col-md-6"><br>


                                <label>Login</label>
                                <input class="form-control" type="text" name="login" value="<?php echo $pe->getLogin(); ?>">
                                <label>Senha</label>
                                <input class="form-control" type="password" name="senha" value="<?php echo $pe->getSenha(); ?>">
                                <label>Conf. Senha</label>
                                <input class="form-control" type="password" name="senha2" >
                                <label>Perfil</label>
                                <select name="perfil" class="form-select" >
                                    <option hidden>Selecione</option>
                                    <option value="<?php echo $pe->getPerfil(); ?>">Cliente</option>
                                    <option value="<?php echo $pe->getPerfil(); ?>">Funcionário</option>
                                </select>
                            </div>
                        </div>
                        <hr class="featurette-divider ">
                        <div class="card-header bg-light text-center border" style="padding-bottom: 15px; padding-top: 15px;">
                            Preencha seu endereço
                        </div>

                        <div class="card-body ">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                       
                                       <strong>Código: <label style="color:red;">
                                            <?php
                                            if ($en != null) {
                                                echo $en->getIdEndereco();
                                                ?>
                                            </label></strong>
                                        <input type="hidden" name="idEndereco" 
                                               value="<?php echo $en->getIdEndereco(); ?>"><br>
                                               <?php
                                           }
                                           ?>  
                                        <label>CEP</label>
                                        <label id="valCep" style="color: red; font-size: 11px;"></label>
                                        <input class="form-control" type="text" name="cep" id="cep" 
                                           onkeypress="mascara(this, '#####-###')" maxlength="9"
                                           value="<?php echo $pe->getfkendereco()->getCep(); ?>">

                                        <label>Logradouro</label>
                                        <input class="form-control" type="text" name="logradouro"id="rua"
                                           value="<?php echo $pe->getfkEndereco()->getLogradouro(); ?>">
                                        <label>Complemento</label>
                                        <input class="form-control" type="text" name="complemento" id="complemento"
                                           value="<?php echo $pe->getfkEndereco()->getComplemento(); ?>">
                                    </div>

                                    <div class="col-md-6"><br>
                                   

                                        <label>Bairro</label>
                                        <input class="form-control" type="text" name="bairro" id="bairro"
                                           value="<?php echo $pe->getfkEndereco()->getBairro(); ?>">
                                        <label>Cidade</label>
                                        <input class="form-control" type="text" name="cidade" id="cidade"
                                           value="<?php echo $pe->getfkEndereco()->getCidade(); ?>">
                                        <label>UF</label>
                                        <input class="form-control" type="text" name="uf" id="uf"
                                           value="<?php echo $pe->getfkEndereco()->getUf(); ?>">
                                        
                                    </div>
                                </div>
                                <div class="col-6 offset-4">
                                    <input type="submit" name="cadastrar" class="btn btn-success btInput" value="Enviar">
                                    &nbsp;&nbsp;
                                    <input type="reset" class="btn btn-light btInput" value="Limpar">
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jQuery.js"></script>
        <script src="js/jQuery.min.js"></script>
        <!-- controle de endereço (ViaCep) -->
    <script>

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#cepErro").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        document.getElementById("valCep").innerHTML = "* CEP não encontrado";
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                document.getElementById("valCep").innerHTML = "* Formato inválido";

            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>
</body>

</html>