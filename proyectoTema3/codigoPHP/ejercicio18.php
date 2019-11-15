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
 * Recorrer el array anterior utilizando funciones para obtener el mismo resultado
 *
 */
        $array1=array(
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            array(1,0,0,0,0,1,1,0,0,0,0,0,1,1,0),
            );
            //var_dump($array1);
            reset($array1);
            while(next($array1)!==false){
                $array2= current($array1);
                while(next($array2)!==false){
                    echo "valor ".current($array2);
                }
                echo "<br>";
            }
        ?>
    </body>
</html>
