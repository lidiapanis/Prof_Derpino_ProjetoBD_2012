<?php
require('fpdf16/fpdf.php');
//Deriva uma classe PDF extendida da classe FPDF.

class PDF extends FPDF
{

function Header()
{
//Define o texto a 5.5 cm da margem esquerda e a 0.5 cm da margem superior.
$this->SetXY(5.5, 0.5);
$this->SetFont('Arial','B',15);
$this->Write(1.6,'RELAT�RIO DE ALUNOS CADASTRADOS NO SITE');
$this->Ln(0.5); //Quebra de linha
$this->SetXY(7.5, 1);


$this->SetFont('Arial','B',10);
$this->Write(1.6,'Cadastro de Alunos');
$this->Ln(2);
//Fim do m�todo de cabe�alho).
}
//Cria o m�todo de rodap� (Footer).
function Footer()
{
$this->SetFont('Arial','',10);
//Define o texto a 5 cm da margem esquerda e a -2 cm da margem inferior.
$this->SetXY(5,-2);
$this->Write(1.5,'Copyright 2012 XoFlango - Todos os direitos reservados');
$this->SetXY(8.5,-1.5);
//Define o n�mero de p�ginas.

$this->Write(1.5,'P�gina '.$this->PageNo().' de {total}');
}
}
$pdf=new PDF('P','cm','A4');
//Define o n�mero de p�ginas total para o rodap�.
$pdf->AliasNbPages('{total}');
$pdf->AddPage(); //Adiciona uma p�gina nova ao documento.
$pdf->SetFont('Arial','i',12);

include('proj_conectar.php');
$con = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco,$con);

$sql="select * from alunos order by nome";
$res = mysql_query($sql) or die (mysql_error(1));
$num = mysql_num_rows($res);

for($i=0;$i<$num;$i++){
   $row = mysql_fetch_array($res);// retorna em forma de array cada linha

$pdf->Write(1,'C�digo :'.$row['cod']);
$pdf->Ln();
$pdf->Write(1,'Nome :'.$row['nome']);
$pdf->Ln();
$pdf->Write(1,'Email :'.$row['email']);
$pdf->Ln();
$pdf->Write(1,'Telefone :'.$row['telefone']);
$pdf->Ln();
$pdf->Write(1,'Endere�o :'.$row['endereco']);
$pdf->Ln();
$pdf->Write(1,'Login :'.$row['login']);
$pdf->Ln();
$pdf->Write(1,'---------------------------------------------------------------------------------------------------------------------');
$pdf->Ln();
}
$pdf->Output();
mysql_close($con);
?>
