<?php
require_once('../models/actores.models.php');

error_reporting(0);
$actores = new Clase_Actores();

switch ($_GET['op']) {

    case 'todos':
        $datos = array();
        $datos = $actores->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $actor_id = $_POST['actor_id'];
        $datos = array();
        $datos = $actores->uno($actor_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $nacionalidad = $_POST['nacionalidad'];
        $datos = array();
        $datos = $actores->insertar($nombre, $apellido, $fecha_nacimiento, $nacionalidad);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $actor_id = $_POST['actor_id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $nacionalidad = $_POST['nacionalidad'];
        $datos = array();
        $datos = $actores->actualizar($actor_id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $actor_id = $_POST['actor_id'];
        $datos = array();
        $datos = $actores->eliminar($actor_id);
        echo json_encode($datos);
        break;
}
?>
