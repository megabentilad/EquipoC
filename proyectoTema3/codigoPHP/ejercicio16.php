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
 * Recorrer el array anterior utilizando funciones para obtener el mismo resultado
 */
        //Inicializamos el array
        $sueldos=array(
            1=>40,
            2=>30,
            3=>50,
            4=>60,
            5=>10,
            6=>80,
            7=>20,
            );
        //recorremos el array con un while list
        $total=0;
            while(list($clave, $valor)= each($sueldos)){
                $total=$total+$valor;
            }
            echo "Sueldo percibido de lunes a domingo ".$total;
        ?>
    </body>
</html>
