<?php
/**
 * @package LAGD
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo get_theme_file_uri('dist/bundle.css'); ?>" rel="stylesheet" />

    <?php if (isset($_SERVER['ENV']) && $_SERVER['ENV'] === 'dev') { ?>
      <script src="http://localhost:35729/livereload.js"></script>
    <?php } ?>

    <?php wp_head(); ?>
  </head>

  <body>
