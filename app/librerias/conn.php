<?php

//conexion a la base de datos con PDO
class conn{
  private $host = DB_HOST;
  private $usuario = DB_USUARIO;
  private $password = DB_PASSWORD;
  private $nombre_base = DB_NOMBRE;

  private $dbh;
  private $stmt;
  private $error;



  public function __construct(){
    //configuracion conexion

    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_base;
    $opciones = array(
      PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    // CREA INSTANCIA DE EL PDO
    try {
      //code...
      $this->dbh = new PDO($dsn, $this->usuario,$this->password,$opciones);
      //traduse el resultado a latino
      $this->dbh->exec('set names utf8');

    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  //consultas sql
  public function query($sql){
    $this->stmt = $this->dbh->prepare($sql);
  }

  //vincular consulta
  public function bind($parametro, $valor, $tipoDato = null){
    if (is_null($tipoDato)) {
      switch (true) {
        case is_int($valor):
        $tipoDato = PDO::PARAM_INT;
        break;

        case is_bool($valor):
        $tipoDato = PDO::PARAM_BOOL;
        break;

        case is_null($valor):
        $tipoDato = PDO::PARAM_NULL;
        break;

        default:
        $tipoDato = PDO::PARAM_STR;
        break;
      }
    }
    $this->stmt->bindValue($parametro, $valor, $tipoDato);
  }

  //ejecuta a la consulta
  public function execute(){
    return $this->stmt->execute();
  }

  //obtener registros multiples
  public function  registros(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  //obtener registros unitarios
  public function  registro(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  //obtener la cantidad de filas rowcount
  public function  rowCount(){
    $this->execute();
    return $this->stmt->rowCount();
  }

}
