<?php 
include_once("db_connect.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Script</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
</head>
<body class="">

	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>

<?php 



// Selecionar os dias que vão aparecer na tabela


if (isset($_POST["enviar"])) {
    $um=$_POST['dia1'];
	$dois=$_POST['dia2'];
		$sql_query =  "SELECT * from tb_dias where id_dia between $um and $dois";
	   	$resultsett = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    
}
?>
<div class="container home">	
	
	<form  method="post" name="rangee">
       <label> Insira as datas </label>
       
       <?php
       
       // escolher os dias que vão aparecer na tabela
	   $sql_query = "SELECT * FROM tb_dias";
	   $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
       echo"<select name='dia1' size='1' class='form-select form-select-sm'>";
       echo"<option value='' disabled selected hidden> Dias </option>"; 
	   while( $re = mysqli_fetch_assoc($resultset) ) {
                                  $dia1=$re['dia']; 
                                  $id1=$re['id_dia'];
                                  echo"<option value=$id1>$dia1</option>";     
                                  } 
      ?> 
        </select>

        <?php
      $sql_query = "SELECT * FROM tb_dias";
	  $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
       echo"<select name='dia2' size='1' class='form-select form-select-sm'>";
       echo"<option value='' disabled selected hidden> Dias </option>"; 
	   while( $re = mysqli_fetch_assoc($resultset) ) {
                                  $dia2=$re['dia']; 
                                  $id2=$re['id_dia'];
                                  echo"<option value=$id2>$dia2</option>";     
                                  } 
      ?> 
        </select>
         <input type="submit" name="enviar" class="alertButton">                         
    </form>	 
	
	<table id="data_table" class="table table-dark">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome Praia</th>
				<th>Turno</th>
				<?php 
				$x=0;
				while( $row = mysqli_fetch_assoc($resultsett) ) {
					 
					echo "<th>".$row['dia']."</th>";
                            $id_dia=$row['id_dia'];
							$x++;
				}
						
				?>
				
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql_query = "SELECT * FROM tb_praia";
			$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			while( $developer = mysqli_fetch_assoc($resultset) ) {
			?>
			   <tr id="<?php echo $developer ['id_praia']; ?>">
			   <td><?php echo $developer ['id_praia']; ?></td>
			   <td><?php echo $developer ['nome_praia']; ?></td>
			   <td><?php echo $developer ['turno']; ?></td>
			   <?php for($i=0;$i<$x;$i++){
				echo "<td>".' '."</td>";
			   }
			   ?>

			</tr>
			<?php } ?>

		</tbody>
    </table>	
    <div style="margin:50px 0px 0px 0px;">
    <button id="download-button">Download CSV</button> 
	</div>                       
    
	
	
</div>
<script>
	$('.table').onload(function()
{
                                                  
    var selectedElements = $('th');
	for(int i=2; i<selectedElements.length; i++){
		console.log(i)
	}  
                      
});

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>          
<script type="text/javascript" src="js/custom_table_edit.js"></script>
<script type="text/javascript" src="js/export_csv.js"></script>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body>
</html>
 



                                                                                                       