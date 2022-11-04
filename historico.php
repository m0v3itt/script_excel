<?php
    require_once "db_connect.php";
    

    $sql= "SELECT tb_produtos.id_produto,tb_produtos.tipo_produto,tb_produtos.nome_produto,tb_produtos.preco_produto,tb_produtos.descricao_produto,tb_familia_produtos.familia_tipo_produto from tb_produtos 
    inner join tb_familia_produtos on tb_produtos.tipo_produto=tb_familia_produtos.id_familia";
    $result=$link->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Histórico</title>
    <style>
        .btn {
            margin-left: 10px;
        }
    </style>
    <link rel="shortcut icon" href="imagens/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

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



</style>
</head>

<body style="overflow-x:hidden" class="show-sidebar">
<div class="d-flex justify-content-end bg-light py-4">

<i id="pesquisarr" class="bi bi-search mx-3 fs-4"></i>

<form method="POST" id="form-pesquisa" action="">

        <input class="form-control px-5 " type="text" placeholder="Pesquisar produto..." name="pesquisa" id="pesquisa" aria-label="Search" style="border-radius: 20px;">

    </form>
    
    </div>
    </ul>
    <div class="wrapper ">
        <div class="container desktop-only">
            <div class="row">
                    <br>
                    <div>
                    <br>
                    <h1 class="text-center">Produtos</h1>
                    
                    </div>
                    
                    <br>
                    <ul class="resultado ">
                    <?php
                            if($result->num_rows>0){
                                echo "<table class='table thead-light table-striped '>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th scope='col'>ID</th>";
                                echo "<th scope='col'>Tipo</th>";
                                echo "<th scope='col'>Nome</th>";
                                echo "<th scope='col'>Preço</th>";
                                echo "<th scope='col'>Tamanho</th>";
                                echo "<th scope='col'>Opções</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row=$result->fetch_assoc()){
                                  echo ('
                                    <div class="modal fade" id="id' . $row["id_produto"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">Clicou em apagar</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        
                                        <div class="modal-body">
                                          <p>Tem a certeza que deseja apagar o produto?</p>
                                   
                                        <a href="delete_produto.php?id=' . $row['id_produto'] . '" id="btnop"><div class="btn  bg-dark text-white" style="margin-left: 0px !important;">SIM</div></a>
                                
                                        </div>
                                      </div>
                                    </div>
                                  </div>



    ');

                                    echo "<tr>";
                                   
                                    echo "<td data-label='Id'>" . $row['id_produto'] . "</td>";
                                    echo "<td data-label='Tipo'>" . $row['familia_tipo_produto'] . "</td>";
                                    echo "<td data-label='Nome'>" . $row['nome_produto'] . "</td>";
                                    echo "<td data-label='Preço'> " . $row['preco_produto'] . "</td>";
                                    echo "<td data-label='Tamanho'>" . $row['descricao_produto'] . "</td>";
                                    
                                    echo "<td class='bt'>";
                                    echo "<a href='read_produto.php?id=" . $row['id_produto'] . "'class='btn btn-dark' id='btnop'><ion-icon name='eye-outline'></ion-icon></a>";
                                    echo "<a href='update_produto.php?id=" . $row['id_produto'] .  "'class='btn btn-dark' id='btnop'><ion-icon name='pencil-outline'></ion-icon> </a>";
                                    echo('<a data-bs-toggle="modal" id="btnop" class="btn btn-dark" data-bs-target="#id' . $row["id_produto"] .'"><ion-icon name="trash-outline"></ion-icon></a>');

                                    echo "</td>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }
                                    echo "</table>";
                                    $link->close();  
                            }
                        ?>
                </div>
            </div>
        </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/pesquisa_produto1.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>


