<?php
  require "vendor/autoload.php";
  require "control/controler.php";

  use Slim\Views\PhpRenderer;

  $app = new \Slim\App();

  $con = $app->getContainer();
  $con['view'] = new PhpRenderer('view');
  $con['urlbase'] = "/oscar/entrenador";

  //URLs publicas
  $app->get("/", "\Controler:cargarHome");
  $app->get("/temas", "\Controler:cargarTemas");
  $app->get("/pregunta/{tema}", "\Controler:cargarPregunta");


  $app->run();
 ?>
