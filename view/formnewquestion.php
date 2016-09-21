<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Entrenador de exámenes</title>
    <link href="<?php echo $data['urlbase']; ?>/view/css/estilos.css" rel="stylesheet">
    <script src="<?php echo $data['urlbase']; ?>/view/js/utils.js"></script>
  </head>
  <body>
    <header>
      <h1>Entrenador de exámenes</h1>
    </header>
    <nav>
      <ul>
        <li><a href="<?php echo $data['urlbase']; ?>">Home</a></li>
        <li><a href="<?php echo $data['urlbase']; ?>/index.php/temas">Preguntas por temas</a></li>
        <li><a href="<?php echo $data['urlbase']; ?>/index.php/pregunta/aleatoria">Preguntas aleatorias</a></li>
        <li><a class="actual" href="<?php echo $data['urlbase']; ?>/index.php/pregunta/nueva">Crear pregunta</a></li>
      </ul>
    </nav>
    <main>
      <?php
        if(isset($data['msg'])){
          echo "<section class='msg'><span class='button' onclick='cierra(\".msg\");'>x</span>${data['msg']}</section>";
        }
      ?>
      <h2>Introduce los datos para la nueva pregunta</h2>
      <form id="newquestion" method="post" action="<?php echo $data['urlbase']; ?>/index.php/pregunta/nueva" class="destacado">
        <datalist id="temas">
          <?php
          foreach ($data['temas'] as $tema) {
            echo "<option value='${tema['titulo']}'>";
          }
          ?>
        </datalist>
        <label>TEMA PREGUNTA &nbsp;<input type="text" name="tema" list="temas" placeholder="tema pregunta"><span>(selecciona un tema de la lista o teclea uno nuevo)</span></label>
        <label>NUEVA PREGUNTA <input type="text" name="pregunta" placeholder="nueva pregunta"></label>
        <fieldset>
          <legend>Respuestas</legend>
          <input type="button" id="mas" value="+" onclick="nuevoInputRespuesta();">
          <input type="text" name="respuestas[]" placeholder="posible respuesta"><input type="radio" name="correcta" value="0">correcta
        </fieldset>
        <input type="submit" value="Registrar pregunta">
      </form>
    </main>
    <footer>
      Mi versión de la práctica.
    </footer>
  </body>
</html>
