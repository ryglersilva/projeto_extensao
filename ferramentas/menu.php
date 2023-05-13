<?php
    session_start();
    include('../acoes/verificar_login.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistema de Acesso</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../css/menu_style.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
							<li><a href="../ferramentas/menu_adicionaruser.php"  id="notificationLink"><i class="fa-regular fa-user"></i></a>	
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
		</div>
		<div class="form-image">
		  <img src="../img/visual-data-animate.svg">
		</div>
</body>
</html>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/803b73be4f.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Scripts -->
<script src="../js/contadornewuser.js"> </script>
</body>
</html>

