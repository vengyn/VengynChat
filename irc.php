<?php
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type, *");
        require_once('/var/www/c/ipbwi/ipbwi.inc.php');
        function jD()
        {
                $rawData = file_get_contents("php://input");
                return json_decode($rawData);
        }
        @$data = @jD();
        @$p = @$data->password;
  
?>
