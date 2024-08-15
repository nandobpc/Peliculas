<?php
require_once('../config/conexion.php');

class Clase_Actores
{
    public function todos()
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "SELECT * FROM actores";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    public function uno($actor_id)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "SELECT * FROM actores WHERE actor_id=$actor_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $fecha_nacimiento, $nacionalidad)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "INSERT INTO actores (nombre, apellido, fecha_nacimiento, nacionalidad) VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$nacionalidad')";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    public function actualizar($actor_id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "UPDATE actores SET nombre='$nombre', apellido='$apellido', fecha_nacimiento='$fecha_nacimiento', nacionalidad='$nacionalidad' WHERE actor_id=$actor_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    public function eliminar($actor_id)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "DELETE FROM actores WHERE actor_id=$actor_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
}
?>
