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
 * Crear una función que cuente el número de visitas a la página actual desde una fecha concreta
 */
                $fecha_actual = strtotime(date("d-m-Y H:i:00",time())); 
                $fecha_requisito = strtotime("01-01-2019 00:00:00"); 
                $archivo = "contador.txt";
                $fp = fopen($archivo,"w+");
                $contador = fgets($fp, 26);
                fclose($fp);
                
                if($fecha_actual > $fecha_requisito){ 
                    $contador++;
                    $fp = fopen($archivo,"w+");
                    fwrite($fp, $contador, 26);
                    fclose($fp);
                } 

                echo "Esta página ha sido visitada $contador veces"; 
           
        ?>
    </body>
</html>