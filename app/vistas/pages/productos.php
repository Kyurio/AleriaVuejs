<?php require_once RUTA_APP . '/vistas/inc/header.php';?>
<div id="app-3">
  <div class="container">
    <div class="mt-5 mb-5 py-5">

      <!-- buscador -->
      <div class="col-sm-5">
        <div class="mt-1 d-flex justify-content-start">
          <div class="md-form input-with-pre-icon">
            <i class="fas fa-search input-prefix"></i>
            <input type="text"  placeholder="buscar..." v-model="buscadorProductos" class="form-control">
          </div>
        </div>
      </div>
      <!-- end buscador -->
      <!-- contenedor -->
      <div class="row ">
        <div class="col-sm-3 mb-4 list" v-for="item in filterProducts">
          <div class="card z-depth-1-half " >
            <div class="view overlay">
              <img class="name card-img-top" src="" alt="Card image cap">
              <a><div class="mask rgba-white-slight"></div></a>
            </div>
            <div class="card-body">
              <h4 class="">{{ item.name }}</h4>
              <p class="">{{ item.description }} </p>
              <a href="#!" class="black-text d-flex justify-content-end">
                leer mas
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- end container -->

    </div>
  </div>
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
<!-- produtcos -->
<script src="<?php echo RUTA_URL; ?>public/js/items.js"></script>
