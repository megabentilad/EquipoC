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
 *  Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).
 */
        echo "Valor  de las variables superglobales";
        echo "<pre>";
        print_r($GLOBALS)."<br>";
        echo "</pre>";
        echo "<pre>";
        print_r($_COOKIE)."<br>";
        echo "</pre>";
        echo "<pre>";
        print_r($_ENV)."<br>";
        echo "</pre>";
        echo "<pre>";
        print_r($_FILES)."<br>";
        echo "</pre>";
        echo "<pre>";
        print_r($_GET)."<br>";
        echo "</pre>";
        echo "<pre>";
        print_r($_POST)."<br>";
        echo "</pre>";
        echo "<pre>";
        print_r($_REQUEST)."<br>";
        echo "</pre>";
        echo "<pre>";
        print_r($_SERVER)."<br>";
        echo "</pre>";
        echo "<pre>";
        /*print_r($_SESSION)."<br>";*/
        echo "</pre>";
        echo 'Variable $_SERVER';
        echo '<table border= 1px solid black>';
          echo "<tr>";
            echo "<td>";
            echo "Variable";
            echo "</td>";
            echo "<td>";
            echo "Valor";
            echo "</td>";
            echo "</tr>";
         foreach ($_SERVER as $clave => $valor) {
             echo "<tr>";
            echo "<td>";
            echo '$_SERVER'."<strong>['$clave']</strong><br>";
            echo "</td>";
            
            echo "<td>";
            echo " $valor ";
            echo "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        foreach ($_SERVER as $key => $value) {
        echo '$_COOKIE'.$value;
        }
        ?>
      
            
    </body>
</html>
