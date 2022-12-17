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
    <table class="table table-bordered " id="tabela">
        <col>
        <col>
        <col>
        <col>
        <thead>
        <tr>
            <th rowspan="2" >Nadador</th>
            <th colspan="2" >Disponibilidade</th>
            <th colspan="2" >Nº de dias a trabalhar</th>
            <th colspan="2">Diferença</th>
        </tr>
        <tr>
            <th scope="col">M</th>
            <th scope="col">T</th>
            <th scope="col">M</th>
            <th scope="col">T</th>
            <th scope="col">M</th>
            <th scope="col">T</th>
        </tr>
        </thead>
            <?php
            if (isset($_GET['data1']) && isset($_GET['data2'])){
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

            $query = " SELECT * FROM tb_nadadores";
                $result = $db->select($query);
                if ($db->getRecordCount($query)>0){
                    foreach($result as $re){
                        echo '<tr>';
                        echo '<th>'.'('.$re['id_nadador'].')'.$re['nome'].'</td>';
                        $query = "SELECT id_nadador,
                        COUNT(*) AS Manhas FROM
                        tb_disponibilidade WHERE Manhã = 1 AND id_nadador=$re[id_nadador] and id_dia between $diaUm and $diaDois;";
                        $result = $db->select($query);
                            foreach($result as $row){
                                $manhaDisponibilidade = $row['Manhas'];
                                echo '<td>'.$row['Manhas'].'</td>';
                            }
                        $query = "SELECT id_nadador,
                        COUNT(*) AS Tardes
                        FROM tb_disponibilidade WHERE Tarde = 1  AND id_nadador=$re[id_nadador] and id_dia between $diaUm and $diaDois"; 
                        $result = $db->select($query);
                            foreach($result as $ro){
                                $tardesDisponibilidade = $ro['Tardes'];
                                echo '<td>'.$ro['Tardes'].'</td>';
                            }
                        $query = "SELECT id_nadador,
                        COUNT(*) AS Manhas
                        FROM tb_escala WHERE Turno = 'Manhã'  AND id_nadador=$re[id_nadador] and id_dia between $diaUm and $diaDois"; 
                        $result = $db->select($query);
                            foreach($result as $r){
                                $manhasTrabalhadas = $r['Manhas'];
                                echo '<td>'.$r['Manhas'].'</td>';
                            }
                        $query = "SELECT id_nadador,
                        COUNT(*) AS Tardes
                        FROM tb_escala WHERE Turno = 'Tarde'  AND id_nadador=$re[id_nadador] and id_dia between $diaUm and $diaDois"; 
                        $result = $db->select($query);
                            foreach($result as $rol){
                                $tardesTrabalhadas = $rol['Tardes'];
                                echo '<td>'.$rol['Tardes'].'</td>';
                            } 
                        $manhasDiferenca = $manhaDisponibilidade - $manhasTrabalhadas;
                        $tardesDiferenca = $tardesDisponibilidade - $tardesTrabalhadas;
                        echo '<td>'.$manhasDiferenca.'</td>';
                        echo '<td>'.$tardesDiferenca.'</td>';                       
                    }  
                }
            }
            ?>

    </table>
</div>
<?php include("footer.php");?>
    <script>
    $(document).ready( function () {
        $('#tabela').DataTable( {
            dom: 'Bfrtip',
            buttons: ['excel'],
            className: 'btn btn-default btn-sm'
        } );
    } );

</script>
</body>

</html>
