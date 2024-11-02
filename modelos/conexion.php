<?php
//creamos nuestra variables
    $servername = "localhost";  //nombre del serbvidor
    $username = "root";  //usuario
    $password = "";     //password
    $dbname = "bd_mantenimiento"; //nombre de la base de datos

//Creamos la conexión pasando las variables.
    $conex = new mysqli($servername, $username, $password, $dbname);


/*Comprobamos la conexión
    if($conex){
        echo"Session_correcta";
    }else{
        echo"Session_erronea";
    }
    ?>*/
