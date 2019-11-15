<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Daniel Alcalá Fernández</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php /*
         * Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas
         */
        require '../../core/validacionFormularios.php';
        define('MAX', PHP_FLOAT_MAX);//Valor maximo
        define('MIN', -PHP_FLOAT_MAX);//Valor minimo
        define('OBLIGATORIO', 1);
        $entradaOK=true;
        $errores=['numero1'=>null,'numero2'=>null];
        $datos=['numero1'=>null,'numero2'=>null];
        if(isset($_REQUEST['submit'])){//Comprueba si hemos seleccionado enviar
        $errores['numero1']= validacionFormularios::comprobarFloat($_REQUEST['numero1'], MAX, MIN, OBLIGATORIO);//Valida si la variable entregada es un float y si se encuentra entre el maximo y el minimo
        $errores['numero2']= validacionFormularios::comprobarFloat($_REQUEST['numero2'], MAX, MIN, OBLIGATORIO); //Valida si la variable entregada es un float y si se encuentra entre el maximo y el minimo
        foreach ($errores as $key => $value) {
            if($errores[$key]!==null){
                $entradaOK=false;
            }
        }
        }else{
            $entradaOK=false;
        }
        if($entradaOK){
            foreach ($datos as $key => $value) {
                $datos[$key]=$_REQUEST[$key];
            }
    
        $suma=$datos['numero1']+$datos['numero2'];//Suma los numeros y los almacena 
         echo "Suma de los numeros ".$suma."<br>";//Muestra la suma
        }else{
        ?>
        
        <h2>Formulario</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']//Redirecciona hacia este mismo fichero ?>" method="post">
            Numero1:<br>
            <input type="text" name="numero1" value=<?php if($errores['numero1']==null && isset($_REQUEST['numero1'])) { echo $_REQUEST['numero1'];}//Muestra el valor del campo si no es erroneo y existe?> >
            <br>
             <?php 
        if($errores['numero1']!==null){//Muestra el error si existe
            echo "Numero1 ".$errores['numero1']."<br>";
        }
        ?>
            Numero2:<br>
            <input type="text" name="numero2" value=<?php if($errores['numero2']==null && isset($_REQUEST['numero2'])){ echo $_REQUEST['numero2'];}//Muestra el valor del campo si no es erroneo y existe ?>>
            <br>
                <?php
            if($errores['numero2']!==null){//Muestra el error si existe
            echo "Numero2 ".$errores['numero2']."<br>";
        }?>
            
            <input type="submit" value="enviar" name="submit">
        </form>
        <?php }?>
    </body>
</html>
