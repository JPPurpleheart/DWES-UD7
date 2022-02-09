<?php
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.125/DWS/DWES-UD7/ejercicio3php/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("filtraCiudades");
$server->handle();

// Función para obtener raíz cuadrada
function filtraCiudades($num) {
    
    $datosHabitantes = obtenerDatos();

    $resultado = array();
    
    foreach ($datosHabitantes as $key => $value) {
        
        $numHabitantes = $datosHabitantes[$key][2];

        if($num < $numHabitantes) {

            $resultado[] = $datosHabitantes[$key][1];

        }
        
    }
    
    return $resultado;

}

//Función que devuelve un array con todos los datos de los turistas de la tabla turista.
function obtenerDatos() {
    $con = null;
    //Probamos a conectar a la base de datos con try y si conecta correctamente realizamos el resto de funciones para operar con la tabla turista.
    try {
    
        //Definimos los párametros de la conexión con la base de datos.
        $servidor = "localhost";
        $baseDatos = "ciudadesPoblacion";
        $usuario = "developer";
        $pass = "developer";

        //Intentamos la conexión con la base de datos utilizando los parámetros.
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
                    
        //Preparamos la consulta.
        $sql = $con -> prepare("SELECT * FROM ciudades");
        
        //Ejecutamos la consulta.
        $sql -> execute();

        //Creamos el array a devolver y un índice para rellenar el array.
        $select = array();

        //Mientras haya filas seleccionables las almacenamos en una variable
        while ($fila = $sql -> fetch(PDO::FETCH_BOTH)) {

            //Poblamos el array  a devolver con las filas devueltas.
            $select[] = $fila;

        }

        //Devolvemos el resultado de la consulta.
        return $select;
    
    //Si la conexión falla lanzamos un mensaje de error en base a una PDOException que se captura dentro del catch.
    } catch (PDOException $e) {
        echo "Conexión fallida:" . $e->getMessage();
    }

}

?>