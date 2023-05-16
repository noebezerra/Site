<?php 

// Funções para limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_post_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar menus
add_theme_support('menus');

// Habilitar SVG
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);
  return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

// CMB 2
function get_field2($key, $page_id = 0) {
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  return get_post_meta($id, $key, true);
}

function the_field2($key, $page_id = 0) {
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  echo get_field2($key, $id);
}

add_action('cmb2_admin_init', 'cmb2_fields_sobre');
function cmb2_fields_sobre() {
  $cmb = new_cmb2_box([
    'id' => 'sobre_box',
    'title' => 'Sobre',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-sobre.php'
    ]
  ]);

  $cmb->add_field([
    'name' => 'Sobre',
    'desc' => 'Descreva sobre você',
    'id' => 'sobre',
    'type' => 'wysiwyg'
  ]);
}

add_action('cmb2_admin_init', 'cmb2_fields_habilidades');
function cmb2_fields_habilidades() {
  $cmb = new_cmb2_box([
    'id' => 'habilidades_box',
    'title' => 'Habilidades',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'key' => 'page-habilidades.php',
    ],
  ]);

  $skills = $cmb->add_field([
    'id' => 'skills',
    'type' => 'group',
    'options' => [
      'group_title' => 'Skill {#}',
      'add_button' => 'Adicionar novo',
      'sortable' => true,
    ]
  ]);
  $cmb->add_group_field($skills, [
    'name' => 'Linguagem',
    'description' => 'Informe uma liguagem de programação',
    'id' => 'linguagem',
    'type' => 'text',
  ]);
  $cmb->add_group_field($skills, [
    'name' => 'Nível',
    'description' => 'Informe o nível de experiência de 1 a 10',
    'id' => 'nivel',
    'type' => 'text_small',
  ]);
}

add_action('cmb2_admin_init', 'cmb2_fields_experiencia');
function cmb2_fields_experiencia() {
  $cmb = new_cmb2_box([
    'id' => 'experiencia_box',
    'title' => 'Experiência',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-experiencia.php',
    ]
  ]);

  $emprego = $cmb->add_field([
    'id' => 'emprego',
    'type' => 'group',
    'options' => [
      'group_title' => 'Experiência {#}',
      'add_button' => 'Adicionar novo',
      'sortable' => true,
    ]
  ]);
  
  $cmb->add_group_field($emprego, [
    'name' => 'Empresa',
    'description' => 'Nome da empresa',
    'id' => 'empresa',
    'type' => 'text',
  ]);
  $cmb->add_group_field($emprego, [
    'name' => 'Cargo',
    'description' => 'Descrição do cargo',
    'id' => 'cargo',
    'type' => 'text',
  ]);
  $cmb->add_group_field($emprego, [
    'name' => 'Início',
    'description' => 'Data inicial',
    'id' => 'dtini',
    'type' => 'text_date',
    'date_format' => 'Y',
  ]);
  $cmb->add_group_field($emprego, [
    'name' => 'Fim',
    'description' => 'Data final (deixe em branco caso seja o cargo atual)',
    'id' => 'dtfim',
    'type' => 'text_date',
    'date_format' => 'Y',
  ]);
}

add_action('cmb2_admin_init', 'cmb2_fields_contato');
function cmb2_fields_contato() {
  $cmb = new_cmb2_box([
    'id' => 'contato_box',
    'title' => 'Contatos',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-contato.php'
    ]
  ]);

  $contato_redes_sociais = $cmb->add_field([
    'id' => 'redes_sociais',
    'type' => 'group',
    'options' => [
      'group_title' => 'Redes social {#}',
      'add_button' => 'Adicionar novo',
      'sortable' => true,
    ] 
  ]);
  
  $cmb->add_group_field($contato_redes_sociais, [
    'name' => 'Nome',
    'description' => 'Nome da rede social',
    'id' => 'nome',
    'type' => 'text',
  ]);
  $cmb->add_group_field($contato_redes_sociais, [
    'name' => 'Ícone',
    'description' => 'Ícone para a rede social',
    'id' => 'img',
    'type' => 'file',
    'options' => [
      'url' => false
    ],
    'query_args' => [
      'type' => [
        'image/svg',
      ]
    ]
  ]);
  $cmb->add_group_field($contato_redes_sociais, [
    'name' => 'Link',
    'description' => 'URL para a rede social',
    'id' => 'link',
    'type' => 'text_url',
    'protocols' => ['https', 'mailto'],
  ]);
}