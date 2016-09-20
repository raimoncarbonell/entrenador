<?php
class Controler{
    private $c;

    public function __construct(Interop\Container\ContainerInterface $ci){
        $this->c = $ci;
    }


    public function cargarHome($request, $response, $args){
      $d['opcion'][] = "home";
      $d['urlbase'] = $this->c->urlbase;
      return $this->c->view->render($response, '/estructura.php', $d);
    }


    public function cargarTemas($request, $response, $args){
      $d['opcion'][]  = "temas";
      $d['urlbase'] = $this->c->urlbase;
      $d['temas']   = $this->c->model->getTemas();
      return $this->c->view->render($response, '/estructura.php', $d);
    }


    public function cargarPregunta($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      $d['tema_url'] = $args['tema'];
      if($args['tema']=="aleatoria"){
        $d['opcion'][] = "pregrand";
        $d = array_merge($d, $this->c->model->getPreguntaAleatoria());
      }else{
        $d['opcion'][] = "pregtema";
        $d = array_merge($d, $this->c->model->getPreguntaAleatoriaTema($args['tema']));
      }
      return $this->c->view->render($response, '/estructura.php', $d);
    }


    public function validarRespuesta($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      $params = $request->getQueryParams();
      /*$d['opcion'][] = $params['opcion'];
      $d['opcion'][] = 'validar';
      $d['correcta'] = $this->c->model->isRespuestaTrue($params['respuesta']);
      return $this->c->view->render($response,"/estructura.php", $d);*/

      if($this->c->model->isRespuestaTrue($params['respuesta'])) echo "correcta";
      else echo "incorrecta";
      die();
    }
}
?>
