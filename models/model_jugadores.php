<?php
require_once ('config.php');
class ModeloJugadores {
    private $db;
    function __construct (){
        $this->db = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", 'root', '');
    }
    /* obtenemos el jugador segun el id */
    function ObtenerJugadorId($id){
            $query = $this->db->prepare( "SELECT * FROM jugadores WHERE id_jugador = ?");
            $query->execute([$id]);
            $jugador = $query->fetch(PDO::FETCH_OBJ);
            return $jugador;
    
    }
    function InsertJugador ($nombre,$apellido,$edad,$posicion, $id_club){
        $query = $this->db->prepare( "INSERT INTO jugadores (nombre, apellido, edad, posicion, id_club) VALUES  (?,?,?,?,?)");
        $query->execute([$nombre,$apellido,$edad,$posicion, $id_club]);
        return $this->db->lastInsertId();
    }
    function ActualizarJugador($nombre,$apellido,$edad,$posicion, $id_club,$id){
        $query = $this->db->prepare("UPDATE jugadores SET nombre = ? , apellido = ? ,edad = ?, posicion = ? , id_club = ? WHERE id_jugador = ?");
        $query->execute([$nombre,$apellido,$edad,$posicion, $id_club, $id]);
        return;
    }
    function ObtenerJugadoresAscendente(){
    $query = $this->db->prepare("SELECT * FROM jugadores ORDER BY edad asc");
    $query->execute();
    $j = $query->fetchAll(PDO::FETCH_OBJ);
     return $j;
    }
    function ObtenerJugadoresDescendente(){
    $query = $this->db->prepare("SELECT * FROM jugadores ORDER BY edad desc");
    $query->execute();
    $jd = $query->fetchAll(PDO::FETCH_OBJ);
    return $jd;
    }
}
        ?>