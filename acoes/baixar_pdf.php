<?php
if(isset($_GET['matricula'])) 
{
    include_once("../sql/conexao.php");
    global $pdo;
    $matricula = $_GET['matricula'];
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepara a consulta SQL para buscar os arquivos PDF
        $stmt = $pdo->prepare('SELECT pdf.pdf_ad FROM pdf JOIN dados_usuarios ON dados_usuarios.matricula = pdf.matricula WHERE dados_usuarios.matricula = :matricula;');
        // Executa a consulta, passando a matrícula como parâmetro
        $stmt->execute([':matricula' => $matricula]);
        // Verifica se pelo menos um PDF foi encontrado
        if ($stmt->rowCount() > 0) {
            // Configura os cabeçalhos para enviar os arquivos como um download compactado
            header('Content-type: application/zip');
            header('Content-Disposition: attachment; filename="pdfs.zip"');
            $zip = new ZipArchive();
            $zip->open('php://output', ZipArchive::CREATE);
            
            // Loop para adicionar todos os arquivos PDF encontrados ao arquivo ZIP
            while ($pdf = $stmt->fetch(PDO::FETCH_COLUMN)) {
              $filename = 'pdf' . uniqid() . '.pdf';
              $zip->addFromString($filename, $pdf);
            }
            // Finaliza e fecha o arquivo ZIP
            $zip->close();
        } else {
            // Caso contrário, envia um erro 404
            http_response_code(404);
            echo 'Nenhum PDF encontrado para a matrícula informada';
        }
    } catch (PDOException $e) {
        // Caso ocorra um erro na conexão ou na consulta SQL, exibe a mensagem de erro
        echo 'Erro ao buscar os PDFs: ' . $e->getMessage();
    }
}
?>
