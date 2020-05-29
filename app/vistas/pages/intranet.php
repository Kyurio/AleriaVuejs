<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="app">
  <div class="container-fluid">
    <div class="row">

      <!-- sidebar -->
      <nav class="col-md-2 z-depth-5 d-none d-md-block bg-light sidebar">
        <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical">
          <li> <a class="nav-link" id="v-pills-ventas-tab" data-toggle="tab" href="#ventas" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-shopping-cart"></i> Ventas</a></li>
          <li> <a class="nav-link" id="v-pills-banners-tab" data-toggle="tab" href="#blog" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-feather-alt"></i> Blog</a></li>
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
                <div>
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
                    <tbody>
                      <tr v-for="item in products">
                        <td>{{ item.name }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>
                          <div v-if="item.is_active == 1">
                            <span class="badge badge-success">Activo</span>
                          </div>
                          <div v-else>
                            <span class="badge badge-danger">Inactivo</span>
                          </div>
                        </td>
                        <td>{{ item.inventary_min }}</td>
                        <td>
                          <button type="button" name="button" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                          <button type="button" name="button" class="btn btn-warning btn-sm" title="Editar"><i class="fas fa-pen"></i></button>
                        </td>
                      </tr>
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

                <div class="row">
                  <div class="col-xl-6">
                    <div class="card mb-2 mt-2">
                      <div class="card-header">
                        <h5>Estadisticas Clientes</h5>
                      </div>

                      <div class="card-body">


                      </div>

                    </div>
                  </div>
                </div>


                <!-- end grafico -->

              </div>
            </div>
          </div>

          <!-- blogs -->
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

                <!-- blog -->
                <div v-for="item in blogs">
                  <div class="card shadow mt-4 mb-4">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h3>de: {{item.Name}}</h3>
                        <div class="d-flex flex-row-reverse bd-highlight">
                          <button type="button" title="Eliminar" class="btn btn-sm btn-danger ml-1" ><i class="fas fa-trash"></i></button>
                          <button type="button" title="Spam" class="btn btn-sm btn-warning ml-1" ><i class="fas fa-envelope-open"></i></button>
                        </div>
                      </div>
                      <div class="mt-2">
                        <h5>Asunto: {{item.Subjet}}</h5>
                        <p>{{item.Content}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end blog -->

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
                  <div class="mt-2">
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
                <!-- end buscadores -->

                <!-- card usuarios -->
                <div class="container">
                  <div class="row">
                    <!-- for -->
                    <div v-for="item in users">
                      <div class="col-md-4 mb-1">
                        <div class="card card-cascade mb-4 " width="100">
                          <div class="view view-cascade overlay">
                            <div class="mask rgba-white-slight"></div>
                          </div>
                          <div class="card-body card-body-cascade text-center">
                            <h4 class="card-title"><strong>{{item.name}}</strong></h4>
                            <div v-if="item.is_active == 0">
                              <span class="badge badge-danger">Inactivo</span>
                            </div>
                            <div v-else>
                              <span class="badge badge-success">Activo</span>
                            </div>
                            <p class="card-text"><i class="far fa-envelope"></i> {{ item.email}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end for -->
                  </div>
                  <!-- card clientes -->
                </div>

              </div>
            </div>
          </div>

          <!-- clientes -->
          <div class="tab-pane fade shadow" id="clientes" role="tabpanel" aria-labelledby="clientes">
            <div class="card">
              <div class="card-body">
                <div class=" d-flex justify-content-between">
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
                      <button type="button" title="Estadisticas" class="btn btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="far fa-chart-bar"></i></button>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <!-- card clientes -->
                <div class="container">
                  <div class="d-flex justify-content-center py-5 mb-4 ">
                    <div class="row">
                      <div v-for="item in clients">
                        <div class="col-md-4">
                          <div class="card card-cascade mb-4 py-4" >
                            <div class="view view-cascade overlay">
                              <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-sm ">
                                  <i class="fas fa-trash"></i>
                                </button>
                                <button type="button" class="btn btn-sm ">
                                  <i class="fas fa-pen"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body card-body-cascade text-center">

                              <!-- Title -->
                              <h4 class="card-title"><strong>{{item.name}}</strong></h4>
                              <!-- Subtitle -->
                              <h6 class="font-weight-bold indigo-text py-2">{{item.company}}</h6>
                              <!-- Text -->
                              <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ item.address1 }}</p>
                              <p class="card-text"><i class="far fa-envelope"></i> {{ item.email1 }}</p>
                              <p class="card-text"><i class="fas fa-phone"></i> {{ item.phone1 }}</p>

                              <div class="d-flex justify-content-center">
                                <!-- Facebook -->
                                <button type="button" class="btn btn-sm btn-primary">
                                  <i class="fab fa-facebook-f"></i>
                                </button>
                                <!-- Twitter -->
                                <button type="button" class="btn btn-sm btn-info">
                                  <i class="fab fa-twitter"></i>
                                </button>
                                <!-- Google + -->
                                <button type="button" class="btn btn-sm btn-secondary">
                                  <i class="fab fa-instagram"></i>
                                </button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end card -->

                <!-- pagination -->
                <paginador-nav></paginador-nav>

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
