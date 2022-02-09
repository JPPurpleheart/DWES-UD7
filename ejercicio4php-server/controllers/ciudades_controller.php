<?php

function servicioCiudades() {

    // Se incluye el modelo.
    require 'models/ciudades_model.php';

    $uri="http://127.0.0.1/DWS/DWES-UD7/ejercicio4php-server/";
    $servidor = new SoapServer(null,array('uri'=>$uri));
    $servidor->addFunction("filtraCiudades");
    $servidor->handle();

}

?>