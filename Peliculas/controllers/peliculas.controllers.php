<?php
require_once('../models/peliculas.models.php');
require_once('../models/peliculas_actores.models.php');

error_reporting(0);
$peliculas = new Clase_Peliculas();
$peliculasActores = new Clase_PeliculasActores();

switch ($_GET['op']) {

    case 'todos':
        $datos = array();
        $datos = $peliculas->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $id = $_POST['id'];
        $datos = array();
        $datos = $peliculas->uno($id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $titulo = $_POST['titulo'];
        $director = $_POST['director'];
        $año = $_POST['año'];
        $genero = $_POST['genero'];
        $sinopsis = $_POST['sinopsis']; // Asegúrate de capturar correctamente la sinopsis
        $actor_ids = $_POST['actor_id']; // Array de IDs de actores
        $datos = array();
        $datos = $peliculas->insertar($titulo, $director, $año, $genero, $sinopsis);
        
        // Insertar actores asociados
        $pelicula_id = mysqli_insert_id($peliculas->conexion); 
        foreach($actor_ids as $actor_id) {
            $peliculasActores->asignarActor($pelicula_id, $actor_id);
        }

        echo json_encode($datos);
        break;

    case 'actualizar':
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $director = $_POST['director'];
        $año = $_POST['año'];
        $genero = $_POST['genero'];
        $sinopsis = $_POST['sinopsis']; // Asegúrate de capturar correctamente la sinopsis
        $actor_ids = $_POST['actor_id']; // Array de IDs de actores
        $datos = array();
        $datos = $peliculas->actualizar($id, $titulo, $director, $año, $genero, $sinopsis);
        
        // Eliminar todos los actores asociados previamente
        $peliculasActores->eliminarActoresPorPelicula($id);
        
        // Insertar los nuevos actores asociados
        foreach($actor_ids as $actor_id) {
            $peliculasActores->asignarActor($id, $actor_id);
        }

        echo json_encode($datos);
        break;

    case 'eliminar':
        $id = $_POST['id'];
        $datos = array();
        $datos = $peliculas->eliminar($id);
        echo json_encode($datos);
        break;

    case 'contar':
        $datos = array();
        $datos = $peliculas->contar();
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'detalles':
        $id = $_POST['id'];
        $datos = $peliculas->uno($id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    // Nuevas funcionalidades para la relación Peliculas-Actores

    case 'asignar_actor':
        $pelicula_id = $_POST['pelicula_id'];
        $actor_id = $_POST['actor_id'];
        $datos = $peliculasActores->asignarActor($pelicula_id, $actor_id);
        echo json_encode($datos);
        break;

    case 'quitar_actor':
        $pelicula_id = $_POST['pelicula_id'];
        $actor_id = $_POST['actor_id'];
        $datos = $peliculasActores->quitarActor($pelicula_id, $actor_id);
        echo json_encode($datos);
        break;

    case 'obtener_actores_por_pelicula':
        $pelicula_id = $_POST['pelicula_id'];
        $datos = array();
        $datos = $peliculasActores->obtenerActoresPorPelicula($pelicula_id);
        while ($row = mysqli_fetch_assoc($datos)) {
            $actores[] = $row;
        }
        echo json_encode($actores);
        break;
}
?>
