<?php
include_once ("db_connect.php");
include_once ("db_connect.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Script</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="js/jquery-3.6.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
		<script type="text/javascript" src="DataTables/datatables.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		
	</head>
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
		

		<form  method="post" name="rangee">
		<label> Insira as datas </label>
		<?php
			// escolher os dias que vão aparecer na tabela
			$sql_query = "SELECT * FROM tb_dias";
			$resultset = mysqli_query($conn, $sql_query);
			echo "<select name='dia1' size='1' class='form-select form-select-sm'>";
			echo "<option value='' disabled selected hidden> Dias </option>";
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
			echo "<option value='' disabled selected hidden> Dias </option>";
			while ($re = mysqli_fetch_assoc($resultset))
			{
				$dia2 = $re['dia'];
				$id2 = $re['id_dia'];
				echo "<option value=$id2>$dia2</option>";
			}
		?> 
			</select>
			<input type="submit" name="submeter" class="alertButton">                         
		</form>	 
		<form  method="POST">
		<table class="table-responsive table-bordered" id="example">
		
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome Praia</th>
					<th>Turno</th>
					<?php
						$x = 0;
						$dias = array();
						$id_diasLenght = count($dias);
						while ($row = mysqli_fetch_assoc($resultsett))
						{
							echo "<th>" . $row['dia'] . "</th>";
							$dia = $row['dia'];
							$id_dia = $row['id_dia'];
							array_push($dias, $id_dia);
							$x++;	
						}
						echo "<input type='hidden' name='dias[]' value=$id_dia >";

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
						<input type='hidden' name='id_praia[]' value=<?php echo $id_praia ;?> >
						<input type='hidden' name='nome_praia[]' value=<?php echo $nome_praia ;?> >
						<input type='hidden' name='turno[]' value=<?php echo $turno ;?> >
						<?php for ($i = 0;$i < $x;$i++)
						{	
							if ($id_praia % 2 == 0){
							
								$query = "SELECT tb_nadadores.id_nadador, nome from tb_disponibilidade inner JOIN 
								tb_nadadores on tb_disponibilidade.id_nadador=tb_nadadores.id_nadador 
								where id_dia = $dias[$i] and Tarde=1 order by id_nadador ASC";
							}else{
								$query = "SELECT tb_nadadores.id_nadador, nome from tb_disponibilidade inner JOIN 
								tb_nadadores on tb_disponibilidade.id_nadador=tb_nadadores.id_nadador 
								where id_dia = $dias[$i] and Manhã=1 order by id_nadador ASC ";
							}
							$resposta = mysqli_query($conn, $query);
							echo (
								'<td>
								<select name="nadadores[]"  size="1" class="form-select multiple-select"  data-turno = "'.$turno.'" data-praia="'.$id_praia.'" data-dia="'.$dias[$i].'" data-id_escala="'.$x.'"  multiple>
								<br>'
							);		
							if (mysqli_num_rows($resposta) > 0)
							{
								while ($teste = mysqli_fetch_assoc($resposta))
								{
									$nadador = $teste['nome'];
									$id_nadador = $teste['id_nadador'];
									echo "<option value=$id_nadador>$nadador</option>";	
								}
								echo '</select>';					
							}
							else{
								echo 'Não foram encontrados resultados!';
							}
	
						}
					}				
						?>
					</tr>
				</tbody>
			</table>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		<div style="margin:50px 0px 0px 0px;">
			<button id="download-button">Download CSV</button> 
		</div>                       
<script>
	$(document).ready( function () {
    	$('#example').DataTable({
			"ordering": false,
			language:{
				lengthMenu: "Apresenta _MENU_ praias por página",
				zeroRecords: "Não existem resultados",
				info: "Página _PAGE_ de _PAGES_",
				infoEmpty: "Não existem resultados",
				infoFiltered: "(Filtrado de um total de _MAX_ praias)",
				paginate: {
					first:      "Primeiro",
					last:       "Ultimo",
					next:       "Próximo",
					previous:   "Anterior"
    			}
			}
		});
} );
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>          
<script type="text/javascript" src="js/export_csv.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>



	$(".multiple-select").select2({
  	  maximumSelectionLength: 2,
	  language: "pt",
	  width: 'resolve'
	});
	
	$('.multiple-select').on('select2:select', function (e) {
		var  {id}  = e.params.data;
		
		var { dia, praia, turno} = e.currentTarget.dataset
		
		console.log({ dia, praia, id, turno});
		$.post('data.php', { dia, praia, id, turno })
		// console.log(data);
		
	})
	
	$('.multiple-select').on('select2:unselect', function (remove) {
		var  {id}  = remove.params.data;
		var { dia, praia, turno} = remove.currentTarget.dataset
		$.post('remove.php',  { dia, praia, id, turno })
        console.log( { dia, praia, id, turno });
});





</script>
</body>

</html>




                                                                                                       