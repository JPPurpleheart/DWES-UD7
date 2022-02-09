<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        define("DEBUG", TRUE);

        if(DEBUG)
        {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        }

        $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

        //Basados en la estructura del servicio armamos un array
        $params = Array(
            "Arg1" => $_POST['num1'],
            "Arg2" => $_POST['num2']
            );

        $options = Array(
            "uri"=> $wsdl,
            "style"=> SOAP_RPC,
            "use"=> SOAP_ENCODED,
            "soap_version"=> SOAP_1_1,
            "cache_wsdl"=> WSDL_CACHE_BOTH,
            "connection_timeout" => 15,
            "trace" => false,
            "encoding" => "UTF-8",
            "exceptions" => false,
            );

        //Enviamos el Request
        $soap = new SoapClient($wsdl, $options);
        $result = $soap->AddInteger($params); //Aquí cambiamos dependiendo de la acción del servicio que necesitemos ejecutar
        
    ?>
    <form method="POST">
        Número 1: <input type="number" name="num1"><br>
        Número 2: <input type="number" name="num2"><br>
        <input type="submit" value="Sumar">
    </form>
    <div id='resultado'><?php var_dump($result); ?></div>
</body>
</html>