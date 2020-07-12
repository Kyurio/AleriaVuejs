<?php

require_once RUTA_APP . '/vistas/inc/header.php';
$option = "intranet";

?>
<div id="app">
  <div class="container-fluid">
    <div class="row">


      <!-- sidebar -->
      <?php require_once RUTA_APP . '/helpers/components/sidebar.php' ?>
      <!-- end sidebar -->


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3 py-5">
        <div class="tab-content mt-2">

          <!-- cabecera -->
          <?php require_once RUTA_APP . '/helpers/components/cabecera.php' ?>
          <!-- end cabecera -->

          <!-- clientes -->
          <div class="tab-pane" id="dashboard" role="tabpanel" aria-labelledby="dashboard">
            <h1>dashboard</h1>
          </div>
          <!-- end clientes -->

          <!-- productos -->
          <div class="tab-pane" id="ventas" role="tabpanel" aria-labelledby="producto">
            <div class="card mb-4">
              <div class="card-body">
                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-5">
                    <div class="mt-1 d-flex justify-content-start">
                      <div class="md-form input-with-pre-icon"  v-if="mostrar_buscador_producto === true">
                        <i class="fas fa-search input-prefix"></i>
                        <input type="text"  placeholder="buscar..." v-model="buscadorProductos" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button type="button" @click="NoMostrarBuscadorProductos" title="Agregar" class="btn btn-sm btn-dark" data-target="#product"  data-toggle="tab" href="#product" role="tab" aria-selected="true" ><i class="fas fa-plus"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button type="button" @click="MostrarBuscadorProductos"  title="Listado de tareas" class="btn btn-sm btn-dark" data-target="#list_product" data-toggle="tab" href="#list_product" role="tab" aria-selected="true" ><i class="far fa-list-alt"></i></button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <div>
                  <!-- contenido de el tab -->
                  <div class="tab-content" id="productos">
                    <div class="tab-pane fade show active" id="list_product" role="tabpanel" aria-labelledby="profile-tab">
                      <!-- table -->


                      <table class="table table-hover text-center table-sm display" >
                        <thead>
                          <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio compra</th>
                            <th scope="col">Precio venta</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Estock</th>
                            <th scope="col">Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(item, index) in filterProducts" v-show="(pag - 1) * num_results <= index  && pag * num_results > index">
                            <td>{{ item.name }}</td>
                            <td>${{ item.price_in }}</td>
                            <td>${{ item.price_out }}</td>
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
                              <button type="button" name="Eliminar"   @click="EliminarProduct(item.id)" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash"></i></button>
                              <button type="button" name="Editar"     @click="AbrirModalEdicion(item.id)"  class="btn btn-warning btn-sm" title="Editar"  ><i class="fas fa-pen"></i></button>
                              <button type="button" name="Desactivar" @click="DescativarPorductos(item.id)"  class="btn btn-info btn-sm" title="Desactivar" v-if="item.is_active == 1"><i class="fas fa-ban"></i></button>
                              <button type="button" name="Activar"    @click="ActivarPorductos(item.id)"  class="btn btn-success btn-sm" title="Activar" v-else><i class="fas fa-check"></i></button>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                      <!-- paginador -->
                      <nav aria-label="Page navigation" class="text-center">
                        <ul class="pagination text-center">
                          <li>
                            <a class="mr-3" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                              <span aria-hidden="true"> anterior </span>
                            </a>
                          </li>
                          <li>
                            <a href="#" aria-label="Next" v-show="pag * num_results / filterProducts.length < 1" @click.prevent="pag += 1">
                              <span aria-hidden="true"> siguiente </span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                      <!-- end paginador -->
                      <!-- end table -->
                    </div>

                    <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="task">
                      <h4>Agregar Productos</h4>
                      <br>


                      <div class="col-md-6">
                        <!-- agregar -->
                        <form method="post" enctype="multipart/form-data" action="<?php echo RUTA_URL ?>pages/InsertProducto">
                          <div class="form-group">
                            <label for="name_product">Nombre</label>
                            <input type="text" placeholder="Nombre del producto" maxlength="60" name="Nombre_Producto" class="form-control"  required>
                          </div>
                          <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control" placeholder="Descripcion" name="Descripcion_product" rows="2" cols="4"></textarea>
                          </div>
                          <!-- 3input en la misma linea -->
                          <div class="row">

                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">cantidad</label>
                                <input type="number" min="1" name="Inventary_min_product" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">precio compra </label>
                                <input type="number"  min="1" name="Valor_compra" class="form-control" >
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="">precio venta </label>
                                <input type="number" min="1" name="Valor_venta" class="form-control" >
                              </div>
                            </div>

                          </div>
                          <!-- end 3 input -->

                          <div class="form-group">
                            <label for="">categoria </label>
                            <select class="browser-default custom-select" name="Category_product" >
                              <option v-for="item in categorys"  v-bind:value="item.id">{{ item.name }}</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="">imagen </label>
                            <input type="file" name="img_product" id="img_product">
                          </div>

                          <button type="submit" class="btn btn-sm btn-dark" name="button">Grabar</button>
                        </form>

                      </div>
                    </div>
                    </div>


                    <!-- modal de edicion -->
                    <div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="edit_product" aria-hidden="true" v-for="item in ProductEdit">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container-sm">
                              <form  method="post" novalidate="true" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="">Nombre</label>
                                  <input type="text" name="" v-bind:value="item.id">
                                  <input  type="text" placeholder="Titulo tarea" maxlength="60"   v-bind:value="item.name" class="form-control" required aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                  <label for="">Descripcion</label>
                                  <textarea v-model="description_product" class="form-control" placeholder="Descripcion" rows="2" cols="4"> {{ item.description }} </textarea>
                                </div>
                                <!-- 3input en la misma linea -->
                                <div class="row">

                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">cantidad</label>
                                      <input type="number" min="1" name="" v-model="inventary_min_product" v-bind:value="item.inventary_min" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">precio compra </label>
                                      <input type="number"  min="1"  v-model="price_out_prouct" v-bind:value="item.price_in"  name="date_end_task" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">precio venta </label>
                                      <input type="number" min="1" v-model="price_out_prouct"  v-bind:value="item.price_out"  name="price_out_prouct"  class="form-control" aria-describedby="emailHelp">
                                    </div>
                                  </div>

                                </div>
                                <!-- end 3 input -->

                                <div class="form-group">
                                  <label for="">categoria </label>
                                  <select class="browser-default custom-select" >
                                    <option v-for="item in categorys" v-model="Category_product" v-bind:value="item.category"  value="item.id">{{ item.name }}</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="">imagen </label>
                                  <div class="custom-file">
                                    <input type="file">
                                    <label class="custom-file-label"  v-bind:value="item.image" for="customFileLang">Seleccionar Archivo</label>
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-sm btn-warning"   name="button">Editar</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end modal edicion -->
                  <!-- end contenido tabs -->

                </div>
              </div>
            </div>
          </div>
          <!-- end tabs products -->

          <!-- tareas -->
          <div class="tab-pane" id="tareas" role="tabpanel" aria-labelledby="tareas">
            <div class="card">
              <div class="card-body">
                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-5">
                    <div class="mt-1 d-flex justify-content-start">
                      <div class="md-form input-with-pre-icon">
                        <i class="fas fa-search input-prefix"></i>
                        <input type="text"  placeholder="buscar..." v-model="buscadorProductos" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button type="button" @click="NoMostrarBucadorTareas" title="Agregar" class="btn btn-sm btn-dark" data-target="#task"  data-toggle="tab" href="#tasl" role="tab" aria-selected="true" ><i class="fas fa-plus"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button type="button" @click="MostrarBuscadorTareas" title="Listado de tareas" class="btn btn-sm btn-dark" data-target="#list_task" data-toggle="tab" href="#list_task" role="tab" aria-selected="true" ><i class="far fa-list-alt"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button type="button" @click="NoMostrarBucadorTareas" title="Estadisticas" class="btn btn-sm btn-dark" data-target="#charts_task" data-toggle="tab" href="#charts_task" role="tab" aria-selected="true" ><i class="far fa-chart-bar"></i></button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->
                <!-- contenido de el tab -->
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="list_task" role="tabpanel" aria-labelledby="list">

                    <!-- tareas -->

                    <ul class="list list-group">
                      <li class="list-group-item mt-2 shadow" v-for="(item, index) in filterTasks" v-show="(pag - 1) * num_results_task <= index  && pag * num_results_task > index">
                        <div class="row">
                          <div class="col-md-8">
                            <div class="mt-1 mb-4 d-flex justify-content-start">
                              <h5 class="name">{{ item.title }}</h5>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mt-1 mb-4 d-flex justify-content-end">
                              <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                              <a href="" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                            </div>
                          </div>
                        </div>
                        <p class="name">{{ item.descript }}</p>
                        <small class="name">{{ item.date_end }}</small>
                      </li>
                    </ul>

                    <!-- paginador -->
                    <div class="mt-3">
                      <nav aria-label="Page navigation" class="text-center">
                        <ul class="pagination text-center">
                          <li>
                            <a class="mr-3" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                              <span aria-hidden="true"> anterior </span>
                            </a>
                          </li>
                          <li>
                            <a href="#" aria-label="Next" v-show="pag * num_results_task / filterTasks.length < 1" @click.prevent="pag += 1">
                              <span aria-hidden="true"> siguiente </span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                    <!-- end paginador -->

                  </div>
                  <div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="task">
                    <div class="card">
                      <div class="card-body">

                        <h3>agregar tareas</h3>
                        <div class="col-md-6">
                          <form  @submit="CheckFormTask" method="post" novalidate="true">
                            <div class="form-group">
                              <label for="">Titulo</label>
                              <input  type="text" v-model="title_task" placeholder="Titulo tarea" maxlength="60" name="title_task" class="form-control"  required aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Descripcion</label>
                              <textarea name="name" placeholder="Descripcion tareas" v-model="descript_task"   maxlength="400" name="descript_task" class="form-control"  rows="4" cols="10"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="">Fecha de inicio</label>
                              <input type="date" name="date_start_task" v-model="date_start_task"  class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Fecha de termino</label>
                              <input type="date" name="date_end_task" v-model="date_end_task"  class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">id usuario</label>
                              <input type="text" name="id_user_task" v-model="id_user_task"  class="form-control"  aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-sm btn-dark" name="button">Enviar</button>
                          </form>
                        </div>
                      </div>


                    </div>
                  </div>
                  <div class="tab-pane fade" id="charts_task" role="tabpanel" aria-labelledby="list">

                    <!-- tareas -->

                    <h3>estadisticas</h3>



                  </div>
                </div>
                <!-- end contenido tabs -->
              </div>
            </div>
          </div>
          <!-- end tareas -->

          <!-- estadisticas -->
          <div class="tab-pane" id="estadisticas" role="tabpanel" aria-labelledby="estadisticas">
            <div class="card">
              <div class="card-body">
                <div class="mt-1 mb-4 d-flex justify-content-between">
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
                          <canvas id="ChartMsgs"></canvas>
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
          <div class="tab-pane" id="blog" role="tabpanel" aria-labelledby="banners">

            <div class="card mb-4">
              <div class="card-body">
                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-5">
                    <div class="mt-1 d-flex justify-content-start">
                      <div class="md-form input-with-pre-icon"  v-if="mostrar_buscador_blog === true">
                        <i class="fas fa-search input-prefix"></i>
                        <input type="text"  placeholder="buscar..." v-model="buscadorProductos" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button type="button" @click="NoMostrarBuscadorBlog" title="Agregar" class="btn btn-sm btn-dark" data-target="#blogAdd"  data-toggle="tab" href="#blogAdd" role="tab" aria-selected="true" ><i class="fas fa-plus"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button type="button" @click="MostrarBuscadorBlog"  title="Listado de tareas" class="btn btn-sm btn-dark" data-target="#list_post" data-toggle="tab" href="#list_post" role="tab" aria-selected="true" ><i class="far fa-list-alt"></i></button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <div>
                  <!-- contenido de el tab -->
                  <div class="tab-content" id="posts">
                    <div class="tab-pane fade show active" id="list_post" role="tabpanel" aria-labelledby="list_blog">
                      <!-- table -->


                      lista de post


                      <!-- end table -->
                    </div>

                    <div class="tab-pane" id="blogAdd" role="tabpanel" aria-labelledby="blog">
                      <h4>Agregar Post</h4>
                      <br>


                      <!-- agregar -->
                      <form @submit="CheckFormBlog" method="post" novalidate="true">
                        <p v-if="errors.length">
                          <b>Por favor corriga los siguientes erroes:</b>
                          <ul>
                            <li v-for="error in errors" class="text-danger">{{ error }}</li>
                          </ul>
                        </p>
                        <div class="form-group">
                          <label for="">titulo</label>
                          <input type="text" min="1" name="title_post" v-model="title_post" class="form-control"  aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="">cuerpo</label>
                          <textarea name="description_post" v-model="description_post" class="form-control" rows="2" cols="4"></textarea>
                        </div>
                        <input type="submit" class="btn btn-sm btn-dark" name="grabar" value="Grabar">
                      </form>

                      <!-- end agregar -->

                    </div>

                  </div>

                  <!-- end contenido tabs -->

                </div>
              </div>
            </div>

          </div>

          <!-- mensajes -->
          <div class="tab-pane" id="mensajes" role="tabpanel" aria-labelledby="mensajes">

            <div class="card">
              <div class="card-body">

                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-5">
                    <div class="mt-1 d-flex justify-content-start">
                      <div class="md-form input-with-pre-icon">
                        <i class="fas fa-search input-prefix"></i>
                        <input type="text"  placeholder="buscar"  class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <div v-for="item in msg" class="card mt-3 py-3 mb-3">

                  <div class="card-body" v-on:mouseover="MensajesLeidos(item.Id)" v-if="item.State == 1">
                    <div class="d-flex justify-content-between">
                      <h5>de: {{item.Name}}</h5>

                      <div class="d-flex flex-row-reverse bd-highlight">
                        <button type="button" @click="EliminarMensaje(item.Id)" title="Eliminar" class="btn btn-sm btn-danger ml-1" ><i class="fas fa-trash"></i></button>
                        <button type="button" @click="MensajeSpam(item.Id)" title="Spam" class="btn btn-sm btn-warning ml-1" ><i class="fas fa-envelope-open"></i></button>
                        <button type="button"  title="Leido" class="btn btn-sm btn-info ml-1" ><i class="fas fa-envelope-open-text"></i></button>
                      </div>
                    </div>
                    <p>{{item.Email}}</p>
                    <div>
                      <p>Asunto: {{item.Subjet}}</p>
                      <p>{{item.Content}}</p>
                    </div>
                  </div>

                  <div class="card-body "  v-on:mouseover="MensajesLeidos(item.Id)" v-else>
                    <div class="d-flex justify-content-between">
                      <h5>de: {{item.Name}}</h5>

                      <div class="d-flex flex-row-reverse bd-highlight">
                        <button type="button" @click="EliminarMensaje(item.Id)" title="Eliminar" class="btn btn-sm btn-danger ml-1" ><i class="fas fa-trash"></i></button>
                        <button type="button" @click="MensajeSpam(item.Id)" title="Spam" class="btn btn-sm btn-warning ml-1" ><i class="fas fa-envelope-open"></i></button>
                        <button type="button"  title="Leido" class="btn btn-sm btn-info ml-1" ><i class="fas fa-envelope-open-text"></i></button>
                      </div>
                    </div>
                    <p>{{item.Email}}</p>
                    <div>
                      <p>Asunto: {{item.Subjet}}</p>
                      <p>{{item.Content}}</p>
                    </div>
                  </div>

                </div>


              </div>
            </div>



          </div>

          <!-- ususarios -->
          <div class="tab-pane" id="usuarios" role="tabpanel" aria-labelledby="usuarios">
            <div class="card">
              <div class="card-body">

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
                          <button type="button" title="Agregar" class="btn btn-sm btn-dark" data-target="#users"  data-toggle="tab" href="#users" role="tab" aria-selected="true" ><i class="fas fa-plus"></i></button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button type="button" title="Listado de tareas" class="btn btn-sm btn-dark" data-target="#list_user" data-toggle="tab" href="#list_user" role="tab" aria-selected="true" ><i class="far fa-list-alt"></i></button>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->
                <!-- contenido de el tab -->

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="list_user" role="tabpanel" aria-labelledby="list">
                    usuarios
                  </div>
                  <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="task">
                    <div class="card">
                      <div class="card-body">

                        <h3>agregar usuario</h3>
                        <div class="col-md-6">
                          <form  @submit="CheckFormTask" method="post" novalidate="true">
                            <div class="form-group">
                              <label for="">Titulo</label>
                              <input v-model="title_task"  type="text" placeholder="Titulo tarea" maxlength="60" name="title_task" class="form-control"  required aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Descripcion</label>
                              <input v-model="descript_task"  type="text" placeholder="Descripcion tareas" maxlength="400" name="descript_task" class="form-control" required aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Fecha de inicio</label>
                              <input type="date" name="date_start_task" v-model="date_start_task"  class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Fecha de termino</label>
                              <input type="date" name="date_end_task" v-model="date_end_task"  class="form-control"  aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">id usuario</label>
                              <input type="text" name="id_user_task" v-model="id_user_task"  class="form-control" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-sm btn-dark" name="button">Enviar</button>
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

          <!-- clientes -->
          <div class="tab-pane" id="clientes" role="tabpanel" aria-labelledby="clientes">
            <div class="card">
              <div class="card-body">

                <!-- buscador con botones -->
                <div class="row">
                  <div class="col-sm-5">
                    <div class="mt-1 d-flex justify-content-start">
                      <div class="md-form input-with-pre-icon">
                        <i class="fas fa-search input-prefix"></i>
                        <input type="text"  placeholder="buscar..." v-model="buscadorClientes" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="mt-1 mb-4 d-flex justify-content-end">
                      <button type="button" title="Agregar" class="btn btn-sm btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fas fa-plus"></i></button>
                      <button type="button" title="Enviar Correo" class="btn btn-sm btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="fas fa-envelope"></i></button>
                      <button type="button" title="Estadisticas" class="btn btn-sm btn-dark mr-1" data-toggle="modal" data-target="#AgregarBanner"><i class="far fa-chart-bar"></i></button>
                    </div>
                  </div>
                </div>
                <!-- end buscador con botones -->

                <!-- card clientes -->
                <div class="container">
                  <div class="d-flex justify-content-center py-5 mb-2 ">
                    <div class="row">

                      <div v-for="(item, index) in filterClients" v-show="(pag - 1) * num_results_clients <= index  && pag * num_results_clients > index">
                        <div class="col-md-4">
                          <div class="card card-cascade mb-4 py-4" >
                            <div class="view view-cascade overlay">
                              <div class="d-flex justify-content-end">
                                <button type="button" title="Eliminar" @click="EliminarClient(item.id)" class="btn btn-danger btn-sm ">
                                  <i class="fas fa-trash"></i>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm ">
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

                  <!-- paginador -->
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination text-center">
                      <li>
                        <a class="mr-3" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                          <span aria-hidden="true"> anterior </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" aria-label="Next" v-show="pag * num_results_clients / filterClients.length < 1" @click.prevent="pag += 1">
                          <span aria-hidden="true"> siguiente </span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <!-- end paginador -->
                </div>
                <!-- end card -->

              </div>
            </div>
          </div>
          <!-- end clientes -->

          <!-- Configuraciones -->
          <div class="tab-pane" id="configuracion" role="tabpanel" aria-labelledby="configuracion">

            <div class="card">
              <div class="card-body">
                <div class="mt-1 mb-4 d-flex justify-content-end">

                  <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="btn btn-sm btn-dark" id="categorias" data-toggle="tab" href="#Categorias" role="tab" aria-controls="categoria"
                      aria-selected="true">Categorias</a>
                    </li>
                    <li class="nav-item">
                      <a class="btn btn-sm btn-dark" id="usuarios" data-toggle="tab" href="#Usuarios" role="tab" aria-controls="usuarios"
                      aria-selected="true">Usuarios</a>
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

                <div class="tab-content" id="TabConfigracion">

                  <div class="tab-pane fade show active" id="Categorias" role="tabpanel" aria-labelledby="home-tab">



                    <ul class="nav" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="btn btn-sm btn-dark" id="home-tab" data-toggle="tab" href="#category" title="Agregar Categorias" role="tab" aria-controls="home"
                        aria-selected="true"><i class="fas fa-plus"></i></a>
                      </li>
                      <li class="nav-item">
                        <a class="btn btn-sm btn-dark" id="profile-tab" data-toggle="tab"  title="Listado de Categorias" href="#list_category" role="tab" aria-controls="profile"
                        aria-selected="false"><i class="fas fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="tab-content" id="">
                      <div class="tab-pane fade show active" id="list_category" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mt-1 mb-1 py-1">
                          <h4>Listado de categorias</h4>
                        </div>
                        <table class="table text-center">
                          <thead>
                            <tr>
                              <th scope="col">Categoria</th>
                              <th scope="col">Descripcion</th>
                              <th scope="col">Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(item, index) in categorys" v-show="(pag - 1) * num_results_category <= index  && pag * num_results_category > index">
                              <td>{{ item.name }}</td>
                              <td>{{ item.description }}</td>
                              <td>
                                <button type="button" class="btn btn-sm btn-danger" name="button"><i class="fas fa-trash"></i></button>
                                <button type="button" class="btn btn-sm btn-warning" name="button"><i class="fas fa-pen"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <!-- paginador -->
                        <nav aria-label="Page navigation" class="text-center">
                          <ul class="pagination text-center">
                            <li>
                              <a class="mr-3" href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                                <span aria-hidden="true"> anterior </span>
                              </a>
                            </li>
                            <li>
                              <a href="#" aria-label="Next" v-show="pag * num_results_category / categorys.length < 1" @click.prevent="pag += 1">
                                <span aria-hidden="true"> siguiente </span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                        <!-- end paginador -->

                      </div>
                      <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="col-md-6 mt-2">
                          <h4>Crear Categoria</h4>
                          <form @submit="CheckFormCategory" method="post" novalidate="true">
                            <p v-if="errors.length">
                              <b>Por favor corriga los siguientes erroes:</b>
                              <ul>
                                <li v-for="error in errors" class="text-danger">{{ error }}</li>
                              </ul>
                            </p>
                            <div class="form-group">
                              <label for="">nombre</label>
                              <input type="text" min="1" name="name_category" v-model="name_category" class="form-control"  aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                              <label for="">Descripcion</label>
                              <textarea name="description_category" v-model="description_category" class="form-control" rows="2" cols="4"></textarea>
                            </div>
                            <input type="submit" class="btn btn-sm btn-dark" name="grabar" value="Grabar">
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!-- end sub tab categorias -->
                  <div class="tab-pane fade" id="Usuarios" role="tabpanel" aria-labelledby="profile-tab">
                    Food truck fixie
                    locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit,
                    blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                    Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum
                    PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS
                    salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
                    sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                    stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    Etsy mixtape
                    wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
                    lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                    locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                    squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                    etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
                    stumptown. Pitchfork sustainable tofu synth chambray yr.
                  </div>


                </div>

              </div><!--end card-->

            </div>


          </div><!--end tabs-->


        </div>
      </main>



    </div>
  </div>
</div>
<?php require_once RUTA_APP . '/vistas/inc/footer.php';?>
