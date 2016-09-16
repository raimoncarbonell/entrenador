<h2>Temas disponibles</h2>
<ul>
  <?php
    foreach ($data['temas'] as $tema) {
      echo "<li><a href='${data['urlbase']}/index.php/pregunta/${tema['titulo_url']}'>${tema['titulo']}</a></li>";
    }
  ?>
</ul>
