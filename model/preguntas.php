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
