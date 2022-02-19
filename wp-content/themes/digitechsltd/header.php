<?php
/**
 * The theme header.
 * 
 * @package bootstrap-basic4
 */

$container_class = apply_filters('bootstrap_basic4_container_class', 'container');
if (!is_scalar($container_class) || empty($container_class)) {
    $container_class = 'container';
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <!--WordPress head-->
  <?php wp_head(); ?>
  <!--end WordPress head-->
</head>

<body <?php body_class(); ?>>
  
  <?php if (function_exists('wp_body_open')) { wp_body_open();} ?>

  <div class="<?php echo $container_class; ?> page-container">
    <header class="page-header page-header-sitebrand-topbar">

      <div class="row row-with-vspace site-branding">
        <div class="col">
          <ul class="list-inline">
            <?php
            if( have_rows('contact_us', 'option') ):
              while( have_rows('contact_us', 'option') ) : the_row();
            ?>
            <li class="list-inline-item">
              <img src="<?= get_sub_field('icon_contact'); ?>" alt="<?= get_sub_field('text_contact'); ?>">
              <span><?= get_sub_field('text_contact'); ?></span>
            </li>
            <?php
              endwhile;
            endif;
            ?>
          </ul>
        </div>
        <div class="col">
          <serach></serach>
        </div>
      </div>


      <div class="row main-navigation">
        <div class="col col-xs-12">
          <h1 class="site-title-heading">
            <a href="<?php echo esc_url(home_url('/')); ?>"
              title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
              <img class="img-fluid" src="<?=get_theme_file_uri().'/assets/img/logo.png' ?>"
                alt="<?=get_bloginfo('name', 'display') ?>" title="<?=get_bloginfo('name') ?>" />
              <span class="sr-only"> <?=get_bloginfo('name') ?> </span>
            </a>
          </h1>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bootstrap-basic4-topnavbar"
            aria-controls="bootstrap-basic4-topnavbar" aria-expanded="false"
            aria-label="<?php esc_attr_e('Toggle navigation', 'bootstrap-basic4'); ?>">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div class="col">
          <div class="row m-0">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div id="bootstrap-basic4-topnavbar" class="collapse navbar-collapse">
                <?php 
                wp_nav_menu(
                  array(
                    'depth' => '2',
                    'theme_location' => 'primary', 
                    'container' => false, 
                    'menu_id' => 'bb4-primary-menu',
                    'menu_class' => 'navbar-nav mr-auto', 
                    'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                  )
                ); 
                ?>
              </div>
              <div class="clearfix"></div>
            </nav>
            <ul class="list-inline">
              <?php
              if( have_rows('social_media', 'option') ):
                while( have_rows('social_media', 'option') ) : the_row();
              ?>
                <li class="list-inline-item">
                  <a href="<?= get_sub_field('link_social_media'); ?>"><img src="<?= get_sub_field('icon_social_media'); ?>" alt="<?= get_sub_field('text_contact'); ?>"></a>
                </li>
              <?php
                endwhile;
              endif;
              ?>
            </ul>
          </div>
        </div>
      </div>
      <!--.main-navigation-->

    </header>
    <!--.page-header-->

  </div>