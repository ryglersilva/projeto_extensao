<?php
if(isset( $_POST['action'])) 
{
  include_once("../sql/conexao.php");
  global $pdo;
  $action = $_POST['action'];
  if($action === 'addUser'){
    $retorno = array();
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $genero = $_POST['sexo'];
    $senha = $_POST['senha'];   
    try {
      $stmt = $pdo->prepare("INSERT INTO dados_usuarios (matricula, nome, email, login, genero, senha) VALUES (:matricula, :nome, :email, :login, :genero, :senha)");
      $stmt->bindParam(':matricula', $matricula);
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':login', $login);
      $stmt->bindParam(':genero', $genero);
      $stmt->bindParam(':senha', $senha);     
      if ($stmt->execute() && $stmt->rowCount() > 0) {
        $retorno['status'] ='success';
        $retorno['matricula'] = $matricula; 
      }else {
        $retorno ['status']='failure';
      }
    }catch (\PDOException $e) {
      echo 'Erro ao enviar arquivo: ' . $e->getMessage();
    }
  }
  if($action === 'pms_arcdcit')
  {
    $retorno = array();
    if(isset($_FILES['pdf_ad']) || isset($_FILES['pdf_ecit']) || isset($_FILES['pdf_gli'])) 
    {
      // pelo menos um dos arquivos foi enviado, execute o código para salvar no banco de dados
      $matricula = $_POST['matricula'];
      if (isset($_FILES['pdf_ad'])) {
          $pdf_ad = $_FILES['pdf_ad'];
      } else {
          $pdf_ad = null;      
        }

      if (isset($_FILES['pdf_ecit'])) {
          $pdf_ecit = $_FILES['pdf_ecit'];
      } else {
          $pdf_ecit = null;      }
      if (isset($_FILES['pdf_gli'])) {
          $pdf_gli = $_FILES['pdf_gli'];
      } else {
          $pdf_gli = null;
      }
      if (isset($pdf_ad['tmp_name']) && !empty($pdf_ad['tmp_name'])) {
        $pdfContent_ad = file_get_contents($pdf_ad['tmp_name']);
      } else {
          $pdfContent_ad = null;
        }
      if (isset($pdf_ecit['tmp_name']) && !empty($pdf_ecit['tmp_name'])) {
        $pdfContent_ecit = file_get_contents($pdf_ecit['tmp_name']);
      } else {
        $pdfContent_ecit = null;
      }
      if (isset($pdf_gli['tmp_name']) && !empty($pdf_gli['tmp_name'])) {
        $pdfContent_glpi = file_get_contents($pdf_gli['tmp_name']);
      } else {
        $pdfContent_glpi = null;
      }
      //AD
      $ad_acs_pc = $_POST['input_acs_pc'];
      $ad_acs_pstcom = $_POST['input_acs_pastcom']; 
      //AD PMS
      $pms_ad_adm = $_POST['input_adm'];
      $pms_ad_op = $_POST['input_operador'];
      //ECIT CADASTROS
      $pms_ecit_29 = $_POST['arrecadacao_29_cdt'];
      $pms_ecit_4823 = $_POST['arrecadacao_4823_ics'];
      $pms_ecit_4824 = $_POST['arrecadacao_4824_atrc'];
      $pms_ecit_4825 = $_POST['arrecadacao_4825_ecs'];
      $pms_ecit_608592 = $_POST['arrecadacao_608592_ord'];
      $pms_ecit_9524 = $_POST['arrecadacao_9524_incs'];
      $pms_ecit_9525 = $_POST['arrecadacao_9525_altc'];
      //ECIT CONSULTAS
      $pms_ecit_56 = $_POST['arrecadacao_56_gf'];
      $pms_ecit_8557 = $_POST['arrecadacao_8557_nn'];
      $pms_ecit_8620 = $_POST['arrecadacao_8620_dqa'];
      // GLPI
      $glpi_acs_pc = $_POST['acesso_glpi_as'];
      //GLPI PMS
      $pms_glpi_adm = $_POST['acesso_glpi_adm'];
      $pms_glpi_op = $_POST['acesso_glpi_op'];
      if($pms_ad_adm === 'true' || $pms_glpi_adm === 'true'){
        $pms_adm = 'true';
      }else{
        $pms_adm = 'false';
      }
      if($pms_ad_op === 'true' || $pms_glpi_op === 'true'){
        $pms_op = 'true';
      }else{
        $pms_op = 'false';
      }
      try 
      {
        $pdo->beginTransaction();
        // INSERÇÃO AD
        $stmt = $pdo->prepare("INSERT INTO modulo_ad (matricula, acs_sistem, acs_pst_compatilhada) VALUES (:matricula, :ad_acs_pc, :ad_acs_pstcom)");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':ad_acs_pc', $ad_acs_pc);
        $stmt->bindParam(':ad_acs_pstcom', $ad_acs_pstcom);
        $stmt->execute();
        //INSERÇÃO AD/GLPI PERMISÕES
        $stmt = $pdo->prepare("INSERT INTO permissao (matricula, pms_adm, pms_op) VALUES (:matricula, :pms_adm, :pms_op)");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':pms_adm', $pms_adm);
        $stmt->bindParam(':pms_op', $pms_op);
        $stmt->execute();
        //ECIT PERMISSÕES
        $stmt = $pdo->prepare("INSERT INTO moduloa_ecit (matricula, cadastro29, inclusao4823, alteracao4824, exclusao4825, ordem608592, inclusao9524, alteracao9525, geral_financeira56, numpre_numbanco8557, declaracao_de_quitacao_anual8620) VALUES (:matricula, :pms_ecit_29, :pms_ecit_4823, :pms_ecit_4824, :pms_ecit_4825, :pms_ecit_608592, :pms_ecit_9524, :pms_ecit_9525, :pms_ecit_56, :pms_ecit_8557, :pms_ecit_8620)");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':pms_ecit_29', $pms_ecit_29);
        $stmt->bindParam(':pms_ecit_4823', $pms_ecit_4823);
        $stmt->bindParam(':pms_ecit_4824', $pms_ecit_4824);
        $stmt->bindParam(':pms_ecit_4825', $pms_ecit_4825);
        $stmt->bindParam(':pms_ecit_608592', $pms_ecit_608592);
        $stmt->bindParam(':pms_ecit_9524', $pms_ecit_9524);
        $stmt->bindParam(':pms_ecit_9525', $pms_ecit_9525);
        $stmt->bindParam(':pms_ecit_56', $pms_ecit_56);
        $stmt->bindParam(':pms_ecit_8557', $pms_ecit_8557);
        $stmt->bindParam(':pms_ecit_8620', $pms_ecit_8620);
        $stmt->execute();
        //INSERÇÃO GLPI
        $stmt = $pdo->prepare("INSERT INTO modulo_glpi (matricula, acs_sistem) VALUES (:matricula, :glpi_acs_pc)");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':glpi_acs_pc', $glpi_acs_pc);
        $stmt->execute();
        // INSERÇÃO PDF
        //files
        $stmt = $pdo->prepare("INSERT INTO pdf (matricula, pdf_ad, pdf_ecit, pdf_glpi) VALUES (:matricula, :pdfContent_ad, :pdfContent_ecit, :pdfContent_glpi)");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':pdfContent_ad', $pdfContent_ad, PDO::PARAM_LOB);
        $stmt->bindParam(':pdfContent_ecit', $pdfContent_ecit, PDO::PARAM_LOB);
        $stmt->bindParam(':pdfContent_glpi', $pdfContent_glpi, PDO::PARAM_LOB);
        $stmt->execute();
        $pdo->commit();
         $retorno = array("status" => "success");
      }catch (\PDOException $e) {
        $retorno['status'] = 'error';
        //echo 'Erro ao enviar arquivo: ' . $e->getMessage();
      }
    } else {
       // nenhum dos arquivos foi enviado, exiba uma mensagem de erro ou execute outra ação adequada
        echo 'Erro: nenhum arquivo enviado.';
        exit;
      }
  }
  echo json_encode($retorno);
}
?>