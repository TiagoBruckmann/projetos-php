<?
include 'conexaoprojeto.php';

$cd_usuario = $_GET['cd_usuario'];

$query = "DELETE FROM USUARIOS WHERE CD_USUARIO = $cd_usuario";

mysqli_query($conexao, $query);

header('location:index.php?pagina=usuarios');
?>

