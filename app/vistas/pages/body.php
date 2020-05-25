
<main>
  <div id="app">
    <!-- crousel -->
    <div class="contenedor">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://thefashionguilty.files.wordpress.com/2016/02/color_gris.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://magasintissus.com/24595-thickbox_default/punto-crepe-gris-medio.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://thefashionguilty.files.wordpress.com/2016/02/color_gris.jpg" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev"></a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next"></a>
      </div>
    </div>

    <div class="container mt-5 mb-1">
      <h3>Ultimos productos</h3>
      <hr>
    </div>
    <!-- end carousel -->
    <section class=" mb-5 py-4">
      <div class="container">
        <div class="row">

          <div v-for="item in products">
            <div  class="col-xl-4 mb-4">
              <a @click="Detalle(item.id)">
                <div class="card">
                  <img src="https://www.elangreen.com/blog/wp-content/uploads/2015/12/marmande.jpg"  class="img-fluid" alt="">
                  <div class="card-body">
                    <h4>{{ item.name }}</h4>
                    <p>{{ item.price_in }}</p>
                    <small>stock: {{item.inventary_min}}</small>
                  </div>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>

  </div>
</main>
