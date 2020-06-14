<div id="app">
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

      <div class="row">
        <div class="col-sm-3 mb-4" v-for="item in filterProducts">
          <div class="card z-depth-1-half " >
            <div class="view overlay">
              <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%28131%29.jpg" alt="Card image cap">
              <a><div class="mask rgba-white-slight"></div></a>
            </div>
            <div class="card-body">
              <h4 class="name">{{item.name}}</h4>
              <p class="name">{{ item.description }} </p>
              <a href="#!" class="black-text d-flex justify-content-end">
                <p>leer mas</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
