<?php
<<<<<<< HEAD
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
                   
=======
    require_once "db_connect.php";
    include("header.php");

    $sql= "SELECT tb_produtos.id_produto,tb_produtos.tipo_produto,tb_produtos.nome_produto,tb_produtos.preco_produto,tb_produtos.descricao_produto,tb_familia_produtos.familia_tipo_produto from tb_produtos 
    inner join tb_familia_produtos on tb_produtos.tipo_produto=tb_familia_produtos.id_familia";
    $result=$link->query($sql);
?>



    <style>
        .btn {
            margin-left: 10px;
        }
    </style>


    <style>
.btn{
margin-left: 10px;
}
a{
    color:white !important;
}
#btnop{
    padding: 0px !important;
    width: 30px;
  
}
#form-pesquisa{

width:25%;
margin-right: 2.5%;

}

@media(max-width:425px){

#form-pesquisa{

width:80%!important;

}}

table {
        border: 1px solid rgb(255, 255, 255);
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
      }
      
      table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
      }
      
      table tr {
       /*background-color: #e90e0e;*/
        border: 0px solid;/* #ddd;*/
        padding: .35em;
      }
      
      table th,
      table td {
        padding: .625em;
        text-align: center;
      }
      
     
      
      @media screen and (max-width: 600px) {
        table {
          border: 0;
        }
      
        table caption {
          font-size: 1.3em;
        }
        
        table thead {
          border: none;
          clip: rect(0 0 0 0);
          height: 1px;
          margin: -1px;
          overflow: hidden;
          padding: 0;
          position: absolute;
          width: 1px;
          color:white !important;
          background-color:black !important;

        }
        
        table tr {
          border-bottom: 3px solid #ddd;
          display: block;
          margin-bottom: .625em;
        }
        
        table td {
          /*border-bottom: 1px solid rgb(147, 70, 70);*/
          display: block;
          font-size: .8em;
          text-align: right;
        }
        
        table td::before {
          /*
          * aria-label has no advantage, it won't be read inside a table
          content: attr(aria-label);
          */
          content: attr(data-label);
          float: left;
          font-weight: bold;
          text-transform: uppercase;
        }
        
        table td:last-child {
          border-bottom: 0;
        }

        .bt{
            text-align: center;
            background-color: black !important;
            font-size: 1rem; color: rgb(255, 255, 255);
        }
      }

      th{
    background-color: black!important;
    color: white;
}
>>>>>>> f3b9eac9e21985634a094c040ac0264dd6d9c2df


                  
                }
                
               
               ?>
            
        </tbody>

    </table>