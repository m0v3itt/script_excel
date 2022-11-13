<?php
use Phppot\DataSource;
include_once ("db_connect.php");
include ("header.php");
require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
?>
	<body>
		<?php
		// Selecionar os dias que vão aparecer na tabela
			if (isset($_POST["submeter"]))
			{
				
				$um = $_POST['dia1'];
				$dois = $_POST['dia2'];
				$sql_query = "SELECT * from tb_dias where id_dia between $um and $dois";
				$resultsett = mysqli_query($conn, $sql_query);
			}
			?>
		<br>
		<div class="valign-middle text-center">
        	<h1 class="import-h1">INSIRA AS DATAS</h1>
        		<div class="importar container">	
					<form  method="post" name="rangee">
		
		<?php
			// escolher os dias que vão aparecer na tabela
			$sql_query = "SELECT * FROM tb_dias";
			$resultset = mysqli_query($conn, $sql_query);
			echo "<select name='dia1' size='1' class='form-select form-select-sm'>";
			echo "<option value='' disabled selected hidden> De </option>";
			while ($re = mysqli_fetch_assoc($resultset))
			{
				$dia1 = $re['dia'];
				$id1 = $re['id_dia'];
				
				echo "<option value=$id1>$dia1</option>";
			}
		?> 
			</select>
		<?php
			$sql_query = "SELECT * FROM tb_dias";
			$resultset = mysqli_query($conn, $sql_query);
			echo "<select name='dia2' size='1' class='form-select form-select-sm'>";
			echo "<option value='' disabled selected hidden> A </option>";
			while ($re = mysqli_fetch_assoc($resultset))
			{
				$dia2 = $re['dia'];
				$id2 = $re['id_dia'];
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
							echo ( '<table class="table table-bordered table-striped" id="example">
										<thead>
											<tr>
											<th>Id</th>
											<th>Nome Praia</th>
											<th>Turno</th>');
						$x = 0;
						$ArrayIdDias = array();
						$ArrayDias = array();
						while ($row = mysqli_fetch_assoc($resultsett))
						{
							echo "<th>" . $row['dia'] . "</th>";
							$dia = $row['dia'];
							$id_dia = $row['id_dia'];
							array_push($ArrayIdDias, $id_dia);
							array_push($ArrayDias, $dia);
							$x++;	
						}
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
						
						$sql_query = "SELECT * FROM tb_praia";
						$resultset = mysqli_query($conn, $sql_query);
						while ($res = mysqli_fetch_assoc($resultset))
						{
							$id_praia = $res['id_praia'];
							$nome_praia = $res['nome_praia'];
							$turno = $res['turno'];
						?>
						<tr id="<?php $id_praia; ?>">
						<td> <?php echo $id_praia; ?></td>
						<td><?php echo $nome_praia; ?> </td>
						<td><?php echo $turno; ?></td>
						<?php for ($i = 0;$i < $x;$i++)
						{
							echo (
								'<td>
								<select name="nadadores[]" size="1" class="form-select multiple-select" style="width:185px" data-ajax--url="Dropdown.php?dia='.$ArrayIdDias[$i].'&turno='.$turno.'&praia='.$id_praia.'&codigo='.$codigo.'" data-turno = "'.$turno.'" data-praia="'.$id_praia.'" data-dia="'.$ArrayIdDias[$i].'" data-codigo="'.$codigo.'"  multiple></select>
								<br>'
							);		
							
						}
					}
					echo ('</tr>
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
