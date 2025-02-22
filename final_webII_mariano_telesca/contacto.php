<?php
  session_start();

  // Si ya hay un logueo activo de admin, se lo redirige al panel administrador
  if (isset($_SESSION['sesion']) && $_SESSION['sesion'] == true && $_SESSION['tipo_admin'] == 1) {
    header("Location: administrador.php");
    exit();
  }

  // Acá se carga el head desde un archivo externo
  include_once('secciones/head.php');
  titulo_pag("Contacto");
  include_once('funciones/formulario_contacto.php');
?>

<body class="cuerpo">

  <?php
    // Acá se carga el header desde un archivo externo
    include_once('secciones/header.php');
  ?>

  <main class="container">
    <!-- FRANJA CON TITULO -->
    <div class="row franjacolor franjaalto1 textofranja titulo">
      <div class="col">
        <h1>Contactanos!</h1>
      </div>
    </div>

    <!-- FORMULARIO DE CONTACTO -->
    <div class="row">
      <!-- En el formulario enviamos la información completada por el usuario a traves del método POST para que al apretar el botón submit vaya al archivo form.php -->
      <form method="POST" class="form borde container" autocomplete="off" enctype="multipart/form-data" onsubmit="validarFormulario(event)">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <input type="text" name="nombre_consulta" class="form_input" id="nombre_consulta" placeholder="Nombre" required>  
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">   
                <input type="text" name="apellido_consulta" class="form_input" id="apellido_consulta" placeholder="Apellido" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="email" name="email_consulta" class="form_input" id="email_consulta" placeholder="Email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              <select name="tema_consulta" class="form_input" id="tema_consulta">
                <option class="form_opcion" value="generales">Consultas generales</option>
                <option class="form_opcion" value="suscripcion">Suscripción</option>
                <option class="form_opcion" value="excursiones">Excursiones</option>
                <option class="form_opcion" value="talleres">Talleres</option>
              </select>
            </div>
          </div>

        <div class="row">
            <div class="col-12">
              <textarea name="consulta" placeholder="Escriba su consulta aquí" id="consulta" required></textarea>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <p><input type="checkbox" name="confirmacion_consulta" id="confirmacion_consulta" class="form_input"> Acepta los términos y condiciones para enviar el formulario</p>
          </div>
        </div>

        <div class="row">
            <div class="col-6">
              <button type="submit" class="form_boton" id="enviar_form" data-bs-toggle="modal" data-bs-target="#exampleModal">Enviar</button>
            </div>
            <div class="col-6">
              <button type="reset" class="form_boton">Reset</button>
            </div>
        </div>
      </form>
    </div>
  </main>

  <?php
  // Acá se incluye el footer desde un archivo externo
  include_once('secciones/footer.php');
  ?>

  <?php require_once('secciones/bootstrapjs.php'); ?>

  <script>
    
          // En caso de que el campo este vacio (o completado solo con espacios en blanco), no se envía el formulario y envía un alerta al usuario para que complete el campo
    function validarCampo(campo, nombre_campo, event) {
      if (campo.trim() === "") {
        event.preventDefault();
        alert("Por favor, ingrese su " + nombre_campo);
        return false;
      }
    }

    // En esta función, antes de enviar el formulario, validamos los valores ingresados.
    function validarFormulario(event) {

      // Asignamos a consts los elementos del form
      const nombre = document.getElementById("nombre_consulta").value;
      const apellido = document.getElementById("apellido_consulta").value;
      const consulta = document.getElementById("consulta").value;
      const confirmacion = document.getElementById("confirmacion_consulta").checked;

      // En caso de que el nombre este vacio (o completado solo con espacios en blanco), no se envía el formulario y envía un alerta al usuario para que complete el campo
      validarCampo(nombre, "nombre", event);
      validarCampo(apellido, "apellido", event);
      validarCampo(consulta, "consulta", event);

      // En caso de que no se haya tildado de opción de aceptar los términos, no se envía el formulario y envía un alerta al usuario para que tilde el campo
      if (!confirmacion) {
        event.preventDefault();
        alert("Debe aceptar las condiciones.");
        return false;
      }

      return true;
    }
  </script>


</body>
</html>