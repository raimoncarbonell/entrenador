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
        <li><a href="<?php echo $data['urlbase']; ?>">Home</a></li>
        <li><a <?php if($data['tema_url']!="aleatoria") echo 'class="actual"'; ?> href="<?php echo $data['urlbase']; ?>/index.php/temas">Preguntas por temas</a></li>
        <li><a <?php if($data['tema_url']=="aleatoria") echo 'class="actual"'; ?> href="<?php echo $data['urlbase']; ?>/index.php/pregunta/aleatoria">Preguntas aleatorias</a></li>
      </ul>
    </nav>
    <main>
      <h2>
        <?php
          if($data['correcta']==1){
            echo "Respuesta correcta!!! Sigue así!!";
          }else{
            echo "Respuesta incorrecta!! La respuesta era: <span class='destacado'>${data['respuesta_correcta']}</span>";
          }
        ?>
      </h2>
      <p>
        <?php
          echo "<a href='${data['urlbase']}/index.php/pregunta/${data['tema_url']}'>Siguiente pregunta&gt;&gt;&gt;</a>";
        ?>
      </p>
    </main>
    <footer>
      Mi versión de la práctica.
    </footer>
  </body>
</html>
