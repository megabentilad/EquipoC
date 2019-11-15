<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Daniel Alcalá Fernández</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            .texto{
                color: red;
            }
        </style>
    </head>
    <body>
        <?php /*
         *
         * @author Daniel Alcalá Fernández
         * @since 17/10/2019
         * Plantilla Formulario
         */
        require '../../core/validacionFormularios.php';
        require './fichero.php';
        define('NOOBLIGATORIO', 0);
        define('OBLIGATORIO', 1);
        $entradaOK=true;
        //array de recojida de errores
        $errores=['alfab'=>null,
            'alfan'=>null,
            'texto'=>null,
            'contraseña'=>null,
            'dni'=>NULL,
            'correo'=>NULL,
            'url'=>NULL,
            'numeroE'=>NULL,
            'numeroD'=>NULL,
            'fecha1'=>NULL,
            'telef'=>NULL,
            'lista'=>NULL,
            'botonR'=>NULL,
            'botonC'=>NULL,
            'archivo'=>NULL,
            //Opcionales
            'alfab2'=>null,
            'alfan2'=>null,
            'texto2'=>null,
            'contraseña2'=>null,
            'dni2'=>NULL,
            'correo2'=>NULL,
            'url2'=>NULL,
            'numeroE2'=>NULL,
            'numeroD2'=>NULL,
            'fecha12'=>NULL,
            'telef2'=>NULL,
            'lista2'=>NULL,
            'botonR2'=>NULL,
            'botonC2'=>NULL,
            'archivo2'=>NULL];
        //array para recojer los datos
        $datos=['botonR2'=>null];
        if(isset($_REQUEST['submit'])){//Comprueba si hemos seleccionado enviarç
        //validaciones de campos
        $errores['alfab']= validacionFormularios::comprobarAlfabetico($_REQUEST['alfab'],50, 0, OBLIGATORIO);
        $errores['alfan']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfan'],50,0,OBLIGATORIO);
        $errores['texto']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['texto'],50,0,OBLIGATORIO);
        $errores['contraseña']= validacionFormularios::validarPassword($_REQUEST['contraseña'], OBLIGATORIO, 8);
        $errores['dni']= validacionFormularios::validarDni($_REQUEST['dni'], OBLIGATORIO);
        $errores['correo']= validacionFormularios::validarEmail($_REQUEST['correo'], 50, 0, OBLIGATORIO);
        $errores['url']= validacionFormularios::validarURL($_REQUEST['url'], OBLIGATORIO);
        $errores['numeroE']= validacionFormularios::comprobarEntero($_REQUEST['numeroE'], 100, 0, OBLIGATORIO);
        $errores['numeroD']= validacionFormularios::comprobarFloat($_REQUEST['numeroD'], 1000, 0, OBLIGATORIO);
        $errores['fecha1']= validacionFormularios::validarFecha($_REQUEST['fecha1'], OBLIGATORIO);
        $errores['telef']= validacionFormularios::validaTelefono($_REQUEST['telef'], OBLIGATORIO);
        $errores['lista']= validacionFormularios::validarElementoEnLista($_REQUEST['lista'], Array('opcion1','opcion2'), OBLIGATORIO);
        if(isset($_REQUEST['botonR'])){
        $errores['botonR']= validacionFormularios::validarRadioB($_REQUEST['botonR'], OBLIGATORIO);
        }else{
            $errores['botonR']="Ningun campo seleccionado";
        }
        if(isset($_REQUEST['botonC'])){
        $errores['botonC']= validacionFormularios::validarCheckBox($_REQUEST['botonC'], OBLIGATORIO);
        }else{
        $errores['botonC']= "No seleccionado";    
        }
        $errores['archivo']= validacionFormularios::comprobarNoVacio($_REQUEST['archivo']);
        $errores['archivo']= comprobarFichero($_REQUEST['archivo'], "pdf", "1024");
        //OPCIONALES
                $errores['alfab2']= validacionFormularios::comprobarAlfabetico($_REQUEST['alfab2'],50, 0, NOOBLIGATORIO);
        $errores['alfan2']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfan2'],50,0,NOOBLIGATORIO);
        $errores['texto2']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['texto2'],50,0,NOOBLIGATORIO);
        $errores['contraseña2']= validacionFormularios::validarPassword($_REQUEST['contraseña2'], NOOBLIGATORIO, 8);
        $errores['dni2']= validacionFormularios::validarDni($_REQUEST['dni2'], NOOBLIGATORIO);
        $errores['correo2']= validacionFormularios::validarEmail($_REQUEST['correo2'], 50, 0, NOOBLIGATORIO);
        $errores['url2']= validacionFormularios::validarURL($_REQUEST['url2'], NOOBLIGATORIO);
        $errores['numeroE2']= validacionFormularios::comprobarEntero($_REQUEST['numeroE2'], 100, 0, NOOBLIGATORIO);
        $errores['numeroD2']= validacionFormularios::comprobarFloat($_REQUEST['numeroD2'], 1000, 0, NOOBLIGATORIO);
        $errores['fecha12']= validacionFormularios::validarFecha($_REQUEST['fecha12'], NOOBLIGATORIO);
        $errores['telef2']= validacionFormularios::validaTelefono($_REQUEST['telef2'], NOOBLIGATORIO);
        $errores['lista2']= validacionFormularios::validarElementoEnLista($_REQUEST['lista2'], Array('opcion1','opcion2'), NOOBLIGATORIO);
        if(isset($_REQUEST['botonR2'])){
        $errores['botonR2']= validacionFormularios::validarRadioB($_REQUEST['botonR2'], NOOBLIGATORIO);
        }
        if(isset($_REQUEST['botonC2'])){
        $errores['botonC2']= validacionFormularios::validarCheckBox($_REQUEST['botonC2'], NOOBLIGATORIO);
        }
        //Comprobamos que no existe ningun error de lo contrario entrada combia de valor
        foreach ($errores as $key => $value) {
            if($errores[$key]!==null){
                $entradaOK=false;
            }
        }
        }else{
            $entradaOK=false;
        }
        if($entradaOK){
            //Recojemos los datos correctos en el array
            foreach($_REQUEST  as  $key  => $value){
                $datos[$key]=$value;
            };
            //Salida de datos por pantalla
            echo "Texto introducido (alfabético) ".$datos['alfab']."<br>";
            echo "Texto introducido (alfabético) Opcional ".$datos['alfab2']."<br>";
            echo "Texto introducido (alfanumérico) ".$datos['alfan']."<br>";
            echo "Texto introducido (alfanumérico) Opcional".$datos['alfan2']."<br>";
            echo "Texto introducido (Texto libre )".$datos['texto']."<br>";
            echo "Texto introducido (Texto libre ) Opcional".$datos['texto2']."<br>";
            echo "Contraseña intraducida (Contraseña) ".$datos['contraseña']."<br>";
            echo "Contraseña intraducida (Contraseña) Opcional".$datos['contraseña2']."<br>";
            echo "Dni introducido (DNI) ".$datos['dni']."<br>";
            echo "Dni introducido (DNI) Opcional".$datos['dni2']."<br>";
            echo "Email introducido (Email) ".$datos['correo']."<br>";
            echo "Email introducido (Email) Opcional".$datos['correo2']."<br>";
            echo "URL introducida (URL) ".$datos['url']."<br>";
            echo "URL introducida (URL) Opcional".$datos['url2']."<br>";
            echo "Entero introducido (ENTERO) ".$datos['numeroE']."<br>";
            echo "Entero introducido (ENTERO) Opcinal".$datos['numeroE2']."<br>";
            echo "Decimal introducido (DECIMAL) ".$datos['numeroD']."<br>";
            echo "Decimal introducido (DECIMAL) Opcional".$datos['numeroD2']."<br>";
            echo "Fecha introducida (FECHA) ".$datos['fecha1']."<br>";
            echo "Fecha introducida (FECHA) Opcional".$datos['fecha12']."<br>";
            echo "Telefono Introducido (TELEFONO) ".$datos['telef']."<br>";
            echo "Telefono Introducido (TELEFONO) Opcional".$datos['telef2']."<br>";
            echo "Lista valor introducido (LISTA) ".$datos['lista']."<br>";
            echo "Lista valor introducido (LISTA) Opcional".$datos['lista2']."<br>";
            echo "Lista de botones (RADIOB) ".$datos['botonR']."<br>";
            echo "Lista de botones (RADIOB) Opcional".$datos['botonR2']."<br>";
            echo "Lista de checkbox (CHECKBOX) ".$datos['botonC']."<br>";
            if(isset($datos['botonC2'])){
                echo "Lista de checkbox (CHECKBOX) Opcional ".$datos['botonC2']."<br>";
            }else{
                echo "Lista de checkbox (CHECKBOX) Opcional "."<br>";
            }
            echo "Nombre del archivo (ARCHIVO) ".$datos['archivo']."<br>";
            echo "Nombre del archivo (ARCHIVO) Opcional".$datos['archivo2']."<br>";
        }else{
        ?>
        
        <h2>Formulario</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']//Redirecciona hacia este mismo fichero ?>" method="post">
            Campo Alfabético<br>
            <input type="text" name="alfab" value=<?php if($errores['alfab']==null && isset($_REQUEST['alfab'])) { echo $_REQUEST['alfab'];}//Muestra el valor del campo si no es erroneo y existe?> >
            <br>
            <p class="texto">
             <?php 
        if($errores['alfab']!==null){//Muestra el error si existe
            echo $errores['alfab']."<br>";
        }
        
        ?>
            </p>
            Campo Alfabético Opcional<br>
            <input type="text" name="alfab2" value=<?php if($errores['alfab2']==null && isset($_REQUEST['alfab2'])) { echo $_REQUEST['alfab2'];}//Muestra el valor del campo si no es erroneo y existe?> >
            <br>
            <p class="texto">
             <?php 
        if($errores['alfab2']!==null){//Muestra el error si existe
            echo $errores['alfab2']."<br>";
        }
        
        ?>
                </p>
        Campo Alfanumérico<br>
        <input type="text" name="alfan" value=<?php if($errores['alfan']==null && isset($_REQUEST['alfan'])) { echo $_REQUEST['alfan'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['alfan']!==null){//Muestra el error si existe
            echo $errores['alfan']."<br>";
        }
        
        ?>
            </p>
        Campo Alfanumérico Opcional<br>
        <input type="text" name="alfan2" value=<?php if($errores['alfan2']==null && isset($_REQUEST['alfan2'])) { echo $_REQUEST['alfan2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['alfan2']!==null){//Muestra el error si existe
            echo $errores['alfan2']."<br>";
        }
        
        ?>
            </p>
        Campo Texto libre<br>
        <textarea name="texto" rows="4" cols="50" ><?php if($errores['texto']==null && isset($_REQUEST['texto'])) { echo $_REQUEST['texto'];}//Muestra el valor del campo si no es erroneo y existe?> </textarea>
        <br>
        <p class="texto">
        <?php 
        if($errores['texto']!==null){//Muestra el error si existe
            echo $errores['texto']."<br>";
        }
        
        ?>
            </p>
        Campo Texto libre Opcional<br>
        <textarea name="texto2" rows="4" cols="50" ><?php if($errores['texto2']==null && isset($_REQUEST['texto2'])) { echo $_REQUEST['texto2'];}//Muestra el valor del campo si no es erroneo y existe?> </textarea>
        <br>
        <p class="texto">
        <?php 
        if($errores['texto2']!==null){//Muestra el error si existe
            echo $errores['texto2']."<br>";
        }
        
        ?>
            </p>
        Contraseña<br>
        <input type="password" name="contraseña" value=<?php if($errores['contraseña']==null && isset($_REQUEST['texto'])) { echo $_REQUEST['contraseña'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['contraseña']!==null){//Muestra el error si existe
            echo $errores['contraseña']."<br>";
        }
        
        ?>
            </p>
        Contraseña Opcional<br>
        <input type="password" name="contraseña2" value=<?php if($errores['contraseña2']==null && isset($_REQUEST['texto2'])) { echo $_REQUEST['contraseña2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['contraseña2']!==null){//Muestra el error si existe
            echo $errores['contraseña2']."<br>";
        }
        
        ?>
            </p>
        Campo DNI<br>
            <input type="text" name="dni" value=<?php if($errores['dni']==null && isset($_REQUEST['dni'])) { echo $_REQUEST['dni'];}//Muestra el valor del campo si no es erroneo y existe?> >
            <br>
            <p class="texto">
             <?php 
        if($errores['dni']!==null){//Muestra el error si existe
            echo $errores['dni']."<br>";
        }
        
        ?>
                </p>
        Campo DNI Opcional<br>
            <input type="text" name="dni2" value=<?php if($errores['dni2']==null && isset($_REQUEST['dni2'])) { echo $_REQUEST['dni2'];}//Muestra el valor del campo si no es erroneo y existe?> >
            <br>
            <p class="texto">
             <?php 
        if($errores['dni2']!==null){//Muestra el error si existe
            echo $errores['dni2']."<br>";
        }
        
        ?>
                </p>
        Campo Email<br>
        <input type="email" name="correo" placeholder="example@gmail.com" value=<?php if($errores['correo']==null && isset($_REQUEST['correo'])) { echo $_REQUEST['correo'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['correo']!==null){//Muestra el error si existe
            echo $errores['correo']."<br>";
        }
        
        ?>
            </p>
        Campo Email Opcional<br>
        <input type="email" name="correo2" placeholder="example@gmail.com" value=<?php if($errores['correo2']==null && isset($_REQUEST['correo2'])) { echo $_REQUEST['correo2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['correo2']!==null){//Muestra el error si existe
            echo $errores['correo2']."<br>";
        }
        
        ?>
            </p>
        Campo URL<br>
        <input type="url" name="url" placeholder="http://" value=<?php if($errores['url']==null && isset($_REQUEST['url'])) { echo $_REQUEST['url'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['url']!==null){//Muestra el error si existe
            echo $errores['url']."<br>";
        }
        
        ?>
            </p>
        Campo URL Opcional<br>
        <input type="url" name="url2" placeholder="http://" value=<?php if($errores['url2']==null && isset($_REQUEST['url2'])) { echo $_REQUEST['url2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['url2']!==null){//Muestra el error si existe
            echo $errores['url2']."<br>";
        }
        
        ?>
            </p>
        Campo Numero entero<br>
        <input type="number" name="numeroE" value=<?php if($errores['numeroE']==null && isset($_REQUEST['numeroE'])) { echo $_REQUEST['numeroE'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['numeroE']!==null){//Muestra el error si existe
            echo $errores['numeroE']."<br>";
        }
        
        ?>
            </p>
        Campo Numero entero Opcional<br>
        <input type="number" name="numeroE2" value=<?php if($errores['numeroE2']==null && isset($_REQUEST['numeroE2'])) { echo $_REQUEST['numeroE2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if($errores['numeroE2']!==null){//Muestra el error si existe
            echo $errores['numeroE2']."<br>";
        }
        
        ?>
            </p>
        Campo Numero Decimal<br>
        <input type="number" step="any" name="numeroD" value=<?php if(isset($_REQUEST['numeroD']) && $errores['numeroD']==null) { echo $_REQUEST['numeroD'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['numeroD'])  && $errores['numeroD']!==null){//Muestra el error si existe
            echo $errores['numeroD']."<br>";
        }
        
        ?>
            </p>
        Campo Numero Decimal Opcional<br>
        <input type="number" step="any" name="numeroD2" value=<?php if(isset($_REQUEST['numeroD2']) && $errores['numeroD2']==null) { echo $_REQUEST['numeroD2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['numeroD2'])  && $errores['numeroD2']!==null){//Muestra el error si existe
            echo $errores['numeroD2']."<br>";
        }
        
        ?>
            </p>
        Campo Fecha<br>
        <input type="date" name="fecha1" value=<?php if(isset($_REQUEST['fecha1']) && $errores['fecha1']==null) { echo $_REQUEST['fecha1'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['fecha1'])  && $errores['fecha1']!==null){//Muestra el error si existe
            echo $errores['fecha1']."<br>";
        }
        
        ?>
            </p>
        Campo Fecha Opcional<br>
        <input type="date" name="fecha12" value=<?php if(isset($_REQUEST['fecha12']) && $errores['fecha12']==null) { echo $_REQUEST['fecha12'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['fecha12'])  && $errores['fecha12']!==null){//Muestra el error si existe
            echo $errores['fecha12']."<br>";
        }
        
        ?>
            </p>
        Campo Telefono<br>
        <input type="tel" name="telef" value=<?php if(isset($_REQUEST['telef']) && $errores['telef']==null) { echo $_REQUEST['telef'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['telef'])  && $errores['telef']!==null){//Muestra el error si existe
            echo $errores['telef']."<br>";
        }
        
        ?>
            </p>
        Campo Telefono Opcional<br>
        <input type="tel" name="telef2" value=<?php if(isset($_REQUEST['telef2']) && $errores['telef2']==null) { echo $_REQUEST['telef2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['telef2'])  && $errores['telef2']!==null){//Muestra el error si existe
            echo $errores['telef2']."<br>";
        }
        
        ?>
            </p>
        Campo Lista<br>
        <input list="lista" name="lista" value=<?php if(isset($_REQUEST['lista']) && $errores['lista']==null) { echo $_REQUEST['lista'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <datalist id="lista">
            <option value="opcion1">
            <option value="opcion2">
        </datalist>
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['lista'])  && $errores['lista']!==null){//Muestra el error si existe
            echo $errores['lista']."<br>";
        }
        
        ?>
            </p>
        Campo Lista Opcional<br>
        <input list="lista" name="lista2" value=<?php if(isset($_REQUEST['lista2']) && $errores['lista2']==null) { echo $_REQUEST['lista2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <datalist id="lista">
            <option value="opcion1">
            <option value="opcion2">
        </datalist>
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['lista2'])  && $errores['lista2']!==null){//Muestra el error si existe
            echo $errores['lista2']."<br>";
        }
        
        ?>
            </p>
        
        Campo botones de selección<br>
        <input type="radio" name="botonR" value="opcion1" <?php if(isset($_REQUEST['botonR']) && $_REQUEST['botonR']=="opcion1"){echo "checked";}; ?>>
        Opcion1<br>
        <input type="radio" name="botonR" value="opcion2" <?php if(isset($_REQUEST['botonR']) && $_REQUEST['botonR']=="opcion2"){echo "checked";}; ?>>
        Opcion2<br>
        <p class="texto">
        <?php 
        if(isset($errores['botonR'])  && $errores['botonR']!==null){//Muestra el error si existe
            echo $errores['botonR']."<br>";
        }     
        ?>
            </p>
        Campo botones de selección Opcional<br>
        <input type="radio" name="botonR2" value="opcion1" <?php if(isset($_REQUEST['botonR2']) && $_REQUEST['botonR2']=="opcion1"){echo "checked";}; ?>>
        Opcion1<br>
        <input type="radio" name="botonR2" value="opcion2" <?php if(isset($_REQUEST['botonR2']) && $_REQUEST['botonR2']=="opcion1"){echo "checked";}; ?>>
        Opcion2<br>
        <p class="texto">
        <?php 
        if(isset($errores['botonR2'])  && $errores['botonR2']!==null){//Muestra el error si existe
            echo $errores['botonR2']."<br>";
        }     
        ?>
            </p>
        Campo checkbox<br>
        <input type="checkbox" name="botonC" value="opcion1" <?php if(isset($_REQUEST['botonC']) && $errores['botonC']==null && $_REQUEST['botonC']=="opcion1") { echo "checked";};?>>
        Opcion1<br>
        <p class="texto">
        <?php 
        if(isset($errores['botonC'])  && $errores['botonC']!==null){//Muestra el error si existe
            echo $errores['botonC']."<br>";
        }
        
        ?>
            </p>
        Campo checkbox Opcional<br>
        <input type="checkbox" name="botonC2" value="opcion1" <?php if(isset($_REQUEST['botonC2']) && $errores['botonC2']==null && $_REQUEST['botonC2']=="opcion1") { echo "checked";}?>>
        Opcion1<br>
        <p class="texto">
        <?php 
        if(isset($errores['botonC2'])  && $errores['botonC2']!==null){//Muestra el error si existe
            echo $errores['botonC2']."<br>";
        }
        
        ?>
            </p>
        Campo Fichero<br>
        <input type="file" name="archivo" accept=".pdf" value=<?php if(isset($_REQUEST['archivo']) && $errores['archivo']==null) { echo $_REQUEST['archivo'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['archivo'])  && $errores['archivo']!==null){//Muestra el error si existe
            echo $errores['archivo']."<br>";
        }
        
        ?>
            </p>
        Campo Fichero Opcional<br>
        <input type="file" name="archivo2" accept=".pdf" value=<?php if(isset($_REQUEST['archivo2']) && $errores['archivo2']==null) { echo $_REQUEST['archivo2'];}//Muestra el valor del campo si no es erroneo y existe?> >
        <br>
        <p class="texto">
        <?php 
        if(isset($errores['archivo2'])  && $errores['archivo2']!==null){//Muestra el error si existe
            echo $errores['archivo2']."<br>";
        }
        
        ?>
            </p>
            
            <br>
            <input type="submit" value="enviar" name="submit">
        </form>
        <?php }?>
    </body>
</html>
