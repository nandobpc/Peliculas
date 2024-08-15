<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Estilo para eliminar las flechas en el campo número */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Películas</h5>
                        <div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#peliculaModal">Crear</button>
                            <a href="actores.php" class="btn btn-secondary">Gestionar Actores</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Director</th>
                                    <th>Año de Estreno</th>
                                    <th>Género</th>
                                    <th>Sinopsis</th> <!-- Nueva columna para la sinopsis -->
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="listaPeliculas">
                                <!-- Lista de películas se llenará aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para crear/editar películas -->
    <div class="modal fade" id="peliculaModal" tabindex="-1" aria-labelledby="peliculaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="peliculaModalLabel">Agregar/Editar Película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="peliculaForm" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="director" class="form-label">Director</label>
                            <input type="text" class="form-control" id="director" name="director" required>
                        </div>
                        <div class="mb-3">
                            <label for="anio_estreno" class="form-label">Año de Estreno</label>
                            <input type="number" class="form-control" id="anio_estreno" name="anio_estreno" required>
                        </div>
                        <div class="mb-3">
                            <label for="genero" class="form-label">Género</label>
                            <input type="text" class="form-control" id="genero" name="genero" required>
                        </div>
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label">Sinopsis</label>
                            <textarea class="form-control" id="sinopsis" name="sinopsis" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="actor_id" class="form-label">Asignar Actores</label>
                            <select class="form-control" id="actor_id" name="actor_id[]" multiple required>
                                <!-- Opciones de actores se llenarán dinámicamente -->
                            </select>
                        </div>
                        <h5>Actores Asignados:</h5>
                        <table class="table">
                            <tbody id="listaActores">
                                <!-- Actores asignados aparecerán aquí -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar detalles de la película -->
    <div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detallesModalLabel">Detalles de la Película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="labelDetalles"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./peliculas.js"></script>
</body>

</html>
