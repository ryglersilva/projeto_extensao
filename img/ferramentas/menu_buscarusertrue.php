<?php
    include_once("../acoes/verificar_login.php");
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Sistema de Acesso</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../css/menu_style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/803b73be4f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="left-sidebar is-preload">
    <div id="page-wrapper">
        <div id="header">
            <!-- Inner -->
            <div class="inner">
                <header>
                    <h1>Sistema de Acesso </h1>
                </header>
            </div>
                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li><a href="menu.php">Home</a></li>
                        <li>
                            <a href="cadastro.php">Criar Usuarios</a>
                        </li>
                        <li><a href="menu_buscarusertrue.php">Usuarios Aceitos</a></li>
                        <li><a href="menu_buscaruserfalse.php">Usuarios Rejeitados</a></li>
                        <li><a href="menu_adicionaruser.php" id="notificationLink"><i class="fa-regular fa-user"></i></a> 
                            <div id="notification_li">
                                <span id="notification_count"></span>            
                            </div>         
                        </li>
                        <li>
                            <a href="../index.php">Sair</a>
                        </li>
                    </ul>
                </nav>
        </div>
                <!--tabela-->
        <div id="tablenone" class="container" >        
            <table class="table table-striped table-hover table-bordered" >
                <thead >
                    <tr>
                      <th scope="col">Ação</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Data</th>
                      <th scope="col">Status</th>
                    </tr>
                </thead>
                    <tbody id="notificationsBody">                        
                </tbody>
            </table>                                        
        </div>                       
<!-- Large modal -->
        <div id="myModal" class="modal fade full-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">            
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="exampleModalLabel">Novo Usuário</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover ">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Username</th>
                          <th>Senha</th>
                          <th>Matricula</th>
                          <th>Email</th>
                          <th>Tipo de Acesso</th>                  
                        </tr>
                      </thead>
                      <tbody id="infonvuser">                
                      </tbody>
                    </table>
                    <p>GLPI: <span id="nomeUsuario">Sim</span></p>
                    <p>E-Cidade: <span id="emailUsuario"></span></p>
                    <p>Tets: <span id="telefoneUsuario"></span></p>
                </div>
            </div>
          </div>
        </div>        
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Scripts -->
<script src="../js/statususertrue.js"> </script>
</body>
</html>