
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical">

    <li> <a class="nav-link" @click="ChangeTitle('Ventas')" id="v-pills-ventas-tab"      data-toggle="tab" href="#ventas" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-shopping-cart"></i> Productos</a></li>
    <li> <a class="nav-link" @click="ChangeTitle('Blog')" id="v-pills-blogs-tab"     data-toggle="tab" href="#blog" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-feather-alt"></i> Blog</a></li>
    <li>
      <a class="nav-link" @click="ChangeTitle('Mensajes')" id="v-pills-mensajes-tab"    data-toggle="tab" href="#mensajes" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-envelope"></i> Mensajes
        <span v-if="CantidadMsg > 0"  class="right badge badge-danger">{{ CantidadMsg }} Nuevo</span>
      </a>
    </li>
    <!-- <li> <a class="nav-link" @click="ChangeTitle('Usuarios')" id="v-pills-usuarios-tab"    data-toggle="tab" href="#usuarios" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-user"></i> Usuarios</a></li> -->
    <li>
      <a class="nav-link" @click="ChangeTitle('Tareas')" id="v-pills-tareas-tab"      data-toggle="tab" href="#tareas" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-thumbtack"></i> Tareas
        <span v-if="CantidadTask > 0"  class="right badge badge-danger">{{ CantidadTask }} Tarea Nueva</span>
      </a>
    </li>
    <li> <a class="nav-link" @click="ChangeTitle('Estadisticas')" id="v-pills-estadisticas-tab"  data-toggle="tab" href="#estadisticas" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-chart-line"></i> Estadisticas</a></li>
    <li> <a class="nav-link" @click="ChangeTitle('Clientes')" id="v-pills-clientes-tab"      data-toggle="tab" href="#clientes" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-handshake"></i></i> Clientes</a></li>
    <li> <a class="nav-link" @click="ChangeTitle('Configuracion')" id="v-pills-configuracion-tab" data-toggle="tab" href="#configuracion" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-cog"></i> Configuracion</a></li>

  </ul>
</nav>
