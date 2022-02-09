<?php

function formularioCiudades() {

    $error = "";
    $ciudades = [];
    $numHabitantes = "";

    if (isset($_POST['enviar'])) {

        // Iniciamos el cliente SOAP
        // Escribimos la dirección donde se encuentra el servicio
        $url = "http://127.0.0.1/DWS/DWES-UD7/ejercicio4php-server/index.php?controller=ciudades&action=servicioCiudades";
        $uri = "http://127.0.0.1/DWS/DWES-UD7/";
        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

        // Establecemos los parámetros de envío
        if (is_int((int)$_POST['numHabitantes']) && is_int((int)$_POST['numHabitantes']) > 0) {
            
            $numHabitantes = (int)$_POST['numHabitantes'];

            // Si los parámetros son correctos, llamamos a la función filtraCiudades de ejercicio3.php
            $ciudades = $cliente->filtraCiudades($numHabitantes);

        } else {
            
            $error = "<strong>Error:</strong> Debes introducir un número entero, mayor a 0.";
            
        }
    }

    // Se incluye la vista.
    require 'views/ciudades_view.php';
}


?>