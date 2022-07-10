<?php
require_once ('conexion.php');
require_once('funciones.php');
require_once('cors.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET") {
    if(!empty($_GET['id_carrera'])){
       $id = $_GET['id_carrera'];
       $json = null;
       $api = new API();
       $vector = $api->getCarreras($id);
       $json = json_encode($vector);
       echo $json; 
    }else{
       $vector = array();
       $api = new API();
       $vector = $api->getCarreras();
       $json = json_encode($vector);
       echo $json;
    }  
}