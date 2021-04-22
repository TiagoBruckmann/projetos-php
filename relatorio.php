<?

include "conexaoprojeto.php";

#Clientes

$rcliente   = $_REQUEST["rcliente"];
$rfone   = $_REQUEST["rfone"];

#Projetos

$rprojetos   = $_REQUEST["rprojetos"];
$rcliente   = $_REQUEST["rcliente"];
$racordo   = $_REQUEST["racordo"];
$rrecebido   = $_REQUEST["rrecebido"];
$rpagamento  = $_REQUEST["rpagamento"];

#saida dos dados
$saida   = $_REQUEST["saida"];
$tipo    = $_REQUEST["tipo"];

If (strlen($saida) == 0) { $saida = "HTML"; }
If (strlen($tipo) == 0) { $tipo = "Clientes"; }

$saidas  = "<select name='saida' id='saida' style='font-size:10px; font-family:Arial;'>";
$saidas .= "<option value='$saida'>$saida</option>";
$saidas .= "<option value='HTML'>HTML</option>";
$saidas .= "<option value='DOC'>DOC</option>";
$saidas .= "<option value='XLS'>XLS</option>";
$saidas .= "<option value='PDF'>PDF</option>";
$saidas .= "<option value='IMP'>IMP</option>";
$saidas .= "</select>";

$tipos  = "<select name='tipo' id='tipo' style='font-size:10px; font-family:Arial;'>";
$tipos .= "<option value='$tipo'>$tipo</option>";
$tipos .= "<option value='Clientes'>Clientes</option>";
$tipos .= "<option value='Projetos'>Projetos</option>";
$tipos .= "</select>";

$html1  = "<html><head><title>relatorio</title></head><body>";

$html2 = "<fieldset><Legend>Restrições do relatorio</legend>";
$html2 .= "<table width='99%'   style='font-family:verdana; font-size:13px;'>";
$html2 .= "<form name='relatorio' action='relatorio.php' method='post'>";

#Lista de Clientes
$html2 .= "<tr><td>Nome</td><td>Telefone</td></tr>";
$html2 .= "    <td><input type='text' name='rcliente' id='rcliente' value='$rcliente'></td>";
$html2 .= "    <td><input type='text' name='rfone' id='rfone' value='$rfone'></td>";

#Lista de projetos
$html2 .= "<tr><td>Projeto</td><td>Cliente</td><td>Valor Acordado</td><td>Valor Recebido</td><td>Data de Pagamento</td>
	<td>Saida</td><td>Tipo</td></tr>";
$html2 .= "    <td><input type='text' name='rprojetos' id='rprojetos' value='$rprojetos'></td>";
$html2 .= "    <td><input type='text' name='rcliente' id='rcliente' value='$rcliente'></td>";
$html2 .= "    <td><input type='text' name='racordo' id='racordo' value='$racordo'></td>";
$html2 .= "    <td><input type='text' name='rrecebido' id='rrecebido' value='$rrecebido'></td>";
$html2 .= "    <td><input type='text' name='rpagamento' id='rpagamento' value='$rpagamento'></td>";

#Saida dos dados
$html2 .= "    <td>$saidas</td>";
$html2 .= "    <td>$tipos</td>";
$html2 .= "    <td><input type='submit' value='Gerar'></td></tr></form>";
$html2 .= "</table>";
$html2 .= "</fieldset>";

$html = "<table width='99%'  border style='font-family:verdana; font-size:13px;'>";


if($tipo=="Clientes") 
{
	$SQL  = " select * from clientes where 1=1 ";
	if (strlen($rcliente) > 0) { $SQL .= " and nm_cliente like '%".$rcliente."%' "; }
	if (strlen($rfone) > 0) { $SQL .= " and n_fone like '%".$rfone."%' "; }
	$SQL .= " order by nm_cliente";
	$RSS = mysqli_query($conexao,$SQL) or print(mysqli_error());
	while($RS = mysqli_fetch_array($RSS))
	{
		$html .= "<tr><td>".$RS["nm_cliente"]."</td>";
		$html .= "<td>".$RS["n_fone"]."</td>";
		$html .= "</tr>";
		$xx = $xx + 1;
	}
}

if($tipo=="Projetos") 
{
	$SQL  = " select * from projetos where 1=1 ";
	if (strlen($rprojetos) > 0) { $SQL .= " and nm_projeto like '%".$rprojetos."%' "; }
	if (strlen($rcliente) > 0) { $SQL .= " and cd_cliente like '%".$rcliente."%' "; }
	if (strlen($racordo) > 0) { $SQL .= " and vl_acordado like '%".$racordo."%' "; }
	if (strlen($rrecebido) > 0) { $SQL .= " and vl_recebido like '%".$rrecebido."%' "; }
	if (strlen($rpagamento) > 0) { $SQL .= " and dt_pagamento like '%".$rpagamento."%' "; }
	$SQL .= " order by nm_projeto";
	$RSS = mysqli_query($conexao,$SQL) or print(mysqli_error());
	while($RS = mysqli_fetch_array($RSS))
	{
		$html .= "<tr><td>".$RS["nm_projeto"]."</td>";
		$html .= "<td>".$RS["cd_cliente"]."</td>";
		$html .= "<td>".$RS["vl_acordado"]."</td>";
		$html .= "<td>".$RS["vl_recebido"]."</td>";
		$html .= "<td>".$RS["dt_pagamento"]."</td>";
		$html .= "</tr>";
		$xx = $xx + 1;
	}
}

$html .= "</table>";
$html .= "</body>";
$html .= "</html>"; 

If ($saida == "XLS")
{
	$arquivo = "Relatorio_em_".date("d_m_Y__H_i_s").".xls";
	header ("Expires: Mon, 26 Jul 2025 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment;filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data" );
	$html = str_replace(",","",$html);
	$html = str_replace(".",",",$html);
	echo $html;
}

If ($saida == "DOC")
{
	$arquivo = "Relatorio_em_".date("d_m_Y_H_i_s").".doc";
	header ("Expires: Mon, 26 Jul 2025 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msword");
	header ("Content-Disposition: attachment;filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data" );
	echo $html;
}

If ( $saida == "HTML" ) {echo $html1.$html2.$html;}     

If ( $saida == "IMP" ) 
{
	echo $html;
	echo "<center><form><input type='button' value='Imprimir' OnClick='javascript:DoPrinting()'></form></center>";
	echo "<script type='text/javascript'> function DoPrinting(){ window.print() } </script>";
}     

If ( $saida == "PDF"){
	require_once("dompdf/dompdf_config.inc.php");
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
    $dompdf->set_paper('letter', 'portrait');
	$dompdf->render();
	$dompdf->stream("Relatorio.pdf");
}

?>
<script language="JavaScript1.2">

function DoPrinting()
{
	if (!window.print)
	{
		alert("Use o Internet Explorer \n nas versões 4.0 ou superior!")
		return
	}
	window.print()
}

</script>
