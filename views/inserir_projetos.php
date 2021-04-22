<? if (!isset($_GET['editar'])){ ?>

<h1>Inserir novo projeto</h1>
<form name="forma" method="post" action="processa_projetos.php">
	<br>
	<label class="badge badge-dark">Nome do projeto: </label><br>
	<input class="form-control" type="text" name="nm_projeto" placeholder="insira o nome do projeto">
	<br><br>

	<p class="badge badge-dark">Selecione o Cliente: </p>
	<select class="form-control" name="escolhe_cliente">
		<option>Selecione um Cliente</option>
		<?
		while ($linha = mysqli_fetch_array($consulta_clientes)) {
			echo '<option value="'.$linha['cd_cliente'].'">'.$linha['nm_cliente'].'</option>';
		}
		?>
	</select>
	<br><br>

	<label class="badge badge-dark">Valor Acordado: </label><br>
	<input class="form-control" type="numeric" name="vl_acordado" placeholder="insira o Valor Acordado">
	<br><br>
	<label class="badge badge-dark">Valor Recebido: </label><br>
	<input class="form-control" type="numeric" name="vl_recebido" placeholder="insira o Valor Recebido">
	<br><br>
	<label class="badge badge-dark">Data de Pagamento: </label><br>
	<input class="form-control" type="date" name="dt_pagamento" >
	<br><br>
	<input class="btn btn-success" type="button" value="salvar" onclick="salvar()" name="Inserir projeto">
</form>

<? } else { ?>
	<? while ($linha = mysqli_fetch_array($consulta_projetos)) { ?>
		<? if($linha['cd_projeto'] == $_GET['editar']){ ?>

			<h1>Editar projeto</h1>
			<form name="forma" method="post" action="editar_projetos.php">
				<input class="form-control" type="hidden" name="cd_projeto" value="<? echo $linha['cd_projeto']; ?>">
				<br>
				<label class="badge badge-dark">Nome projeto:</label><br>
				<input class="form-control" type="text" name="nm_projeto" placeholder="insira o nome do projeto" value="<? echo $linha['nm_projeto']; ?>">
				<br><br>

				<label class="badge badge-dark">Nome do clientes: </label><br>
				<input class="form-control" type="text" name="nm_cliente" value="<? echo $linha['nm_cliente']; ?>">
				<br><br>
				
				<label class="badge badge-dark">Valor Acordado: </label><br>
				<input class="form-control" type="numeric" name="vl_acordado" placeholder="insira o Valor Acordado" value="<? echo $linha['vl_acordado']; ?>">
				<br><br>
				<label class="badge badge-dark">Valor Recebido: </label><br>
				<input class="form-control" type="numeric" name="vl_recebido" placeholder="insira o Valor recebido" value="<? echo $linha['vl_recebido']; ?>">
				<br><br>
				<label class="badge badge-dark">Data de Pagamento: </label><br>
				<input class="form-control" type="date" name="dt_pagamento" value="<? echo $linha['dt_pagamento']; ?>">
				<br><br>
				<input class="btn btn-success" type="button" value="salvar" onclick="salvar()" name="editar o projeto">
			</form>

		<? } ?>
	<? } ?>
<? } ?>

<script language="javascript">	
function salvar()
{
	if (forma.nm_projeto.value.length < 3) { alert('Preencha o Nome do Projeto'); }
	else if (forma.vl_acordado.value.length < 2) { alert('Preencha o valor do acordo'); }
	//else if (forma.vl_recebido.value.length < 2) { alert('Preencha o valor Recebido'); }
	//else if (forma.dt_pagamento.value.length < 10) { alert('Preencha a data de Pagamento'); }
	else { forma.submit(); }
}
</script>