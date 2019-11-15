<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daniel Alcala Fernandez</title>
    </head>
    <body>
        <?php
        /**
 * @author Daniel Alcalá Fernández
 * @since 25/09/2019
 * 
 * Mostrar la fecha y hora actual formateada en castellano
 */
        setlocale(LC_TIME, 'es_ES.UTF-8');//Formatea el idioma en español linux
        setlocale(LC_TIME, 'spanish');//Formatea el idioma en español windows
        date_default_timezone_set('Europe/Madrid');//selecciona la zona horaria
        echo "La fecha actual es ".strftime("%A, %d de %B del %Y");//Saca la fecha actual
        ?>
    </body>
</html>
