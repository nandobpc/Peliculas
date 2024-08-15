let urlActores = "../controllers/actores.controllers.php?op=";

function initActores() {
  $("#actorForm").on("submit", function (e) {
    insertarActualizarActor(e);
  });
}

$().ready(() => {
  listarActores();
});

var listarActores = () => {
  var html = "";
  $.get(urlActores + "todos", (actores) => {
    actores = JSON.parse(actores);
    $.each(actores, (index, actor) => {
      html += `<tr>
        <td>${index + 1}</td>
        <td>${actor.nombre}</td>
        <td>${actor.apellido}</td>
        <td>${actor.fecha_nacimiento}</td>
        <td>${actor.nacionalidad}</td>
        <td>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actorModal" onclick="verActor(${actor.actor_id})">Editar</button>
            <button class="btn btn-danger" onclick="eliminarActor(${actor.actor_id})">Eliminar</button>
        </td>
    </tr>`;
    });
    $("#listaActores").html(html);
  });
};

var insertarActualizarActor = (e) => {
  e.preventDefault();
  var formData = new FormData($("#actorForm")[0]);
  var actor_id = $("#actor_id").val();
  var accion = "";

  if (actor_id == "" || actor_id == undefined) {
    accion = urlActores + "insertar";
  } else {
    accion = urlActores + "actualizar";
  }

  $.ajax({
    url: accion,
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: (datos) => {
      datos = JSON.parse(datos);
      if (datos) {
        $("#actorForm")[0].reset();
        listarActores();
        $("#actorModal").modal("hide");
        Swal.fire("Actores", "Se guardó con éxito", "success");
      } else {
        $("#actorForm")[0].reset();
        listarActores();
        $("#actorModal").modal("hide");
        Swal.fire("Actores", "Error al guardar", "error");
      }
    },
  });
};

var verActor = (actor_id) => {
  $.post(urlActores + "uno", { actor_id: actor_id }, (actor) => {
    actor = JSON.parse(actor);
    $("#actor_id").val(actor.actor_id);
    $("#nombre").val(actor.nombre);
    $("#apellido").val(actor.apellido);
    $("#fecha_nacimiento").val(actor.fecha_nacimiento);
    $("#nacionalidad").val(actor.nacionalidad);
  });
};

var eliminarActor = (actor_id) => {
  Swal.fire({
    title: "Actores",
    text: "Está seguro de eliminar al actor",
    icon: "error",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(urlActores + "eliminar", { actor_id: actor_id }, (datos) => {
        datos = JSON.parse(datos);
        if (datos) {
          listarActores();
          $("#actorModal").modal("hide");
          Swal.fire("Actores", "Se eliminó con éxito", "success");
        } else {
          $("#actorModal").modal("hide");
          Swal.fire("Actores", "Error al eliminar", "error");
        }
      });
    }
  });
};

initActores();
