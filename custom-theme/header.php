<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?> <?php wp_title('|');?> - Portfólio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@200;300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
  <!-- header wordpress -->
  <?php wp_head(); ?>
  <!-- fim header wordpress -->
</head>
<body>
  <header>
    <nav class="menu">
      <?php 
        $args = [
          'menu' => 'principal',
          'container' => false
        ];
        wp_nav_menu($args);
      ?>
    </nav>
  </header>
  <div>