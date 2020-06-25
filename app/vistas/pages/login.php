<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="app-4">

  <div class="container">
    <div class="mt-5 mb-5 py-5">

      <div class="row">
        <div class="col-md-8">

        </div>

        <div class="col-md-4">

          <form class="text-center border border-light p-5" id="app-2" @submit="checkForm" method="post" novalidate="true">

            <p class="h4 mb-4">Sign in</p>
            <ul>
              <li v-for="error in errors" class="text-danger">{{ error }}</li>
            </ul>
            <input v-model="email" type="email"  class="form-control mb-4" placeholder="E-mail">
            <input v-model="password" type="password"  class="form-control mb-4" placeholder="Password">
            <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>
            <p>Siguenos en nuestras redes sociales:</p>
            <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
            <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>
          </form>

        </div>
      </div>
    </div>
  </div>

</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>

<script src="<?php echo RUTA_URL; ?>public/js/logs.js"></script>
