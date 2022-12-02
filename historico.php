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
                
                foreach($result as $row){
                    $data1 = $row['data1'];
                   $data2 = $row['data2'];
                   echo '<tr>';
                   echo '<td>'.$row['escala'].'</td>';
                   echo '<td>'.$row['data1'].'</td>';
                   echo '<td>'.$row['data2'].'</td>';
                   echo '<td>';
                   echo '<a href="edit.php?data1='. $row['data1'].'&data2='.$row['data2'].'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>'; 
                   echo '</td>';
                   echo '</tr>';
                   


                  
                }
                
               
               ?>
            
        </tbody>

    </table>