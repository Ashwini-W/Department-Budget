<?php
        $server = "localhost";
            $username = "root";
            $password = "";
            $db = "cwh";

            $con = mysqli_connect($server, $username, $password, $db);

            if(!$con){
                die("connection to this database falied due to" . mysqli_connect_error());

            }else{
            // echo"Success connection to db";
            }
?>