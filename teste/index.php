<?php

require __DIR__.'/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

//INSTANCIANDO O OPTIONS DO DOMPDF PARA PODER SETAR O DIRETÓRIO ATUAL COMO ROOT
$options = new Options();

$options->setChroot(__DIR__);

//HABILITANDO O CARREGAMENTO DE LINKS EXTERNOS/REMOTOS
$options->setIsRemoteEnabled(true);

//PASSANDO O $OPTIONS PRO CONSTRUTOR DO DOMPDF
$dompdf = new Dompdf($options);

//CARREGA O HTML PRA DENTRO DA CLASSE
//$dompdf->loadHtml('<h1>Hello world</h1>');

//CARREGA UM ARQUIVO HTML PRA DENTRO DA CLASSE
$dompdf->loadHtmlFile(__DIR__.'/pdf.html');

//CONFIGURAÇÃO DE HORIENTAÇÃO E TIPO DE FOLHA
$dompdf->setPaper('A4', 'portrait'); // tem landscape tbm

//RENDERIZANDO O PDF
$dompdf->render();

//PARA FORÇAR O DOWNLOAD AUTOMÁTICO:
$dompdf->stream('teste-pdf.pdf');

//EXIBINDO O PDF SEM ESTAR DECODIFICADO 
/*
header('content-type: application/pdf');
echo $dompdf->output();
*/

//$dompdf->stream();

//echo "Hello world";

