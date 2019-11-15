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
 *  Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días
 */
        setlocale(LC_TIME, 'es_ES.UTF-8');
        date_default_timezone_set('Europe/Madrid');
        $fechaActual= new DateTime();
        $fechaActual->modify('+60 day');//Suma 60 dias a la fecha
        echo date("d-m-Y",$fechaActual->getTimestamp())."<br/>";//Muestra el timestamp
        echo $fechaActual->format("Y-m-d\TH:i:sP");//Da formato a la fecha
        ?>
    </body>
</html>
