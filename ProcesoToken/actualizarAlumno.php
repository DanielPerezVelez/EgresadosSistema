<?php
require_once('conexion.php');
require_once('funciones.php');
require_once('cors.php');

$method = $_SERVER['REQUEST_METHOD'];

if($method == "PUT")
{
    $json = null;
    $data = json_decode(file_get_contents("php://input"), true);

        $id_alumno = $data['id_alumno'];
        $nombre = $data['nombre'];
        $carrera = $data['carrera'];
        $apellido_p = $data['apellido_p'];
        $apellido_m = $data['apellido_m'];

    $api = new Api();

    $json = $api->updateAlumno($id_alumno,$nombre,$carrera,$apellido_p,$apellido_m);

    echo json_encode ($json);
}