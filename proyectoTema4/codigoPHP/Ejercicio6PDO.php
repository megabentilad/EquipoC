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
        $aErrores=[];
        for($i=1;$i<4;$i++){
        $aErrores['respuestaCodigo'.$i]=NULL;
        $aErrores['respuestaDepartamento'.$i]=null;
        }
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [];

        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
        #OBLIGATORIOS
             for($i=1;$i<4;$i++){
        $aErrores['respuestaCodigo'.$i]= validacionFormularios::comprobarAlfabetico($_POST['respuestaCodigo'.$i],3,3,1);
        $aErrores['respuestaDepartamento'.$i]= validacionFormularios::comprobarAlfabetico($_POST['respuestaDepartamento'.$i], 50, 1, 1);
        }
            foreach ($aErrores as $campo => $value) { //Recorre el array en busca de mensajes de error
                if ($value != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }

        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
           for($i=1;$i<4;$i++){
            $aFormulario['respuestaCodigo'.$i]= strtoupper($_POST['respuestaCodigo'.$i]);
           $aFormulario['respuestaDepartamento'.$i]= ucfirst($_POST['respuestaDepartamento'.$i]);
           }
           for($i=1;$i<4;$i++){
            echo $aFormulario['respuestaCodigo'.$i];
           echo $aFormulario['respuestaDepartamento'.$i];
           }
           try {
    //establecer conexión
    $miDB=new PDO($dns, $username, $password);
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $exc) {
        echo $exc->getMessage();
        echo "Error"."<br>";
        } finally {
            unset($miDB);
           }
           try {
               //Preparamos un unico sql para añadir varios departamentos
        $miDB->beginTransaction();
        $sqlDepartamento="INSERT INTO Departamento (CodDepartamento,DescDepartamento) VALUES";
        for($numero=1;$numero<4;$numero++){
        $sqlDepartamento=$sqlDepartamento."(:codigo".$numero.",:desc".$numero.")";
        if($numero<3){
        $sqlDepartamento=$sqlDepartamento.",";
        }
        $parametros[":codigo".$numero]=$aFormulario['respuestaCodigo'.$numero];
        $parametros[":desc".$numero]=$aFormulario['respuestaDepartamento'.$numero];
        }
        echo $sqlDepartamento."";
        echo "<br>",var_dump($parametros);
        $consulta=$miDB->prepare($sqlDepartamento);
        $consulta->execute($parametros);
            $miDB->commit();
        
           } catch (Exception $exc) {
        echo $exc->getMessage();
        echo "Error"."<br>";
           $miDB->rollBack();
        } finally {
            unset($miDB);
           }       
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Titulo formulario</legend>
                    <?php
                    for($i=1;$i<4;$i++){
                     
                        ?>
                        
                    <div class="posicion">
                    <div class="obligatorio">
                        <label for="codigo<?php echo $i;?>" >Codigo del departamento</label> 
                        <input type="text" id="codigo<?php echo $i;?>" name="respuestaCodigo<?php echo $i ;?>" placeholder="Codigo" value="<?php if($aErrores['respuestaCodigo'.$i] == NULL && isset($_POST['respuestaCodigo'.$i])){ echo $_POST['respuestaCodigo'.$i];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['respuestaCodigo'.$i] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['respuestaCodigo'.$i]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div class="obligatorio">
                        <label for="departamento<?php echo $i;?>" >Nombre del departamento</label> 
                        <input type="text" id="departamento<?php echo $i;?>" name="respuestaDepartamento<?php echo $i ;?>" placeholder="Departamento" value="<?php if($aErrores['respuestaDepartamento'.$i] == NULL && isset($_POST['respuestaDepartamento'.$i])){ echo $_POST['respuestaDepartamento'.$i];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['respuestaDepartamento'.$i] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['respuestaDepartamento'.$i]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                        </div>
                    <?php 
                    }   
                    ?>
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
