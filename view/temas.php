<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <li><a class="actual" href="<?php echo $data['urlbase']; ?>/index.php/temas">Preguntas por temas</a></li>
        <li><a href="<?php echo $data['urlbase']; ?>/index.php/pregunta/aleatoria">Preguntas aleatorias</a></li>
      </ul>
    </nav>
    <main>
      <h2>Temas disponibles</h2>
      <ul id="temas">
        <?php
          foreach ($data['temas'] as $tema) {
            echo "<li><a href='${data['urlbase']}/index.php/pregunta/${tema['titulo_url']}'>${tema['titulo']}</a></li>";
          }
        ?>
      </ul>
    </main>
    <footer>
      Mi versión de la práctica.
    </footer>
  </body>
</html>
