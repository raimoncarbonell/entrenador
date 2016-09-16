<?php
  require "vendor/autoload.php";

  use Slim\Views\PhpRenderer;

  $app = new \Slim\App();

  $con = $app->getContainer();
  $con['view'] = new PhpRenderer('view');
  $con['urlbase'] = "/oscar/entrenador";

  $app->get("/", function($request, $response, $args){
    $d['opcion'] = "home";
    $d['urlbase'] = $this->urlbase;
    return $this->view->render($response, '/estructura.php', $d);
  });

  $app->get("/temas", function($request, $response, $args){
    $d['opcion'] = "temas";
    $d['urlbase'] = $this->urlbase;
    return $this->view->render($response, '/estructura.php', $d);
  });

  $app->get("/pregunta/{tema}", function($request, $response, $args){
    $d['urlbase'] = $this->urlbase;
    if($args['tema']=="aleatoria"){
      $d['opcion'] = "pregrand";
    }else{
      $d['opcion'] = "pregtema";
    }
    return $this->view->render($response, '/estructura.php', $d);
  });


  $app->run();
 ?>
