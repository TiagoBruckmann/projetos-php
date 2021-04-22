<?
include 'conexaoprojeto.php';

$cd_projeto = $_GET['cd_projeto'];

$query = "DELETE FROM PROJETOS WHERE CD_PROJETO = $cd_projeto";

mysqli_query($conexao, $query);

header('location:index.php?pagina=projetos'); 