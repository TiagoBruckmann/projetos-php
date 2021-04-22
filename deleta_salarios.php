<?
include 'conexaoprojeto.php';

$cd_salario = $_GET['cd_salario'];

$query = "DELETE FROM SALARIO WHERE cd_salario = $cd_salario";

mysqli_query($conexao, $query);

header('location:index.php?pagina=salarios');
?>

