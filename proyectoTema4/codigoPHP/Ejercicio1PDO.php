<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dns='mysql:host=192.168.20.19;dbname=mysql';
$username='adminsql';
$password='paso';
/*$dns='mysql:host=192.168.20.19;dbname=DAW202DBdepartamentos';
$username='usuarioDAW202Departamentos';
$password='paso';*/
try {
    //establecer conexión
    $miDB=new PDO($dns, $username, $password);//Creamos la conexion con el servidor
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Seleccionamos el tratamiento de las excepciones
    echo "Conectado 1"."<br>";
    $attributes = array(
    "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
    "ORACLE_NULLS", "PERSISTENT", "SERVER_INFO", "SERVER_VERSION",
);
    //Mostrar los atributos de la conexión
    foreach ( $attributes as $val ) {
    echo "PDO::ATTR_$val: ";
    
        echo "<b>".$miDB->getAttribute( constant( "PDO::ATTR_$val" ) ) ."</b>"."<br>";//Mostramos todos los atributos de la conexión
    
}
//conexión erronea
    echo "";
    $miDB2=new PDO($dns, $username, 'PASO');
    
} catch (Exception $exc) {//Controlamos la salida de excepciones
    echo $exc->getMessage();
    echo "Error al conectar "."<br>";
} finally {
    unset($miDB);//Cerramos la conexión
}