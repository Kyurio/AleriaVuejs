
<footer class="footer mt-auto py-3 pt-4 page-footer font-small bg-dark text-light ">
  <div class="container">
    <div class="container-fluid text-center text-md-left">
      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
          <h5 class="text-uppercase text-light"></h5>
          <p class="text-light">Here you can use rows and columns to organize your footer content.</p>
        </div>
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-3 mb-md-0 mb-3">
          <h5 class="text-uppercase text-light ">Enlaces</h5>
          <ul class="list-unstyled">
            <li>
              <a class="text-light"  href="#!">Contacto</a>
            </li>
            <li>
              <a class="text-light" href="#!">Terminos y condiciones</a>
            </li>
            <li>
              <a class="text-light"  href="#!">Preguntas Frecuentes</a>
            </li>
            <li>
              <a class="text-light"  href="#!">Empresa</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3 mb-md-0 mb-3">
          <h5 class="text-uppercase text-light">Sigenos en</h5>
          <ul class="list-unstyled">
            <li>
              <a class="text-light" href="#!"><i class="fab fa-facebook"></i> Facebook</a>
            </li>
            <li>
              <a class="text-light" href="#!"><i class="fab fa-twitter"></i> Twitter</a>
            </li>
            <li>
              <a class="text-light" href="#!"><i class="fab fa-instagram"></i> Instagram</a>
            </li>
            <li>
              <a class="text-light" href="#!"><i class="fab fa-youtube"></i> Youtube</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>



<!-- popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!-- jsdelivr -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- bootstrapcdn -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- chartjs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- vuejs -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- editor text -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>


<?php
switch ($option) {

  case "login":
  echo "<script src=". RUTA_URL ."public/js/logs.js></script>";
  break;

  case "blog":
  echo "<script src=". RUTA_URL ."public/js/post.js></script>";
  break;

  case "intranet":
  echo "<script src=". RUTA_URL ."public/js/app.js></script>";
  break;

  case "productos":
  echo "<script src=". RUTA_URL ."public/js/items.js></script>";
  break;

  case "contacto":
  echo "<script src=". RUTA_URL ."public/js/message.js></script>";
  break;

  case "home":
  echo "";
  break;

  default:
  echo "";
  break;
}


?>



</body>
</html>
