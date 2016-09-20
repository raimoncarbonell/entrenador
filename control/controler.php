<?php
class Controler{
    private $c;

    public function __construct(Interop\Container\ContainerInterface $ci){
        $this->c = $ci;
    }


    public function cargarHome($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      return $this->c->view->render($response, '/home.php', $d);
    }


    public function cargarTemas($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      $d['temas']   = $this->c->model->getTemas();
      return $this->c->view->render($response, '/temas.php', $d);
    }


    public function cargarPregunta($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      $d['tema_url'] = $args['tema'];
      if($args['tema']=="aleatoria"){
        $d = array_merge($d, $this->c->model->getPreguntaAleatoria());
      }else{
        $d = array_merge($d, $this->c->model->getPreguntaAleatoriaTema($args['tema']));
      }
      return $this->c->view->render($response, '/pregunta.php', $d);
    }


    public function validarRespuesta($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      $d['tema_url'] = $args['tema'];
      $params = $request->getQueryParams();
      $d['correcta'] = $this->c->model->isRespuestaTrue($params['respuesta']);
      if($d['correcta']!=1) $d['respuesta_correcta'] = $this->c->model->gestRespuestaCorrecta($args['idpregunta']);
      return $this->c->view->render($response,"/validar.php", $d);
    }
}
?>
