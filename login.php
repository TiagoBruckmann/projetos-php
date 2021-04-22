<?
include 'conexaoprojeto.php';

//$usuario = md5($_POST['usuario']);
$usuario  = addcslashes($_POST['usuario']);
$senha = addcslashes($_POST['senha']);
//$senha = md5($_POST['senha']);


$query = "SELECT * FROM USUARIOS WHERE USUARIO = '$usuario' and SENHA = '$senha'";

$consulta_usuarios = mysqli_query($conexao, $query);

if(mysqli_num_rows($consulta_usuarios) == 1){

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['usuario'] = $usuario;

	header('location:index.php');
}
else{
	header('location:index.php?erro');
}