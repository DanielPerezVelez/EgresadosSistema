<?php
class API{
    public function getCarreras(){
        $vector=array();
        $conexion = new Conexion();
        $bd = $conexion->getConexion();
        $sql = "SELECT * FROM carreras";
        $consulta=$bd->prepare($sql);
        $consulta->execute();
        while($fila = $consulta->fetch()){
            $vector[]=array(
                "id"=>$fila['id_carrera'],
                "clave_carrera"=>$fila['clave_carrera'],
                "carrera"=>$fila['carrera']);
        }
        return $vector;
    }

    public function getAlumn($nombre,$carrera,$apellido_p,$apellido_m)
    //Uso de variables declaradas en buscarAlumno.php para mostrar datos de la BD
     {
        $vector = array();
        $conexion = new Conexion();
        $bd = $conexion->getConexion();
        $sql = "SELECT * FROM alumno WHERE nombre='$nombre' and apellido_p='$apellido_p' and apellido_m='$apellido_m' and carrera ='$carrera'";
        
        $consulta = $bd->prepare($sql);
        $consulta->execute();

        while($fila = $consulta->fetch()){
            $vector[] = array(
                "id" => $fila['id_alumno'],
                "nombre" => $fila['nombre'],
                "apellido_p" => $fila['apellido_p'],
                "apellido_m" => $fila['apellido_m'],
                "carrera" => $fila['carrera'],
                "curp" => $fila['curp'],
                "rfc" => $fila['rfc'],
                "especialidad" => $fila['especialidad'],
                "generacion" => $fila['generacion'],
                "telefono" => $fila['telefono'],
                "correo" => $fila['correo']
            );
        } return $vector;

        if(count($vector)==0){

            $mensajeError[] = array(
              "mensaje"=> "error"
            );

            return json_encode($mensajeError);
        }
        
    }

    public function updateAlumno($id_alumno,$nombre, $carrera, $apellido_p, $apellido_m)
    {
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $sql = "UPDATE alumno SET nombre='$nombre', carrera='$carrera', apellido_p='$apellido_p', apellido_m='$apellido_m' WHERE id_alumno='$id_alumno'";
        $consulta = $db->prepare($sql);
        $consulta->execute();
      
        return '{"msg":"alumno actualizado"}';
      }
}