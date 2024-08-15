<?php
require_once('../config/conexion.php');

class Clase_Peliculas
{
    private $con;

    public function __construct()
    {
        $this->con = (new Clase_Conectar())->ProcedimientoConectar();
    }

    public function todos()
    {
        $sql = "SELECT * FROM peliculas";
        $datos = mysqli_query($this->con, $sql);
        return $datos;
    }

    public function uno($id)
    {
        $sql = "SELECT * FROM peliculas WHERE id=$id";
        $datos = mysqli_query($this->con, $sql);
        return $datos;
    }

    public function insertar($titulo, $director, $año, $genero, $sinopsis)
    {
        $sql = "INSERT INTO peliculas (titulo, director, año, genero, sinopsis) VALUES ('$titulo', '$director', $año, '$genero', '$sinopsis')";
        $resultado = mysqli_query($this->con, $sql);
        return $resultado;
    }

    public function actualizar($id, $titulo, $director, $año, $genero, $sinopsis)
    {
        $sql = "UPDATE peliculas SET titulo='$titulo', director='$director', año=$año, genero='$genero', sinopsis='$sinopsis' WHERE id=$id";
        $resultado = mysqli_query($this->con, $sql);
        return $resultado;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM peliculas WHERE id=$id";
        $resultado = mysqli_query($this->con, $sql);
        return $resultado;
    }

    public function contar()
    {
        $sql = "SELECT COUNT(*) AS total FROM peliculas";
        $datos = mysqli_query($this->con, $sql);
        $resultado = mysqli_fetch_assoc($datos);
        return $resultado['total'];
    }

    public function __destruct()
    {
        mysqli_close($this->con);
    }
}
?>
