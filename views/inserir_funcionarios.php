<? if (!isset($_GET['editar'])){ ?>

<h1>Inserir novo funcionario</h1>
<form name="forma" method="post" action="processa_funcionarios.php">
	<br>
	<label class="badge badge-dark">Nome do Funcionario: </label><br>
	<input class="form-control" type="text" name="nm_funcionario" placeholder="insira o nome do funcionario">
	<br><br>
	<label class="badge badge-dark">Cargo: </label><br>
	<input class="form-control" type="text" name="ds_cargo" placeholder="insira o Cargo">
	<br><br>
	<label class="badge badge-dark">Admissão: </label><br>
	<input class="form-control" type="date" name="dt_admissao">
	<br><br>
	<label class="badge badge-dark">Salario: </label><br>
	<input class="form-control" type="numeric" name="vl_salario" placeholder="insira o salario">
	<br><br>
	<input class="btn btn-success" type="button" value="salvar" onclick="salvar()" name="Inserir funcionario">
</form>

<? } else { ?>
	<? while ($linha = mysqli_fetch_array($consulta_funcionarios)) { ?>
		<? if($linha['cd_funcionario'] == $_GET['editar']){ ?>

			<h1>Editar funcionario</h1>
			<form name="forma" method="post" action="editar_funcionarios.php">
				<input class="form-control" type="hidden" name="cd_funcionario" value="<? echo $linha['cd_funcionario']; ?>">
				<br>
				<label class="badge badge-dark">Nome funcionario:</label><br>
				<input class="form-control" type="text" name="nm_funcionario" placeholder="insira o nome do funcionario" value="<? echo $linha['nm_funcionario']; ?>">
				<br><br>
				<label class="badge badge-dark">Cargo: </label><br>
				<input class="form-control" type="text" name="ds_cargo" placeholder="insira o cargo" value="<? echo $linha['ds_cargo']; ?>">
				<br><br>
				<label class="badge badge-dark">Admissão: </label><br>
				<input class="form-control" type="date" name="dt_admissao" value="<? echo $linha['dt_admissao'];
					echo date("d/m/Y");?>">
				<br><br>
				<label class="badge badge-dark">Salario: </label><br>
				<input class="form-control" type="numeric" name="vl_salario" placeholder="insira o salario" value="<? echo $linha['vl_salario']; ?>">
				<br><br>
				<input class="btn btn-success" type="button" value="salvar" onclick="salvar()" name="editar o funcionario">
			</form>

		<? } ?>
	<? } ?>
<? } ?>

<script language="javascript">	
function salvar()
{
	if (forma.nm_funcionario.value.length < 3) { alert('Preencha o Nome do Funcionario'); }
	else if (forma.ds_cargo.value.length < 4) { alert('Preencha Cargo'); }
	else if (forma.dt_admissao.value.length != 10) { alert('Preencha a data de Admissão'); }
	else if (forma.vl_salario.value.length < 2) { alert('Preencha o salario'); }
	else { forma.submit(); }
}
</script>
