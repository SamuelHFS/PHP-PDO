<?php
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/controller/PessoaController.php';
include_once 'C:/xampp/htdocs/PHPPDO/PHPMatutinoPDO/model/Pessoa.php';
include_once './model/Endereco.php';
include_once './model/Mensagem.php';
$msg = new Mensagem();
$en = new Endereco();
$pe = new Pessoa();
$pe->setfkEndereco($en);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
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
                   /*$idpessoa = $_POST['idpessoa'];*/
                    /*$nome = $_POST['nome'];*/
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
            //método para atualizar dados do produto no BD
            if (isset($_POST['atualizarPessoa'])) {
                $nome = trim($_POST['nome']);
                if ($nome != "") {
                    $idpessoa = $_POST['idpessoa'];
                    $logradouro = $_POST['logradouro'];
                    $complemento = $_POST['complemento'];
                    $bairro = $_POST['bairro'];
                    $cidade = $_POST['cidade'];
                    $uf = $_POST['uf'];
                    $cep = $_POST['cep'];

                    $dtNasc = $_POST['dtNasc'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $perfil = $_POST['perfil'];
                    $cpf = $_POST['cpf'];
                    $email = $_POST['email'];

                    $pc = new PessoaController();
                    unset($_POST['atualizarPessoa']);
                    $msg = $fc->atualizarFornecedor($idpessoa, $nome,
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
                    $uf);
                    echo $msg->getMsg();
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                        URL='cadastro.php'\">";
                }
            }
            if (isset($_POST['excluir'])) {
                if ($pe != null) {
                    $id = $_POST['ide'];
                    
                    $pc = new PessoaController();
                    unset($_POST['excluir']);
                    $msg = $pc->excluirPessoa($id);
                    echo $msg->getMsg();
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                        URL='cadastro.php'\">";
                }
            }
            if (isset($_POST['excluirPessoa'])) {
                if ($pe != null) {
                    $id = $_POST['idpessoa'];
                    unset($_POST['excluirPessoa']);
                    $pc = new PessoaController();
                    $msg = $pc->excluirPessoa($id);
                    echo $msg->getMsg();
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                        URL='cadastro.php'\">";
                }
            }
            if (isset($_POST['limpar'])) {
                $pe = null;
                unset($_GET['id']);
                header("Location: cadastro.php");
            }
            if (isset($_GET['id'])) {
                $btEnviar = TRUE;
                $btAtualizar = TRUE;
                $btExcluir = TRUE;
                $id = $_GET['id'];
                $pc = new PessoaController();
                $pe = $pc->pesquisarPessoaId($id);
            }
            
                ?>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6">
                            <strong>Código: <label style="color:red;">
                                            <?php
                                            if ($pe != null) {
                                                echo $pe->getIdPessoa();
                                                ?>
                                            </label></strong>
                                        <input type="hidden" name="idpessoa" 
                                               value="<?php echo $pe->getIdPessoa(); ?>"><br>
                                               <?php
                                           }
                                           ?>  
                           
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
                                <select name="perfil" type="text" class="form-select" >
                                    <option hidden>Selecione</option>
                                    <option>
                                    <?php
                                         if($pe->getPerfil() == "Cliente"){
                                             echo "selected = 'selected'";
                                         }?>Cliente</option>

                                    <option>
                                    <?php
                                         if($pe->getPerfil() === "Funcionário"){
                                             echo "selected = 'selected'";
                                         }?>Funcionáro</option>
                                
                                </select>
                            </div>
                        </div>
                        <hr class="featurette-divider ">
                        <div class="card-header bg-light text-center border" style="padding-bottom: 15px; padding-top: 15px;">
                            Preencha seu endereço
                        </div>

                        <div class="card-body ">
                
                                <div class="row">
                                 
                                <label>Código: </label> <br>
                                
                                <div class="col-md-6">
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
                                        
                                           <input type="submit" name="cadastrarPessoa"
                                           class="btn btn-success btInput" value="Enviar"
                                           <?php if($btEnviar == TRUE) echo "disabled"; ?>>
                                    <input type="submit" name="atualizarPessoa"
                                           class="btn btn-secondary btInput" value="Atualizar"
                                           <?php if($btAtualizar == FALSE) echo "disabled"; ?>>
                                    <button type="button" class="btn btn-warning btInput" 
                                            data-bs-toggle="modal" data-bs-target="#ModalExcluir"
                                            <?php if($btExcluir == FALSE) echo "disabled"; ?>>
                                        Excluir
                                    </button>
                                     <!-- Modal para excluir -->
                                     <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" 
                                                        id="exampleModalLabel">
                                                        Confirmar Exclusão</h5>
                                                    <button type="button" 
                                                            class="btn-close" 
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Deseja Excluir?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="excluirPessoa"
                                                           class="btn btn-success "
                                                           value="Sim">
                                                    <input type="submit" 
                                                        class="btn btn-light btInput" 
                                                        name="limpar" value="Não">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fim do modal para excluir -->
                                    &nbsp;&nbsp;
                                    <input type="submit" 
                                           class="btn btn-light btInput" 
                                           name="limpar" value="Limpar">
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-10 offset-1">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-responsive"
                               style="border-radius: 3px; overflow:hidden;">
                            <thead class="table-dark">
                                <tr><th>Código</th>
                                    <th>Nome</th>
                                    <th>Data de Nasc</th>
                                    <th>Perfil</th>
                                    <th>Email</th>
                                    <th>CPF</th>
                                    <th>UF</th>
                                    <th>CEP</th>
                                    <th colspan="2">Ações</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                $pcTable = new PessoaController();
                                $listarPessoas = $pcTable->listarPessoas();
                                $a = 0;
                                if ($listarPessoas != null) {
                                    foreach ($listarPessoas as $lp) {
                                        $a++;
                                        ?>
                                        <tr>
                                            <td><?php print_r($lp->getIdPessoa()); ?></td>
                                            <td><?php print_r($lp->getNome()); ?></td>
                                            <td><?php print_r($lp->getDtNasc()); ?></td>
                                            <td><?php print_r($lp->getPerfil()); ?></td>
                                            <td><?php print_r($lp->getEmail()); ?></td>
                                            <td><?php print_r($lp->getCpf()); ?></td>
                                            <td><?php print_r($lp->getfkEndereco()->getUf()); ?></td>
                                            <td><?php print_r($lp->getfkEndereco()->getCep()); ?></td>
                                            <td><a href="cadastro.php?id=<?php echo $lP->getIdPessoa(); ?>"
                                                   class="btn btn-light">
                                                    <img src="img/edita.png" width="24"></a>
                                                </form>
                                                <button type="button" 
                                                        class="btn btn-light" data-bs-toggle="modal" 
                                                        data-bs-target="#exampleModal<?php echo $a; ?>">
                                                    <img src="img/delete.png" width="24"></button></td>
                                        </tr>
                                        <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" 
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir a Pessoa 
                                                                <?php echo $lp->getNome(); ?>?</strong></label>
                                                        <input type="hidden" name="ide" 
                                                               value="<?php echo $lp->getIdPessoa(); ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                            <button type="reset" class="btn btn-secondary" 
                                                                    data-bs-dismiss="modal">Não</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jQuery.js"></script>
        <script src="js/jQuery.min.js"></script>
        <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script>
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