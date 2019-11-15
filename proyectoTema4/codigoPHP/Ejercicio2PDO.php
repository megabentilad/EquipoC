<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*$dns='mysql:host=192.168.1.200;dbname=mysql';
$username='admindb';
$password='paso';*/
$dns='mysql:localhost=192.168.20.19;dbname=DAW202DBdepartamentos';
$username='usuarioDAW202Departamentos';
$password='paso';
try {
    //Establecer conexións
    $miDB=new PDO($dns, $username, $password);//Creamos la conexión
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Seleccionamos el tratamiento de la excepciones
    //Consulta
    $resultSet=$miDB->query("Select CodDepartamento,DescDepartamento from Departamento");//Ejecutamos un Query en la base de datos
//Recorremos los datos como array
    echo "Recorremos los datos como array";
while($consulta=$resultSet->fetch()){//Recorremos los datos que nos ha proporcionado la base de datos
    echo $consulta[0]." ".$consulta[1]."<br>";
}
echo "Numero de resultados".$resultSet->rowCount();
//Consulta
$resultSet2=$miDB->query("Select CodDepartamento,DescDepartamento from Departamento");
//Recorremos los datos como objetos
echo "<br>";
echo "Recorremos los datos como objetos";
while($consulta=$resultSet2->fetchObject()){
    echo $consulta->CodDepartamento." ".$consulta->DescDepartamento."<br>";
}
} catch (Exception $exc) {
    echo $exc->getMessage();
} finally {
    unset($miDB);
}



