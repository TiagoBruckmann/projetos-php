<?

include "conexaoprojeto.php";
//include "login.php";
include "header.php";

#conteudo das paginas!
if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
}
else{
	$pagina = 'home';
}


switch ($pagina) {
	case 'clientes': include 'views/clientes.php'; break;
	case 'inserir_clientes': include 'views/inserir_clientes.php'; break;
	case 'funcionarios': include 'views/funcionarios.php'; break;
	case 'inserir_funcionarios': include 'views/inserir_funcionarios.php'; break;
	case 'projetos': include 'views/projetos.php'; break;
	case 'inserir_projetos': include 'views/inserir_projetos.php'; break;
	case 'salarios': include 'views/salarios.php'; break;
	case 'inserir_salarios': include 'views/inserir_salarios.php'; break;
	case 'usuarios': include 'views/usuarios.php'; break;
	case 'inserir_usuarios': include 'views/inserir_usuarios.php'; break;
	case 'relatorio': include 'relatorio.php'; break;
	default: include "views/home.php"; break;
}

#rodapé
include "footer.php";

