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
    if ($_SESSION) {
      // code...
    }
    $this->vista('pages/intranet');
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
