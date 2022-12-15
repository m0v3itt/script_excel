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
    <title>Histórico</title>
</head>
<body>
<?php include("nav.php");?>
<div id="content" class="p-4 p-md-5 pt-5">

<table class="table table-bordered " id="tabela">
        <thead>
        <tr>
            <th>Escala</th>
            <th>Data 1</th>
            <th>Data 2</th>
            <th>Função</th>
        </tr>
        </thead>
        <tbody>
            
                <?php
                $query = "SELECT * from tb_historico";
                $result = $db->select($query);
                if (count($result) > 0) {
                for($i=0; $i<count($result); $i++){
                    
                   $data1 = $result[$i]['data1'];
                   $data2 = $result[$i]['data2'];
                   echo '<tr>';
                   echo '<td>'.$result[$i]['escala'].'</td>';
                   echo '<td>'.$data1.'</td>';
                   echo '<td>'.$data2.'</td>';
                   echo '<td>';
                   echo '<a href="visualizar.php?data1='.  $data1.'&data2='.$data2.'" class="mr-3" title="Visualizar" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                   echo '<a href="edit.php?data1='.  $data1.'&data2='.$data2.'" class="mr-3" title="Editar" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                   echo '<a href="estatisticas.php?data1='.  $data1.'&data2='.$data2.'" class="mr-3" title="Estatísticas" data-toggle="tooltip"><span class="fa fa-bar-chart"></span></a>';
                   echo '<a href="" class="mr-3" title="Apagar" data-toggle="modal" data-target="#exampleModalCenter'.$i.'"><span class="fa fa-trash"></span></a>';
                   echo('
                   <div class="modal fade" id="exampleModalCenter'.$i.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                   <div class="modal-dialog modal-dialog-centered" role="document">
                       <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Aviso</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           Tens a certeza que queres apagar estes dados?
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                           <a href="apagar.php?data1='. $data1.'&data2='.$data2.'" class="btn btn-primary" title="Apagar">Sim</a>
                 
                       </div>
                       </div>
                   </div>
                   </div>
                   ');
                   echo '</td>';
                   echo '</tr>';
                   


                  
                }
            }
            else{
                echo "Não há resultados";
            }
               
               ?>
            
        </tbody>

    </table>
</div>
    <?php include("footer.php");?>
</body>
<html>