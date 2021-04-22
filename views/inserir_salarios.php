<? if (!isset($_GET['editar'])){ ?>

<h1>Inserir novo salario</h1>
<form method="post" action="processa_salarios.php">
	<br>

	<p class="badge badge-dark">Selecione o funcionario: </p>
	<select class="form-control" name="escolhe_funcionario">
		<option>Selecione um funcionario</option>
		<?
		while ($linha = mysqli_fetch_array($consulta_funcionarios)) {
			echo '<option value="'.$linha['cd_funcionario'].'">'.$linha['nm_funcionario'].'</option>';
		}
		?>
	</select>
	<br><br>

	<label class="badge badge-dark">Valor Recebido: </label><br>
	<input class="form-control" type="numeric" name="vl_recebido" placeholder="insira o Valor Recebido">
	<br><br>
	<label class="badge badge-dark">Data de Pagamento: </label><br>
	<input class="form-control" type="date" name="dt_pagamento">
	<br><br>
	<input class="btn btn-success" type="submit" name="Inserir salario">
</form>

<? } else { ?>
	<? while ($linha = mysqli_fetch_array($consulta_salarios)) { ?>
		<? if($linha['cd_salario'] == $_GET['editar']){ ?>

			<h1>Editar salario</h1>
			<form name="forma" method="post" action="editar_salarios.php">
				<input class="form-control" type="hidden" name="cd_salario" value="<? echo $linha['cd_salario']; ?>">
				<br>
				<label class="badge badge-dark">Nome do funcionario: </label><br>
				<input class="form-control" type="text" name="nm_funcionario" value="<? echo $linha['nm_funcionario']; ?>">
				<br><br>
				
				<label class="badge badge-dark">Valor Recebido: </label><br>
				<input class="form-control" type="numeric" name="vl_recebido" placeholder="insira o Valor Recebido" value="<? echo $linha['vl_recebido']; ?>">
				<br><br>
				<label class="badge badge-dark">Data de Pagamento: </label><br>
				<input class="form-control" type="date" name="dt_pagamento" placeholder="insira a Data de Pagamento" value="<? echo $linha['dt_pagamento']; ?>">
				<br><br>
				<input class="btn btn-success" type="button" value="salvar" onclick="salvar()" name="editar o salario">
			</form>

		<? } ?>
	<? } ?>
<? } ?>
<script language="javascript">	
function salvar()
{
	if (forma.vl_recebido.value.length < 3) { alert('Preencha o valor Recebido'); }
	else if (forma.dt_pagamento.value.length < 2) { alert('Preencha a data de pagamento'); }
	else { forma.submit(); }
}
</script>