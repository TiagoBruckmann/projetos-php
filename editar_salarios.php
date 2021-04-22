<? 

include 'conexaoprojeto.php';

$cd_salario = $_POST['cd_salario'];
$cd_funcionario = $_POST['escolhe_funcionario'];
$vl_recebido = $_POST['vl_recebido'];
$dt_pagamento = $_POST['dt_pagamento'];

$query = "UPDATE SALARIO SET cd_funcionario=$cd_funcionario, vl_recebido='$vl_recebido', dt_pagamento='$dt_pagamento' WHERE cd_salario = $cd_salario";

mysqli_query($conexao, $query);
 
header('location:index.php?pagina=salarios');