<?php
  $background = get_field('header_bg', 'option');
?>

<header class="Head"  role="banner" style="background-image: url('<?= $background["url"];?>')">

  <div class="Head-navigation navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="Head-logo" href="<?php echo esc_url(home_url('/')); ?>"></a>
      <!-- <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a> -->
    </div>

    <nav class="collapse navbar-collapse navbar-custom" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav '));
        endif;
      ?>
    </nav>
  </div>
  </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                </div>
            </div>
        </div>
    </header>


