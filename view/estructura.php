<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Entrenador de exámenes</title>
    <link href="<?php echo $data['urlbase']; ?>/view/css/estilos.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1>Entrenador de exámenes</h1>
    </header>
    <nav>
      <ul>
        <li><a <?php if($data['opcion'][0]=="home") echo 'class="actual"'; ?> href="<?php echo $data['urlbase']; ?>">Home</a></li>
        <li><a <?php if($data['opcion'][0]=="temas" || $data['opcion'][0]=="pregtema") echo 'class="actual"'; ?> href="<?php echo $data['urlbase']; ?>/index.php/temas">Preguntas por temas</a></li>
        <li><a <?php if($data['opcion'][0]=="pregrand") echo 'class="actual"'; ?> href="<?php echo $data['urlbase']; ?>/index.php/pregunta/aleatoria">Preguntas aleatorias</a></li>
      </ul>
    </nav>
    <main>
      <?php
        if(isset($data['opcion'][1]) && $data['opcion'][1]=="validar"){
          require_once "validar.php";
        }else{
          switch ($data['opcion'][0]) {
            case 'home':
              require_once "home.php";
              break;
            case 'temas':
              require_once "temas.php";
              break;
            case 'pregtema':
              require_once "pregunta.php";
              break;
            case 'pregrand':
              require_once "pregunta.php";
              break;
          }
        }
      ?>
    </main>
    <footer>
      Mi versión de la práctica.
    </footer>
  </body>
</html>
