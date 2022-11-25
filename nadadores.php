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
		<a href="index.php"><img src="return.png" style="width:50px; height:50px; position:absolute;left:2px"></img></a>
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
									<th>Nadador</th>
									<th>Preferências</th>'
							);
							// Selecionar os dias que vão aparecer na tabela
								if (isset($_POST["submeter"]))
								{
									
									$um = $_POST['dia1'];
									$dois = $_POST['dia2'];
									$_SESSION['dia1'] = $um;
									$_SESSION['dia2'] = $dois;
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
						 ?>
								</tr>
							</thead>
						<tbody>	
					<?php
						$query = 'SELECT * FROM tb_nadadores 
                        ';
                        $result = $db->select($query);
                                    
                        foreach($result as $row){   
                            $id_nadador = $row['id_nadador'];
                            $nome_nadador = $row['nome'];
                            $preferenicas = $row['preferencia'];

                            ?>
                            
                            <tr id="<?php $id_praia; ?>">
                            <td> <?php echo $id_nadador; ?></td>
                            <td> <?php echo $nome_nadador; ?></td>
                            <td><?php echo $preferenicas; ?> </td>
							<?php for ($i = 0;$i < $x;$i++)
							{
                                $query = " SELECT * FROM tb_disponibilidade 
                                INNER JOIN tb_nadadores ON tb_nadadores.id_nadador=tb_disponibilidade.id_nadador
                                WHERE id_dia = $ArrayIdDias[$i] and  tb_disponibilidade.id_nadador = $id_nadador ";

                                $result = $db->select($query);
                                $turnoDoNadador='';
                               echo '<td>';
                                foreach($result as $row){
                                    if($row['Manhã']==1 && $row['Tarde']==1){
                                        echo 'Manhã Tarde';
                                    }
                                    
                                    if($row['Manhã']==1){
                                        echo  'Manhã';
                                    }
                                 
                                     if($row['Tarde']==1){
                                        echo 'Tarde';
                                    }
                                     
                                }
                                echo '</td>' ;
                            }
								
							}
						}
						echo (
							'</tr>
							</tbody>
								</table>
										</form>
											<div class="centrar-botao">
											<a href="export_to_excel.php" class="btn btn-submit btn-importar-2" role="button" aria-pressed="true">Exportar</a>
											</div>'
						);
									
					?>
					
		  
<script src="assets/js/DataTables_configuration.js"></script>
<script src="assets/js/select2_configurations.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>          


</body>

</html>