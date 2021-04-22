<?
include 'conexaoprojeto.php';

$cd_cliente = $_GET['cd_cliente'];

$query = "DELETE FROM CLIENTES WHERE cd_cliente = $cd_cliente";

mysqli_query($conexao, $query);

header('location:index.php?pagina=clientes'); 