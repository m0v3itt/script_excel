<?php
use Phppot\DataSource;
include_once ("db_connect.php");
include_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
if ($_SESSION['admin'] == 0) {
	echo "Não tens permissões para aceder a esta página";
	die;
	session_destroy();
}

?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<?php include("header.php"); ?>
			<title>Exportar</title>
		</head>
		<body>
			<?php include("nav.php");?>
		<div id="content" class="p-4 p-md-5 pt-5">

	
		<div class="valign-middle text-center">
        	<h1 class="import-h1">INSIRA AS DATAS</h1>
        		<div class="importar container">	
					<form  method="post" name="rangee">
						<?php
							// escolher os dias que vão aparecer na tabela
							$query = 'SELECT * FROM tb_dias where estado=1 ';
							$result = $db->select($query);
							
							echo "<select name='dia1' size='1' class='form-select form-select-sm'>";
							echo "<option value='' disabled selected hidden> De </option>";
							foreach($result as $row){
								echo $row['dia'];
								$dia1 = date("d/m/Y", strtotime($row['dia']));
								$id1 = $row['id_dia'];
								echo "<option value=$id1>$dia1</option>";
							}
						?> 
							</select>
						<?php
							$query = 'SELECT * FROM tb_dias where estado=1 ';
							$result = $db->select($query);
							echo "<select name='dia2' size='1' class='form-select form-select-sm'>";
							echo "<option value='' disabled selected hidden> A </option>";
							foreach($result as $row)
							{
								$dia2 = date("d/m/Y", strtotime($row['dia']));
								$id2 = $row['id_dia'];
								echo "<option value=$id2>$dia2</option>";
							}

						?> 
							</select>
						<button type="submit" name="submeter" class="btn-submit btn-importar"> Enviar </button>                         
					</form>
					</div>
				
				<br>
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
									$dias = date("d/m/Y", strtotime($row['dia']));
									echo "<th>" . $dias . "</th>";
									$dia = $row['dia'];
									$id_dia = $row['id_dia'];
									array_push($ArrayIdDias, $id_dia);
									array_push($ArrayDias, $dia);
									$x++;	
								}
								$data1 = $ArrayIdDias[0];
								$data2 = end($ArrayIdDias);
								
							
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
									echo '<select name="nadadores[]" size="1" class="form-select multiple-select" style="width:185px"  data-ajax--url="Dropdown.php?dia='.$ArrayIdDias[$i].'&turno='.$turno.'&praia='.$id_praia.'" data-turno = "'.$turno.'" data-praia="'.$id_praia.'" data-dia="'.$ArrayIdDias[$i].'" data-data1="'.$data1.'" data-data2="'.$data2.'"  multiple>';
									foreach($result as $row){

									echo '<option value=' .$row['id_nadador'].'  selected>'.$row['nome'].'</option>';
									
								}
								echo '</select>';
								}
								
								else{
								echo (
									'<td>
									<select name="nadadores[]" size="1" class="form-select multiple-select" style="width:185px" data-ajax--url="Dropdown.php?dia='.$ArrayIdDias[$i].'&turno='.$turno.'&praia='.$id_praia.'" data-turno = "'.$turno.'" data-praia="'.$id_praia.'" data-dia="'.$ArrayIdDias[$i].'" data-data1="'.$data1.'" data-data2="'.$data2.'"  multiple></select>
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
										</form>
											<div class="centrar-botao">
											<a href="visualizar.php?data1='. $data1 .'&data2='.$data2.'" class="btn btn-submit btn-importar-2" role="button" aria-pressed="true">Exportar</a>

											</div>
											</section>'
										
						);
					}				
					?>
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                   	<div class="modal-dialog modal-dialog-centered" role="document">
                       <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Disponibilidade do nadador</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
					   <form action="" id="my-form" class="form-radio" method="POST">
							<p>Selecione os dias em que quer que o nadador trabalhe:</p>
							<div id = "container"></div>
						
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						   <button type="button" class="btn btn-primary" name = "enviar" id="enviar">Enviar</button>
						   </form>
                 
                       </div>
                       </div>
                   </div>
                   </div>
				   </div>
				<?php include("footer.php"); ?>
									
        
</body>

</html>
