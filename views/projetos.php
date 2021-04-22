<a class="btn btn-success" href="?pagina=inserir_projetos">Insira um novo projeto</a>
<br><br>
<table class="table table-hover table-striped" id="projetos">
	<thead>
		<tr>
			<th>Nome do Projeto</th>
			<th>nome do cliente</th>
			<th>Valor Acordado</th>
			<th>valor Recebido</th>
			<th>Data de pagamento</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>

	<tbody>
		<?php 

			//determinar o timezone
			date_default_timezone_set('America/sao_Paulo');
		

			while($linha = mysqli_fetch_array($consulta_projetos)){
				echo '<tr><td >'.$linha['nm_projeto'].'</td>';
				echo '<td>'.$linha['nm_cliente'].'</td>';
				echo '<td>'.$linha['vl_acordado'].'</td>';
				echo '<td>'.$linha['vl_recebido'].'</td>';
				echo '<td>'.$linha['dt_pagamento'].'</td>';
		?>
			<td><a href="?pagina=inserir_projetos&editar=<? echo $linha['cd_projeto']; ?>" onclick="return confirm('Deseja mesmo editar este projeto?');">
				<i class="fas fa-user-edit"></i>
			</a></td>
			<td><a href="deleta_projetos.php?cd_projeto=<? echo $linha['cd_projeto']; ?>" onclick="return confirm('Deseja mesmo excluir esse projeto?');">
				<i class="fas fa-trash-alt"></i>
			</a></td></tr>
		<?
			}
		?>
	</tbody>
</table>