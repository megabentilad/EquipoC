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
 * Inicializar variables de distintos tipos y mostrarlos por pantalla de diferentes formas
 */
/*Tipo cadena
 * Inicializamos la variable
*/
$cadena="cadena de caracteres";
echo "La variable ".'$cadena'." es de tipo ". gettype($cadena)." y contiene: ".$cadena."\n";//Muestra el nombre de la variable el tipo y el valor
echo "<br>";
print "La variable ".'$cadena'." es de tipo ". gettype($cadena)." y contiene: ".$cadena;
echo "<br>";
$formato="La variable ".'$cadena'." es de tipo ". gettype($cadena)." y contiene: %s ";
printf($formato, $cadena);
echo "<br>";
print_r("La variable ".'$cadena'." es de tipo ". gettype($cadena)." y contiene: ".$cadena);
echo "<br>";
$a = array($cadena,$cadena,$cadena);
var_dump($a);
echo "<br>";
/*Tipo cadena
 * Inicializamos la variable
*/
$entero=5;
echo "La variable ".'$entero'." es de tipo ". gettype($entero)." y contiene: ".$entero;
echo "<br>";
print "La variable ".'$entero'." es de tipo ". gettype($entero)." y contiene: ".$entero;
echo "<br>";
$formato="La variable ".'$entero'." es de tipo ". gettype($entero)." y contiene: %d ";
printf($formato, $entero);
echo "<br>";
print_r("La variable ".'$entero'." es de tipo ". gettype($entero)." y contiene: ".$entero);
echo "<br>";
$a = array($entero,$entero,$entero);
var_dump($a);
echo "<br>";
/*Tipo cadena
 * Inicializamos la variable
*/
$decimal=5.1;
echo "La variable ".'$decimal'." es de tipo ". gettype($decimal)." y contiene: ".$decimal;
echo "<br>";
print "La variable ".'$decimal'." es de tipo ". gettype($decimal)." y contiene: ".$decimal;
echo "<br>";
$formato="La variable ".'$decimal'." es de tipo ". gettype($decimal)." y contiene: %f ";
printf($formato, $decimal);
echo "<br>";
print_r("La variable ".'$decimal'." es de tipo ". gettype($decimal)." y contiene: ".$decimal);
echo "<br>";
$a = array($decimal,$decimal,$decimal);
var_dump($a);
echo "<br>";
/*Tipo cadena
 * Inicializamos la variable
*/
$booleano=true;
echo "La variable ".'$booleano'." es de tipo ". gettype($booleano)." y contiene: ".$booleano;
echo "<br>";
print "La variable ".'$booleano'." es de tipo ". gettype($booleano)." y contiene: ".$booleano;
echo "<br>";
$formato="La variable ".'$booleano'." es de tipo ". gettype($booleano)." y contiene: %s ";
printf($formato, $booleano);
echo "<br>";
print_r("La variable ".'$booleano'." es de tipo ". gettype($booleano)." y contiene: ".$booleano);
echo "<br>";
$a = array($booleano,$booleano,$booleano);
var_dump($a);
echo "<br>";
?>
</body>
</html>