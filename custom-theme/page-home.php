<?php 
  // Template Name: Home

  get_header(); 
?>
<div>
  <div class="main">
    <div class="identidade">
      <h1>NOÉ <span>//</span></h1>
      <h2>Front end & Back end Developer</h2>
    </div>
    <div class="scroll-down">
      <img src="<?php echo get_stylesheet_directory_uri() ?>/imgs/scroll-down.svg" alt="Scroll Down">
      <p>Scroll</p>
    </div>
  </div>
  <div id="sobre" class="container">
    <?php 
      $sobre = new WP_Query(['pagename' => 'sobre']);
      $sobre_id = $sobre->post->ID;
    ?>
    <h1 class="title"><?php echo get_the_title($post = $sobre_id); ?></h1>
    <?php echo get_the_content($post = $sobre_id); ?>
  </div>
  <div id="habilidades" class="container">
    <?php
      $habilidades = new WP_Query(['pagename' => 'habilidades']);
      $habilidades_id = $habilidades->post->ID;
    ?>
    <h1 class="title"><?php echo get_the_title($post = $habilidades_id); ?></h1>
    <ul class="lista-habilidades">
      <?php
        $skills = get_field2('skills', $habilidades_id);
        foreach ($skills as $skill) :
      ?>
      <li>
        <p><?php echo $skill['linguagem']; ?></p>
        <div class="nivel nivel-<?php echo$skill['nivel']; ?>"></div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div id="experiencia" class="container">
    <?php 
      $experiencia = new WP_Query(['pagename' => 'experiencia']);
      $experiencia_id = $experiencia->post->ID;
    ?>
    <h1 class="title"><?php echo get_the_title($post = $experiencia_id); ?></h1>
    <div class="lista-experiencia">
      <?php
        $empregos = get_field2('emprego', $experiencia_id);
        $empresa = null;
        foreach ($empregos as $key => $emprego) :
          $dtfim = $emprego['dtfim'] ? $emprego['dtfim'] : 'presente';
      ?>
      <?php if ($empresa == $emprego['empresa']) : ?>
        <li>
          <p><?php echo $emprego['cargo']; ?></p>
          <p><?php echo $emprego['dtini'] .' - '. $dtfim; ?></p>
        </li>
      <?php else : ?>
        <?php if ($key > 0): ?>
        </ul>
        <? endif; ?>
        <ul>
          <li>
            <h3><?php echo $emprego['empresa']; ?></h3>
            <p><?php echo $emprego['cargo']; ?></p>
            <p><?php echo $emprego['dtini'] .' - '. $dtfim; ?></p>
          </li>
      <?php endif; ?>
      <?php $empresa = $emprego['empresa']; ?>
      <?php endforeach; ?>
    </div>
  </div>
<?php get_footer(); ?>
