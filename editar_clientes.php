<? 

include 'conexaoprojeto.php';

$cd_cliente = $_POST['cd_cliente'];
$nm_cliente = $_POST['nm_cliente'];
$n_fone = $_POST['n_fone'];



$query = "UPDATE CLIENTES SET nm_cliente='$nm_cliente', n_fone='$n_fone' WHERE cd_cliente = $cd_cliente";

mysqli_query($conexao, $query);

header('location:index.php?pagina=clientes');