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
 * Mostrar la fecha y hora actual de Oporto en portugues
 */
        setlocale(LC_TIME, 'pr_PT.utf-8');//Formatea la salida en portugues
        date_default_timezone_set('Europe/Lisbon');//Selecciona la zona horaria
        echo "La fecha actual es ".strftime("%A, %d de %B del %Y %T");//Saca la fecha
        
        ?>
    </body>
</html>
