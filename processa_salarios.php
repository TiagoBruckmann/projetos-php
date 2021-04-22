<?
include "conexaoprojeto.php";

$cd_funcionario = $_POST['escolhe_funcionario'];
$vl_recebido = $_POST['vl_recebido'];
$dt_pagamento = $_POST['dt_pagamento'];

$query = "INSERT INTO SALARIO (cd_funcionario, vl_recebido, dt_pagamento) VALUES ($cd_funcionario, '$vl_recebido', '$dt_pagamento')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=salarios'); 