<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{


  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }

  public function InsertCategory(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $formNuevaCategoria = [
        'name' => $data['name'],
        'description' => $data['description'],
      ];
      //ejecyta la insercion
      if($this->ConfigModelo->InsertNuevaCategoria($formNuevaCategoria) == true){
        echo json_encode(true);
      }else{
        echo json_encode(false);
      }

    }else{

      $formNuevaVenta = [
        'name_category' => '',
        'description_category' => '',
      ];

    }
  }

  public function InsertTask(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $formNuevaTask = [
        'title' => $data['title'],
        'descript' => $data['descript'],
        'date_start' => $data['date_start'],
        'date_end' => $data['date_end'],
        'id_user' => $data['id_user'],
      ];
      //ejecyta la insercion
      if($this->ConfigModelo->InsertNuevaTarea($formNuevaTask) == true){
        echo json_encode(true);
      }else{
        echo json_encode(false);
      }

    }else{

      $formNuevaTask = [
        'title' => '',
        'descript' => '',
        'date_start' =>'',
        'date_end' => '',
        'id_user' => '',
      ];

    }
  }

  public function InsertProducto(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $formNuevaVenta = [
        'name_product' => $data['Nombre_Producto'],
        'description_product' => $data['Fecha_Publicacion'],
        'inventary_min_product' => $data['Descripcion'],
        'price_in_product' => $data['Valor_Producto'],
        'price_out_prouct' => $data['Valor_Oferta'],
        'is_active_product' => 1,
        'categoriy_product' => date('Y-m-d'),
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
      $id = $data['id_product'];
      //ejecyta la insercion
      if($this->ConfigModelo->delete('product', 'id', $id)){
        echo true;
      }else{
        echo false;
      }

    }else{
      return false;
    }

  }

  public function SelectProduct(){

    $product = $this->ConfigModelo->select('select', 'product', '', '', '', '');
    echo json_encode($product);
  }

  public function SelectClient(){
    $clients = $this->ConfigModelo->select('select', 'person', '', '', '', '');
    echo json_encode($clients);
  }

  public function Mail(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $formMail = [
        'name' => $data['name'],
        'email' => $data['email'],
        'subjet' => $data['subjet'],
        'content' => $data['content'],
        'state' => 1,
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

  public function SelectMail(){
    $mails = $this->ConfigModelo->select('select', 'message', 'State', '2', '', '');
    echo json_encode($mails);
  }

  public function CounterMail(){

    $CantidadMails = $this->ConfigModelo->select('rowCountWhere', 'message', 'State', '1', 'Id', 'Id');
    echo json_encode($CantidadMails);
  }

  public function DeleteMessage(){

    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['Id_mensajes'];

    if($this->ConfigModelo->delete('message', 'Id', $id)){
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }

  }

  public function MessagesRead(){

    if($this->ConfigModelo->update('NoWhere', 'message', 'State', '2', '', '')){
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }


  }

  public function SpamMessage(){

    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['Id_mensajes'];

    if($this->ConfigModelo->update('Where', 'message', 'State', '3', 'Id', $id)){
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }

  }

  public function SelectBlog(){
    $mails = $this->ConfigModelo->select('select', 'blog', '', '', '', '');
    echo json_encode($mails);
  }

  public function SelectUser(){
    $user = $this->ConfigModelo->select('select', 'user', '', '', '', '');
    echo json_encode($user);
  }

  public function SelectCategorys(){
    $categorys = $this->ConfigModelo->select('select', 'category', '', '', '', '');
    echo json_encode($categorys);
  }

  public function SelectTask(){
    $tasks = $this->ConfigModelo->select('select', 'task', '', '', '', '');
    echo json_encode($tasks);
  }



  public function Details(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $tabla = $data['table'];
      $id = $data['id'];

      echo json_encode($id);
      //ejecyta la insercion
      if($details = $this->ConfigModelo->select($tabla, 'id', $id)){

        echo json_encode($details);

      }else {

      }
    }else{
      echo "404";
    }
  }



  /*--------------------------------------------------------
  funciones chart
  --------------------------------------------------------*/
  public function chartCls(){
    $clients = $this->ConfigModelo->select('groupby','person', '', '', 'id','created_at');
    echo json_encode($clients);
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
