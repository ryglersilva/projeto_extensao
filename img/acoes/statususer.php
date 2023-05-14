<?php
if(isset( $_POST['action'])) 
{
  include_once("../sql/conexao.php");
  global $pdo;
  $action = $_POST['action'];
  if($action === 'usertrue') {
    $retorno = array();
    $dadosUser = $_POST['useraceito'];
    try {
      $stmt = $pdo->prepare("UPDATE dados_usuarios SET status = 'ativo' WHERE matricula = :matricula");
      $stmt->bindParam(':matricula', $dadosUser[3]);
      if ($stmt->execute() && $stmt->rowCount() > 0) {
        $retorno['status'] = 'success';
        $retorno['mensagem'] = 'Usuário ativado com sucesso';
      } else {
        $retorno['status'] = 'failure';
        $retorno['mensagem'] = 'Não foi possível ativar o usuário';
      }
    } catch (\PDOException $e) {
      echo 'Erro ao enviar arquivo: ' . $e->getMessage();
    }
  }
  if($action === 'userfalse'){
      $retorno = array();
      $dadosUser = $_POST['userrecusado'];
      try {
          $stmt = $pdo->prepare("UPDATE dados_usuarios SET status = 'rejeitado' WHERE matricula = :matricula");
          $stmt->bindParam(':matricula', $dadosUser[3]);
          if ($stmt->execute() && $stmt->rowCount() > 0) {
              $retorno['status'] = 'success';
          } else {
              $retorno['status'] = 'failure';
          }
      } catch (\PDOException $e) {
          echo 'Erro ao atualizar status do usuário: ' . $e->getMessage();
      }
  }
  echo json_encode($retorno);
}
?>