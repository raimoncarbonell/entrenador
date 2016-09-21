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
        <li><a class="actual" href="<?php echo $data['urlbase']; ?>">Home</a></li>
        <li><a href="<?php echo $data['urlbase']; ?>/index.php/temas">Preguntas por temas</a></li>
        <li><a href="<?php echo $data['urlbase']; ?>/index.php/pregunta/aleatoria">Preguntas aleatorias</a></li>
        <li><a href="<?php echo $data['urlbase']; ?>/index.php/pregunta/nueva">Crear Pregunta</a></li>
      </ul>
    </nav>
    <main>
      <section class="destacado">
        <p>Pequeña práctica del curso de desarrollo de aplicaciones web.</p>
        <p>Programa que te prepara para responder preguntas de tipo test sobre el tema elegido o sobre todos los temas en general.</p>
      </section>
    </main>
    <footer>
      Mi versión de la práctica.
    </footer>
  </body>
</html>
