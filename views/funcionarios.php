<a class="btn btn-success" href="?pagina=inserir_funcionarios">Insira uma Novo Funcionario</a>
<br><br>
<table class="table table-hover table-striped" id="funcionarios">
	<thead>
		<tr>
			<th>Nome do Funcionario</th>
			<th>Cargo</th>
			<th>Data de Admissão</th>
			<th>Salario</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>

	<tbody>
		<?php 
			while($linha = mysqli_fetch_array($consulta_funcionarios)){
				echo '<tr><td >'.$linha['nm_funcionario'].'</td>';
				echo '<td>'.$linha['ds_cargo'].'</td>';
				echo '<td>'.$linha['dt_admissao'].'</td>';
				echo '<td>'.$linha['vl_salario'].'</td>';
		?>
			<td><a href="?pagina=inserir_funcionarios&editar=<? echo $linha['cd_funcionario']; ?>" onclick="return confirm('Deseja mesmo editar este funcionario?');">
				<i class="fas fa-user-edit"></i>
			</a></td>
			<td><a href="deleta_funcionarios.php?cd_funcionario=<? echo $linha['cd_funcionario']; ?>" onclick="return confirm('Deseja mesmo excluir esse funcionario?');">
				<i class="fas fa-trash-alt"></i>
			</a></td></tr>
		<?
			}
		?>
	</tbody>
</table>