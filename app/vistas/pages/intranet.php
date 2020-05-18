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
                      <input type="text" class="form-control search" placeholder="Username" aria-label="Username" aria-describedby="Username" v-model="name">
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
                      <tr v-for="item in ProductosRecuperados">
                        <td>{{ item.name }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>
                          <span v-if="item.is_active == 1" class="badge badge-success">Activo</span>
                          <span v-else="item.is_active == 0" class="badge badge-danger">Inactivo</span>
                        </td>
                        <td>{{ item.inventary_min }}</td>
                        <td>
                          <button type="button" title="Editar"   @click="" class="btn btn-sm btn-info"><i    class="fas fa-pen"></i></i></button>
                          <button type="button" title="Cancelar" @click=""   class="btn btn-sm btn-warning"><i class="fas fa-ban"></i></button>
                          <button type="button" title="Eliminar" @click=""   class="btn btn-sm btn-danger"><i  class="fas fa-trash"></i></button>
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
                        <button type="button" title="Pausar"    @click="" class="btn btn-sm btn-warning"><i class="fas fa-pause-circle"></i></button>
                        <button type="button" title="continiar" @click=""   class="btn btn-sm btn-info"><i class="fas fa-play-circle"></i></button>
                        <button type="button" title="finalizar" @click=""   class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
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
                          <button type="button" title="Editar"   @click=""  class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></button>
                          <button type="button" title="Cancelar" @click="" class="btn btn-sm btn-warning"><i class="fas fa-ban"></i></button>
                          <button type="button" title="Eliminar" @click=""   class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>

          <!-- mensajes -->
          <div class="tab-pane fade shadow" id="mensajes" role="tabpanel" aria-labelledby="mensajes">
            <div class="card">
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
            <div class="card mt-4">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <h3>titulo</h3>
                  <div class="d-flex flex-row-reverse bd-highlight">
                    <button type="button" title="Eliminar" class="btn btn-sm btn-danger ml-1" ><i class="fas fa-trash"></i></button>
                    <button type="button" title="Spam" class="btn btn-sm btn-warning ml-1" ><i class="fas fa-envelope-open"></i></button>
                  </div>
                </div>
                <div class="mt-2">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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

                <div id="listId">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Tipo</th>
                      </tr>
                    </thead>
                    <tbody id="list">
                      <tr v-for="item in Clients">
                        <td class="name">{{ item.name }}</td>
                        <td class="name">{{ item.address1 }}</td>
                        <td class="name">{{ item.phone1 }}</td>
                        <td class="name">{{ item.kind }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <ul class="pagination"></ul>
                </div>


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
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <l1 class="nav-item" ><a type="button" id="home-tab" data-toggle="tab" href="#banners"   title="Banners"              class="btn btn-dark ml-1"> <i class="far fa-images"></i></a></li>
                      <l1 class="nav-item" ><a type="button" id="home-tab" data-toggle="tab" href="#Social"    title="Redes Sociales"       class="btn btn-dark ml-1"> <i class="fas fa-hashtag"></i></a></li>
                        <l1 class="nav-item" ><a type="button" id="home-tab" data-toggle="tab" href="#Preguntas" title="Preguntas Frecuentes" class="btn btn-dark ml-1"> <i class="fas fa-question-circle"></i></button></li>
                          <l1 class="nav-item" ><a type="button" id="home-tab" data-toggle="tab" href="#Mapas"     title="Mapas"                class="btn btn-dark ml-1"> <i class="fas fa-map-marked-alt"></i></a></li>
                            <l1 class="nav-item" ><a type="button" id="home-tab" data-toggle="tab" href="#Contacto"  title="Contacto"             class="btn btn-dark ml-1"> <i class="fas fa-envelope-open"></i></a></li>
                              <l1 class="nav-item" ><a type="button" id="home-tab" data-toggle="tab" href="#Estilos"   title="Estilo"               class="btn btn-dark ml-1"> <i class="fas fa-wrench"></i></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="card mt-4">
                          <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade" id="banners"   role="tabpanel" aria-labelledby="banners-tab">
                                <h3>Banner principal</h3>

                              </div>
                              <div class="tab-pane fade" id="Social"    role="tabpanel" aria-labelledby="social-tab">
                                <h3>Redes Sociales</h3>

                              </div>
                              <div class="tab-pane fade" id="Preguntas" role="tabpanel" aria-labelledby="preguntas-tab">
                                <h3>Preguntas Frecuentes</h3>


                              </div>
                              <div class="tab-pane fade" id="Mapas"     role="tabpanel" aria-labelledby="mapas-tab">
                                <h3>Mapas</h3>

                              </div>
                              <div class="tab-pane fade" id="Contacto"  role="tabpanel" aria-labelledby="contactos-tab">
                                <h3>Informacion de contacto</h3>


                              </div>
                              <div class="tab-pane fade" id="Estilos"   role="tabpanel" aria-labelledby="estilos-tab">
                                <h3>Estilos y diseños</h3>
                                <small>Configura las fuentes. colores, tamaños y diseños</small>


                              </div>
                            </div>
                          </div>
                        </div>

                      </div>


                    </div>

                  </main>
                </div>
              </div>

              <!-- modal de nuevo producto -->
              <div class="modal fade bd-example-modal-lg" id="AgregarProducto" tabindex="-1" role="dialog" aria-labelledby="AgregarProducto" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Nueva Venta</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <label>Nombre producto</label>
                      <div class="input-group mb-3">
                        <input type="text" v-model="Nombre_Producto" class="form-control"  placeholder="Nombre producto" aria-label="producto" aria-describedby="basic-addon1" required>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <label>Valor producto</label>
                          <div class="input-group mb-3">
                            <input type="number" v-model="Valor_Producto" class="form-control"   placeholder="Precio" aria-label="precio" aria-describedby="basic-addon1" min="1" required>
                          </div>
                        </div>
                        <div class="col-4">
                          <label>Valor oferta</label>
                          <div class="input-group mb-3">
                            <input type="number" v-model="Valor_Oferta" class="form-control" placeholder="Oferta" aria-label="oferta" aria-describedby="basic-addon1" min="1" required>
                          </div>
                        </div>
                        <div class="col-4">
                          <label>Fecha de publicacion</label>
                          <div class="input-group mb-3">
                            <input type="date" v-model="Fecha_Publicacion" class="form-control" aria-label="Fecha_Publicacion" aria-describedby="basic-addon1" required>
                          </div>
                        </div>
                      </div>
                      <label>Descripcion</label>
                      <div class="input-group mb-3">
                        <textarea v-model="Descripcion" class="form-control" aria-label="descripcion" rows="4" cols="80" required></textarea>
                      </div>
                      <label>Archivos</label>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" aria-label="Fecha_Publicacion" aria-describedby="basic-addon1" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button @click="" class="btn btn-primary">Publicar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal de nuevo banner -->
              <div class="modal fade bd-example-modal-lg" id="AgregarBanner" tabindex="-1" role="dialog" aria-labelledby="AgregarBanner" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Nuevo Banner</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="evento">Titulo</label>
                        <input v-model="Titulo_Banner" class="form-control" type="text" placeholder="marron 5 gira south america comunista">
                      </div>
                      <div class="form-group">
                        <label for="evento">Fecha publicacion</label>
                        <input v-model="Fecha_Publicacion_Banner" class="form-control" type="date">
                      </div>
                      <div class="form-group">
                        <label for="evento">Descripcion</label>
                        <textarea v-model="Descripcion_Banner"  class="form-control" rows="4" cols="80" placeholder="Descripcion de el evento"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="evento">Descripcion</label>
                        <input v-model="Imagen_Banner"  class="form-control" type="text" placeholder="marron 5">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" @click="" class="btn btn-primary">Grabar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal clientes -->
            </div>
            <?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
