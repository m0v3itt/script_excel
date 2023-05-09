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
    <?php include("header.php") ?>
    <title>Estatisticas</title>
</head>
<body>
    
</body>
</html>
<body>
<?php include("nav.php") ?>

  

<div id="content" class="p-4 p-md-5 pt-5">
<br>
<div>
    <a href="import_praia.php"><button class="btn-primary">Adicionar Praia</button></a>
</div>
<br>
    <table class="table table-bordered " id="tabela">

        <thead>
        <tr>
            <th>Id</th>
            <th>Nome da Praia</th>
            <th>Numero de nadadores</th>
            <th>Turno</th>
            
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
                        <tr>
                            <td> <?php echo $id_praia; ?></td>
							<td><?php echo $nome_praia; ?> </td>
                           

                            <td>
                            <?php
                            if($nr_nadadores==1){
                                echo
                                    ('
                                    <form>
                                    <div class="form-check form-check-inline">
                                        <input type="radio"  id="2" class="form-check-input" name="nr_nadadores" value="1"  data-id_praia="'.$id_praia.'" checked>
                                        <label class="form-check-label" for="1">1</label>
                                        <br>
                                        </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio"  id="2" class="form-check-input" name="nr_nadadores" value="2"  data-id_praia="'.$id_praia.'">
                                        <label class="form-check-label" for="2">2</label>
                                        <br>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input type="radio" id="3" class="form-check-input" name="nr_nadadores" value="3" data-id_praia="'.$id_praia.'">
                                        <label class="form-check-label" for="3">3</label>
                                        <br>
                                        </div>
                                        </form>
                                        
                                    '
                                    );
                            };
							 		if($nr_nadadores==2){
										echo
											('
											<form>
                                            <div class="form-check form-check-inline">
                                        <input type="radio"  id="2" class="form-check-input " name="nr_nadadores" value="1"  data-id_praia="'.$id_praia.'" >
                                        <label class="form-check-label" for="1">1</label>
                                        <br>
                                        </div>
											<div class="form-check form-check-inline">
												<input type="radio"  id="2" class="form-check-input" name="nr_nadadores" value="2"  data-id_praia="'.$id_praia.'" checked>
												<label class="form-check-label" for="2">2</label>
												<br>
												</div>
												<div class="form-check form-check-inline">
												<input type="radio" id="3" class="form-check-input" name="nr_nadadores" value="3" data-id_praia="'.$id_praia.'">
												<label class="form-check-label" for="3">3</label>
												<br>
												</div>
												</form>
												
											'
											);
									};
									
									if($nr_nadadores==3){
										echo('
										<form>
                                        <div class="form-check form-check-inline">
                                        <input type="radio"  id="2" class="form-check-input" name="nr_nadadores" value="1"  data-id_praia="'.$id_praia.'" >
                                        <label class="form-check-label" for="1">1</label>
                                        <br>
                                        </div>
										<div class="form-check form-check-inline">
											<input type="radio"  id="2" class="form-check-input" name="nr_nadadores" value="2" data-id_praia="'.$id_praia.'">
											<label class="form-check-label" for="2">2</label>
											<br>
											</div>
											<div class="form-check form-check-inline">
											<input type="radio" id="3" class="form-check-input" name="nr_nadadores" value="3" data-id_praia="'.$id_praia.'" checked>
											<label class="form-check-label" for="3">3</label>
											<br>
										</div>
										</form>
										');
									}; 
							 	?>
							 </td>
                             <td><?php echo $turno; ?> </td>
                        
                      
                        
                            <?php
                    }
                    ?>
                        
               
            </tr>
        </tbody>
            

    </table>
</div>
<?php include("footer.php");?>
<script>
    $(document).ready(function () {
    $('#tabela').DataTable({
        "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese.json"
        } 
    });
    });
</script>
<script>  
	$('input[type="radio"]').click(function(){  
        var nr = $(this).val();
        var id_praia = $(this).data("id_praia");
        $.ajax({  
                url:"radio_button.php",  
                method:"POST",  
                data:{nr:nr,
                    id_praia:id_praia

                },    
        }).done(window.location.reload());  
	});  
</script>
</body>

</html>
