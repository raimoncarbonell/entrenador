<?php
class Controler{
    private $c;

    public function __construct(Interop\Container\ContainerInterface $ci){
        $this->c = $ci;
    }


    public function cargarHome($request, $response, $args){
      $d['opcion'] = "home";
      $d['urlbase'] = $this->c->urlbase;
      return $this->c->view->render($response, '/estructura.php', $d);
    }


    public function cargarTemas($request, $response, $args){
      $d['opcion'] = "temas";
      $d['urlbase'] = $this->c->urlbase;
      return $this->c->view->render($response, '/estructura.php', $d);
    }


    public function cargarPregunta($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      if($args['tema']=="aleatoria"){
        $d['opcion'] = "pregrand";
      }else{
        $d['opcion'] = "pregtema";
      }
      return $this->c->view->render($response, '/estructura.php', $d);
    }
}
?>
