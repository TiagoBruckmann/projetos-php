<? 

include 'conexaoprojeto.php';

$cd_funcionario = $_POST['cd_funcionario'];
$nm_funcionario = $_POST['nm_funcionario'];
$ds_cargo = $_POST['ds_cargo'];
$dt_admissao = $_POST['dt_admissao'];
$vl_salario = $_POST['vl_salario'];

$query = "UPDATE FUNCIONARIO SET nm_funcionario='$nm_funcionario', ds_cargo='$ds_cargo', dt_admissao='$dt_admissao', vl_salario='$vl_salario' WHERE cd_funcionario = $cd_funcionario";

mysqli_query($conexao, $query);
 
header('location:index.php?pagina=funcionarios');