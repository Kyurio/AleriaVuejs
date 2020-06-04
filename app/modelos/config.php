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
  public function select($option, $tabla, $condicion, $filtro, $count, $groupby){
    try{
      //reemplazar por un case;
      switch ($option) {

        case "filtro":
        $this->bd->query("SELECT * FROM $tabla WHERE $condicion = $filtro");
        return $this->bd->registros();
        break;

        case "groupby":
        $this->bd->query("SELECT * FROM $tabla  GROUP BY $groupby");
        return $this->bd->registros();
        break;

        case "count":
        $this->bd->query("SELECT *, count($count)AS total FROM $tabla GROUP BY $groupby");
        return $this->bd->registros();

        case "select":
        $this->bd->query("SELECT * FROM $tabla");
        return $this->bd->registros();
        break;

        default:
        echo "default";
        break;
      }

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


}
?>
