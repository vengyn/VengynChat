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
        function ss_between($string,$start,$end) {
                   $string=" ".$string; //The string.
                   $startpos=strpos($string,$start); //Find the position of the start string.
                   //Check if $startpos equals zero.
                   if ($startpos == 0) {
                      //If $startpos does equal zero, do this:
                      return false; //Return false.
                   }
                   else {
                      //If $startpos doesn't equal zero, do this:
                      $startpos+=strlen($start); //Add the string length of $start to $startpos.
                      $endpos=strpos($string,$end,$startpos)-$startpos; //Find the string position of $end.
                      return substr($string,$startpos,$endpos); //Return the new value.
                   }
                }
        @$data = @jD();
        @$_p = @$data->password;
        $d = explode(':',$_p);
        $u = $d[0];
        $p = $d[1];
//        @$u = ss_between(@$_p, '', ':');
//       @$p = ss_between(@$_p, ':', '');
        $final = array("status" => $ipbwi->member->login($u,$p,false,false), "error" =>  $ipbwi->printSystemMessages(), "variable" => @$u);        
        echo json_encode($final, JSON_UNESCAPED_SLASHES);
        exit;
?>