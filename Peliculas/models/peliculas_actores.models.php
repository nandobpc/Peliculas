<?php
require_once('../config/conexion.php');

class Clase_PeliculasActores
{
    public function asignarActor($pelicula_id, $actor_id)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "INSERT INTO peliculas_actores (pelicula_id, actor_id) VALUES ($pelicula_id, $actor_id)";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    public function quitarActor($pelicula_id, $actor_id)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "DELETE FROM peliculas_actores WHERE pelicula_id=$pelicula_id AND actor_id=$actor_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }

    public function obtenerActoresPorPelicula($pelicula_id)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "SELECT a.actor_id, a.nombre, a.apellido FROM actores a 
                INNER JOIN peliculas_actores pa ON a.actor_id = pa.actor_id
                WHERE pa.pelicula_id = $pelicula_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
    
    public function eliminarActoresPorPelicula($pelicula_id)
    {
        $con = new Clase_Conectar();
        $con = $con->ProcedimientoConectar();
        $sql = "DELETE FROM peliculas_actores WHERE pelicula_id=$pelicula_id";
        $datos = mysqli_query($con, $sql);
        $con->close();
        return $datos;
    }
}
?>
