<?php
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.125/DWS/DWES-UD7/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("devuelveParidad");
$server->handle();

// Función para obtener raíz cuadrada
function devuelveParidad($num) {
    
    if($num % 2 == 0){
        
        $resultado='Par';

    } else {

        $resultado='Impar';

    }

    return $resultado;

}
?>