<?
include 'conexaoprojeto.php';

$cd_funcionario = $_GET['cd_funcionario'];

$query = "DELETE FROM FUNCIONARIO WHERE CD_FUNCIONARIO = $cd_funcionario";

mysqli_query($conexao, $query);

header('location:index.php?pagina=funcionarios'); 