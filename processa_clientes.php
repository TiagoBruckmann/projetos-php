<?
include "conexaoprojeto.php";

$nm_cliente = $_POST['nm_cliente'];
$n_fone = $_POST['n_fone'];


$query = "INSERT INTO CLIENTES (nm_cliente, n_fone) VALUES ('$nm_cliente', '$n_fone')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=clientes'); 