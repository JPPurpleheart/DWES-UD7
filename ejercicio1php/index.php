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
            $num1 = "";
            $num2 = "";

            // Iniciamos el cliente SOAP
            // Escribimos la dirección donde se encuentra el servicio
            $url = "http://192.168.129.80/DWES/DWES-UD7/ejercicio1.php";
            $uri = "http://192.168.129.80/DWES/DWES-UD7/";
            $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

            // Ejecutamos las siguientes líneas al enviar el formulario
            if (isset($_POST['enviar'])) {
                // Establecemos los parámetros de envío
                if (!empty(($_POST['num1'])) && (!empty($_POST['num2']))) {
                    
                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    
                    // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
                    $resultado = "La suma es: " . $cliente->suma($num1, $num2);
                } else {
                    
                    $error = "<strong>Error:</strong> Debes introducir al menos un numero<br/><br/>Ej: 45678987";

                }
            }
        ?>
        <h1>Obtener letra DNI</h1>
        <h2>Servicio Web + PHP + SOAP</h2>
        <form action="index.php" method="post">
        <?php
            print "<input type='number' name='num1' value='$num1'>";
            print "<input type='number' name='num2' value='$num2'>";
            print "<input type='submit' name='enviar' value='Suma'>";
            print "<p class='error'>$error</p>";
            print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
        </form>
    </body>
</html>