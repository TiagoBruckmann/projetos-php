<? 

include 'conexaoprojeto.php';

$cd_projeto = $_POST['cd_projeto'];
$nm_projeto = $_POST['nm_projeto'];
$cd_cliente = $_POST['escolhe_cliente'];
$vl_acordado = $_POST['vl_acordado'];
$vl_recebido = $_POST['vl_recebido'];
$dt_pagamento = $_POST['dt_pagamento'];

$query = "UPDATE PROJETOS SET nm_projeto='$nm_projeto', cd_cliente=$cd_cliente, vl_acordado='$vl_acordado', vl_recebido='$vl_recebido', dt_pagamento='$dt_pagamento' WHERE cd_projeto = $cd_projeto";

mysqli_query($conexao, $query);
 
header('location:index.php?pagina=projetos');