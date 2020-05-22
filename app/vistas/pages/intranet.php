<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="app">
  <div class="container-fluid">
    <div class="row">

      <!-- sidebar -->
      <nav class="col-md-2 shadow d-none d-md-block bg-light sidebar">
        <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical">
          <li> <a class="nav-link" id="v-pills-ventas-tab" data-toggle="tab" href="#ventas" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-shopping-cart"></i> Ventas</a></li>
          <li> <a class="nav-link" id="v-pills-banners-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-blog"></i> Blog</a></li>
          <li> <a class="nav-link" id="v-pills-mensajes-tab" data-toggle="tab" href="#mensajes" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-envelope"></i> Mensajes</a></li>
          <li> <a class="nav-link" id="v-pills-usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-user"></i> Usuarios</a></li>
          <li> <a class="nav-link" id="v-pills-tareas-tab" data-toggle="tab" href="#tareas" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-thumbtack"></i> Tareas</a></li>
          <li> <a class="nav-link" id="v-pills-estadisticas-tab" data-toggle="tab" href="#estadisticas" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-chart-line"></i> Estadisticas</a></li>
          <li> <a class="nav-link" id="v-pills-clientes-tab" data-toggle="tab" href="#clientes" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-handshake"></i></i> Clientes</a></li>
          <li> <a class="nav-link" id="v-pills-configuracion-tab" data-toggle="tab" href="#configuracion" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-cog"></i> Configuraciones</a></li>
        </ul>
      </nav>
      <!-- end sidebar -->


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-2">

        <div class="tab-content mt-2">
          <!-- ventas -->
          <div class="tab-pane fade shadow" id="ventas" role="tabpanel" aria-labelledby="producto">
            <div class="card mb-4">
              <div class="card-body">

                <div class="mt-1 mb-2 d-flex justify-content-start">
                  <h3>Ventas</h3>
                </div>

                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mt-1 mb-2 d-flex justify-content-start">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                      </div>
                      <input type="text" class="form-control search" placeholder="Username" aria-label="Username" aria-describedby="Username" >
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-1 mb-2 d-flex justify-content-end">
                      <button type="button" title="Stock" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarProducto"><i class="fas fa-boxes"></i></button>
                      <button type="button" title="Agregar" class="btn btn-dark" data-toggle="modal" data-target="#AgregarProducto"><i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->
                <div id="test-list">
                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Fecha publicacion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Estock</th>
                        <th scope="col">Accion</th>
                      </tr>
                    </thead>
                    <tbody class="list">

                    </tbody>
                  </table>



                </div>

              </div>
            </div>
          </div>

          <!-- tareas -->
          <div class="tab-pane fade shadow" id="tareas" role="tabpanel" aria-labelledby="tareas">
            <div class="card">
              <div class="card-body">
                <div class="mt-1 mb-4 d-flex justify-content-between">
                  <h3>tareas</h3>
                </div>
                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-start">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="Username">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <button type="button" title="Agregar" class="btn btn-dark" data-toggle="modal" data-target="#AgregarProducto"><i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <table class="table table-hover text-center">
                  <thead>
                    <tr>
                      <th>Tarea</th>
                      <th>Descripcion</th>
                      <th>Fecha termino</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href=""></a></td>
                      <td><a href=""></a></td>
                      <td></td>
                      <td>
                        <button type="button" title="Pausar"     class="btn btn-sm btn-warning"><i class="fas fa-pause-circle"></i></button>
                        <button type="button" title="continiar"  class="btn btn-sm btn-info"><i class="fas fa-play-circle"></i></button>
                        <button type="button" title="finalizar"  class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- estadisticas -->
          <div class="tab-pane fade shadow" id="estadisticas" role="tabpanel" aria-labelledby="estadisticas">
            <div class="card">
              <div class="card-body">
                <div class="mt-1 mb-4 d-flex justify-content-between">
                  <h3>Estadisticas</h3>
                  <button type="button" title="Agregar tareas" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#AgregarProducto"><i class="fas fa-plus"></i></button>
                </div>

                <!-- grafico -->


                <!-- end grafico -->

              </div>
            </div>
          </div>

          <!-- banners -->
          <div class="tab-pane fade shadow" id="blog" role="tabpanel" aria-labelledby="banners">

            <div class="card">
              <div class="card-body">
                <div class="mt-1 mb-4 d-flex justify-content-start">
                  <h3>Blog</h3>
                </div>

                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-start">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="Username">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <button type="button" title="Agregar" class="btn btn-dark" data-toggle="modal" data-target="#AgregarProducto"><i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <div class="table-responsive text-center">
                  <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha Publicacion</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr >
                        <td><a href=""></a></td>
                        <td><a href=""></a></td>
                        <td><a href=""></a></td>
                        <td>
                          <button type="button" title="Editar"    class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" title="Cancelar"  class="btn btn-sm btn-warning"><i class="fas fa-ban"></i></button>
                          <button type="button" title="Eliminar"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>

          <!-- mensajes -->
          <div class="tab-pane fade" id="mensajes" role="tabpanel" aria-labelledby="mensajes">
            <div class="card shadow">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h3>Mensajes</h3>
                </div>

                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-start">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="Username">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

              </div>
            </div>
            <div v-for="item in msg">
              <div class="card shadow mt-4 mb-4">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h3>de: {{item.Name}}</h3>
                    <div class="d-flex flex-row-reverse bd-highlight">
                      <button type="button" title="Eliminar" class="btn btn-sm btn-danger ml-1" ><i class="fas fa-trash"></i></button>
                      <button type="button" title="Spam" class="btn btn-sm btn-warning ml-1" ><i class="fas fa-envelope-open"></i></button>
                    </div>
                  </div>
                  <div class="mt-2" v-for="item in msg  ">
                    <h5>Asunto: {{item.Subjet}}</h5>
                    <p>{{item.Content}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- usuarios -->
          <div class="tab-pane fade shadow" id="usuarios" role="tabpanel" aria-labelledby="usuarios">
            <div class="card">
              <div class="card-body">
                <div class="mt-1 mb-4 d-flex justify-content-between">
                  <h3>Usuarios</h3>
                </div>

                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-start">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="Username">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <button type="button" title="Agregar usuario" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fas fa-plus"></i></button>
                      <button type="button" title="Agregar permiso" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fas fa-key"></i></button>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Permiso</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td><a href="">Mark</a></td>
                      <td><a href="">Otto</a></td>
                      <td><a href="">@mdo</a></td>
                    </tr>
                  </tbody>
                </table>
                <!-- paginador -->

                <!-- end paginador -->
              </div>
            </div>
          </div>

          <!-- clientes -->
          <div class="tab-pane fade shadow" id="clientes" role="tabpanel" aria-labelledby="clientes">
            <div class="card">
              <div class="card-body">
                <div class="mt-1 mb-4 d-flex justify-content-between">
                  <h3>Clientes</h3>
                </div>
                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-start">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="Username">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <button type="button" title="Agregar" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fas fa-plus"></i></button>
                      <button type="button" title="Enviar Correo" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fas fa-envelope"></i></button>
                      <button type="button" title="Llamar a skype" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fab fa-skype"></i></button>
                      <button type="button" title="Mensaje a whatsapp" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fab fa-whatsapp"></i></button>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->






              </div>
            </div>
          </div>

          <!-- Configuraciones -->
          <div class="tab-pane fade shadow" id="configuracion" role="tabpanel" aria-labelledby="configuracion">

            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h3>configuracion</h3>
                </div>
                <div class="mt-1 mb-4 d-flex justify-content-end">


                </div>
              </div>
            </div>



          </div>


        </div>

      </main>
    </div>
  </div>

</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
