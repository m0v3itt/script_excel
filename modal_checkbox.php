<?php 
use Phppot\DataSource;


require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

$dias = $_POST['resultString'];
$id = $_POST['dataId'];
$praia = $_POST['dataPraia'];
$turno = $_POST['dataTurno'];
$diasNoFormato = [];
$dias_array = str_split($dias, 10);
foreach ($dias_array as $dia){
    $date = date("j/n/Y", strtotime($dia));
    array_push($diasNoFormato,$date);
    
}
$arrayIdDias = [];
foreach($diasNoFormato as $diaNoFormatoDesejado){

$query = "SELECT id_dia FROM tb_dias where dia = '$diaNoFormatoDesejado' ";
$result = $db->select($query);
foreach($result as $row){
    echo $row['id_dia'];
    array_push($arrayIdDias, $row['id_dia']);
}
}
foreach($arrayIdDias as $idDia){

    $query = "insert into tb_escala(id_nadador,id_praia,id_dia,turno) values(?,?,?,?)";
    $paramType = "iiis";
    $paramArray = array(
        $id,
        $praia,
        $idDia,
        $turno,
   
    );
    $insertId = $db->insert($query, $paramType, $paramArray);
    echo $insertId;
}
?>