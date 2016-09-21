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
        <li><a <?php if($data['tema_url']!="aleatoria") echo 'class="actual"'; ?> href="<?php echo $data['urlbase']; ?>/index.php/temas">Preguntas por temas</a></li>
        <li><a <?php if($data['tema_url']=="aleatoria") echo 'class="actual"'; ?> href="<?php echo $data['urlbase']; ?>/index.php/pregunta/aleatoria">Preguntas aleatorias</a></li>
      </ul>
    </nav>
    <main>
      <h2>
        Responde a la pregunta
        <?php
          if($data['tema_url']=="aleatoria") echo "aleatoria";
        ?>
      </h2>
      <p><strong>tema: </strong><?php echo $data['tema']; ?></p>
      <?php if($data['pregunta']!=""){ ?>
        <form method="get" action="<?php echo "${data['urlbase']}/index.php/pregunta/${data['tema_url']}/validar/${data['id']}" ?>" class="destacado">
          <?php
            foreach ($data['respuestas'] as $r) {
              echo "<label><input type='radio' name='respuesta' value='${r["id"]}'>${r["respuesta"]}</label>";
            }
          ?>
          <input type="submit" value="responder">
        </form>
        <p>
          <?php
            echo "<a href='${data['urlbase']}/index.php/pregunta/${data['tema_url']}'>Siguiente pregunta&gt;&gt;&gt;</a>";
          ?>
        </p>
      <?php } else { ?>
        <p>No hay preguntas.</p>
      <?php } ?>
      <?php print_r($data); ?>
    </main>
    <footer>
      Mi versión de la práctica.
    </footer>
  </body>
</html>
