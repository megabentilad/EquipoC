<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Daniel Alcala Fernandez</title>
    </head>
    <body>
        <?php
        /**
 * @author Daniel Alcalá Fernández
 * @since 25/09/2019
 * 
 * Inicializar una variable heredoc y mostrarla por pantalla
 */
        $aHeredoc = <<<E
TEXTO DE EJEMPLO
TEXTO DE EJEMPLO
E;
        
        echo $aHeredoc;
        ?>
    </body>
</html>
