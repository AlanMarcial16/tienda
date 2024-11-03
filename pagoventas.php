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
        <title>Pago con Transferencia Interbancaria - Casa Flora Handmade Hotel</title>
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
            .textarea{
            width:500px;
            height:120px;
            border:1px solid black;
            text-align: center;
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
                                <h1>Pagar</h1>
                                <div class="container mt-5 custom-container">
                                <div class="row"> 
                                    <div>
                                    <div class="card">
                                    <h4 style="text-align: right;">Reserva: #<?php  echo $row['cod_reserva']?> </h4>
                                    <!--Inicia selección de método de pago-->
                                    <fieldset>
                                        <div>
                                        <h2 class="h2">Transferencia Interbancaria</h2>
                                        <br><br>
                                        <h3 class="h1">Total a Pagar: $<?php echo $row['cextras']  ?> M.N.</h3>
                                        <BR>
                                        <h3 class="h3">Proporcione al cliente la siguiente información para realizar la operación:</h3>
                                        <form action="insertapago.php" method="POST" style="max-width:500px;margin:auto">
                                        <br>
                                        <div class='textarea'>
                                        <br> 
                                        CLABE INTERBANCARIA: 102812836129312737<br>
                                        BANCO: BBVA MÉXICO<br>
                                        NOMBRE: HOTEL CASA FLORA
                                        <br>
                                        </div>
                                            <!--Obtiene los datos desde la entrada en la bd, para no introducir una entrada vacía-->
                                            <input type="hidden" name="cod_reserva" value="<?php echo $row['cod_reserva']  ?>">
                                            <!--Fecha-->
                                            <input type="hidden" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php  echo $row['fecha']?>" readonly>
                                            <!--Día-->
                                            <input type="hidden" class="form-control mb-3" name="dia" placeholder="Día" value="<?php  echo $row['dia']?>" readonly>
                                            <!--Llegada-->
                                            <input type="hidden" class="form-control mb-3" name="llegada" placeholder="Llegada" value="<?php  echo $row['llegada']?>">
                                            <!--Salida-->
                                            <input type="hidden" class="form-control mb-3" name="salida" placeholder="Salida" value="<?php  echo $row['salida']?>" readonly>
                                            <!--Cliente-->
                                            <input type="hidden" class="form-control mb-3" name="cliente" placeholder="Cliente" value="<?php  echo $row['cliente']?>" readonly>
                                            <!--Habitación-->
                                            <input type="hidden" class="form-control mb-3" name="habitacion" placeholder="Habitación" value="<?php  echo $row['habitacion']?>" readonly>
                                            <!--Tarifa-->
                                            <input type="hidden" class="form-control mb-3" name="tarifa" placeholder="Tarifa" value="<?php  echo $row['tarifa']?>" readonly>
                                            <!--Número de huéspedes-->
                                            <input type="hidden" class="form-control mb-3" name="huespedes" placeholder="Huéspedes" value="<?php  echo $row['huespedes']?>" readonly>
                                            <!--Anticipo-->
                                            <input type="hidden" class="form-control mb-3" name="anticipo" placeholder="Anticipo" onkeypress="return event.charCode>=48 && event.charCode<=57" value="<?php  echo $row['anticipo']?>">
                                            <!--Reserva Vía-->
                                            <input type="hidden" class="form-control mb-3" name="via" placeholder="Vía" value="<?php  echo $row['via']?>" readonly>
                                            <!--Servicios Especiales-->
                                            <input type="hidden" class="form-control mb-3" name="sextras" placeholder="Servicios Especiales" value="<?php  echo $row['sextras']?>" readonly>
                                            <!--Número de noches-->
                                            <input type="hidden" class="form-control mb-3" name="noches" placeholder="Noches" value="<?php  echo $row['noches']?>" readonly>
                                            <!--Consumos Extras-->
                                            <input type="hidden" class="form-control mb-3" name="cextras" placeholder="Consumos extras" value="0" required>
                                            <!--Garantia-->
                                            <input type="hidden" class="form-control mb-3" name="garantia" placeholder="Garantía" value="<?php  echo $row['garantia']?>" required>
                                            <!--Total-->
                                            <input type="hidden" class="form-control mb-3" name="total" placeholder="Total" value="<?php  echo $row['total']?>" required>
                                            <!--Se termina la consulta de datos-->
                                            <input type="hidden" class="form-control mb-3" name="pago" placeholder="Pago" value="SPEI" required>
                                            <hr>
                                            <br>
                                            
                                            <input type="submit" class="registerbtn" value="Continuar">
                                        </form>
                                        <br><br>
                                        <h3 class="h3">Al concluir la operación solicite al cliente un comprobante de la misma, después haga click en "Continuar"</h3>
                                        <br><br>
                                        <div style="text-align: right;">
                                        <a href="pagarc.php?id=<?php echo $row['cod_reserva'] ?>">
                                            <button class="btn info"><i class="fa1 fa fa-arrow-left"></i></button>
                                        </a>
                                        <!--<a href="verificahab.php?id=<?php echo $row['cod_reserva'] ?>">
                                        <button class="btn success">Comenzar Checkout</button>
                                        </a>
                                        <a href="verificahab.php?id=<?php echo $row['cod_reserva'] ?>">
                                        <button class="btn success">Continuar</button>
                                        </a>
                                        </div>-->
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