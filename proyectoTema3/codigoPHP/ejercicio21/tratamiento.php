
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <!--
    autor Daniel Alcalá Fernández
    fecha 24/09/2019
  -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Daniel Alcala Fernandez</title>
  </head>
  <body>
<?php
/**
 * @author Daniel Alcalá Fernández
 * @since 25/09/2019
 * 
 * Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una pagina Tratamiento.php para que muestre las preguntas y las respuestas recogidas
 */
    $numero1=$_REQUEST['numero1'];//Recojemos el valor del primer numero
    $numero2=$_REQUEST['numero2'];//Recojemos el valor del segundo numero
    $suma=$numero1+$numero2;//Suma los dos numeros y los almacena
    echo "Suma de los numeros ".$suma."<br>";//muestra el numero
?>
</body>
</html>

