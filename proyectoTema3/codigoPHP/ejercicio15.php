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
 * Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la
semana. (Array asociativo con los nombres de los días de la semana).
 */
        //Inicializamos el array
        $sueldos=[
            'Lunes'=>40,
            'Martes'=>30,
            'Miercoles'=>50,
            'Jueves'=>60,
            'Viernes'=>10,
            'Sabado'=>80,
            'Domingo'=>20,
            ];
        //recorremos el array con un foreach
        $total=0;
            foreach ($sueldos as $key => $sueldo) {
                echo "Dia de la semana ".$key." Sueldo= ".$sueldo."<br/>";
                $total=$total+$sueldo;
            }
            echo "Sueldo percibido de lunes a domingo".$total;
        ?>
    </body>
</html>
