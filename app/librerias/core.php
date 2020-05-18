<?php

class core{
  //parametros inciales
  protected $controladorActual = 'pages';
  protected $metodoActual = 'index';
  protected $parametros= [];
  //constructor
  public function __construct(){
    /*
    0 = controlador
    1 = metodo
    2 = parametro
    */
    //requerir el controladro indice 0
    $url = $this->getUrl();
    //print_r($this->getUrl());

    //valida si el archivo existe ....lo busca su existe
    if(file_exists('../app/control/' .ucwords($url[0]).'.php')){
      //si existe se configura como contralodr por defecto
      $this->controladorActual = ucwords($url[0]);
      //noconfigurar
      unset($url[0]);
    }
    require_once '../app/control/'. $this->controladorActual . '.php';
    $this->controladorActual = new $this->controladorActual;
    //requiere el metodo indice 1
    if (isset($url[1])){
      if(method_exists($this->controladorActual, $url[1])){
        //chequea el metodo
        $this->metodoActual = $url[1];
        //noconfigurar
        unset($url[1]);
      }
    }
    //test extracion de metodo
    //echo  $this->metodoActual;
    //obtener parametros
    $this->parametros = $url ? array_values($url) : [];
    //extraer los arreglos configurados en la url
    call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
  }

  public function getUrl(){
    if (isset($_GET['url'])){
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }

  }//end function



}//end class

?>
