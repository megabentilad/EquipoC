<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /**
 * @author Daniel Alcalá Fernández
 * @since 25/09/2019
 * 
 * Mostrar la dirección IP del equipo desde el que estás accediendo
 */
        echo "IP del equipo que se esta conectando ".$_SERVER['REMOTE_ADDR'];
        ?>
    </body>
</html>
