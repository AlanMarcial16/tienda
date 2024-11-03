<?php 
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM ventadirecta";
    $query=mysqli_query($con,$sql);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pago con tarjeta - Casa Flora Handmade Hotel</title>
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/9ed84f_b72e16d4242e4e97a54c4945ac674912~mv2.png">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/hyf.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Bootstrap Stylesheets -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css?v=2">
	    <!-- Font Awesome Stylesheets -->
	    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/design.css?v=2">
        <link rel="stylesheet" href="css/estilo4.css">
        <link rel="stylesheet" href="css/estilo8.css">
	    <!-- Template Main Stylesheets -->
	    <link rel="stylesheet" href="css/contact-form.css" type="text/css">	
        <!--SWEET ALERT-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.all.min.js"></script>	
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!--SCRIPT PARA LLENADO AUTOMÁTICO DE SELECTS 2 --> 
        <script>
        function cambiarch() {
            var seleccionado = document.getElementById('pago').value;
            alert(seleccionado);
            window.location.replace(seleccionado);
        }
        </script>
        <style>
            .logo-img {
            max-width: 50px; /* Ajusta el valor según tus necesidades */
            }
            .h3{
                text-align: center;
            }
            .h2{
                text-align: justify;
            }

            .h1{
                text-align: center;
                color: green;
            }
        </style>
    </head>
    <body>
            <div class="header">
                <a href="inicio.php" class="logo">
                    <img src="https://static.wixstatic.com/media/9ed84f_e9388ac15d374e77aa9c89cdb80e014a~mv2.png" alt="Logo" class="logo-img">
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                </a>
            </div>

            <div class="container mt-5 custom-container">
                    <div class="row"> 
                        <div>
                                <div style="text-align: right;">
                                <script>
                                    var options2 = {
                                        weekday: 'long',
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric'
                                    };

                                    var date = new Date().toLocaleDateString('es-ES', options2);
                                    var formattedDate = date.replace(/^\w/, (c) => c.toUpperCase());
                                    var styledDate = "<strong>" + formattedDate + "</strong>";
                                    
                                    document.write(styledDate);
                                </script>
                                </div>
                                <div style="text-align: left;">
                                        <a href="pagarventa.php">
                                            <button class="btn info"><i class="fa1 fa fa-arrow-left"></i></button>
                                        </a>
                                </div>
                                <h1 style="text-align: center;"><b>Pagar</b></h1>
                                <div class="container mt-5 custom-container">
                                <div class="row"> 
                                    <div>
                                    <div class="card">
                                    <!--Inicia selección de método de pago-->
                                    <fieldset>
                                        <div>
                                        <h2 class="h2">Tarjeta de crédito/débito</h2>
                                        <br><br>
                                        <?php
                                                    $total = 0; // Inicializar el total en 0
                                                    
                                                    while($row = mysqli_fetch_array($query)){
                                                        // Obtener el precio y convertirlo a número
                                                        $precio = floatval($row['preciou']);
                                                        
                                                        // Sumar el precio al total
                                                        $total += $precio;
                                                    }
                                                ?>
                                        <h3 class="h1">Total a Pagar: $<?php echo $total?> M.N.</h3>
                                        <BR>
                                        <h3 class="h3">Muestre la terminal al cliente y pida validar la operación con su NIP</h3>
                                        <form action="procesar_ventat.php" method="POST" style="max-width:500px;margin:auto">
                                            <img src="https://us.123rf.com/450wm/juliarstudio/juliarstudio1603/juliarstudio160301713/53798327-terminal-punto-de-venta-con-el-icono-de-la-tarjeta-de-cr%C3%A9dito-en-estilo-isom%C3%A9trica-3d-sobre-un-fondo.jpg?ver=6"
                                            alt="terminal"
                                            width="450"
                                            height="350"
                                            text-align: center;>
                                            
                                            <hr>
                                            <br>
                                            
                                            <input type="submit" class="registerbtn" value="Continuar">
                                        </form>
                                        <br><br>
                                        <h3 class="h3">Al concluir la operación haga click en "Continuar"</h3>
                                        <br><br>
                                        
                                        
                    </fieldset>
                                </div>
                                <br>
                        </div>
                    </div>
                    </div>  
            </div>
                        </div>
                    </div>
                    </div>  
            </div>
            
    </body>
    <!--Fin de la página-->
    <br><br>
    <footer class="footer">
          <p><b>Hotel Casa Flora Atlixco, Todos los derechos reservados &copy; 2022</b></p>
    </footer>
</html>