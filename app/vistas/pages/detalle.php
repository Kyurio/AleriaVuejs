<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="app">


  <div v-for="item in products">
    <div class="mt-5 mb-5 py-6">

      <div class="card">
        <div class="card-body">
          <h1>{{item.name<}}</h1>
        </div>
      </div>
      
    </div>
  </div>

</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
