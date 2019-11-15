<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daniel Alcala Fernandez</title>
        <meta name="author" content="">
        <meta name="date" content="08-10-2019">
        <link rel="stylesheet" type="text/css" href="../webroot/css/styles.css" media="screen">
        <link rel="icon" type="image/png" href="../../../mifavicon.png">
        <style>
            .obligatorio input{
                background-color: lightblue;
            }
            .obligatorio textarea{
                background-color: lightblue;
            }
            .obligatorio select{
                background-color: lightblue;
            }
            .obligatorio label{
                text-decoration: underline;
            }
            .error{
                background-color: #ff708c;
                transition: 10s;
                width: 10%;
                padding: 0.5%;
                border-radius: 10%;
            }
        </style>
    </head>
    <body>  
        <h1>
            Plantilla de formulario
        </h1>
        <?php
        /**
          @author
          @since 22/10/2019
         */
        require 'validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $aErrores = [
            'campoAlfabetico' => null,
            'selectorFecha' => null,
            'selectorRadio' => null,
            'campoEntero' => null,
            'lista' => null,
            'campoTexto' => null,
        ];

        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [
            'campoAlfabetico' => null,
            'selectorFecha' => null,
            'selectorRadio' => null,
            'campoEntero' => null,
            'lista' => null,
            'campoTexto' => null,
        ];

        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
            #OBLIGATORIOS
            $aErrores['campoAlfabetico'] = validacionFormularios::comprobarAlfabetico($_POST['campoAlfabetico'], 255, 1, 1);  //maximo, mínimo y opcionalidad
            $aErrores['selectorFecha'] = validacionFormularios::validarFecha($_POST['selectorFecha'], "2999-12-12", "1900-01-01", 1); //maximo, minimo y obligatoriedad
            if (!isset($_POST['selectorRadio'])) {
                $aErrores['selectorRadio'] = "Debe marcarse un valor";
            }
            $aErrores['lista'] = validacionFormularios::validarElementoEnLista($_POST['lista'], array("ni idea", "con la familia", "de fiesta", "trabajando", "estudiando DWES")); // opciones
            $aErrores['campoEntero'] = validacionFormularios::comprobarEntero($_POST['campoEntero'], 10, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['campoTexto'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoTexto'], 255, 1, 1); //maximo, mínimo y opcionalidad
            #OPCIONALES      
            foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                } else {
                    if (isset($_POST[$campo])) {
                        $aFormulario[$campo] = $_POST[$campo];
                    }
                }
            }
        } else {
            $entradaOK = false; //Cambiamos el valor de la variable porque no se ha pulsado el botón
        }

        if ($entradaOK) { //Si el valor es true procesamos los datos que hemos recogido
            /*  foreach ($aFormulario as $campo) { //Recorre el array en busca de mensajes de error
              $aFormulario[$campo] = $_POST[$campo];
              } */
            //Mostramos los datos por pantalla 
            setlocale(LC_TIME, 'es_ES.UTF-8');
            date_default_timezone_set('Europe/Madrid');
            $fecha = explode("/", $aFormulario['selectorFecha']);
            $fechaNaci = new DateTime($fecha[0]);
            $fechaActual = new DateTime();
            $resultado = $fechaNaci->diff($fechaActual);
            echo "hoy " . strftime("%A, %d de %b a las %T ") . "<br>" . " de " . strftime("%Y") . " nacido hace " . $resultado->format('%Y') . "años se siente" . $aFormulario['selectorRadio'] . "." . "<br>" . "Valore su curso actual con un " . $aFormulario['campoEntero'] . " sobre 10." . "<br>" . "Estas navidades las dedicará " . $aFormulario['lista'] . "<br>" . " y además opina que " . $aFormulario['campoTexto'] . "<br>";
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Titulo formulario</legend>
                    <div class="obligatorio">
                        Nombre y apellidos: 
                        <input type="text" name="campoAlfabetico" placeholder="Alfabetico" value="<?php if ($aErrores['campoAlfabetico'] == NULL && isset($_POST['campoAlfabetico'])) {
            echo $_POST['campoAlfabetico'];
        } ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                            <?php if ($aErrores['campoAlfabetico'] != NULL) { ?>
                            <div class="error">
                            <?php echo $aErrores['campoAlfabetico']; //Mensaje de error que tiene el array aErrores    ?>
                            </div>   
    <?php } ?>                
                    </div>
                    <div class="obligatorio">
                        Fecha de nacimiento: 
                        <input type="date" name="selectorFecha" value="<?php if ($aErrores['selectorFecha'] == NULL && isset($_POST['selectorFecha'])) {
        echo $_POST['selectorFecha'];
    } ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['selectorFecha'] != NULL) { ?>
                            <div class="error">
        <?php echo $aErrores['selectorFecha']; //Mensaje de error que tiene el array aErrores    ?>
                            </div>   
    <?php } ?>                
                    </div>
                    <div class="obligatorio">
                        ¿Cómo te sientes hoy?: 
                        <br/>
                        <input type="radio" id="RO1" name="selectorRadio" value="Muy mal" <?php if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy mal") {
        echo 'checked';
    } ?>> <!--//Recuerda la selección-->
                        <label for="RO1">Muy mal</label><br/>
                        <input type="radio" id="RO2" name="selectorRadio" value="Mal" <?php if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Mal") {
        echo 'checked';
    } ?>> <!--//Recuerda la selección-->
                        <label for="RO2">Mal</label><br/>
                        <input type="radio" id="RO3" name="selectorRadio" value="Regular" <?php if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Regular") {
        echo 'checked';
    } ?>> <!--//Recuerda la selección-->
                        <label for="RO3">Regular</label><br/>
                        <input type="radio" id="RO4" name="selectorRadio" value="Bien" <?php if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Bien") {
        echo 'checked';
    } ?>> <!--//Recuerda la selección-->
                        <label for="RO5">Bien</label><br/>
                        <input type="radio" id="RO5" name="selectorRadio" value="Muy bien" <?php if (isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Muy bien") {
        echo 'checked';
    } ?>> <!--//Recuerda la selección-->
                        <label for="RO6">Muy bien</label><br/>
                        <?php if ($aErrores['selectorRadio'] != NULL) { ?>
                            <div class="error">
        <?php echo $aErrores['selectorRadio']; //Mensaje de error que tiene el array aErrores    ?>
                            </div>   
    <?php } ?>                
                    </div>
                    <div class="obligatorio">
                        ¿Como va el curso?(1 muy_mal_10muy bien)[1-10] 
                        <input type="number" name="campoEntero" placeholder="Número entero" value="<?php if ($aErrores['campoEntero'] == NULL && isset($_POST['campoEntero'])) {
        echo $_POST['campoEntero'];
    } ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoEntero'] != NULL) { ?>
                            <div class="error">
                                <?php echo $aErrores['campoEntero']; //Mensaje de error que tiene el array aErrores   ?>
                            </div>   
                        <?php } ?>                
                    </div>
                    <div class="obligatorio">
                        ¿Como se presentan las vacaciones de navidad?
                        <select name="lista">
                            <option value="ni idea" <?php if (isset($_POST['lista'])) {
                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "ni idea") {
                            echo "selected";
                        }
                    } ?>>ni idea</option>
                            <option value="con la familia" <?php if (isset($_POST['lista'])) {
                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "con la familia") {
                            echo "selected";
                        }
                    } ?>>con la familia</option>
                            <option value="de fiesta" <?php if (isset($_POST['lista'])) {
                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "de fiesta") {
                            echo "selected";
                        }
                    } ?>>de fiesta</option>
                            <option value="trabajando" <?php if (isset($_POST['lista'])) {
                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "trabajando") {
                            echo "selected";
                        }
                    } ?>>trabajando</option>
                            <option value="estudiando DWES" <?php if (isset($_POST['lista'])) {
                        if ($aErrores['lista'] == NULL && $_POST['lista'] == "estudiando DWES") {
                            echo "selected";
                        }
                    } ?>>estudiando DWES</option>
                        </select>
    <?php if ($aErrores['lista'] != NULL) { ?>
                            <div class="error">
        <?php echo $aErrores['lista']; //Mensaje de error que tiene el array aErrores    ?>
                            </div>   
    <?php } ?>                             
                    </div>
                    <div class="obligatorio">
                        Describe brevemente su estado de animo:
                        <textarea name="campoTexto" placeholder="Área de texto"><?php if ($aErrores['campoTexto'] == NULL && isset($_POST['campoTexto'])) {
        echo trim($_POST['campoTexto']);
    } ?></textarea><br> <!--//Si el valor es bueno, lo escribe en el campo-->
    <?php if ($aErrores['campoTexto'] != NULL) { ?>
                            <div class="error">
        <?php echo $aErrores['campoTexto']; //Mensaje de error que tiene el array aErrores    ?>
                            </div>   
    <?php } ?>  
                        <div>
                            <input type="submit" name="enviar" value="Enviar">
                        </div>
                </fieldset>
            </form>
<?php } ?>   
        <br/>
        <br/>
    </body>
</html>