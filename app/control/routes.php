<?php

class routes extends control{

  public function __construct(){

    $this->SessionModelo = $this->modelo('session');

  }

  public function index(){

    $this->vista('pages/inicio');
  }

  public function productos(){

    $this->vista('pages/productos');
  }

  public function blog(){

    $this->vista('pages/blog');
  }

  public function intranet(){

    if (!empty($_SESSION['Nombre_Usuario'])) {
      $this->vista('pages/intranet');
    }else{
      $this->vista('pages/login');
    }

  }

  public function contacto(){

    $this->vista('pages/contacto');
  }

  public function ingresar(){

    $this->vista('pages/login');
  }



}//end class
?>
