<?php

class pages extends control{


  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');
  }
  /*--------------------------------------------------------
  paginas principales
  --------------------------------------------------------*/
  public function index(){

    $this->vista('pages/inicio');
  }

  public function intranet(){
    $this->vista('pages/intranet');
  }

  public function contacto(){

    $this->vista('pages/contacto');
  }

  public function detalle($id){

    $this->vista('pages/detalle');
  }
  /*--------------------------------------------------------
  funciones insert --update deleted
  --------------------------------------------------------*/

  //-- productos
  public function InsertProducto(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $formNuevaVenta = [
        'Nombre_Producto' => $data['Nombre_Producto'],
        'Fecha_Publicacion' => $data['Fecha_Publicacion'],
        'Descripcion' => $data['Descripcion'],
        'Precio' => $data['Valor_Producto'],
        'Oferta' => $data['Valor_Oferta'],
        'Estado' => 1,
        'Fecha_Creacion' => date('Y-m-d'),
      ];

      //ejecyta la insercion
      if($this->ConfigModelo->InsertNuevoProducto($formNuevaVenta)){
        echo true;
      }else{
        echo false;
      }

    }else{

      $formNuevaVenta = [
        'Nombre_Producto' => '',
        'Fecha_Publicacion' => '',
        'Descripcion' => '',
        'Precio' => '',
        'Oferta' => '',
        'Estado' => '',
        'Imagens' => '',
        'Fecha_Creacion' => '',
      ];

    }
  }

  public function DeleteProducto(){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $data = json_decode(file_get_contents("php://input"), true);
      $id = $data['Id_producto'];
      //ejecyta la insercion
      if($this->ConfigModelo->delete('producto', 'Id_producto', $id)){
        echo true;
      }else{
        echo false;
      }

    }else{
      return false;
    }

  }

  public function SelectProduct(){

    $product = $this->ConfigModelo->select('product', '', '');
    echo json_encode($product);
  }

  public function SelectClient(){
    $clients = $this->ConfigModelo->select('person', '', '');
    echo json_encode($clients);
  }

  public function SelectMail(){
    $mails = $this->ConfigModelo->select('message', '', '');
    echo json_encode($mails);
  }

  public function Mail(){
    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $formMail = [
        'name' => $data['name'],
        'email' => $data['email'],
        'subjet' => $data['subjet'],
        'content' => $data['content'],
      ];

      //ejecyta la insercion
      if($this->ConfigModelo->InsertMail($formMail)){
        echo json_encode(true); //true
      }else{
        echo json_encode(false); //false
      }

    }else{

      $formMail = [
        'name' => '' ,
        'email' => '',
        'subjet' => '',
        'content' => '',
      ];

    }
  }

  /*--------------------------------------------------------
  funciones bases --logout --errorpage
  --------------------------------------------------------*/
  public function Logout(){
    $this->SessionModelo->out();
    $this->vista('pages/login');
  }

  public function Error($code){
    $this->vista('pages/error', $code);
  }

}//end class
?>
