<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<div id="app">
  <div class="container-fluid">
    <div class="row">

      <!-- sidebar -->
      <nav id="sidebarMenu" class="col-md-2 z-depth-3 d-none d-md-block bg-light sidebar">
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


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3 py-5">

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
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button type="button" title="Agregar" class="btn btn-dark" data-target="#product" id="" data-toggle="tab" href="#tasl" role="tab" aria-selected="true" ><i class="fas fa-plus"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button type="button" title="Listado" class="btn btn-dark" data-target="#list_product" id="" data-toggle="tab" href="#list" role="tab" aria-selected="true" ><i class="far fa-list-alt"></i></button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->
                <div>
                  <!-- contenido de el tab -->

                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list_product" role="tabpanel" aria-labelledby="profile-tab">
                      <!-- table -->
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
                      <!-- end table -->
                    </div>

                    -
                    <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="task">

                      <div class="card">
                        <div class="card-body">
                          <div class="col-md-6">
                            <form @submit="CheckFormProducts" method="post" novalidate="true">
                              <div class="form-group">
                                <label for="">Nombre</label>
                                <input v-model="name_product"  type="text" placeholder="Titulo tarea" maxlength="60" name="title_task" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="">Descripcion</label>
                                <textarea name="description_product" class="form-control" placeholder="Descripcion" rows="2" cols="4"></textarea>
                              </div>
                              <!-- 3input en la misma linea -->
                              <div class="row">

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="">cantidad</label>
                                    <input type="inventary_min_product" min="1" name="date_task" v-model="date_task"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="">precio compra </label>
                                    <input type="price_in_product"  min="1" name="date_end_task" v-model="date_end_task"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="">precio venta </label>
                                    <input type="numer" min="1" name="price_out_prouct" v-model="price_out_prouct"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                  </div>
                                </div>

                              </div>
                              <!-- end 3 input -->

                              <div class="form-group">
                                <label for="">precio venta </label>
                                <select class="browser-default custom-select" >
                                  <option v-for="item in categorys"  value="item.id">{{ item.name }}</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="">imagen </label>
                                <input type="text" name="imagen_product" v-model="imagen_product"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <button type="submit" class="btn btn-dark"  name="button">Grabar</button>
                            </form>
                          </div>
                        </div>


                      </div>

                    </div>




                  </div>
                  <!-- end contenido tabs -->

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
                      <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button type="button" title="Agregar" class="btn btn-dark" data-target="#task" id="" data-toggle="tab" href="#tasl" role="tab" aria-selected="true" ><i class="fas fa-plus"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button type="button" title="Listado de tareas" class="btn btn-dark" data-target="#list" id="" data-toggle="tab" href="#list" role="tab" aria-selected="true" ><i class="far fa-list-alt"></i></button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->
                <!-- contenido de el tab -->

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="profile-tab">
                    <ul class="list-group">
                      <li class="list-group-item">

                        <div class="d-flex flex-row-reverse bd-highlight">
                          <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                        </div>

                        Cras justo odio


                      </li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Morbi leo risus</li>
                      <li class="list-group-item">Porta ac consectetur ac</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="task">
                    <div class="card">
                      <div class="card-body">

                        <h3>agregar tareas</h3>
                        <div class="col-md-6">
                          <form id="app" @submit="checkForm" method="post" novalidate="true">
                            <div class="form-group">
                              <label for="">Titulo</label>
                              <input v-model="title_task"  type="text" placeholder="Titulo tarea" maxlength="60" name="title_task" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Descripcion</label>
                              <input v-model="subjet_msg"  type="text" placeholder="Descripcion tareas" maxlength="400" name="description_task" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Fecha de inicio</label>
                              <input type="date" name="date_task" v-model="date_task"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Fecha de termino</label>
                              <input type="date" name="date_end_task" v-model="date_end_task"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-dark" name="button">Enviar</button>
                          </form>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
                <!-- end contenido tabs -->
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
                <div class="container">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="card mb-2 mt-2">
                        <div class="card-header">
                          <h5>Estadisticas Correos</h5>
                        </div>
                        <div class="card-body">
                          <canvas id="ChartMsg"></canvas>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="card mb-2 mt-2">
                        <div class="card-header">
                          <h5>Estadisticas Clientes</h5>
                        </div>
                        <div class="card-body">
                          <canvas id="ChartCls"></canvas>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

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
          <div class="tab-pane fade shadow" id="mensajes" role="tabpanel" aria-labelledby="mensajes">
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

                  <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="btn btn-sm btn-dark" id="home-tab" data-toggle="tab" href="#Categorias" role="tab" aria-controls="home"
                      aria-selected="true">Categorias</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-sm btn-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                      aria-selected="false">Banners</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-sm btn-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                      aria-selected="false">Redes sociales</a>
                    </li>
                  </ul>

                </div>

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="Categorias" role="tabpanel" aria-labelledby="home-tab">


                    <div class="row">

                      <div class="col-md-6">
                        <div class="card">
                          <form @submit="CheckFormCategory" method="post" novalidate="true">
                            <div class="card-body">

                              <p v-if="errors.length">
                                <b>Por favor corriga los siguientes erroes:</b>
                                <ul>
                                  <li v-for="error in errors" class="text-danger">{{ error }}</li>
                                </ul>
                              </p>

                              <div class="form-group">
                                <label for="">nombre</label>
                                <input type="text" min="1" name="name_category" v-model="name_category" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                <label for="">Descripcion</label>
                                <textarea name="description_category" v-model="description_category" class="form-control" rows="2" cols="4"></textarea>
                              </div>
                              <input type="submit" class="btn btn-dark" name="grabar" value="Grabar">
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card">
                          <div class="card-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Categoria</th>
                                  <th scope="col">Descripcion</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr v-for="item in categorys">
                                  <td>{{ item.name }}</td>
                                  <td>{{ item.description }}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>



                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Food truck fixie
                    locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit,
                    blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                    Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum
                    PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS
                    salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
                    sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                    stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Etsy mixtape
                      wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
                      lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                      locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                      squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                      etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
                      stumptown. Pitchfork sustainable tofu synth chambray yr.</div>
                    </div>

                  </div>
                </div>

              </div>


            </div><!--end tabs-->

          </main>
        </div>
      </div>

    </div>
    <?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
