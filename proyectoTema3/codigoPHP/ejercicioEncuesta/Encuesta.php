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
        <h1>
            Plantilla de formulario
        </h1>
        <?php
        /**
          @author 
          @since 22/10/2019
         */
        
        require 'validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        $numEncuesta=3;//Numero de encuestas a realizar
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $contador=0;
        $aErrores=[];
        for ($encuesta = 1; $encuesta <= $numEncuesta; $encuesta++) {
        $aErrores[$contador]['respuestaNombre'.$encuesta]=null;
        $aErrores[$contador]['respuestaComidas'.$encuesta]=null;
        $aErrores[$contador]['respuestaTexto'.$encuesta]=null;
        $contador++;
        }
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [
            ['Nombre' => null,'Comidas' => null,
            'Texto' => null,],
            ['Nombre' => null,'Comidas' => null,
            'Texto' => null,],
            ['Nombre' => null,'Comidas' => null,
            'Texto' => null,],
        ];

        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
        #OBLIGATORIOS
             $contador=0;
                    for ($encuesta = 1; $encuesta <= $numEncuesta; $encuesta++) {
        $aErrores[$contador]['respuestaNombre'.$encuesta] = validacionFormularios::comprobarAlfabetico($_POST['respuestaNombre'.$encuesta], 20, 1, 1);  //maximo, mínimo y opcionalidad
        $aErrores[$contador]['respuestaComidas'.$encuesta] = validacionFormularios::comprobarEntero($_POST['respuestaComidas'.$encuesta], 10, 1, 1); //maximo, mínimo y opcionalidad
        $aErrores[$contador]['respuestaTexto'.$encuesta] = validacionFormularios::comprobarAlfaNumerico($_POST['respuestaTexto'.$encuesta], 255, 1, 1); //maximo, mínimo y opcionalidad
        $contador++;
        
                    }
        #OPCIONALES      
            foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                foreach ($error as $key => $value) {
                if ($value != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                }
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }

        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
            $contador=0;
            for ($encuesta = 1; $encuesta <= $numEncuesta; $encuesta++) {
            $aFormulario[$contador]['Nombre']=$_REQUEST['respuestaNombre'.$encuesta];
            $aFormulario[$contador]['Comidas']=$_REQUEST['respuestaComidas'.$encuesta];
            $aFormulario[$contador]['Texto']=$_REQUEST['respuestaTexto'.$encuesta];
            $contador++;
            }
            //Mostramos los datos por pantalla
            $contador=0;
            for ($encuesta = 1; $encuesta <= $numEncuesta; $encuesta++) {
            echo "Nombre del usuario ".$aFormulario[$contador]['Nombre']."<br>";
            echo "Numero de comidas ".$aFormulario[$contador]['Comidas']."<br>";
            echo "Describe tus comidas ".$aFormulario[$contador]['Texto']."<br>";
            $contador++;
            }
            $contador=0;
            $suma=0;
            for ($encuesta = 1; $encuesta <= $numEncuesta; $encuesta++) {
            $suma+=$aFormulario[$contador]['Comidas'];
            $contador++;
            }
            echo "Media de comidas ".intval($suma/$numEncuesta);
            
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Titulo formulario</legend>
                    <?php
                    $contador=0;
                    for ($encuesta = 1; $encuesta <= $numEncuesta; $encuesta++) { 
                               ?>
                    <div class="posicion">
                    <div class="obligatorio">
                        Nombre: 
                        <input type="text" name="respuestaNombre<?php echo $encuesta?>" placeholder="Alfabetico" value="<?php if($aErrores[$contador]['respuestaNombre'.$encuesta] == NULL && isset($_POST['respuestaNombre'.$encuesta])){ echo $_POST['respuestaNombre'.$encuesta];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores[$contador]['respuestaNombre'.$encuesta] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores[$contador]['respuestaNombre'.$encuesta]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div class="obligatorio">
                        Numero de comidas que realizas al dia: 
                        <input type="number" name="respuestaComidas<?php echo $encuesta?>" placeholder="Número entero" value="<?php if($aErrores[$contador]['respuestaComidas'.$encuesta] == NULL && isset($_POST['respuestaComidas'.$encuesta])){ echo $_POST['respuestaComidas'.$encuesta];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores[$contador]['respuestaComidas'.$encuesta] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores[$contador]['respuestaComidas'.$encuesta]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div class="obligatorio">
                         Describe tus comidas:
                        <textarea name="respuestaTexto<?php echo $encuesta?>" placeholder="Área de texto"><?php if($aErrores[$contador]['respuestaTexto'.$encuesta] == NULL && isset($_POST['respuestaTexto'.$encuesta])){ echo trim($_POST['respuestaTexto'.$encuesta]);}?></textarea><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores[$contador]['respuestaTexto'.$encuesta] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores[$contador]['respuestaTexto'.$encuesta]; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>
                     </div>
                        </div>
                    <?php 
                    $contador++;
                        }?>
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