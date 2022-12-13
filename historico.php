<?php
use Phppot\DataSource;
include_once ("db_connect.php");
include ("header.php");
require_once 'DataSource.php';
include("main.php");
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
<a href="main.php"><img src="return.png" style="width:50px; height:50px; position:absolute;left:2px"></img></a>
<br>
<br>
<br>
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
     
       

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
<html>