<?
include "conexaoprojeto.php";

$nm_projeto = $_POST['nm_projeto'];
$cd_cliente = $_POST['escolhe_cliente'];
$vl_acordado = $_POST['vl_acordado'];
$vl_recebido = $_POST['vl_recebido'];
$dt_pagamento = $_POST['dt_pagamento'];

$query = "INSERT INTO PROJETOS (nm_projeto, cd_cliente, vl_acordado, vl_recebido, dt_pagamento) VALUES ('$nm_projeto', 
	$cd_cliente, '$vl_acordado', '$vl_recebido', '$dt_pagamento')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=projetos'); 