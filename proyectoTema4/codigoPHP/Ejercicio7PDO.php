<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*$dns='mysql:host=192.168.1.200;dbname=mysql';
$username='admindb';
$password='paso';*/
$dns='mysql:host=192.168.20.19;dbname=DAW202DBdepartamentos';
$username='usuarioDAW202Departamentos';
$password='paso';
    ?>
    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daniel Alcala Fernandez</title>
        <meta name="author" content="">
        <meta name="date" content="08-10-2019">
        <link rel="stylesheet" type="text/css" href="../webroot/css/styles.css" media="screen">
        <link rel="icon" type="image/png" href="../../../mifavicon.png">
        <style>
        </style>
    </head>
    <body>
        <?php
        /**
          @author Daniel Alcala Fernandez
          @since 13/11/2019
         */
        if(isset($_REQUEST['Enviar'])){
            if(is_uploaded_file($_FILES['xml']['tmp_name'])){//Comprueba si existe
        $xml = simplexml_load_file($_FILES['xml']['tmp_name']);//Carga el archivo
        move_uploaded_file($_FILES['xml']['tmp_name'],"../tmp/".$_FILES['xml']['name']);//Cargar el archivo que nos han pasado al servidor
        //$xml = simplexml_load_file("../tmp/xmlprueba.xml");//Cargamos el archivo 
        try{
          $miDB=new PDO($dns, $username, $password);
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $exp){
            echo $exp->getMessage();
            echo "ERROR";
        }
        try{
        $miDB->beginTransaction();
        //Recorremos el archivo y creamos ql sql para su inserción, si se produce algun error sale por el catch
        foreach ($xml as $value) {
        $sqlDepartamento="INSERT INTO Departamento VALUES(:codigo,:desc)";    
        $consulta=$miDB->prepare($sqlDepartamento);
        $parametros=[":codigo"=>$value->codigo,":desc"=>$value->descripcion];
        $consulta->execute($parametros);
        }
        $miDB->commit();
        echo "Datos cargados";
        } catch (Exception $exp){
            echo $exp->getMessage();
            echo $exp->getCode();
            echo "ERROR";
            $miDB->rollBack();
        }
            }
        }else{?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <label for="archivo">Seleccione un archivo de datos a añadir</label>
            <input type="file" name="xml" id="archivo">
            <input type="submit" value="Enviar" name="Enviar">
        </form>
        <?php }?>
    </body>
</html>
