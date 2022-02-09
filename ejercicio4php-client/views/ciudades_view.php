
<!DOCTYPE html>
<html>
    <head>
        <title>Filtra ciudades - Servicio Web + PHP + SOAP</title>
    </head>
<body>
    <h1>Filtra ciudades</h1>
    <form action="index.php?controller=ciudades&action=formularioCiudades" method="post">
        <?php
            
            print "<input type='number' name='numHabitantes' value=$numHabitantes>";
            print "<input type='submit' name='enviar' value='Filtra'>";
            print "<p class='error'>$error</p>";

            foreach($ciudades as $ciudad) {

                print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $ciudad['nombre'] . "</p>";
            
            }
        
        ?>
    </form>
</body>
</html>