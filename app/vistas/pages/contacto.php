<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<main>
  <div id="app">

    <div class="container">

      <div class="row">
        <div class="col-sm-4 mt-5 mb-5 py-5">
          <div class="card shadow">
            <div class="card-body">

              <h3>Contactanos</h3>
              <br>


              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control"  v-model="Nombre_Contacto"  placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control"  v-model="Correo_Contacto"  placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-grip-horizontal"></i></span>
                </div>
                <input type="text" class="form-control"  v-model="Asunto_Contacto"  placeholder="Asunto" aria-label="Asunto" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-grip-horizontal"></i></span>
                </div>
                <textarea class="form-control"  v-model="Mensaje_Contacto"  placeholder="Mensaje" rows="6" cols="80"></textarea>
              </div>
              <button type="button"   @click="GrabarMensaje" class="btn btn-dark" >Enviar</button>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="mt-5 mb-5 py-5">
            <img src="<?php echo RUTA_URL ?>public/img/undraw_message_sent_1030.png" height="100%" class="img-fluid" alt="">
          </div>
        </div>
      </div>


    </div>

  </div>
</main>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
