<!DOCTYPE html>
<html>
    <head>
        <title>Calcular Letra DNI - Servicio Web + PHP + SOAP</title>
        <link rel="stylesheet" type="text/css" href="/estilos.css">
    </head>
    <body>
        <?php
            // Vaciamos algunas variables
            $error = "";
            $resultado = "";
            $num = "";

            // Iniciamos el cliente SOAP
            // Escribimos la dirección donde se encuentra el servicio
            $url = "http://192.168.129.125/DWS/DWES-UD7/ejercicio3php/ejercicio3.php";
            $uri = "http://192.168.129.125/DWS/DWES-UD7/ejercicio3php/";
            $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

            // Ejecutamos las siguientes líneas al enviar el formulario
            if (isset($_POST['enviar'])) {
                // Establecemos los parámetros de envío
                if (!empty(($_POST['num']))) {
                    
                    $num = $_POST['num'];
                    
                    $ciudades = $cliente->filtraCiudades($num);                        

                } else {
                    
                    $error = "<strong>Error:</strong> Debes introducir al menos una cantidad de habitantes<br/><br/>Ej: 45678987";

                }
            }
        ?>
        <h1>Filtrar Ciudades</h1>
        <h2>Servicio Web + PHP + SOAP</h2>
        <form action="index.php" method="post">
        <?php
            print "<input type='number' name='num' value='$num'>";
            print "<input type='submit' name='enviar' value='Filtra'>";
            print "<p class='error'>$error</p>";

            print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>Las ciudades son: </p>";

            $i = 0;

            while($i < count($ciudades)) {

                // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
                $resultado = $ciudades[$i];

                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";

                $i ++;

            }
        ?>
        </form>
    </body>
</html>