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

        case "countWhere":
        $this->bd->query("SELECT count($count)AS total FROM $tabla WHERE $filtro = $condicion GROUP BY $groupby");
        return $this->bd->registros();

        case "rowCount":
        $this->bd->query("SELECT * FROM $tabla");
        return $this->bd->rowCount();
        break;

        case "rowCountWhere":
        $this->bd->query("SELECT * FROM $tabla WHERE $condicion = $filtro");
        return $this->bd->rowCount();
        break;

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
  public function update($option, $tabla, $ColumnaActualiza, $valor, $Filtro, $ValorFiltrado){
    try {

      switch ($option) {

        case "NoWhere":
        $this->bd->query("UPDATE $tabla SET $ColumnaActualiza = $valor");
        return $this->bd->execute();
        break;

        case "Where":
        $this->bd->query("UPDATE $tabla SET $ColumnaActualiza = $valor WHERE $Filtro = $ValorFiltrado");
        return $this->bd->execute();
        break;

        default:
        echo "default";
        break;
      }



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
        return json_encode(true);
      }else{
        return json_encode(false);
      }

    } catch (\Exception $e) {

      header('location: ' . RUTA_URL . 'pages/error/500');

    }

  }

  /*----------------------------------------------------------------------------
  contadro de registros
  ----------------------------------------------------------------------------*/
  public function counter($tabla){

    $cantidadTablas = $tabla->rowCount();

    return $cantidadTablas;

  }

  /*----------------------------------------------------------------------------
  consultas session -longin- longout -createacount
  ----------------------------------------------------------------------------*/
  public function login($datos){

    try {

      $this->bd->query("SELECT * FROM user WHERE email=:email AND password=:password ");
      //otorgar valores
      $this->bd->bind(':email', $datos['email']);
      $this->bd->bind(':password', $datos['password']);
      
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
  ----------------------------------------------------------------------- -----*/
  public function MensajesLeidos(){
    try {

      $this->bd->query("UPDATE message SET State = 2 ");

    } catch (\Exception $e){
      header('location: ' . RUTA_URL . 'pages/error/500');
    }

  }

  public function InsertNuevaCategoria($datos){
    try {
      //consulta sql
      $this->bd->query("INSERT INTO category (name, description) VALUES (:name, :description)");
      //valores de consulta
      $this->bd->bind(':name', $datos['name']);
      $this->bd->bind(':description', $datos['description']);
      //valores a ingresar
      //ejecutar consulta
      if($this->bd->execute()){
        return json_encode(true);
      }else{
        return json_encode(false);
      }

    } catch (\Exception $e) {
      echo $e;
    }


  }

  public function InsertNuevaTarea($datos){
    try {
      //consulta sql
      $this->bd->query("INSERT INTO task (title, descript, date_start, date_end, id_user) VALUES (:title, :descript, :date_start, :date_end, :id_user)");
      //valores de consulta
      $this->bd->bind(':title', $datos['title']);
      $this->bd->bind(':descript', $datos['descript']);
      $this->bd->bind(':date_start', $datos['date_start']);
      $this->bd->bind(':date_end', $datos['date_end']);
      $this->bd->bind(':id_user', $datos['id_user']);
      //valores a ingresar
      //ejecutar consulta
      if($this->bd->execute()){
        return json_encode(true);
      }else{
        return json_encode(false);
      }

    } catch (\Exception $e) {
      echo $e;
    }
  }

  public function InsertMail($datos){
    try {
      //consulta sql
      $this->bd->query("INSERT INTO message (Name, Email, Subjet, Content, State) VALUES (:Name, :Email, :Subjet, :Content, :State)");
      //valores de consulta
      $this->bd->bind(':Name', $datos['name']);
      $this->bd->bind(':Email', $datos['email']);
      $this->bd->bind(':Subjet', $datos['subjet']);
      $this->bd->bind(':Content', $datos['content']);
      $this->bd->bind(':State', $datos['state']);
      //valores a ingresar
      //ejecutar consulta
      if($this->bd->execute()){
        return json_encode(true);
      }else{
        return json_encode(false);
      }

    } catch (\Exception $e) {
      echo $e;
    }
  }

}
