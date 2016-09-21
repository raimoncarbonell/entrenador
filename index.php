<?php
  require "vendor/autoload.php";
  require "control/controler.php";
  require "control/controlernewquestion.php";
  require "model/preguntas.php";

  use Slim\Views\PhpRenderer;

  $app = new \Slim\App();

  $con = $app->getContainer();
  $con['view'] = new PhpRenderer('view');
  $con['model'] = new Pregunta();
  $con['urlbase'] = "/oscar/entrenador";

  //URLs para crear nuevas preguntas
  $app->get("/pregunta/nueva", "\ControlerNewQuestions:cargarFormulario");
  $app->post("/pregunta/nueva", "\ControlerNewQuestions:createNewQuestion");

  //URLs publicas
  $app->get("/", "\Controler:cargarHome");
  $app->get("/temas", "\Controler:cargarTemas");
  $app->get("/pregunta/{tema}", "\Controler:cargarPregunta");
  $app->get("/pregunta/{tema}/validar/{idpregunta}", "\Controler:validarRespuesta");

  $app->run();
 ?>
