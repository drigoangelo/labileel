
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Cadastro de usuário</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
function disableOther() {
  document.getElementById("inputOther").style.visibility = "hidden"; 
  document.getElementById("inputOther").setAttribute("disabled","disabled");
}
function enableOther() {
  document.getElementById("inputOther").style.visibility = "visible"; 
  document.getElementById("inputOther").removeAttribute("disabled");
}
    </script>

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">

          <h3 class="text-muted">LabVirtual</h3>


        <h3 class="text-muted"></h3>
      </div>
        
        <! -- //Corpo do formulário -->
      <form action="send.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nome</label>
                  <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
                </div>
                <div class="form-group col-md-6">
                      <label for="inputPassword4">Sobrenome</label>
                  <input name="sobrenome" type="text" class="form-control" id="inputPassword4" placeholder="Sobrenome">
                </div>
              </div>

              <div class="form-group col-md-3">
                <label for="inputAddress">CPF</label>
                <input name="cpf" type="text" class="form-control" id="inputAddress"  placeholder="CPF">
              </div>


              <div class="form-row">
                  <div class="form-row">
                      <label class="form-group col-md-3" for="inlineFormInputName2">Senha</label>
                      <input name="senha" type="password" class="form-control" id="senha" placeholder="Password">

                      <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                      <div class="input-group mb-2 mr-sm-2">
                      </div>
                      </div>
              </div>

              <div class="form-row">
                      <div class="form-inline">

                              <!-- <label class="sr-only" for="inlineFormInputName2"></label>
                              <input name="email1" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="email">

                              <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                              <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">@</div>
                                </div>
                           disableOther()     <input name="email2" type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Ex: ileel.com">
                              </div>

                              <div class="form-check mb-2 mr-sm-2">
                              </div>
-->
                              <label class="sr-only" for="inlineFormInputName2"></label>
                              <input name="email1" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="email">

                              
                            </div>
              </div>



              <div class="form-group">
                <label for="inputAddress2">Data de Nascimento</label>
                <input name="nascimento" type="date" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
              </div>

              <div class="form-group col-md-4">
                      <label for="inputState">Sexo</label>
                      <select name="sexo" id="inputState" class="form-control">
                        <option selected></option>
                        <option name="Feminino" onclick="disableOther()">Feminino</option>
                        <option name="Masculino" onclick="disableOther()">Masculino</option>
                        <option name="Outro" onclick="enableOther()">Outro</option>
                        <input name="outro" type="text" class="form-control" id="inputOther" placeholder="Sexo" disabled>
                          <script type="text/javascript">
                            disableOther();
                          </script>
                        </select>
                    </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputCity">Nacionalidade</label>
                  <input name="nacionalidade" type="text" class="form-control" id="inputCity">
                </div>

                <div class="form-group col-md-2">
                      <label for="inputZip">Cidade</label>
                      <input name="cidade" type="text" class="form-control" id="inputZip">
                    </div>

                <div class="form-group col-md-2">
                      <label for="inputZip">UF</label>
                      <input name="uf" type="text" class="form-control" id="inputZip">
                    </div>
              </div>


              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Check me out
                  </label>
                </div>
              </div>
              <button name="btn" type="submit" class="btn btn-outline-primary">Cadastrar</button>
      </form>
      
      <footer class="footer">
        <p>&copy; 2018 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->

    <div class="modal" id="siteModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title">Termo de Compromisso</h5>

            </div>

            <div class="modal-body">
              <p>
                
              </p>
            </div>

            <div class="modal-footer">
              <button type="button" class="close" data-dismiss="modal">
                <spam>x</spam>
              </button>
          </div>

          </div>
      </div>
    </div>


    <script scr="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script scr="../js/bootstrap.min.js"></script>

  </body>
</html>
