<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/fontawesome/css/all.min.css">
    <title>Cadastro | Projetin Felas</title>
</head>
<body>
    <div class="box">
        
        <form  method="POST" action="PHP/conecta.php">
            <fieldset >
             <legend ><b>Cadastro</b></legend> 
                <br>
                <div class="form-col-1">
                <div class="inputBox">                              <!--placeholder="Nome Completo"-->
                    <input type="text" name="nome" id="nome" class="inputUser"   required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput"  >Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone"   class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                <br><br>   
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser"  required> 
                    <label for="cpf" class="labelInput"  ><b>CPF: </b></label>
                </div>
            </div>

                <br>
                
                <div class="inputBox">
                    <input type="text" name="sexo" id="sexo" class="inputUser" required>
                    <label for="endereco" class="labelInput">Sexo</label>
                </div>
                <br><br><br>
                </div>
                
                <div class="form-col-2">
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label for="endereco" class="labelInput">CEP</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco"  class="inputUser" required>
                    <label for="endereco" class="labelInput">Endere??o</label>
                </div>
                <br><br>
                <div class="inputBox"> 
                    <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" class="data" name="nascimento" id="nascimento" required>
                    <br><br>
                </div>
                
                <div class="inputBox">
                    <label for="escolha_estado" class="form-label">Estado: </label>
                    <select id="estado" name="estado" class="formselect" required>
                        <option selected="" value="">Selecione o Estado (UF)</option>
                        <option value="Acre">Acre</option>
                        <option value="Alagoas">Alagoas</option>
                        <option value="Amap??">Amap??</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Bahia">Bahia</option>
                        <option value="Cear??">Cear??</option>
                        <option value="Distrito Federal">Distrito Federal</option>
                        <option value="Esp??rito Santo">Esp??rito Santo</option>
                        <option value="Goi??s">Goi??s</option>
                        <option value="Maranh??o">Maranh??o</option>
                        <option value="Mato Grosso">Mato Grosso</option>
                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                        <option value="Minas Gerais">Minas Gerais</option>
                        <option value="Par??">Par??</option>
                        <option value="Para??ba">Para??ba</option>
                        <option value="Paran??">Paran??</option>
                        <option value="Pernambuco">Pernambuco</option>
                        <option value="Piau??">Piau??</option>
                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                        <option value="Rond??nia">Rond??nia</option>
                        <option value="Roraima">Roraima</option>
                        <option value="Santa Catarina">Santa Catarina</option>
                        <option value="S??o Paulo">S??o Paulo</option>
                        <option value="Sergipe">Sergipe</option>
                        <option value="Tocantins">Tocantins</option>
                    </select>
                </div>
                </div>
                <input type="submit" name="submit" id="submit">
                <br><br>
                <div class="teste">
                <a href="login.html" style="color:#ff0000" >voltar</a>
                </div>
                <div class="testandoHome">
                    <a href="index.html" style="color:#ff0000" >Home</a>
                   </div>
                
            </fieldset>
        </form>
 
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/fontawesome/js/all.min.js"></script>
</body>

</html>