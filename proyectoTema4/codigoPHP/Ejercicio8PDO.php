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
            .obligatorio input{
                background-color: lightblue;
            }
            .obligatorio textarea{
                background-color: lightblue;
            }
            .obligatorio select{
                background-color: lightblue;
            }
            .obligatorio label{
                text-decoration: underline;
            }
            .error{
                background-color: #ff708c;
                transition: 10s;
                width: 10%;
                padding: 0.5%;
                border-radius: 10%;
                width: 33%;
            }
            .posicion{
                float: left;
                width: 33%;
            }
        </style>
    </head>
    <body>  
        <?php
        /**
          @author Daniel Alcala Fernandez
          @since 13/11/2019
         */
        
        require '../core/validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $aErrores=['respuestaCodigo'=>null];
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [];
        //fopen("archivoXml.xml");
        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
        #OBLIGATORIOS
            $aErrores['respuestaCodigo']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['respuestaCodigo'], 3, 3, 0);
            foreach ($aErrores as $campo => $value) { //Recorre el array en busca de mensajes de error
                if ($value != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }      
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Titulo formulario</legend>
                    <div class="posicion">
                    <div class="obligatorio">
                        <label for="codigo" >codigo del departamento</label> 
                        <input type="text" id="codigo" name="respuestaCodigo" placeholder="Codigo" value="<?php if($aErrores['respuestaCodigo'] == NULL && isset($_POST['respuestaCodigo'])){ echo $_POST['respuestaCodigo'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['respuestaCodigo'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['respuestaCodigo']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                        </div>
                    <div>
                        <input type="submit" name="enviar" value="Enviar">
                    </div>
                </fieldset>
            </form>
    <?php  
            if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
           
           $aFormulario['respuestaCodigo']= $_POST['respuestaCodigo'];
            try {
    //establecer conexión
    $miDB=new PDO($dns, $username, $password);
    //Cargamos todos los datos de la base de datos
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlDepartamento='Select CodDepartamento,DescDepartamento FROM Departamento WHERE CodDepartamento LIKE ?';    
        $consulta=$miDB->prepare($sqlDepartamento);
        $consulta->bindValue(1, "%".$aFormulario['respuestaCodigo']."%");
        $consulta->execute();
        //Nombre del archivo "archivoXml.xml"
        //añadir los departamentos a la etiqueta departamentos
        $archivo='<?xml version="1.0" encoding="UTF-8"?><departamentos></departamentos>';
        $xml=new SimpleXMLElement($archivo);
        //$xml= simplexml_load_file("../tmp/archivoXml.xml");
        $departamentos=$xml->departamentos;
        //Añadimos los datos al fichero
        while($resultados=$consulta->fetchObject()){
            $departamento=$xml->addChild('departamento');
            $departamento->addChild('codigo',$resultados->CodDepartamento);
            $departamento->addChild('descripcion',$resultados->DescDepartamento);

        }
        //Guardamos el fichero con el nombre que queremos y su ruta
        $xml->asXML("../tmp/archivoXml.xml");
           } catch (PDOException $exc) {
        echo $exc->getMessage();
        echo "Error al conectar "."<br>";
        } finally {
            unset($miDB);
            
           }
            }?>   
        <br/>
        <br/>
    </body>
</html>
        <?php
