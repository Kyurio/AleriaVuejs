<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="app">

  <div class="mt-5 mb-5 py-6">
    <div v-for="item in details">


      <div class="card">
        <div class="card-body">
          <h1>{{ item.name }}</h1>
          <h3>{{item.price_min}}</h3>
          <p>{{ item.description }}</p>
        </div>
      </div>


    </div>
  </div>

</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
