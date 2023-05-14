<?php
// Este código realiza uma consulta na tabela pg_user do PostgreSQL para obter o número de usuários cadastrados.
if (isset($_POST['action'])) {
  include_once("../sql/conexao.php");
  $action = $_POST['action'];
  if ($action == 'consultarNewuser') 
  {
    $retorno = array();
    $query = "SELECT * FROM moduloa_ecit LEFT JOIN modulo_ad ON moduloa_ecit.matricula = modulo_ad.matricula LEFT JOIN modulo_glpi ON moduloa_ecit.matricula = modulo_glpi.matricula LEFT JOIN dados_usuarios ON moduloa_ecit.matricula = dados_usuarios.matricula LEFT JOIN pdf ON moduloa_ecit.matricula = pdf.matricula LEFT JOIN permissao ON moduloa_ecit.matricula = permissao.matricula WHERE dados_usuarios.status IS NULL;"; 
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $query = "SELECT COUNT(*) as contuser FROM dados_usuarios WHERE status IS NULL";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $contuser = $stmt->fetch(PDO::FETCH_ASSOC)['contuser'];   
    if ($funcionarios) {
      $insereNvUserNaTabela = "";
      foreach ($funcionarios as $funcionario) {
      $insereNvUserNaTabela .= "       
       <tr>
         <th>
           <a href='#' onclick='abrirModal(\"<td>".$funcionario['matricula']."</td><td>".$funcionario['nome']."</td><td>".$funcionario['login']."</td><td>".$funcionario['email']."</td><td>".$funcionario['status']."</td>\")'>".$funcionario['matricula']."</a>
         </th>
         <td>".$funcionario['nome']."</td><td>".$funcionario['data_hora_cdt']."</td><td>".'NULL'."</td>
       </tr>
     ";    
   }  
    $retorno['cont'] = $contuser;
    $retorno['tablenewuser'] = base64_encode($insereNvUserNaTabela);
    $retorno['success'] = "true";
    }
    else {
      $retorno['failure'] = "false";
    }
  }
  echo json_encode($retorno);
}
?>


