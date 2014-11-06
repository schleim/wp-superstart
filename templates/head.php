<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>

  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri()); ?>/build/css/bootstrap.css" type="text/css" media="screen">
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri()); ?>/build/css/main.css" type="text/css" media="screen">
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  <script href="<?php echo esc_url( get_template_directory_uri()); ?>/build/vendor/modernizr.custom.min.js"></script>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?php echo esc_url( get_template_directory_uri()); ?>/build/js/all.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php if ( is_user_logged_in() ) { ?>

    <?php } ?>
</head>
