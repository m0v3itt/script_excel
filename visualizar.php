<?php
use Phppot\DataSource;
include_once ("db_connect.php");

require_once 'DataSource.php';
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
	<title>Visualizar Escala</title>
</head>
<body>
	
</body>
</html>
	<body>
	<?php include("nav.php"); ?>
	<div id="content" class="p-4 p-md-5 pt-5">
		<div class="valign-middle text-center">

        	<h1 class="import-h1">VISÃO GERAL DA ESCALA</h1>
        		<div class="importar container">	
				
				</div>
			</div> 
		
		<form  method="POST">
			<?php

				 if( isset($_GET['data1']) && isset($_GET['data2']) ){
					$data1 = $_GET['data1'];
					$data2 = $_GET['data2'];
				 
						echo ( 
							'<table class="table table-bordered table-striped" id="table">
								<thead>
									<tr>
									<th>Praia</th>
									<th>Turno</th>'
							);
							// Selecionar os dias que vão aparecer na tabela
								$query = "SELECT * FROM tb_dias where id_dia = '$_GET[data1]'";
								$result = $db->select($query);
								foreach($result as $row){
									$diaUm = $row['id_dia'];
								}
								$query = "SELECT * FROM tb_dias where id_dia = '$_GET[data2]'";
								$result = $db->select($query);
								foreach($result as $row){
									$diaDois = $row['id_dia'];
								}

								$query = "SELECT * from tb_dias where id_dia between '$diaUm' and '$diaDois' ";
								$result = $db->select($query);
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
							$nr_nadadores = $row['nr_nadadores'];
						
							?>
							
							<tr id="<?php $id_praia; ?>">
							
							<td><?php echo $nome_praia; ?> </td>
							
							<td><?php echo $turno; ?></td>
							<?php for ($i = 0;$i < $x;$i++)
							{
								
								if($nome_praia != "Reserva"){
								$query = "SELECT * FROM tb_escala 
								inner join tb_nadadores on tb_escala.id_nadador=tb_nadadores.id_nadador
								inner join tb_praia on tb_escala.id_praia=tb_praia.id_praia
								where tb_escala.id_dia ='$ArrayIdDias[$i]' and  tb_escala.id_praia = '$id_praia' and tb_escala.turno = '$turno'"; 
								$result = $db->select($query);

								$query2 = "SELECT nr_nadadores FROM tb_praia
								where id_praia = '$id_praia' and turno = '$turno'"; 
								$result2 = $db->select($query2);
								foreach($result2 as $row2){
									$nr_nadadores = $row2['nr_nadadores'];
								}

								
								
								if ($db->getRecordCount($query)==$nr_nadadores){
								echo '<td style="background-color:green;" >';
								foreach($result as $row){
								echo '('.$row['id_nadador'].')'.$row['nome']. " ";
								}
								echo '</td>';
							    }
								if ($db->getRecordCount($query)>$nr_nadadores){
									echo '<td style="background-color:orange;" >';
									foreach($result as $row){
									echo '('.$row['id_nadador'].')'.$row['nome']. " ";
									}
									echo '</td>';
								}
								if ($db->getRecordCount($query)<$nr_nadadores && $db->getRecordCount($query)!=0 ){
									echo '<td style="background-color:yellow;" >';
									foreach($result as $row){
										echo '('.$row['id_nadador'].')'.$row['nome']. " ";
										}
									echo '</td>';
								}
								if ($db->getRecordCount($query)==0){
									echo '<td style="background-color:red;" >';
									
									echo '</td>';
								}

								
						

							}
								if($nome_praia == "Reserva" and $turno=="Manhã"){
									$query = "SELECT tb_nadadores.id_nadador, tb_nadadores.nome from tb_nadadores
									inner JOIN tb_disponibilidade on tb_nadadores.id_nadador =  tb_disponibilidade.id_nadador 
									where tb_disponibilidade.id_dia = '$ArrayIdDias[$i]' AND tb_disponibilidade.Manhã = 1 AND 
									tb_nadadores.id_nadador not in 
									(select tb_escala.id_nadador from tb_escala where tb_escala.id_dia = '$ArrayIdDias[$i]' and tb_escala.turno = 'Manhã')
									order by tb_nadadores.id_nadador ASC"; 
									$result = $db->select($query);
									echo '<td>';
									if ($db->getRecordCount($query)>0){
									
										
										
										foreach($result as $row){
							
										echo '('.$row['id_nadador'].')'.$row['nome']. " ";
										
										
									}
									
									
									}
									echo '</td>';
								}
								if($nome_praia == "Reserva" and $turno=="Tarde"){
									$query = "SELECT tb_nadadores.id_nadador, tb_nadadores.nome from tb_nadadores
									inner JOIN tb_disponibilidade on tb_nadadores.id_nadador =  tb_disponibilidade.id_nadador 
									where tb_disponibilidade.id_dia = '$ArrayIdDias[$i]' AND tb_disponibilidade.Manhã = 1 AND 
									tb_nadadores.id_nadador not in 
									(select tb_escala.id_nadador from tb_escala where tb_escala.id_dia = '$ArrayIdDias[$i]' and tb_escala.turno = 'Tarde')
									order by tb_nadadores.id_nadador ASC"; 
									$result = $db->select($query);
									echo '<td>';
									if ($db->getRecordCount($query)>0){
									
										
										
										foreach($result as $row){
							
										echo '('.$row['id_nadador'].')'.$row['nome']. " ";
										
										
									}
									
									
									}
									echo '</td>';
								}
							
							}
						}
						echo (
							'</tr>
							</tbody>
								</table>
									
										</form>
										<div class="centrar-botao">
										<button class="btn btn-submit btn-importar-2" id="download-button" role="button" aria-pressed="true">Exportar</button>
										<a href="edit.php?data1='.  $data1.'&data2='.$data2.'" class="btn btn-submit btn-importar-2"  role="button" aria-pressed="true">Editar</a>
									
										</div>'

											
						);
					}
					?>
				</div>
<?php include('footer.php'); ?>
<!-- <script>
    $(document).ready( function () {
        $('#table').DataTable( {
			"ordering": false,
        	
        "lengthMenu": [100],
            dom: 'Bfrtip',
			buttons: [
    {
        extend: 'csv',
        text: 'Export csv',
        charset: 'utf-8',
        extension: '.csv',
        fieldSeparator: ';',
        fieldBoundary: '',
        filename: 'export',
        bom: true
    }
],
            className: 'btn btn-default btn-sm'
        } );
    } );

</script> -->

</body>

</html>
