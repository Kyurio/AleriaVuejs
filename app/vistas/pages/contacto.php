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
              <p v-if="errors.length">
                <b>Por favor corriga los siguientes erroes:</b>
                <ul>
                  <li v-for="error in errors" class="text-danger">{{ error }}</li>
                </ul>
              </p>

              <form id="app" @submit="checkForm" method="post" novalidate="true">
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input v-model="name_msg"  type="text" placeholder="Nombre" maxlength="60" name="name_msg" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="">asunto</label>
                  <input v-model="subjet_msg"  type="text" placeholder="Asunto" maxlength="60" name="subjet_msg" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="">Correo</label>
                  <input type="email" :state="false" name="email_msg" v-model="email_msg"  placeholder="Correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="">Mensaje</label>
                  <textarea  v-model="content_msg" class="form-control" placeholder="Mensaje" maxlength="1500" name="content_msg" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-dark" name="button">Enviar</button>
              </div>
              <div class="col-md-6">
              </form>

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
