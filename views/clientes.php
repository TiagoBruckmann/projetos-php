<a class="btn btn-success" href="?pagina=inserir_clientes">Insira um Novo cliente</a>
<br><br>
<table class="table table-hover table-striped" id="clientes">
	<thead>
		<tr>
			<th>Nome do Cliente</th>
			<th>Número de Telefone</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>

	<tbody>
		<?php 
			while($linha = mysqli_fetch_array($consulta_clientes)){
				echo '<tr><td >'.$linha['nm_cliente'].'</td>';
				echo '<td>'.$linha['n_fone'].'</td>';
		?>
			<td><a href="?pagina=inserir_clientes&editar=<? echo $linha['cd_cliente']; ?>" onclick="return confirm('Deseja mesmo editar este cliente?');">
				<i class="fas fa-user-edit"></i>
			</a></td>
			<td><a href="deleta_clientes.php?cd_cliente=<? echo $linha['cd_cliente']; ?>" onclick="return confirm('Deseja mesmo excluir esse Clinete?');">
				<i class="fas fa-trash-alt"></i>
			</a></td></tr>
		<?
			}
		?>
	</tbody>
</table> 