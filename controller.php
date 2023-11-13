<?php
require_once ('models/model_jugadores.php');
require_once ('view.php');
class JugApiController{
    private $modelJugadores;
    private $view;
    private $data;

public function __construct (){
 $this-> modelJugadores = new ModeloJugadores ();
 $this->view = new JSONView();
 $this->data = file_get_contents('php://input');
}
private function getData(){
  return json_decode($this->data);
 }

function obtenerJugador ($params = []){
  $id = $params[':ID'];
  $jugador = $this->modelJugadores->ObtenerJugadorId($id);
  if(!empty($jugador)) {
   return $this->view->response($jugador,200);
  }
else {
    return $this->view->response("No existe el jugador con el id={$id}", 404);
}
}

function obtenerJugadores ($params = []){
$OrdenarPor = $_GET ["order"];
if (((isset($OrdenarPor)) && ($OrdenarPor == 'asc'))){
  $jugadores_ordenados_asc = $this->modelJugadores->ObtenerJugadoresAscendente();
  return $this->view->response($jugadores_ordenados_asc,200);
}

else{
  $OrdenarPor = 'desc';
  $jugadores_ordenados_desc = $this->modelJugadores->ObtenerJugadoresDescendente();
  return $this->view->response($jugadores_ordenados_desc,200);
}
}
function crearJugador ($params = []){
$body = $this->getData();
$id = $this->modelJugadores->InsertJugador($body->nombre , $body->apellido, $body->edad, $body->posicion, $body->id_club);
$this->view->response("El jugador fue insertado con el id=".$id, 201);

}
function actualizarJugador($params = []){
  $id = $params[':ID'];
  $body = $this->getData();
  $jugador = $this->modelJugadores->ObtenerJugadorId($id);
  if (!empty($jugador)) {
    $this->modelJugadores->ActualizarJugador($body->nombre, $body->apellido, $body->edad, $body->posicion, $body->id_club, $id);
    $this->view->response("El jugador fue modificada con exito.", 200);
} else
    $this->view->response("El jugador con el id=$id no existe", 404);


}
}

