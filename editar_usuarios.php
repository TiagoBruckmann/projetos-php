<? 

include 'conexaoprojeto.php';

$cd_usuario = $_POST['cd_usuario'];
$nm_usuario = $_POST['nm_usuario'];
$nm_cargo = $_POST['nm_cargo'];
$ds_email = $_POST['ds_email'];
$ds_senha = $_POST['ds_senha'];
$cf_senha = $_POST['cf_senha'];


$query = "UPDATE USUARIOS SET nm_usuario='$nm_usuario', nm_cargo='$nm_cargo', ds_email='$ds_email', ds_senha='$ds_senha', cf_senha='$cf_senha' WHERE cd_usuario = $cd_usuario";

mysqli_query($conexao, $query);

header('location:index.php?pagina=usuarios');