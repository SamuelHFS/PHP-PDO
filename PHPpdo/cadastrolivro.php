<?php
#include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/livro.php';
#include_once 'C:/xampp/htdocs/ProAcademia/PHP/controller/LivroController.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPpdo/model/livro.php';
include_once 'C:/xampp/htdocs/ProAcademia/PHPpdo/controller/LivroController.php';
#include_once 'C:/xampp/htdocs/PAcademia/PHP/controller/LivroController.php'; #casa
#include_once 'C:/xampp/htdocs/PAcademia/PHP/model/livro.php'; #casa


$pr = new Livro();
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

                <div class="card-header bg-light text-center border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Livro
                </div>
                <?php
                //envio dos dados para o BD
                if (isset($_POST['cadastrarLivro'])) {

                    $titulo = trim($_POST['titulo']);
                    if ($titulo != "") {
                        $autor = $_POST['autor'];
                        $editora = $_POST['editora'];
                        $qtdEstoque = $_POST['qtdEstoque'];

                        $pc = new LivroController();
                        unset($_POST['cadastrarLivro']);
                        echo "<p>" . $pc->inserirLivro(
                            $titulo,
                            $autor,
                            $editora,
                            $qtdEstoque
                        ) . "</p>";
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                URL='cadastrolivro.php'\">";
                    }
                }
                //método para atualizar dados do produto no BD
                if (isset($_POST['atualizarLivro'])) {
                    $titulo = trim($_POST['titulo']);
                    if ($titulo != "") {
                        $id = $_POST['id'];
                        $autor = $_POST['autor'];
                        $editora = $_POST['editora'];
                        $qtdEstoque = $_POST['qtdEstoque'];

                        $lc = new LivroController();
                        unset($_POST['atualizarLivro']);
                        echo $lc->atualizarLivro(
                            $id,
                            $titulo,
                            $autor,
                            $editora,
                            $qtdEstoque
                        );
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                        URL='cadastrolivro.php'\">";
                    }
                }
                if (isset($_POST['excluirLivro'])) {
                    if ($pr != null) {
                        $id = $_POST['id'];

                        $lc = new LivroController();
                        $lc->excluirLivro($id);
                    }
                }

                if (isset($_POST['limpar'])) {
                    $pr = null;
                    unset($_GET['id']);
                    header("Location: cadastrolivro.php");
                    #$lc2 = new LivroController();
                    #$pr = $lc2->limpar();
                    #unset($_POST['limpar']);
                    #$_GET = null;
                    #echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                    #URL='cadastrolivro.php'\">";
                }
                if (isset($_GET['id'])) {
                    $btEnviar = TRUE;
                    $btAtualizar = TRUE;
                    $btExcluir = TRUE;
                    $id = $_GET['id'];
                    $lc = new LivroController();
                    $pr = $lc->pesquisarLivroId($id);
                }


                ?>

                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <strong>Código: <label style="color:blue;">
                                        <?php
                                        if ($pr != null) {
                                            echo $pr->getId();
                                        ?>
                                    </label></strong>
                                <input type="hidden" name="id" value="<?php echo $pr->getId(); ?>"><br>
                            <?php
                                        }
                            ?>
                            <label>Título: </label>
                            <input class="form-control" type="text" name="titulo" value="<?php echo $pr->getTitulo(); ?>">
                            <label>Autor</label>
                            <input class="form-control" type="text" name="autor" value="<?php echo $pr->getAutor(); ?>">
                            <label>Editora</label>
                            <input class="form-control" type="text" name="editora" value="<?php echo $pr->getEditora(); ?>">
                            <label>Quantidade Estoque</label>
                            <input class="form-control" type="number" name="qtdEstoque" value="<?php echo $pr->getQtdEstoque(); ?>">

                            <!--Mudar o NAME do BOTÃO por conta do cache do navegador-->
                            <input type="submit" name="cadastrarLivro" class="btn btn-success btInput" value="Enviar" <?php if ($btEnviar == TRUE) echo "disabled"; ?>>
                            <input type="submit" name="atualizarLivro" class="btn btn-light btInput" value="Atualizar" <?php if ($btAtualizar == FALSE) echo "disabled"; ?>>
                            <button type="button" class="btn btn-warning btInput" data-bs-toggle="modal" data-bs-target="#ModalExcluir" <?php if ($btExcluir == FALSE) echo "disabled"; ?>>
                                Excluir
                            </button>
                            <!-- Modal para excluir -->
                            <div class="modal fade" id="ModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Confirmar Exclusão</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Deseja Excluir?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="excluirLivro" class="btn btn-success " value="Sim">
                                            <input type="submit" class="btn btn-light btInput" name="limpar" value="Não">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim do modal para excluir -->
                            &nbsp;&nbsp;
                            <input type="submit" class="btn btn-danger btInput" name="limpar" value="Limpar">


                            </div>
                            <div class="container-fluid ">
                                <div class="row" style="margin-top: 30px;">
                                    <table class="table table-striped table-responsive">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Código</th>
                                                <th>titulo</th>
                                                <th>autor</th>
                                                <th>editora</th>
                                                <th>Quantidade estoque</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pcTable = new LivroController();
                                            $listaLivros = $pcTable->listarLivros();
                                            $a = 0;
                                            if ($listaLivros != null) {
                                                foreach ($listaLivros as $li) {
                                                    $a++;
                                            ?>
                                                    <tr>
                                                        <td><?php print_r($li->getId()); ?></td>
                                                        <td><?php print_r($li->getTitulo()); ?></td>
                                                        <td><?php print_r($li->getAutor()); ?></td>
                                                        <td><?php print_r($li->getEditora()); ?></td>
                                                        <td><?php print_r($li->getQtdEstoque()); ?></td>

                                                        <td><a class="btn btn-light" href="cadastrolivro.php?id=<?php echo $li->getId(); ?>">
                                                                Editar</a>
                                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                                                Deletar</button>
                                                        </td>
                                                    </tr>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="get" action="controller/excluiLivro.php">
                                                                        <label><strong>Deseja Excluir o livro TROLADO? OptionPane.
                                                                                <?php echo $li->getTitulo(); ?>?</strong></label>
                                                                        <input type="hidden" name="ide" value="<?php echo $li->getId(); ?>">


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Sim</button>
                                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
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
    </form>
    </div>
    </div>
    </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
</body>

</html>