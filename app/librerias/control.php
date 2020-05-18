<?php

//clase controlodador principal
//carga modelos y vistas
class control{
  // carga el modelo
  public function modelo($modelo){
    //carga modelo
    require_once '../app/modelos/' . $modelo . '.php';
    //instanciar  el modelo
    return new $modelo();
  }
  // carga las  vistas
  public function vista($vista, $datos = []){
    //check si existe la vista
    if(file_exists('../app/vistas/' . $vista . '.php')){
      //existe
      require_once '../app/vistas/' . $vista . '.php';
    }else{
      //no existe
      header('location: ' . RUTA_URL . 'pages/error/500');
    }
  }
}
?>
