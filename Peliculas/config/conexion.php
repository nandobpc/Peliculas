<?php
class Clase_Conectar
{
    public $conexion;
    protected $db;
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "123454321";
    private $base_datos = "peliculas";

    public function ProcedimientoConectar()
    {
        $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->base_datos);
        mysqli_set_charset($this->conexion, "utf8");
        if ($this->conexion == 0) {
            echo "Error al conectar con el servidor";
        }
        $this->db = mysqli_select_db($this->conexion, $this->base_datos);
        if ($this->db == 0) {
            echo "Error al conectar a la base de datos";
        }
        return $this->conexion;
    }
}
?>
