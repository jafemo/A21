<?php
// Clase para la base de datos
class dbNBA{
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";
  private $conexion;
  private $error=false;
  function __construct(){
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  // Comprobacion de errores
  function hayError(){
    return $this->error;
  }

  // Esta es la funcion para insertar un equipo dentro de la BD
  public function insertarEquipo($nombre,$ciudad,$conferencia,$division){
  if ($this->error==false) {

  $insert_sql="INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES ('".$nombre."', '".$ciudad."', '".$conferencia."', '".$division."') ";
  if (!$this->conexion->query($insert_sql)) {
    echo "Nanai de tabla (" .$this->conexion->errno .") " . $this->conexion->error;
  }
  return true;
  }else{
  return null;
  }

  }
  public function devNuevaFila($nombre){
  if($this->error==false){
    $resultado = $this->conexion->query("SELECT * FROM equipos WHERE Nombre='".$nombre."'");
    return $resultado;
    }else{
    return null;
    }
  }
}
 ?>
