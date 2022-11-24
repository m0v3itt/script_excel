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
        	<h1 class="import-h1">INSIRA AS DATAS</h1>
        		<div class="importar container">	
					<form  method="post" name="rangee">
						<?php
							// escolher os dias que vão aparecer na tabela
							$query = 'SELECT * FROM tb_dias ';
							$result = $db->select($query);
							
							echo "<select name='dia1' size='1' class='form-select form-select-sm'>";
							echo "<option value='' disabled selected hidden> De </option>";
							foreach($result as $row){
								echo $row['dia'];
								$dia1 = $row['dia'];
								$id1 = $row['id_dia'];
								echo "<option value=$id1>$dia1</option>";
							}
						?> 
							</select>
						<?php
							$query = 'SELECT * FROM tb_dias ';
							$result = $db->select($query);
							echo "<select name='dia2' size='1' class='form-select form-select-sm'>";
							echo "<option value='' disabled selected hidden> A </option>";
							foreach($result as $row)
							{
								$dia2 = $row['dia'];
								$id2 = $row['id_dia'];
								echo "<option value=$id2>$dia2</option>";
							}

							$data = "Escala"
						?> 
							</select>
						<button type="submit" name="submeter" class="btn-submit btn-importar"> Enviar </button>                         
					</form>
				</div>
			</div> 
		<form  method="POST">
			<?php
				 if (isset($_POST["submeter"]))
					{
						echo ( 
							'<table class="table table-bordered table-striped" id="example">
								<thead>
									<tr>
									<th>Id</th>
									<th>Nome Praia</th>
									<th>Turno</th>'
							);
							// Selecionar os dias que vão aparecer na tabela
								if (isset($_POST["submeter"]))
								{
									$um = $_POST['dia1'];
									$dois = $_POST['dia2'];
									$query = 'SELECT * FROM tb_dias where id_dia between ? and ? ';
									$paramType = 'ii';
									$paramValue = array(
										$um,
										$dois
									);
									$result = $db->select($query,$paramType,$paramValue);
								}
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
								json_encode($ArrayDias);
								//Gerar código para a escala
								$PrimeiraDataCodigo = $ArrayDias[0];
								$SegundaDataCodigo = end($ArrayDias);
								$codigo = "Escala_".$PrimeiraDataCodigo."_".$SegundaDataCodigo;
								$query = "insert into tb_historico(codigo) values(?)";
									$paramType = "s";
									$paramArray = array(
										$codigo
									);
									$insertId = $db->insert($query, $paramType, $paramArray);
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
									echo '<select name="nadadores[]" size="1" class="form-select multiple-select" style="width:185px" data-ajax--url="Dropdown.php?dia='.$ArrayIdDias[$i].'&turno='.$turno.'&praia='.$id_praia.'&codigo='.$codigo.'" data-turno = "'.$turno.'" data-praia="'.$id_praia.'" data-dia="'.$ArrayIdDias[$i].'" data-codigo="'.$codigo.'"  multiple>';
									foreach($result as $row){

									echo '<option value=' .$row['id_nadador'].'  selected>'.$row['nome'].'</option>';
									
								}
								echo '</select>';
								}
								
								else{
								echo (
									'<td>
									<select name="nadadores[]" size="1" class="form-select multiple-select" style="width:185px" data-ajax--url="Dropdown.php?dia='.$ArrayIdDias[$i].'&turno='.$turno.'&praia='.$id_praia.'&codigo='.$codigo.'" data-turno = "'.$turno.'" data-praia="'.$id_praia.'" data-dia="'.$ArrayIdDias[$i].'" data-codigo="'.$codigo.'"  multiple></select>
									<br>
									</td>'
									);	
								}
								
							}
						}
						echo (
							'</tr>
							</tbody>
								</table>
									<input type="submit" name="enviar" value="Enviar">
										</form>
											<div style="margin:50px 0px 0px 0px;">
												<button id="download-button">Download CSV</button> 
											</div>'
						);
					}				
					?>
					
		  
<script src="assets/js/DataTables_configuration.js"></script>
<script src="assets/js/select2_configurations.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>          
<script type="text/javascript" src="assets/js/export_csv.js"></script>

</body>

</html>
