<?php
/* Template Name: about us */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about-page
 *
*/

get_header(); 
?>


<section class="slider-about" style="background-image: url('<?= the_field('image_about_us'); ?>');">
  <div class="container">
    <div class="row">
      <h2 class="col-12"><?= the_field('headline'); ?></h2>
      <div class="col-md-6 m-auto">
        <p><?= the_field('sub_headline'); ?></p>
      </div>
    </div>
  </div>
</section>


<section class="mission-vision">
  <div class="container">
    <div class="row justify-content-center align-items-center">

      <div class="col-md-6 col-12">
        <div class="in-box">
          <h3><?= the_field('mission_headline');?></h3>
          <p><?= the_field('mission_text');?></p>
        </div>
      </div>

      <div class="col-md-6 col-12">
        <img src="<?= the_field('mission_image');?>" alt="<?= the_field('mission_headline');?>">
      </div>

      <div class="col-md-6 col-12">
        <img src="<?= the_field('mission_image');?>" alt="<?= the_field('mission_headline');?>">
      </div>

      <div class="col-md-6 col-12">
        <div class="in-box">
          <h3><?= the_field('mission_headline');?></h3>
          <p><?= the_field('mission_text');?></p>
        </div>
      </div>
    </div>
  </div>      
</section>


<section class="values-us">
  <div class="values-head">
    <div class="container">
      <div class="row">
        <h2><?php _e('values', 'digitechsltd'); ?></h2>
      </div>
    </div>    
  </div>
  <div class="container">
    <div class="row">
      <?php
      if( have_rows('values') ):
        while( have_rows('values') ) : the_row();
      ?>
        <div class="col-md-6 col-12 mt-5 mb-5">
          <h3><?= get_sub_field('values_headline'); ?></h3>
          <p><?= get_sub_field('values_text'); ?></p>
        </div>
      <?php
        endwhile;
      endif;
      ?>      
    </div>
  </div>
</section>


<section class="team-us">
  <div class="team-head">
    <div class="container">
      <div class="row">
        <h2><?php _e('Our Team', 'digitechsltd'); ?></h2>
      </div>
    </div>    
  </div>
  <div class="container">
    <div class="row">
      <?php
      if( have_rows('our_team') ):
        while( have_rows('our_team') ) : the_row();
      ?>
        <div class="col-md-4 col-12 mb-5">
          <img class="avatar" src="<?= get_sub_field('team_image'); ?>" alt="<?= get_sub_field('team_name'); ?>">
          <h3 class="text-center"><?= get_sub_field('team_name'); ?></h3>
          <p class="text-center"><?= get_sub_field('team_text'); ?></p>
        </div>
      <?php
        endwhile;
      endif;
      ?>      
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
