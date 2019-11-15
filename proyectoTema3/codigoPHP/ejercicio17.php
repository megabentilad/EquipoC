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
 * Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el
asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con
distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.
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
            foreach ($array1 as $value) {
                foreach ($value as $value2){
                    echo  "Sitio ".$value2." ";
                }
                echo"<br/>";
            }
            
            echo "<br/>";
            $filas=0;
            while ($filas<20){
                $asientos=0;
                while($asientos<15){
                    if($array1[$filas][$asientos]){
                        echo "Ocupado el ".$filas." ".$asientos;
                    }
         
                    $asientos++;
                }
                echo "<br>";
                $filas++;
            }
            for ($i = 0; $i < 20; $i++) {
                for ($j = 0; $j <= 15; $j++){
                 if($array1[i][j]){
                     echo "Ocupado el ".$filas." ".$asientos;
                 }
            }
        }
        ?>
    </body>
</html>
