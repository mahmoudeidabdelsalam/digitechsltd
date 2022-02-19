<?php
/* Template Name: Contact US */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about-page
 *
*/

get_header(); 
?>


<section class="slider-about" style="background-image: url('<?= the_field('image_contact_us'); ?>');">
  <div class="container">
    <div class="row">
      <h2 class="col-12"><?= the_field('headline'); ?></h2>
      <div class="col-md-6 m-auto">
        <p><?= the_field('sub_headline'); ?></p>
      </div>
    </div>
  </div>
</section>



<section class="contsct-us-info">
  <div class="container">
    <div class="info-row">
      <div class="information-box-row">
        <?php
        if( have_rows('contact_us_information') ):
          while( have_rows('contact_us_information') ) : the_row();
        ?>
          <div class="information-box">
            <h3><?= get_sub_field('headline'); ?></h3>
            <p><?= get_sub_field('content'); ?></p>
          </div>
        <?php
          endwhile;
        endif;
        ?>  
        <div class="information-box">
          <h3><?= _e('Social Media', 'digitechsltd'); ?></h3>
          <ul class="social-media">
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
      <div class="map-contact-us">
        <?= the_field('map_embed'); ?>
      </div>
    </div>
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
