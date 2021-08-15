<?php
ob_start();
session_start();

if((!isset($_SESSION['loginp']) || !isset($_SESSION['nomep'])) ||
        !isset($_SESSION['perfilp']) || !isset($_SESSION['nr']) ||
        ($_SESSION['nr'] != $_SESSION['confereNr'])) { 
    // Usuário não logado! Redireciona para a página de login 
    header("Location: sessionDestroy.php");
    exit;
}
include_once './controller/PessoaController.php';
include_once './model/Pessoa.php';
include_once './model/Endereco.php';
include_once './model/Mensagem.php';
$msg = new Mensagem();
$en = new Endereco();
$pe = new Pessoa();
$pe->setFkendereco($en);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Academia Projetin Felas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!--<link rel="stylesheet" href="css/responsiveIMG.css">-->
  <!--<link rel="stylesheet" href="css/responsive.css">-->
  <!--<link rel="preconnect" href="https://fonts.gstatic.com">-->
  <link rel="stylesheet" href="css/style.css">

  
    <link href="carrousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
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

  
  <header>

  <?php
            include_once './nav.php';
            echo navBar();
        ?>
        <div class="container">
        <label id="cepErro" style="color:red;"></label>
        <div class="container-fluid">
            <div class="row" style="margin-top: 30px;">
                <?php
                if(isset($_SESSION['msg'])){
                    if($_SESSION['msg']!=""){
                        echo $_SESSION['msg'];
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                              URL='./principal.php'\">";
                        $_SESSION['msg'] = "";
                    }
                }
                
                ?>
                <p>Bem-vindo, <?php echo $_SESSION['nomep'];?>!</p>
                <p><?php echo $_SESSION['idp'];?></p>
                <p><?php echo $_SESSION['loginp'];?></p>
                <p><?php echo $_SESSION['perfilp'];?></p>
                <?php
                    if($_SESSION['perfilp'] == "Cliente"){
                        echo "<h3 style='color:blue';>
                        Você é nosso melhor cliente</h3>";
                    }else{
                        echo "<h3 style='color:blue';>
                        Você é nosso melhor Funcionário</h3>";
                    }
                ?>
        </div>     
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark
            bg-dark m5">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Academia Projetin Felas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Login</a>
            </li>
            
              <a class="nav-link" href="#">Vantagens</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastro.php" aria-disabled="true">Faça seu Projetin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Contato</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
   </header>
   <main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>  
          <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="3000">
                <img src="img/acade.jpg" class="d-block w-100" alt="Treino de Peito">
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="img/academia.jpg" class="d-block w-100" alt="Treino de Bíceps">
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="img/testezin.jpg" class="d-block w-100" alt="Modelo Fitness">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    <div class="container">
      <div class="row" style="text-align: center;">
        <div class="col-lg-4">
          <img src="img/costas.jpg" class="rounded-circle" width="140" height="140"
            style="margin-top: -3%; z-index: 10; position: relative;" alt="Costas">
          <h2>Costas</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor vel velit egestas maximus. Sed
            aliquam elit et orci tempor luctus.
            <em>Projetin Felas</em>
          </p>
          <p>
            <a href="cadastro.php"  class="btn btn-success">Saiba Mais >></a>
          </p>
        </div>
        <div class="col-lg-4">

          <img src="img/costas.jpg" class="rounded-circle" width="140" height="140"
            style="margin-top: -3%; z-index: 10; position: relative;" alt="Costas">
          <h2>Costas</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor vel velit egestas maximus. Sed
            aliquam elit et orci tempor luctus.
            <em>Projetin Felas</em>
          </p>
          <p>
            <a hreg="" class="btn btn-success">Saiba Mais >></a>
          </p>

        </div>
        <div class="col-lg-4">

          <img src="img/costas.jpg" class="rounded-circle  border-dark" width="140" height="140"
            style="margin-top: -3%; z-index: 10; position: relative;" alt="Costas">
          <h2>Costas</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor vel velit egestas maximus. Sed
            aliquam elit et orci tempor luctus.
            <em>Projetin Felas</em>
          </p>
          <p>
            <a href="cadastro.php" class="btn btn-success">Saiba Mais >></a>
          </p>
        </div>
      </div>
      <!--DIV ROW-->
   
    <!--CLASS CONTAINER-->

    <hr class="featurette-divider">

    <div class="row featurette bg-dark">
      <div class="col-md-7">
        <h2 class="featurette-heading" style="color: rgb(255, 0, 0);">First featurette heading. <span
            class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead" style="color: white;">Some great placeholder content for the first featurette here. Imagine some
          exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <img src="img/academiarefor.jpg" class="d-block w-100" alt="Treino de Bíceps">
        
      </div>
    </div>
    
    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this
          layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="img/agachamento.jpg" class="d-block w-100" alt="Treino  Bíceps">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Free</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>10 users included</li>
              <li>2 GB of storage</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">Pro</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 users included</li>
              <li>10 GB of storage</li>
              <li>Priority email support</li>
              <li>Help center access</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal">Enterprise</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>30 users included</li>
              <li>15 GB of storage</li>
              <li>Phone and email support</li>
              <li>Help center access</li>
            </ul>
            <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
          </div>
        </div>
      </div>
    </div>
 
  </main>
 
  <footer>

  </footer></main>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
    crossorigin="anonymous"></script>
</body>

</html>