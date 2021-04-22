<html><head>
<style>
	
</style>
<meta charset="utf-8"/>
</head></html>


<?session_start();
$conexao = mysqli_connect("localhost", "root", "","projetos") or print ( mysqli_connect_error() ); 
mysqli_set_charset($conexao, "utf8");

Function DataBD($dia)  { if (strlen($dia) > 3) return substr($dia,6,4)."-".substr($dia,3,2)."-".substr($dia,0,2);  }

Function DataBR($dia)  { if (strlen($dia) > 3) return substr($dia,8,2)."-".substr($dia,5,2)."-".substr($dia,0,4);  }

$query = "SELECT * FROM CLIENTES";
$consulta_clientes = mysqli_query($conexao, $query);

$query = "SELECT * FROM FUNCIONARIO";
$consulta_funcionarios = mysqli_query($conexao, $query);

$query = "SELECT pro.cd_projeto, pro.nm_projeto, pro.vl_acordado, pro.vl_recebido, pro.dt_pagamento, cli.nm_cliente
			FROM projetos pro, clientes cli
			WHERE pro.cd_cliente = cli.cd_cliente";
$consulta_projetos = mysqli_query($conexao, $query);

$query = "SELECT sal.cd_salario, sal.vl_recebido, sal.dt_pagamento, func.nm_funcionario, func.vl_salario
			FROM salario sal, funcionario func
			WHERE sal.cd_funcionario = func.cd_funcionario";
$consulta_salarios = mysqli_query($conexao, $query);

$query = "SELECT * FROM USUARIOS";
$consulta_usuarios = mysqli_query($conexao, $query);

?>