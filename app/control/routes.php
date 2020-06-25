<?php

class routes extends control{

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

    if(session_status() === PHP_SESSION_NONE){
      $this->vista('pages/intranet');
    }else {
      $this->vista('pages/login');
    }

  }

  public function contacto(){

    $this->vista('pages/contacto');
  }

  public function detalle($id){

    $this->vista('pages/detalle');
  }

  public function ingresar(){

    $this->vista('pages/login');
  }



}//end class
?>
