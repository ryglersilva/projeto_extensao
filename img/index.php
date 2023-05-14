
<!DOCTYPE html>
 <html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/cadastro.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Login</title>
</head>
<body>
  <?php
  session_start();
  // verificar se existe uma mensagem de erro na sessão
  if (isset($_SESSION['login_error'])) {
      // exibir a mensagem de erro usando o plugin Swal.fire
      echo '<script>
              Swal.fire({
                  icon: "warning",
                  title: "Oops...",
                  text: "'. $_SESSION['login_error'] .'",
              });
            </script>';
      // remover a mensagem de erro da sessão
      unset($_SESSION['login_error']);
  }
  ?>
  <div class="container">
    <div class="form-image">
      <img src="img/enter-otp-animate.svg"> 
    </div>
    <div class="form">
      <form id="my-form" method="POST" action="acoes/validacao.php" >
        <div class="form-header">
          <div class="title">
            <h1>Login</h1>
          </div>
          <div class="login-button">
             <a href="ferramentas/cadastro.php">Cadastro</a>
          </div>
        </div>
        <div class="input-group">
          <div class="input-box">
            <label for="login">Login</label>
            <input  type="text" name="login" placeholder="Digite seu Login" >        
          </div>
          <div class="input-box">
            <label for="senha">Senha</label>
            <input  type="password"  name="senha" placeholder="Digite Sua Senha" >         
          </div>        
        </div> 
        <div class="continue-button">          
          <button type="submit"  ><a >login</a></button>          
        </div>
      </form>      
    </div>  
  </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>