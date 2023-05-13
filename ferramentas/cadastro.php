<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
  <title>Cadastro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- sait dos alerts: https://sweetalert2.github.io/#icons -->
</head>
<body>
  <div class="container">
    <div class="form-image">
      <img src="../img/mobile-login-animate.svg">  
    </div>
    <div class="form">
        <form action="#" action="upload.php" enctype="multipart/form-data">
            <div class="form-header">
                <div class="title">
                    <h1>Cadastre-se</h1>
                </div>
                <div class="login-button">
                     <a href="../index.php">Login</a>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <label for="nome">Nome</label>
                    <input id="nomecom" type="text" name="nome" placeholder="Digite seu Nome" class="inputs required" oninput="nomeValido()">
                    <span class="span-required">Preencha esse campo</span>                
                </div>
                <div class="input-box">
                    <label for="Login">Login</label>
                    <input id="username" type="text" name="Login" placeholder="Digite seu Login" class="inputs required" oninput="loginValido()">
                    <span class="span-required">Preencha esse campo</span>
                </div>
                <div class="input-box">
                    <label for="Email">Email</label>
                    <input id="email" type="text" name="email" placeholder="Digite seu Email" class="inputs required" oninput="emailtrue()">
                    <span class="span-required">Digite um E-mail válido</span>
                </div>
                <div class="input-box">
                    <label for="Matricula">Matricula</label>
                    <input id="matricula" type="number" name="matricula" placeholder="Digite sua Matricula" class="inputs required" oninput="matriculaValida()">
                    <span class="span-required">Preencha esse campo</span>
                </div>
                <div class="input-box">
                    <label for="Senha">Senha</label>
                    <input id="password" type="password" name="password" placeholder="Digite seu Senha" class="inputs required" oninput="senhaValida()">
                    <span class="span-required">Digite uma senha com no minimo 8 caracteres</span>
                </div>
                <div class="input-box">
                    <label for="Senhatw">Confirme sua Senha</label>
                    <input id="password-two" type="password" name="password-two" placeholder="Digite seu Senha" class="inputs required" oninput="senhaConfirmada()">
                    <span class="span-required">Senhas devem ser compativeis</span>
                </div>
            </div>
        <!--Inicio do MODAL --> 
            <div class="divmodal">
                <div id="modal-group">
                    <div class="textnv">
                       <h4 >Adicionar Permições</h4>
                    </div>
                    <button onclick="useraddModal()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                      AD
                    </button>
                    <button onclick="edidadeModal()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                      E-Cidade
                    </button>
                    <button onclick="glpiModal()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                      GLPI
                    </button>
                </div>
                <div id="useradd" class="modal fade full-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">                           
                                <button onclick="limparCheckbox('Não foi adicionado nem uma permição!')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="exampleModalLabel">Solicitação de Acesso ao Domínio</h3>
                            </div>
                            <div class="modal-body">
                                <nav>
                                    <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Solicitação de Acesso ao Domínio</a></li>                            
                                    </ul>
                                </nav>
                                 <!-- Conteúdo das abas -->
                                <div class="tab-content" role="tabpanel">
                                    <div role="tabpanel" class="tab-pane active" id="tab1">
                                        <div class="columdiv" id="checkboxesuserad" >                              
                                            <div id="idCheckbox" class="group-Checkbox">
                                                <div class="group-coluna1">
                                                    <label class="group-label">
                                                        <h5 class="inputq" type="text"  name="grupo11" > Acesso</h5> 
                                                    </label>
                                                    <label class="group-label">
                                                        <input class="inputq" type="checkbox" id="input_acs_pc" name="grupo11" value="true"> Acesso ao Computador
                                                    </label>
                                                    <label class="group-label">
                                                        <input class="inputq" type="checkbox" id="input_acs_pastcom" name="grupo11" value="true"> Acesso a Pasta Compartilhada
                                                    </label>                                                
                                                </div>
                                                <div class="group-coluna2">
                                                    <label class="group-label">
                                                        <h5 class="inputq" type="text"  name="grupo12" > Nivel de Permição</h5>
                                                    </label>
                                                    <label class="group-label">
                                                        <input type="checkbox" id="input_adm" name="grupo12" value="true"> Administrador
                                                    </label>                                                
                                                    <label class="group-label">
                                                        <input type="checkbox" id="input_operador"  name="grupo12" value="true"> Operador
                                                    </label>                                                
                                                </div>
                                            </div>
                                            <br>
                                            <div class="group-file">
                                            <!-- File PDF -->
                                                <label id="file_acsdom"><input type="file" id="input-pdf-userad" ></label>
                                                <br>
                                            </div>
                                            <div class="modal-footer">                                        
                                                <button id="clearuser" type="button" class="btn btn-secondary" onclick="limparCheckbox(this);" value="clickfalse">Limpar Permissões</button>
                                            </div>                                  
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="modal-footer">                                                  
                                    <button id="adduser" type="button" class="btn btn-primary" onclick="checkboxad(event);" value ="clicktrue">Adicionar Permissões</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ecidade" class="modal fade full-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">                                    
                                <button onclick="limparCheckbox('Não foi adicionado nem uma permição!')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="exampleModalLabel">Solicitação de Acesso ao E-cidade</h3>
                            </div>
                            <div class="modal-body">
                              <!-- Abas -->
                                   <nav>
                                     <ul class="nav nav-tabs" role="tablist">
                                       <li role="presentation" class="active"><a href="#tabarrecadacao" aria-controls="tabarrecadacao" role="tab" data-toggle="tab">Arrecadação</a></li>   
                                     </ul>
                                   </nav>
                                   <!-- Conteúdo das abas -->
                                  <div class="tab-content" role="tabpanel">
                                   <div role="tabpanel" class="tab-pane active" id="tabarrecadacao">

                                    <div class="columdiv" id="checkboxesecit" >                                 
                                        <div id="idCheckbox" class="group-Checkbox">
                                            <div class="group-coluna1">                                        
                                                <label class="group-label">
                                                   <h5 class="inputq" type="text"  name="grupo21" >Cadastros</h5>
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_29_cdt" name="grupo21" value="true"> 29 Cadastros
                                                </label>                                            
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_4823_ics" name="grupo21" value="true"> 4823 Inclusão
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_4824_atrc"  name="grupo21" value="true"> 4824 Alteração
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_4825_ecs" name="grupo21" value="true"> 4825 Exclusão
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_608592_ord" name="grupo21" value="true"> 608592 Ordem
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_9524_incs"  name="grupo21" value="true"> 9524 Inclusão
                                                    </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_9525_altc" name="grupo21" value="true"> 9525 Alteração
                                                </label>
                                            </div>
                                            <div class="group-coluna2">                                           
                                                <label class="group-label">
                                                   <h5 class="inputq" type="text"  name="grupo22" >Consultas</h5>
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_56_gf"  name="grupo22" value="true"> 56 Geral Financeira
                                                </label>                                            
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_8557_nn"  name="grupo22" value="true"> 8557 Numpre/Numbanco
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="arrecadacao_8620_dqa" name="grupo22" value="true"> 8620 Declaração de Quitação Anual
                                                </label>     
                                            </div>
                                        </div>
                                    
                                    </div>
                                <div class="group-file">
                                <!-- File PDF -->
                                <label id="file_arecadacao_ecit"><input type="file" id="input-pdf-ecit-arcd" ></label>
                                <br>
                                </div>
                                <div class="modal-footer">
                                    <button id="clearecitarcd" type="button" class="btn btn-secondary" onclick="limparCheckbox(this);" value="clickfalse">Limpar Permissões</button>
                                </div>
                            </div>                                 
                                <div class="modal-footer">
                                    <button id="addecit" type="button" class="btn btn-primary" onclick="checkboxecit(event);" value ="clicktrue">Adicionar Permissões E-cidade</button>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>                
                </div>
                <div id="glpi" class="modal fade full-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">  
                                <button onclick="limparCheckbox('Não foi adicionado nem uma permição!')" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="exampleModalLabel">Solicitação de Acesso ao GLPI</h3>
                            </div>
                            <div class="modal-body">
                                <nav>
                                    <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Solicitção de Acesso ao GLPI Sistema de Chamados</a></li>
                                    </ul>
                                </nav>
                               <!-- Conteúdo das abas -->
                               <div class="tab-content" role="tabpanel">
                                 <div role="tabpanel" class="tab-pane active" id="tab1">
                                  <div class="columdiv" id="checkboxesuserad" >
                                      <div id="idCheckbox" class="group-Checkbox">
                                          <div class="group-coluna1">
                                                <label class="group-label">
                                                    <h5 class="inputq" type="text"  name="grupo31" > Acesso</h5> 
                                                </label>
                                                <label class="group-label">
                                                    <input class="inputq" id="acesso_glpi_as" type="checkbox"  name="grupo31" value="true"> Acesso ao Sistema
                                                </label>   
                                            </div>
                                            <div class="group-coluna2">
                                                <label class="group-label">
                                                  <h5 class="inputq" type="text" name="grupo32" > Permição</h5>
                                                </label>
                                                <label class="group-label">
                                                    <input type="checkbox" id="acesso_glpi_adm" name="grupo32" value="true"> Administrador
                                                </label>                                              
                                                <label class="group-label">
                                                    <input type="checkbox" id="acesso_glpi_op" name="grupo32" value="true"> Operador
                                                </label>                                              
                                            </div>
                                        </div>
                                      <br>
                                        <div class="group-file">
                                      <!-- File PDF -->
                                            <label id="file_acesso_glpi"><input type="file" id="input-pdf-glpi" ></label>
                                            <br>
                                        </div>
                                        <div class="modal-footer">                                      
                                            <button id="clearglpi" type="button" class="btn btn-secondary" onclick="limparCheckbox(this);" value="clickfalse">Limpar Permissões</button>
                                        </div>
                                </div>
                            </div>
                               </div>
                              <div class="modal-footer">
                              <button id="addglpi" type="button" class="btn btn-primary" onclick="checkboxglpi(event)" value ="clicktrue">Adicionar Permissões</button>
                              </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         <!-- Fim do MODAL -->
        <div class="gender-inputs">
            <div class="gender-title">
            <h5>Gênero</h5>
            </div>
        </div>
        <div class="gender-group">
            <div class="gender-input">
                <input type="radio" id="female" name="gender">
                <label for="female">Feminino</label>              
            </div>
            <div class="gender-input">
                <input type="radio" id="male" name="gender">
                <label for="male">Masculino</label>              
            </div>
            <div class="gender-input">
                <input type="radio" id="others" name="gender">
                <label for="others">Outros</label>              
            </div>            
        </div>
        <div class="continue-button">          
            <button type="submit" onclick="checkInputs(event)" name="AddMsgCont" value="Enviar" ><a >Criar Conta</a></button>
        </div>
    </form> 
    </div>  </div>
<script src="../js/cadastro.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>