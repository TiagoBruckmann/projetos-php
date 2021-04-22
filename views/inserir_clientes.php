<? if (!isset($_GET['editar'])){ ?> 

<h1>Inserir novo cliente</h1>
<form name="forma" method="post" action="processa_clientes.php">
	<br>
	<label class="badge badge-dark">Nome do cliente: </label><br>
	<input class="form-control" type="text" name="nm_cliente" placeholder="insira o nome do cliente">
	<br><br>
	<label class="badge badge-dark">Telefone: </label><br>
	<input class="form-control" type="text" size="13" name="n_fone" placeholder="insira o telefone ex: 99 99999-9999">
	<br><br>
	<input class="btn btn-success" type="button" value="salvar" onclick="salvar()" name="Inserir cliente">
</form>

<? } else { ?>
	<? while ($linha = mysqli_fetch_array($consulta_clientes)) { ?>
		<? if($linha['cd_cliente'] == $_GET['editar']){ ?>

			<h1>Editar clientes</h1>
			<form name="forma" method="post" action="editar_clientes.php">
				<input class="form-control" type="hidden" name="cd_cliente" value="<? echo $linha['cd_cliente']; ?>">
				<br>
				<label class="badge badge-dark">Nome do clientes: </label><br>
				<input class="form-control" type="text" name="nm_cliente" placeholder="insira o nome do cliente" value="<? echo $linha['nm_cliente']; ?>">
				<br><br>
				<label class="badge badge-dark">Telefone: </label><br>
				<input class="form-control" type="text" name="n_fone" size="13" length="13" placeholder="insira o telefone  ex: 99 99999-9999" value="<? echo $linha['n_fone']; ?>">
				<br><br>
				<input class="btn btn-success" type="button" value="salvar" onclick="salvar()" name="editar cliente">
			</form>

		<? } ?>
	<? } ?>
<? } ?>

<script language="javascript">	
function salvar()
{
	if (forma.nm_cliente.value.length < 3) { alert('Preencha o Nome do cliente'); }
	else if (forma.n_fone.value.length != 13) { alert('Preencha Telefone'); }
	else { forma.submit(); }
}
</script>
