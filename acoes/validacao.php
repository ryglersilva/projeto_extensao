 <?php
 session_start();
  if(!empty($_POST['login']) || !empty($_POST['senha'])) {    
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    // conectar ao banco de dados e verificar as credenciais do usuário
    include_once("../sql/conexao.php");
    $stmt = $pdo->prepare("SELECT dados_usuarios.senha, dados_usuarios.matricula, permissao.pms_adm 
                         FROM dados_usuarios 
                         INNER JOIN permissao ON dados_usuarios.matricula = permissao.matricula 
                         WHERE dados_usuarios.login = :usuario AND dados_usuarios.senha = :senha AND permissao.pms_adm = 'true'");
    $stmt->execute(array(':usuario' => $login, ':senha' => $senha));
    $user = $stmt->fetch();  
      // verificar se a senha inserida corresponde à senha armazenada no banco de dados
    if ($user && $senha == $user['senha']) {
          // as credenciais são válidas, o usuário pode fazer login
      $_SESSION['usuario'] = $login;
      $_SESSION['matricula'] = $user['matricula'];
      header("Location: ../ferramentas/menu.php");
    } else {
        // as credenciais são inválidas, exibir uma mensagem de erro
        $_SESSION['login_error'] = "Nome de usuário ou senha incorretos. Tente novamente.";
        header("Location: ../index.php");
      }
      } else {
      // redirecionar para a página de login se as credenciais não forem fornecidas
        $_SESSION['login_error'] = "Credenciais não forem fornecidas, Tente novamente.";

        header("Location: ../index.php");
      }
  ?>


