<?php
        $dns='mysql:localhost=192.168.20.19;dbname=DAW202DBdepartamentos';
$username='usuarioDAW202Departamentos';
$password='paso';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daniel Alcala Fernandez</title>
    </head>
    <body>
        <form name="formulario" action="programa.php" method="POST">
        <label for="buscar">Buscar</label>
        <input type="text" name="buscar" id="buscar">
        <input type="submit" value="Buscar">
        </form>
        <form action="programa.php" method="Post" name="formulario2">
        <input type="submit" value="Añadir">
        <input type="submit" value="Borrar">
        <input type="submit" value="Modificar">
        <table>
            <tr>
                <th>Código departamento</th>
                <th>Descripción departamento</th>
            </tr>
            <?php 
if(!isset($_REQUEST['buscar'])){
try {
    //Establecer conexións
    $miDB=new PDO($dns, $username, $password);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Consulta
    $resultSet=$miDB->query("Select CodDepartamento,DescDepartamento from Departamento");
echo "Numero de resultados".$resultSet->rowCount();
//Consulta
$resultSet2=$miDB->query("Select CodDepartamento,DescDepartamento from Departamento");
//Recorremos los datos como objetos
while($consulta=$resultSet2->fetchObject()){
    ?>
            <tr>
        <td>
             <?php
    echo $consulta->CodDepartamento;
    ?>
        </td>
        <td>
             <?php
    echo $consulta->DescDepartamento;
    ?>
        </td>
        </tr><?php
}
} catch (Exception $exc) {
    echo $exc->getMessage();
} finally {
    unset($miDB);
}
     }   ?>
            </table>
        </form>
        
    </body>
</html>
