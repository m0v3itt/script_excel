<?php
use Phppot\DataSource;
include_once ("db_connect.php");
include ("header.php");
require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
if ($_SESSION['admin'] == 0) {
	echo "Não tens permissões para aceder a esta página";
	die;
	session_destroy();
}

?>
	<body>
		<br>
		

		<div class="valign-middle text-center">
		<a href="main.php"><img src="return.png" style="width:50px; height:50px; position:absolute;left:2px"></img></a>
        	<h1 class="import-h1">VISÃO GERAL DA ESCALA</h1>
        		<div class="importar container">	
				
				</div>
			</div> 
		
		<form  method="POST">
			<?php
				 
						echo ( 
							'<table class="table table-bordered table-striped" id="example">
								<thead>
									<tr>
									<th>Id</th>
									<th>Nome Praia</th>
									<th>Turno</th>'
							);
							// Selecionar os dias que vão aparecer na tabela
								
								
									$um = $_SESSION['dia1'];
									$dois = $_SESSION['dia2'];
									$query = 'SELECT * FROM tb_dias where id_dia between ? and ? ';
									$paramType = 'ii';
									$paramValue = array(
										$um,
										$dois
									);
									$result = $db->select($query,$paramType,$paramValue);
								
								$x = 0;
								$ArrayIdDias = array();
								$ArrayDias = array();
								foreach($result as $row)
								{
									echo "<th>" . $row['dia'] . "</th>";
									$dia = $row['dia'];
									$id_dia = $row['id_dia'];
									array_push($ArrayIdDias, $id_dia);
									array_push($ArrayDias, $dia);
									$x++;	
								}
								
						 ?>
								</tr>
							</thead>
						<tbody>	
					<?php
						$query = 'SELECT * FROM tb_praia';
						$result = $db->select($query);
									
						foreach($result as $row)
						{
							$id_praia = $row['id_praia'];
							$nome_praia = $row['nome_praia'];
							$turno = $row['turno'];
						
							?>
							
							<tr id="<?php $id_praia; ?>">
							<td> <?php echo $id_praia; ?></td>
							<td><?php echo $nome_praia; ?> </td>
							<td><?php echo $turno; ?></td>
							<?php for ($i = 0;$i < $x;$i++)
							{
								$query = "SELECT * FROM tb_escala 
								inner join tb_nadadores on tb_escala.id_nadador=tb_nadadores.id_nadador
								where id_dia ='$ArrayIdDias[$i]' and  id_praia = '$id_praia' and turno = '$turno'"; 
								$result = $db->select($query);
	
								if ($db->getRecordCount($query)>0){
									
									echo '<td>';
									
									foreach($result as $row){

									echo '('.$row['id_nadador'].')'.$row['nome']. " ";
                                    
									
								}
                                echo '</td>';
								}
								
								
								if($nome_praia == "Reserva" and $turno=="Manhã"){
									$query = "SELECT tb_nadadores.id_nadador, tb_nadadores.nome from tb_nadadores
									inner JOIN tb_disponibilidade on tb_nadadores.id_nadador =  tb_disponibilidade.id_nadador 
									where tb_disponibilidade.id_dia = '$ArrayIdDias[$i]' AND tb_disponibilidade.Manhã = 1 AND 
									tb_nadadores.id_nadador not in 
									(select tb_escala.id_nadador from tb_escala where tb_escala.id_dia = '$ArrayIdDias[$i]' and tb_escala.turno = 'Manhã')
									order by tb_nadadores.id_nadador ASC"; 
									$result = $db->select($query);
									if ($db->getRecordCount($query)>0){
									
										echo '<td>';
										
										foreach($result as $row){
							
										echo '('.$row['id_nadador'].')'.$row['nome']. " ";
										
										
									}
									echo '</td>';
									
									}
								}
								if($nome_praia == "Reserva" and $turno=="Tarde"){
									$query = "SELECT tb_nadadores.id_nadador, tb_nadadores.nome from tb_nadadores
									inner JOIN tb_disponibilidade on tb_nadadores.id_nadador =  tb_disponibilidade.id_nadador 
									where tb_disponibilidade.id_dia = '$ArrayIdDias[$i]' AND tb_disponibilidade.Tarde = 1 AND 
									tb_nadadores.id_nadador not in 
									(select tb_escala.id_nadador from tb_escala where tb_escala.id_dia = '$ArrayIdDias[$i]' and tb_escala.turno = 'Tarde')
									order by tb_nadadores.id_nadador ASC"; 
									$result = $db->select($query);
									if ($db->getRecordCount($query)>0){
									
										echo '<td>';
										
										foreach($result as $row){
							
										echo '('.$row['id_nadador'].')'.$row['nome']. " ";
										
										
									}
									echo '</td>';
									
									}
								}
								
							}
						}
						echo (
							'</tr>
							</tbody>
								</table>
									
										</form>
										<div class="centrar-botao">
										<a href="export_to_excel.php" class="btn btn-submit btn-importar-2" id="download-button" role="button" aria-pressed="true">Exportar</a>
										<a href="export.php" class="btn btn-submit btn-importar-2"  role="button" aria-pressed="true">Editar</a>
									
										</div>'

											
						);
						
					?>
					
		  

<script src="assets/js/select2_configurations.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>          
<script type="text/javascript" src="assets/js/export_csv.js"></script>

</body>

</html>
