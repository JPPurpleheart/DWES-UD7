<?php

    // Función para obtener ciudades con numHabitantes mayor o igual a una dada.
    function filtraCiudades($numHabitantes) {       

        try{
            
            $username = 'developer';
            $passwd = 'developer';
            
            $con = new PDO('mysql:host=localhost;dbname=ciudadesPoblacion', $username, $passwd);

            $sql = "SELECT * FROM ciudades WHERE numHabitantes >= :numHabitantes";
            $result = $con->prepare($sql);
            $result->bindParam(':numHabitantes', $numHabitantes);

            $result->execute();

            $ciudades = $result->fetchAll();

            $con = null;

            return $ciudades;
        } catch(PDOException $e) {

            $e->getMessage();

        }
    }

?>