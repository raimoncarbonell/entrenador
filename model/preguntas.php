<?php
  class Pregunta {
    private $con;

    public function __construct(){
        $this->con = new PDO("mysql:host=localhost;dbname=entrenador", "root");
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getTemas(){
      $sql = "select * from temas;";
      $res = $this->con->query($sql);
      return $res->fetchAll();
    }


    public function getPreguntaAleatoriaTema($tema_url){
      $sql = "select t.titulo as tema, p.id, p.pregunta from preguntas p, temas t where p.tema=t.id and t.titulo_url='$tema_url' order by RAND() limit 1;";
      return $this->getPregunta($sql);
    }


    public function getPreguntaAleatoria(){
      $sql = "select t.titulo as tema, p.id, p.pregunta from preguntas p, temas t where p.tema=t.id order by RAND() limit 1;";
      return $this->getPregunta($sql);
    }


    public function isRespuestaTrue($id){
      $sql = "select verdadera from respuestas where id=$id;";
      $res = $this->con->query($sql);
      return ($res->fetch()['verdadera']==1);
    }

    public function gestRespuestaCorrecta($preguntaID){
      $sql = "select respuesta from respuestas where pregunta=$preguntaID;";
      $res = $this->con->query($sql);
      return $res->fetch()['respuesta'];
    }


    public function registerTema($tema){
      $sqlSel = "select id from temas where titulo='$tema';";
      $res = $this->con->query($sqlSel);
      $res = $res->fetch();
      // si ya existe el tema devolvemos su id
      if($res) return $res['id'];

      //si no existe el tema, lo creamos
      //generar titulo para la url
      $titulo_url = str_replace(' ', '', $tema);
      $titulo_url=strtolower($titulo_url);
      $titulo_url=str_replace('áéíóúñ', 'aeioun', $titulo_url);

      $sql = "insert into temas(titulo, titulo_url) values('$tema', '$titulo_url');";
      $this->con->exec($sql);

      $res = $this->con->query($sqlSel);
      return $res->fetch()['id'];
    }


    public function registerQuestion($pregunta, $respuestas, $correcta, $tema){
      //añadir pregunta
      $sql = "insert into preguntas(pregunta, tema) values('$pregunta', $tema)";
      $this->con->exec($sql);

      //obtener id de pregunta
      $sql = "select id from preguntas where pregunta='$pregunta'";
      $idpreg = $this->con->query($sql)->fetch()['id'];

      //añadir respuestas
      foreach ($respuestas as $i => $r) {
        $verdadera = 0; if($i==$correcta) $verdadera=1;
        $sql = "insert into respuestas(respuesta, verdadera, pregunta) values('$r', $verdadera, $idpreg);";
        $this->con->exec($sql);
      }

      return $this->con->errorInfo()[2];
    }


    private function getRespuestas($preguntaID){
      $sql = "select id, respuesta from respuestas where pregunta=$preguntaID;";
      $res = $this->con->query($sql);
      if($res)return $res->fetchAll();
      else return [];
    }


    private function getPregunta($sql){
      $res = $this->con->query($sql);
      if($res){
        $aux = $res->fetch();
        $out['pregunta'] = $aux['pregunta'];
        $out['tema'] = $aux['tema'];
        $out['id'] = $aux['id'];
        $out['respuestas'] = $this->getRespuestas($aux['id']);
      }else{
        $out['pregunta'] = "";
        $out['respuestas'] = [];
      }
      return $out;
    }
  }
?>
