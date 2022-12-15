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
		<?php include('header.php');?>
		<title>Preferências</title>
	</head>
	<body>
		<?php include("nav.php") ?>
		<div id="content" class="p-4 p-md-5 pt-5">
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
                                if ($db->getRecordCount($query)>0){
                              	 echo '<td>';
                                foreach($result as $row){
                                    if($row['Manhã']==1 && $row['Tarde']==1){
                                        echo 'Manhã Tarde';
                                    }
                                    
                                    if($row['Manhã']==1 and $row['Tarde']==0 ){
                                        echo  'Manhã';
                                    }
                                 
                                     if($row['Tarde']==1 and $row['Manhã']==0){
                                        echo 'Tarde';
                                    }
                                     
                                }
								echo '</td>' ;
							}
							else{
								echo '<td>  </td>';
							}
                                
                            }
								
							}
						}

									
					?>
					</div>
			<?php include("footer.php");?>
</body>

</html>
