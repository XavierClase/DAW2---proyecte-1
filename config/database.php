<?php

    class DataBase {
        public static function connect($host='localhost', $user='root', $pass='1234',$db='sportiva_menjars',$port='3308') {
            $con = new mysqli($host,$user,$pass,$db, $port);

            if ($con === false) {
                die("ERROR: No te puedes conectar a la bbdd");
            } else {
                return $con;
            }
        }
    }

?>