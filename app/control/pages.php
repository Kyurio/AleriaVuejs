<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{


  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }

  public function InsertPost(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $formNuevoPost = [
        'title_post' => trim($data['title_post']),
        'description_post' => $data['description_post'],
      ];
      //ejecyta la insercion
      if($this->ConfigModelo->InsertNuevoPost($formNuevoPost)){
        echo json_encode(true);
      }else{
        echo json_encode(false);
      }

    }else{

      $formNuevoPost = [
        'name_category' => '',
        'description_category' => '',
      ];

    }

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

    //$data = json_decode(file_get_contents("php://input"), true);
    $imagen = $_FILES['img_product'];
    $directorio = RUTA_URL.'public/img/produts/';
    $archivo = $directorio . basename($imagen['name']);
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    $size = getimagesize($imagen['tmp_name']);
    if ($size) {
      // Valida si imagen es menor a 10mb
      $tamano = $imagen['size'];
      if (!$tamano < 500) {
        if ($tipoArchivo == 'jpg' || $tipoArchivo == 'png' || $tipoArchivo == 'jpeg' || $tipoArchivo == 'gif') {
          if (!file_exists($archivo)) {
            move_uploaded_file($imagen['tmp_name'], $archivo);

            echo "success, El archivo se subió correctamente";

          } else {
            echo "error, Ya has subido anteriormente esa imagen";
          }
        } else {
          echo "error, Solo se admite archivo jpg, jpeg, png, gif";
        }
      } else {
        echo "error, El tamaño de la imagen debe de ser menor a 5mb";
      }
    } else {
      echo "error, El archivo no es una imagen";
    }

    if(!empty($archivo)){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $formNuevaVenta = [
          'name_product' => trim($_POST['Nombre_Producto']),
          'description_product' => trim($_POST['Descripcion_product']),
          'inventary_min_product' => trim($_POST['Inventary_min_product']),
          'price_in_product' => trim($_POST['Valor_compra']),
          'price_out_prouct' => trim($_POST['Valor_venta']),
          'categoriy_product' => trim($_POST['Category_product']),
          'is_active_product' => 1,
          'imagen_product' => trim($archivo),
        ];

        //ejecyta la insercion
        if($this->ConfigModelo->InsertNuevoProducto($formNuevaVenta)){
          //redireccionar('pages/intranet?msg=true');
        }else{
          //redireccionar('pages/intranet?msg=false');
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

  public function SelectProductUnit(){

    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['Id_product'];

    $product = $this->ConfigModelo->select('filtro', 'product', 'id', $id, '', '');
    echo json_encode($product);
  }

  public function ActualizarProductos(){

    $data = json_decode(file_get_contents("php://input"), true);


    $formUpdateProduct= [
      'id' => $data['Id_product'],
      'name_product' => $data['Name_product'],
      'Descripcion_product' => $data['Descripcion_product'],
      ''

    ];

    $update = $this->ConfigModelo->UpdateProduct($formUpdateProduct);
    echo json_encode($update);

  }

  public function DeactivateProduct(){

    $data = json_decode(file_get_contents("php://input"), true);

    $State = $data['State'];
    $id = $data['Id_product'];

    if($this->ConfigModelo->update('Where', 'product', 'is_active', $State, 'Id', $id)){
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }

  }

  public function ActiveProduct(){
    $data = json_decode(file_get_contents("php://input"), true);

    $State = $data['State'];
    $id = $data['Id_product'];

    if($this->ConfigModelo->update('Where', 'product', 'is_active', $State, 'Id', $id)){
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }
  }

  public function ProductSelected(){

    $data = json_decode(file_get_contents("php://input"), true);

    $id = $data['Id_product'];

    if($product = $this->ConfigModelo->select('select', 'product', 'id', $id, '', '')){

      echo json_encode($product);

    }else {

      echo json_encode("producto no encontrado");

    }

  }

  public function SelectClient(){
    $clients = $this->ConfigModelo->select('select', 'person', '', '', '', '');
    echo json_encode($clients);
  }

  public function DeleteClient(){

    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id_cliente'];

    if($this->ConfigModelo->delete('person', 'id', $id)){
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }

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

    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['Id_mensajes'];

    if($this->ConfigModelo->update('Where', 'message', 'State', '2', 'Id', $id)){
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
  public function SessionStart(){

    $data = json_decode(file_get_contents("php://input"), true);

    $email =  $data['mail'];
    $pass = $data['pass'];

    if(!empty($_SESSION['Nombre_Usuario'])) {

      $this->SessionModelo->out();
      echo json_encode(false);

    }else{

      //validacion
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $datos = [
          'password' => trim($pass),
          'email'    => trim($email),
        ];

        if($user = $this->ConfigModelo->ValidarLogin($datos)){
          //extrae los datos del usario logeado

          foreach ($user as $item) {
            $this->SessionModelo->User('Nombre_Usuario', trim($item->name));
          }


          echo json_encode(true);
        }else{

          echo json_encode(false);

        }

      }else{
        $session = [
          'Email' => '',
          'Password' => '',
        ];
        $this->vista('pagina/login', $session);
      }
    }

  }

  public function Logout(){

    if($this->SessionModelo->out()){
      echo json_encode(true);
    }else {
      echo json_encode(false);
    }

  }

  public function Error($code){
    $this->vista('pages/error', $code);
  }

}//end class
?>
