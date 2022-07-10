<?php
require_once('conexion.php');
require_once('funciones.php');
require_once('cors.php');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") //Uso de método POST
{

                $json = null;
                $data = json_decode(file_get_contents("php://input"), true);
        
                //creación de variables para realizar búsqueda por parámetros
                $nombre = $data['nombre'];
                $carrera = $data['carrera'];
                $apellido_p = $data['apellido_p'];
                $apellido_m = $data['apellido_m'];
                //creación de variables para realizar búsqueda por parámetros
        
                $api = new API();
        
                //asignación de variables para enviarlas al API "funciones.php", usando la función getAlumno()
                $json = $api->getAlumn($nombre,$carrera,$apellido_p,$apellido_m);
                //asignación de variables a la función getAlumno()
        
                echo json_encode($json);
       
}
