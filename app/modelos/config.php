<?php

class config{
  private $bd;

  public function __construct(){
    //instancia la conexion
    $this->bd = new conn;
  }
  /*----------------------------------------------------------------------------
  consultas select
  ----------------------------------------------------------------------------*/
  public function select($tabla, $condicion, $filtro){
    try{

      //consulta
      if (!isset($condicion)) {
        $this->bd->query("SELECT * FROM $tabla WHERE $condicionn = $filtro");
      }else{
        $this->bd->query("SELECT * FROM $tabla ");
      }

      return $this->bd->registros();

    }catch(PDOException $e){
      echo $e;
      //header('location: ' . RUTA_URL . 'pages/error/500');
    }
  }

  /*----------------------------------------------------------------------------
  consultas updates
  ----------------------------------------------------------------------------*/
  public function update($tabla, $condicion, $datos){
    try {

      $this->bd->query("UPDATE  SET WHERE ");

    } catch (\Exception $e){
      header('location: ' . RUTA_URL . 'pages/error/500');
    }

  }

  /*----------------------------------------------------------------------------
  consultas delete
  ----------------------------------------------------------------------------*/
  public function delete($tabla, $condicion, $filtro){
    try {
      //consulta sql
      $this->bd->query("DELETE FROM $tabla WHERE $condicion = $filtro ");

      //ejecutar consulta
      if($this->bd->execute()){
        return true;
      }else{
        return false;
      }

    } catch (\Exception $e) {
      header('location: ' . RUTA_URL . 'pages/error/500');
    }

  }

  /*----------------------------------------------------------------------------
  consultas session -longin- longout -createacount
  ----------------------------------------------------------------------------*/
  public function login($datos){

    try {

      $this->bd->query("SELECT correo, pass, id_usuario FROM usuario WHERE correo=:correo AND pass=:pass ");
      //otorgar valores
      $this->bd->bind(':correo', $datos['user']);
      $this->bd->bind(':pass', $datos['Password']);
      return $this->bd->registros();

    } catch (PDOException $e) {

      //header('location: ' . RUTA_URL . 'pages/error/500');
      echo $e;
    }

  }


  public function createaccount($tabla, $condicion, $filtro, $datos){

    try {
      //consulta sql
      $this->bd->query("INSERT INTO :tabla VALUES (:condicion = :filtro )");
      //valores de consulta
      $this->bd->bind(':tabla', $tabla);
      $this->bd->bind(':condicion', $condicion);
      $this->bd->bind(':filtro', $filtro);

      //valores a ingresar


    } catch (\Exception $e) {

    }


  }

  /*----------------------------------------------------------------------------
  consultasperonsalizadas
  ----------------------------------------------------------------------------*/
  public function InsertMail($datos){
    try {
      $this->bd->query("INSERT INTO message(Name, Email, Subjet, Content) VALUES (:Name, :Email, :Subjet, :Content) ");

      //otorgar valores
      $this->bd->bind(':Name', $datos['Name']);
      $this->bd->bind(':Email', $datos['Email']);
      $this->bd->bind(':Subjet', $datos['Subjet']);
      $this->bd->bind(':Content', $datos['Content']);
      //ejecutar consulta
      if($this->bd->execute()){
        return true;
      }else{
        return false;
      }

    } catch (PDOException $e) {
      header('location: ' . RUTA_URL . 'pages/error/500');
    }
  }

  public function InsertNuevoProducto($datos){
    try {
      $this->bd->query("INSERT INTO producto(Nombre_producto, Descripcion, Precio, Oferta, Estado, Fecha_Publicacion, Fecha_Creacion) VALUES (:Nombre_Producto, :Descripcion, :Precio, :Oferta, :Estado, :Fecha_Publicacion, :Fecha_Creacion) ");

      //otorgar valores
      $this->bd->bind(':Nombre_Producto', $datos['Nombre_Producto']);
      $this->bd->bind(':Descripcion', $datos['Descripcion']);
      $this->bd->bind(':Estado', $datos['Estado']);
      $this->bd->bind(':Precio', $datos['Precio']);
      $this->bd->bind(':Oferta', $datos['Oferta']);
      $this->bd->bind(':Fecha_Publicacion', $datos['Fecha_Publicacion']);
      $this->bd->bind(':Fecha_Creacion', $datos['Fecha_Creacion']);

      //ejecutar consulta
      if($this->bd->execute()){
        return true;
      }else{
        return false;
      }

    } catch (PDOException $e) {
      //header('location: ' . RUTA_URL . 'pages/error/500');
      echo $e;
    }
  }

  public function InsertarRedesSociales($datos){
    try {
      $this->bd->query("INSERT INTO social( Id_empresa, Facebook, Twitter, Instagram, Youtube, Correo) VALUES ( :Id_empresa, :Facebook, :Twitter, :Instagram, :Youtube, :Correo) ");

      //otorgar valores
      $this->bd->bind(':Facebook', $datos['Facebook']);
      $this->bd->bind(':Twitter', $datos['Twitter']);
      $this->bd->bind(':Instagram', $datos['Instagram']);
      $this->bd->bind(':Youtube', $datos['Youtube']);
      $this->bd->bind(':Correo', $datos['Correo']);
      $this->bd->bind(':Id_empresa', $datos['Id_empresa']);
      //ejecutar consulta
      if($this->bd->execute()){
        return true;
      }else{
        return false;
      }

    } catch (PDOException $e) {
      //header('location: ' . RUTA_URL . 'pages/error/500');
      echo $e;
    }
  }

  public function AddBanners($datos){
    try {
      $this->bd->query("INSERT INTO banner(Titulo, Fecha_creacion, Fecha_edicion, Fecha_publicacion, Descripcion, Imagen) VALUES ( :Titulo, :Fecha_creacion, :Fecha_edicion, :Fecha_publicacion, :Descripcion, :Imagen ) ");

      //otorgar valores
      $this->bd->bind(':Titulo', $datos['Titulo_Banner']);
      $this->bd->bind(':Fecha_creacion', $datos['Fecha_Creacion']);
      $this->bd->bind(':Fecha_edicion', $datos['Fecha_Edicion']);
      $this->bd->bind(':Fecha_publicacion', $datos['Fecha_Publicacion_Banner']);
      $this->bd->bind(':Descripcion', $datos['Descripcion_Banner']);
      $this->bd->bind(':Imagen', $datos['Imagen_Banner']);

      //ejecutar consulta
      if($this->bd->execute()){
        return true;
      }else{
        return false;
      }

    } catch (PDOException $e) {

      echo $e;
      //header('location: ' . RUTA_URL . 'pages/error/500');

    }
  }

  public function InsertarMensajes($datos){

    try {
      $this->bd->query("INSERT INTO Mensajes(Nombre, Correo, Asunto, Mensaje) VALUES ( :Nombre, :Correo, :Asunto, :Mensaje ) ");
      //otorgar valores
      $this->bd->bind(':Nombre',  $datos['Nombre']);
      $this->bd->bind(':Correo',  $datos['Correo']);
      $this->bd->bind(':Asunto',  $datos['Asunto']);
      $this->bd->bind(':Mensaje', $datos['Mensaje']);
      //ejecutar consulta
      if($this->bd->execute()){
        return true;
      }else{
        return false;
      }
    } catch (PDOException $e) {
      echo $e;
      //header('location: ' . RUTA_URL . 'pages/error/500');
    }

  }

}
?>
