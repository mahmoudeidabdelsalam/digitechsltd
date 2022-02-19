<?php
/* Template Name: our services */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about-page
 *
*/

get_header(); 
?>


<section class="slider-about" style="background-image: url('<?= the_field('image_our_seervices'); ?>');">
  <div class="container">
    <div class="row">
      <h2 class="col-12"><?= the_field('headline'); ?></h2>
      <div class="col-md-6 m-auto">
        <p><?= the_field('sub_headline'); ?></p>
      </div>
    </div>
  </div>
</section>



<section class="services-us-about">
  <div class="container">
   
    <?php
    if( have_rows('services') ):
      while( have_rows('services') ) : the_row();
    ?>
      <div class="row align-items-center">
        <div class="col-md-4 col-12 mt-5 mb-5">
          <h3><a href="<?= get_sub_field('link_services'); ?>"><?= get_sub_field('headline_services'); ?></a> <img src="<?= get_sub_field('icon_services'); ?>" alt="<?= get_sub_field('headline_services'); ?>"></h3>
          <p><?= get_sub_field('text_services'); ?></p>
        </div>
        <div class="col-md-8 col-12">
          <div class="info-box" style="background-image: url('<?= get_sub_field('image_services'); ?>');">
            <h3><a href="<?= get_sub_field('link_services'); ?>"><?= get_sub_field('headline_services'); ?></a></h3>
            <p><?= get_sub_field('text_services'); ?></p>
          </div>
        </div>
      </div>
    <?php
      endwhile;
    endif;
    ?>      
    
  </div>
</section>




<section class="contact-us">
  <div class="container">
    <div class="row">
      <h2 class="contact-head">Get in touch !</h2>
      <p class="contact-text">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups</p>
    </div>
    <div class="row">
      <div class="col-md-8 col-12 m-auto">
        <?=  do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>
