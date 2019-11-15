<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dns='mysql:dbname=DAW211_DBdepartamentos;localhost=198.168.1.200:3306';
$username="admindb";
$password="paso";
$db='DAW211_DBdepartamentos';
$miDB=new mysqli($dns,$db,$password,$username);
$resultSet=$miDB->query("Select CodDepartamento,DescDepartamento from Departamento");
while($consulta=$resultSet->fetch_array()){
    echo $consulta['CodDepartamento'].$consulta['DesDepartamento'];
}
unset($miDB);

