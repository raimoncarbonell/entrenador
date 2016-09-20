<h2>
  Responde a la pregunta
  <?php
    if($data['opcion'][0]=="pregrand") echo "aleatoria";
  ?>
</h2>
<p><strong>tema: </strong><?php echo $data['tema']; ?></p>
<?php if($data['pregunta']!=""){ ?>
  <form method="get" action="<?php echo $data['urlbase']; ?>/index.php/validar/<?php echo$data['id']; ?>" class="destacado">
    <input type="hidden" name="opcion" value="<?php echo $data['opcion'][0]; ?>">
    <h3><?php echo $data['pregunta']; ?></h3>
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
