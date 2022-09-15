<?php 
include_once("db_connect.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Script</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
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
		$sql_query =  "SELECT * FROM tb_dias where id_dia between $um and $dois";
	   	$resultsett = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
    
}
?>
<div class="container home">	
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="range">
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
         <input type="submit" name="enviar">                         
    </form>	 
	<table id="data_table" class="table table-striped">
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


	<script type="text/javascript">

	function downloadCSVFile(csv, filename) {
	    var csv_file, download_link;

	    csv_file = new Blob([csv], {type: "text/csv"});

	    download_link = document.createElement("a");

	    download_link.download = filename;

	    download_link.href = window.URL.createObjectURL(csv_file);

	    download_link.style.display = "none";

	    document.body.appendChild(download_link);

	    download_link.click();
	}

		document.getElementById("download-button").addEventListener("click", function () {
		    var html = document.querySelector("table").outerHTML;
			htmlToCSV(html, "students.csv");
		});


		function htmlToCSV(html, filename) {
			var data = [];
			var rows = document.querySelectorAll("table tr");
					
			for (var i = 0; i < rows.length; i++) {
				var row = [], cols = rows[i].querySelectorAll("td, th");
						
				 for (var j = 0; j < cols.length; j++) {
				        row.push(cols[j].innerText);
		                 }
				        
				data.push(row.join(","));		
			}

			//to remove table heading
			//data.shift()

			downloadCSVFile(data.join("\n"), filename);
		}

	</script>
<script type="text/javascript" src="custom_table_edit.js"></script>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body>
</html>
 



                                                                                                       