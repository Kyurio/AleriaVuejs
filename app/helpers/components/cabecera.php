<div class="content-header  mb-3">
  <div class="container-fluid">
    <div class="row ">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">{{ title_tab }} / <?php echo $_SESSION['Nombre_Usuario']; ?></h4>
      </div>
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="#" class="btn btn-warning btn-sm" title="Home"><i class="fas fa-home"></i></a>
          <a @click="LogOut" class="btn btn-danger btn-sm" title="Salir"><i class="fas fa-sign-out-alt"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
