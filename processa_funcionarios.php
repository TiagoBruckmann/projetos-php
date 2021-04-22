<?
include "conexaoprojeto.php";

$nm_funcionario = $_POST['nm_funcionario'];
$ds_cargo = $_POST['ds_cargo'];
$dt_admissao = $_POST['dt_admissao'];
$vl_salario = $_POST['vl_salario'];

$query = "INSERT INTO FUNCIONARIO (nm_funcionario, ds_cargo, dt_admissao, vl_salario) VALUES ('$nm_funcionario', '$ds_cargo', '$dt_admissao', '$vl_salario')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=funcionarios'); 