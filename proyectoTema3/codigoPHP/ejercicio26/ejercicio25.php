<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Luis Mateo Rivera Uriarte</title>
        <meta name="author" content="Luis Mateo Rivera Uriarte">
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
          @author Luis Mateo Rivera Uriate
          @since 15/10/2019
         */
        
        require 'validacionFormularios.php'; //Importamos la libreria de validacion

        $entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto
        
        //Inicializamos un array que se encargara de recoger los errores(Campos vacios)
        $aErrores = [
            'campoAlfabetico' => null,
            'campoAlfabeticoOpcional' => null,
            
            'campoAlfanumerico' => null,
            'campoAlfanumericoOpcional' => null,
            
            'campoEntero' => null,  
            'campoEnteroOpcional' => null,  
            
            'campoFloat' => null,  
            'campoFloatOpcional' => null,  
            
            'campoPassword' => null,
            'campoPasswordOpcional' => null,
            
            'campoTexto' => null,
            'campoTextoOpcional' => null,
            
            'selectorRadio' => null,
            'selectorRadioOpcional' => null,
            
            'selectorCheckbox' => null,
            'selectorCheckboxOpcional' => null,
            
            'selectorFecha' => null,
            'selectorFechaOpcional' => null,
            
            'lista' => null,

          #  'selectorColor' => null,
          #  'campoEmail' => null,
          #  'selectorFichero' => null,
          #  'selectorSlider' => null,
          #  'campoTelefono' => null,
          #  'campoURL' => null,
          #  'botonEnviar' => null
        ];
        
        //Inicializamos un array que se encargara de recoger los datos del formulario(Campos vacios)
        $aFormulario = [
            'campoAlfabetico' => null,
            'campoAlfabeticoOpcional' => null,
            
            'campoAlfanumerico' => null,
            'campoAlfanumericoOpcional' => null,
            
            'campoEntero' => null,  
            'campoEnteroOpcional' => null,  
            
            'campoFloat' => null,  
            'campoFloatOpcional' => null,  
            
            'campoPassword' => null,
            'campoPasswordOpcional' => null,
            
            'campoTexto' => null,
            'campoTextoOpcional' => null,
            
            'selectorRadio' => null,
            'selectorRadioOpcional' => null,
            
            'selectorCheckbox' => null,
            'selectorCheckboxOpcional' => null,
            
            'selectorFecha' => null,
            'selectorFechaOpcional' => null,
            
            'lista' => null,

          #  'selectorColor' => null,
          #  'campoEmail' => null,
          #  'selectorFichero' => null,
          #  'selectorSlider' => null,
          #  'campoTelefono' => null,
          #  'campoURL' => null,
          #  'botonEnviar' => null
        ];

        if (isset($_POST['enviar']) && $_POST['enviar'] == 'Enviar') { //Si se ha pulsado enviar
            //La posición del array de errores recibe el mensaje de error si hubiera
        #OBLIGATORIOS
            $aErrores['campoAlfabetico'] = validacionFormularios::comprobarAlfabetico($_POST['campoAlfabetico'], 20, 1, 1);  //maximo, mínimo y opcionalidad
            $aErrores['campoAlfanumerico'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoAlfanumerico'], 20, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['campoEntero'] = validacionFormularios::comprobarEntero($_POST['campoEntero'], 150, -150, 1); //maximo, mínimo y opcionalidad
            $aErrores['campoFloat'] = validacionFormularios::comprobarFloat($_POST['campoFloat'], 150, -150, 1); //maximo, mínimo y opcionalidad
            $aErrores['campoPassword'] = validacionFormularios::validarPassword($_POST['campoPassword'], 3, 1); //obligatoriedad y longitud mínima
            if(!isset($_POST['selectorRadio'])){$aErrores['selectorRadio'] = "Debe marcarse un valor";}
            if(!isset($_POST['selectorCheckbox'])){$aErrores['selectorCheckbox'] = "Debe marcarse al menos un valor";}
            $aErrores['selectorFecha'] = validacionFormularios::validarFecha($_POST['selectorFecha'], "2999-12-12", "1900-01-01", 1); //maximo, minimo y obligatoriedad
            $aErrores['campoTexto'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoTexto'], 255, 1, 1); //maximo, mínimo y opcionalidad
            $aErrores['lista'] = validacionFormularios::validarElementoEnLista($_POST['lista'], array("opcion1", "opcion2", "opcion3")); // opciones
        #OPCIONALES    
            $aErrores['campoAlfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_POST['campoAlfabeticoOpcional']);  //maximo, mínimo y opcionalidad
            $aErrores['campoAlfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoAlfanumericoOpcional']); //maximo, mínimo y opcionalidad
            $aErrores['campoEnteroOpcional'] = validacionFormularios::comprobarEntero($_POST['campoEnteroOpcional']); //maximo, mínimo y opcionalidad
            $aErrores['campoFloatOpcional'] = validacionFormularios::comprobarFloat($_POST['campoFloatOpcional']); //maximo, mínimo y opcionalidad
            $aErrores['campoPasswordOpcional'] = validacionFormularios::validarPassword($_POST['campoPasswordOpcional']); //obligatoriedad y longitud mínima
            $aErrores['selectorFechaOpcional'] = validacionFormularios::validarFecha($_POST['selectorFechaOpcional']); //maximo, minimo y obligatoriedad
            $aErrores['campoTextoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_POST['campoTextoOpcional']); //maximo, mínimo y opcionalidad
            
            foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
                if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
                    $entradaOK = false; //Cambia la condiccion de la variable
                }
                else{
                    if(isset($_POST[$campo])){
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
            echo "Alfabetico: " . $aFormulario['campoAlfabetico'] . "<br>";
            if($aFormulario['campoAlfabeticoOpcional'] != null){
                echo "Alfabetico opcional: " . $aFormulario['campoAlfabeticoOpcional'] . "<br>";
            }
            
            echo "Alfanumerico: " . $aFormulario['campoAlfanumerico'] . "<br>";
            if($aFormulario['campoAlfanumericoOpcional'] != null){
                echo "Alfanumerico opcional: " . $aFormulario['campoAlfanumericoOpcional'] . "<br>";
            }
            
            echo "Entero: " . $aFormulario['campoEntero'] . "<br>";
            if($aFormulario['campoEnteroOpcional'] != null){
                echo "Entero opcional: " . $aFormulario['campoEnteroOpcional'] . "<br>";
            }
            
            echo "Float: " . $aFormulario['campoFloat'] . "<br>";
            if($aFormulario['campoFloatOpcional'] != null){
                echo "Float opcional: " . $aFormulario['campoFloatOpcional'] . "<br>";
            }
            
            echo "Contraseña: " . $aFormulario['campoPassword'] . "<br>";
            if($aFormulario['campoPasswordOpcional'] != null){
                echo "Contraseña opcional: " . $aFormulario['campoPasswordOpcional'] . "<br>";
            }
            
            echo "Area de texto: " . $aFormulario['campoTexto'] . "<br>";
            if($aFormulario['campoTextoOpcional'] != null){
                echo "Area de texto opcional: " . $aFormulario['campoTextoOpcional'] . "<br>";
            }
            
            echo "Radio button: " . $aFormulario['selectorRadio'] . "<br>";
            if($aFormulario['selectorRadioOpcional'] != null){
                echo "Radio button opcional: " . $aFormulario['selectorRadioOpcional'] . "<br>";
            }
            
            echo "Checkbox: ";
            if(isset($aFormulario['selectorCheckbox']['opcion1'])){
                echo $aFormulario['selectorCheckbox']['opcion1'] . " ";      
            }
            if(isset($aFormulario['selectorCheckbox']['opcion2'])){
                echo $aFormulario['selectorCheckbox']['opcion2'];
            }
            echo "<br/>";
            if($aFormulario['selectorCheckboxOpcional'] != null){
                echo "Checkbox opcional: ";
                if(isset($aFormulario['selectorCheckboxOpcional']['opcion1'])){
                    echo $aFormulario['selectorCheckboxOpcional']['opcion1'] . " ";      
                }
                if(isset($aFormulario['selectorCheckboxOpcional']['opcion2'])){
                    echo $aFormulario['selectorCheckboxOpcional']['opcion2'];
                }
                echo "<br/>";
            }
                    
            echo "Fecha: " . date('d/m/Y', strtotime($aFormulario['selectorFecha'])) . "<br>";
            if($aFormulario['selectorFechaOpcional'] != null){
                echo "Fecha opcional: " . date('d/m/Y', strtotime($aFormulario['selectorFechaOpcional'])) . "<br>";
            }
            
            echo "Lista: " . $aFormulario['lista'] . "<br>";
            
            echo '<br/><br/>';
        } else { //Mostrar el formulario hasta que se rellene correctamente
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <legend>Titulo formulario</legend>
                    <div class="obligatorio">
                        Alfabetico: 
                        <input type="text" name="campoAlfabetico" placeholder="Alfabetico" value="<?php if($aErrores['campoAlfabetico'] == NULL && isset($_POST['campoAlfabetico'])){ echo $_POST['campoAlfabetico'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoAlfabetico'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoAlfabetico']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Alfabetico opcional: 
                        <input type="text" name="campoAlfabeticoOpcional" placeholder="Alfabetico" value="<?php if($aErrores['campoAlfabeticoOpcional'] == NULL && isset($_POST['campoAlfabeticoOpcional'])){ echo $_POST['campoAlfabeticoOpcional'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoAlfabeticoOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoAlfabeticoOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Alfanumerico: 
                        <input type="text" name="campoAlfanumerico" placeholder="Alfanumerico" value="<?php if($aErrores['campoAlfanumerico'] == NULL && isset($_POST['campoAlfanumerico'])){ echo $_POST['campoAlfanumerico'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoAlfanumerico'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoAlfanumerico']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Alfanumerico opcional: 
                        <input type="text" name="campoAlfanumericoOpcional" placeholder="Alfanumerico" value="<?php if($aErrores['campoAlfanumericoOpcional'] == NULL && isset($_POST['campoAlfanumericoOpcional'])){ echo $_POST['campoAlfanumericoOpcional'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoAlfanumericoOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoAlfanumericoOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Numérico entero: 
                        <input type="number" name="campoEntero" placeholder="Número entero" value="<?php if($aErrores['campoEntero'] == NULL && isset($_POST['campoEntero'])){ echo $_POST['campoEntero'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoEntero'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoEntero']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Numérico entero opcional: 
                        <input type="number" name="campoEnteroOpcional" placeholder="Número entero" value="<?php if($aErrores['campoEnteroOpcional'] == NULL && isset($_POST['campoEnteroOpcional'])){ echo $_POST['campoEnteroOpcional'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoEnteroOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoEnteroOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Numérico float: 
                        <input type="text" name="campoFloat" placeholder="Número decimal" value="<?php if($aErrores['campoFloat'] == NULL && isset($_POST['campoFloat'])){ echo $_POST['campoFloat'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoFloat'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoFloat']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Numérico float opcional: 
                        <input type="text" name="campoFloatOpcional" placeholder="Número decimal" value="<?php if($aErrores['campoFloatOpcional'] == NULL && isset($_POST['campoFloatOpcional'])){ echo $_POST['campoFloatOpcional'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoFloatOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoFloatOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Contraseña: 
                        <input type="password" name="campoPassword" placeholder="Contraseña" value="<?php if($aErrores['campoPassword'] == NULL && isset($_POST['campoPassword'])){ echo $_POST['campoPassword'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoPassword'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoPassword']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Contraseña opcional: 
                        <input type="password" name="campoPasswordOpcional" placeholder="Contraseña" value="<?php if($aErrores['campoPasswordOpcional'] == NULL && isset($_POST['campoPasswordOpcional'])){ echo $_POST['campoPasswordOpcional'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoPasswordOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoPasswordOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Área de texto: 
                        <textarea name="campoTexto" placeholder="Área de texto"><?php if($aErrores['campoTexto'] == NULL && isset($_POST['campoTexto'])){ echo trim($_POST['campoTexto']);}?></textarea><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoTexto'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoTexto']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Área de texto opcional: 
                        <textarea name="campoTextoOpcional" placeholder="Área de texto"><?php if($aErrores['campoTextoOpcional'] == NULL && isset($_POST['campoTextoOpcional'])){ echo $_POST['campoTextoOpcional'];}?></textarea><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['campoTextoOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['campoTextoOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Radio button: 
                        <br/>
                        <input type="radio" id="RO1" name="selectorRadio" value="Opcion 1" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Opcion 1"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO1">Opcion 1</label><br/>
                        <input type="radio" id="RO2" name="selectorRadio" value="Opcion 2" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Opcion 2"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO2">Opcion 2</label><br/>
                        <input type="radio" id="RO3" name="selectorRadio" value="Opcion 3" <?php if(isset($_POST['selectorRadio']) && $_POST['selectorRadio'] == "Opcion 3"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="RO3">Opcion 3</label><br/>
                        <?php if ($aErrores['selectorRadio'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['selectorRadio']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Radio button opcional: 
                        </br>
                        <input type="radio" id="R1" name="selectorRadioOpcional" value="Opcion 1" <?php if(isset($_POST['selectorRadioOpcional']) && $_POST['selectorRadioOpcional'] == "Opcion 1"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="R1">Opcion 1</label><br/>
                        <input type="radio" id="R2" name="selectorRadioOpcional" value="Opcion 2" <?php if(isset($_POST['selectorRadioOpcional']) && $_POST['selectorRadioOpcional'] == "Opcion 2"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="R2">Opcion 2</label><br/>
                        <input type="radio" id="R3" name="selectorRadioOpcional" value="Opcion 3" <?php if(isset($_POST['selectorRadioOpcional']) && $_POST['selectorRadioOpcional'] == "Opcion 3"){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="R3">Opcion 3</label><br/>
                        <?php if ($aErrores['selectorRadioOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['selectorRadioOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Checkbox: 
                        <br/>
                        <input type="checkbox" id="CO1" name="selectorCheckbox[opcion1]" value="Opcion 1" <?php if(isset($_POST['selectorCheckbox']['opcion1'])){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="CO1">Opcion 1</label><br/>
                        <input type="checkbox" id="CO2" name="selectorCheckbox[opcion2]" value="Opcion 2" <?php if(isset($_POST['selectorCheckbox']['opcion2'])){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="CO2">Opcion 2</label><br/>
                        <?php if ($aErrores['selectorCheckbox'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['selectorCheckbox']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Checkbox opcional: 
                        </br>
                        <input type="checkbox" id="C1" name="selectorCheckboxOpcional[opcion1]" value="Opcion 1" <?php if(isset($_POST['selectorCheckboxOpcional']['opcion1'])){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="C1">Opcion 1</label><br/>
                        <input type="checkbox" id="C2" name="selectorCheckboxOpcional[opcion2]" value="Opcion 2" <?php if(isset($_POST['selectorCheckboxOpcional']['opcion2'])){ echo 'checked';} ?>> <!--//Recuerda la selección-->
                            <label for="C2">Opcion 2</label><br/>
                        <?php if ($aErrores['selectorCheckboxOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['selectorCheckboxOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        Fecha: 
                        <input type="date" name="selectorFecha" value="<?php if($aErrores['selectorFecha'] == NULL && isset($_POST['selectorFecha'])){ echo $_POST['selectorFecha'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['selectorFecha'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['selectorFecha']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <div>
                        Fecha opcional: 
                        <input type="date" name="selectorFechaOpcional" value="<?php if($aErrores['selectorFechaOpcional'] == NULL && isset($_POST['selectorFechaOpcional'])){ echo $_POST['selectorFechaOpcional'];} ?>"><br> <!--//Si el valor es bueno, lo escribe en el campo-->
                        <?php if ($aErrores['selectorFechaOpcional'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['selectorFechaOpcional']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                
                    </div>
                    <br/>
                    <br/>
                    <div class="obligatorio">
                        <select name="lista">
                            <option value="opcion1" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "opcion1"){ echo "selected";}} ?>>Opcion 1</option>
                            <option value="opcion2" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "opcion2"){ echo "selected";}} ?>>Opcion 2</option>
                            <option value="opcion3" <?php if(isset($_POST['lista'])){if($aErrores['lista'] == NULL && $_POST['lista'] == "opcion3"){ echo "selected";}} ?>>Opcion 3</option>
                        </select>
                        <?php if ($aErrores['lista'] != NULL) { ?>
                        <div class="error">
                            <?php echo $aErrores['lista']; //Mensaje de error que tiene el array aErrores   ?>
                        </div>   
                    <?php } ?>                             
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <input type="submit" name="enviar" value="Enviar">
                    </div>
                </fieldset>
            </form>
    <?php } ?>   
        <br/>
        <br/>
        <footer>
            <p>
                <a href="../../../..">
                    © Luis Mateo Rivera Uriarte 2019-2020
                </a>
            </p>
        </footer>
    </body>
</html>