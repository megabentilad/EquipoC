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
        <?php
        if(isset($_REQUEST['submit'])){//Comprueba si hemos seleccionado enviar
    $numero1=$_REQUEST['numero1'];//Recoje el valor del primer numero
    $numero2=$_REQUEST['numero2'];//Recoje el valor del segundo numero
    $suma=$numero1+$numero2;//Suma los numeros y los almacena 
    echo "Suma de los numeros ".$suma."<br>";//Muestra la suma
        }else{//Si no hemos presionado enviar muestra el formulario
        ?>
        
        <h2>Formulario</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']//Redirecciona hacia este mismo fichero ?>" method="post">
            Numero1:<br>
            <input type="text" name="numero1"><br>
            Numero2:<br>
            <input type="text" name="numero2"><br>
            <input type="submit" value="enviar" name="submit">
        </form>
        <?php } ?>
    </body>
</html>
