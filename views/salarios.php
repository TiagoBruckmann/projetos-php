<a class="btn btn-success" href="?pagina=inserir_salarios">Insira um Novo salario</a>
<br><br>
<table class="table table-hover table-striped" id="salarios">
	<thead>
		<tr>
			<th>Nome do Funcionario</th>
			<th>Salario</th>
			<th>Valor Recebido</th>
			<th>Data de pagamento</th>
			<th>Editar</th>
		</tr>
	</thead>

	<tbody>
		<?php 
			while($linha = mysqli_fetch_array($consulta_salarios)){
				echo '<tr><td >'.$linha['nm_funcionario'].'</td>';
				echo '<td>'.$linha['vl_salario'].'</td>';
				echo '<td>'.$linha['vl_recebido'].'</td>';
				echo '<td>'.$linha['dt_pagamento'].'</td>';
		?>
			<td><a href="?pagina=inserir_salarios&editar=<? echo $linha['cd_salario']; ?>" onclick="return confirm('Deseja mesmo editar esse salario?');">
				<i class="fas fa-edit"></i>
			</a></td></tr>
		<?
			}
		?>
	</tbody>
</table>