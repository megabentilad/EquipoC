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
          @author 
          @since 22/10/2019
         */
        
        require '../core/validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $aErrores=['respuestaDepartamento'=>null];
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [];

        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
        #OBLIGATORIOS
            foreach ($aErrores as $campo => $value) { //Recorre el array en busca de mensajes de error
                if ($value != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }

        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
           
           $aFormulario['respuestaDepartamento']= $_POST['respuestaDepartamento'];
            try {
    //establecer conexión
    $miDB=new PDO($dns, $username, $password);
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlDepartamento='Select CodDepartamento,DescDepartamento FROM Departamento WHERE DescDepartamento LIKE ?';//Creamos la sentencia sql    
        $consulta=$miDB->prepare($sqlDepartamento);//preparamos el query
        $consulta->bindValue(1, "%".$aFormulario['respuestaDepartamento']."%");//Añadimos los parametros que necesitamos
        $consulta->execute();//Ejecutamos la consulta
        while($resultados=$consulta->fetchObject()){//Recorremos los resultados y los mostramos
            echo "Codigo de departamento ".$resultados->CodDepartamento." Descripción ".$resultados->DescDepartamento."<br>";
        }
           } catch (PDOException $exc) {
        echo $exc->getMessage();
        echo "Error al conectar "."<br>";
        } finally {
            unset($miDB);
           }       
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Titulo formulario</legend>
                    <div class="posicion">
                    <div class="obligatorio">
                        <label for="departamento" >Nombre del departamento</label> 
                        <input type="text" id="departamento" name="respuestaDepartamento" placeholder="Departamento" value="<?php if($aErrores['respuestaDepartamento'] == NULL && isset($_POST['respuestaDepartamento'])){ echo $_POST['respuestaDepartamento'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['respuestaDepartamento'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['respuestaDepartamento']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                        </div>
                    <div>
                        <input type="submit" name="enviar" value="Enviar">
                    </div>
                </fieldset>
            </form>
    <?php } ?>   
        <br/>
        <br/>
    </body>
</html>
        <?php
