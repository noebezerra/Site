  <footer id="contato">
    <?php
      $contato = new WP_Query(['pagename' => 'contato']);
      $contato_id = $contato->post->ID;
    ?>
    <div class="line"></div>
    <ul class="redes-sociais">
      <?php
        $redes_sociais = get_field2('redes_sociais', $contato_id);
        foreach ($redes_sociais as $rede_social) :
      ?>
      <li><a href="<?php echo $rede_social['link']; ?>"><img src="<?php echo $rede_social['img']; ?>" alt="<?php echo $rede_social['nome']; ?>"></a></li>
      <?php endforeach; ?>
    </ul>
    <!-- footer wordpress -->
    <?php wp_footer(); ?>
    <!-- fim footer wordpress -->
  </footer>
</div>
</body>
</html>