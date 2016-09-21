<?php
class ControlerNewQuestions{
    private $c;

    public function __construct(Interop\Container\ContainerInterface $ci){
        $this->c = $ci;
    }


    public function cargarFormulario($request, $response, $args){
      $d['urlbase'] = $this->c->urlbase;
      $d['temas']   = $this->c->model->getTemas();
      return $this->c->view->render($response, '/formnewquestion.php', $d);
    }


    public function createNewQuestion($request, $response, $args){
      $params = $request->getParsedBody();
      $pregunta = $params['pregunta'];
      $tema = $this->c->model->registerTema($params['tema']); //devuelve el id del tema y si no existia lo registra.
      $respuestas = $params['respuestas'];
      $correcta = intval($params['correcta']);

      $msg = $this->c->model->registerQuestion($pregunta, $respuestas, $correcta, $tema);

      $d['urlbase'] = $this->c->urlbase;
      $d['temas']   = $this->c->model->getTemas();
      $d['msg']     = ($msg=="")?"Datos introducidos correctamente.":$msg;
      return $this->c->view->render($response, '/formnewquestion.php', $d);
    }
}
?>
