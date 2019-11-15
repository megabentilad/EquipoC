<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dns='198.168.1.200';
$username="admindb";
$password="paso";
$db='DAW211_DBdepartamentos';
$miDB=new mysqli($dns,$db,$password,$username);
unset($miDB);

