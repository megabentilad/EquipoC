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
 * Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
 */
        $miFecha= new DateTime();//Crea un objeto de la clase horaria
        echo "Variable timestamp ".$miFecha->getTimestamp()."<br>";//Muestra el valor de la variable timestamp
        $miFecha->setDate(1980, 2, 2);//Cambia la fecha a otra
        echo "Variable timestamp ".$miFecha->format('Y-m-d');//Muestra la fecha
        ?>
    </body>
</html>
