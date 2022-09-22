<?php
// Include config file
include_once("db_connect.php");
 
// Define variables and initialize with empty values
$praia = $turno = $dia = $nadador = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
        $param_praia = ($_POST["praia"]);
        $param_turno = ($_POST["turno"]);
        $param_dia = ($_POST["dia"]);
        $param_nadador = trim($_POST["nadador"]);

        $sql = "INSERT INTO tb_escala (id_nadador,id_praia,id_dia,turno) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "iiis", $param_nadador, $param_praia, $param_dia, $param_turno);
            
            $param_praia = $praia;
            $param_turno = $turno;
            $param_dia = $dia;
            $param_nadador = $nadador;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Praia</label>
                            <?php
                                // escolher os dias que vão aparecer na tabela
                                $sql_query = "SELECT * FROM tb_praia";
                                $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                                echo"<select name='praia' size='1' class='form-select form-select-sm'>";
                                echo"<option value='' disabled selected hidden> Dias </option>"; 
                                    while( $row = mysqli_fetch_assoc($resultset) )
                                    {
                                        $praia=$row['nome_praia']; 
                                        $id_praia=$row['id_praia'];
                                        echo"<option value=$id_praia>$praia</option>";     
                                    } 
				            ?> 
					            </select>
                        </div>
                        <div class="form-group">
                            <label>Turno</label>
                                <select name="turno" id="cars">
                                    <option value="Manhã">Manhã</option>
                                    <option value="Tarde">Tarde</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Dia</label>
                            <?php
                                // escolher os dias que vão aparecer na tabela
                                $sql_query1 = "SELECT * FROM tb_dias";
                                $resultado = mysqli_query($conn, $sql_query1) or die("database error:". mysqli_error($conn));
                                echo"<select name='dia' size='1' class='form-select form-select-sm'>";
                                echo"<option value='' disabled selected hidden> Dias </option>"; 
                                    while( $re = mysqli_fetch_assoc($resulado) )
                                    {
                                        $dia1=$re['dia']; 
                                        $id1=$re['id_dia'];
                                        echo"<option value=$id1>$dia1</option>";     
                                    } 
                            ?> 
					        </select>
                        </div>
                        <div class="form-group">
                            <label>Nadador</label>
                            <?php
                                // escolher os dias que vão aparecer na tabela
                                $sql_query2 = "SELECT tb_disponibilidade.id_nadador, tb_nadadores.id_nadador FROM tb_disponibilidade inner join tb_nadadores on tb_disponibilidade.id_nadador=tb_nadadores.id_nadador ";
                                $resultado2 = mysqli_query($conn, $sql_query2) or die("database error:". mysqli_error($conn));
                                echo"<select name='nome' size='1' class='form-select form-select-sm'>";
                                echo"<option value='' disabled selected hidden> Dias </option>"; 
                                    while( $res = mysqli_fetch_assoc($resultado2) )
                                    {
                                        $id_nadador=$res['id_nadador']; 
                                        $nome_nadador=$es['nome'];
                                        echo"<option value=$id_nadador>$nome_nadador</option>";     
                                    } 
				            ?> 
					            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>