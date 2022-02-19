<?php
/* Template Name: Home Page */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#hom-page
 *
*/

get_header(); 
?>

<section class="slider-us">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      $counter = 0;
      if( have_rows('slider_home') ):
        while( have_rows('slider_home') ) : the_row();
        $counter++;
      ?>
        <div class="carousel-item <?= ($counter == 1)? 'active':''; ?>">
          <img src="<?= get_sub_field('image_slider'); ?>" class="d-block w-100" alt="slide">
          <div class="carousel-caption d-none d-md-block">
            <?= get_sub_field('content_slider'); ?>
            <a class="readmore" href="<?= get_sub_field('page_slider'); ?>">see more ...</a>
          </div>
        </div>
      <?php
        endwhile;
      endif;
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>
</section>

<section class="about-us">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-12">
        <h2><span><?= get_field('headline_about_us'); ?></span> <?= get_field('headline_about_us'); ?></h2>
        <p><?= get_field('content_about_us'); ?></p>
      </div>
      <div class="col-md-5 col-12">
        <div class="embed-container">
          <?= the_field('video_about_us'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="counter-us">
  <div class="container">
    <div class="row">
      <?php
      if( have_rows('counter_information') ):
        while( have_rows('counter_information') ) : the_row();
      ?>
        <div class="col-md-3 col-12">
          <div class="box-counter">
            <img src="<?= get_sub_field('icon_counter'); ?>" alt="<?= get_sub_field('text_counter'); ?>">
            <span class="counter"><?= get_sub_field('numbers_counter'); ?></span>
            <span class="text"><?= get_sub_field('text_counter'); ?></span>
          </div>
        </div>
      <?php
        endwhile;
      endif;
      ?>      
    </div>
  </div>
</section>

<?php 
$terms = get_terms( array(
  'taxonomy' => 'services-tag',
  'hide_empty' => false,
) );
?>
<section class="services-us">
  <div class="container">
    <div class="row">
      <h2 class="services-head">Services We Offer</h2>
      <p class="services-text">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups</p>
    </div>
    <div class="row pt-5">
      <div class="col-12">
        <h3>Browse by Categories</h3>
      </div>

      <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true">
              <?php _e('Show all', 'digitechsltd'); ?>
            </a>
          <?php 
          $counter=0;
            foreach ($terms  as $term): 
            $counter++;
            ?>
            <a class="nav-link" id="v-pills-<?= $term->term_id; ?>-tab" data-toggle="pill" href="#v-pills-<?= $term->term_id; ?>" role="tab" aria-controls="v-pills-<?= $term->term_id; ?>" aria-selected="true">
              <img src="<?= the_field('icon_term', 'services-tag' . '_' . $term->term_id); ?>" alt="">
              <?= $term->name; ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane show active fade" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
            <div class="row">
              <?php 
                $all = array(
                  'post_type' => 'services',
                );
                $query_all = new WP_Query( $all );
              ?>
              <?php 
                if ( $query_all->have_posts() ):
                  while ( $query_all->have_posts() ):
                    $query_all->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
              ?>
                <div class="col-md-4 col-12">
                  <div class="card">
                    <img src="<?= $featured_img_url; ?>" class="card-img-top" alt="<?= the_title(); ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?= the_title(); ?></h5>
                      <p class="card-text"><?=  wp_trim_words( get_the_content(), 5 ); ?></p>
                    </div>
                  </div>
                </div>
              <?php 
                  endwhile; 
                endif; 
              wp_reset_postdata(); 
              ?>
            </div>
           </div>

        <?php 
          $counter=0;
            foreach ($terms  as $term): 
            $counter++;
            ?>
            <div class="tab-pane fade" id="v-pills-<?= $term->term_id; ?>" role="tabpanel" aria-labelledby="v-pills-<?= $term->term_id; ?>-tab">
            <div class="row">

            <?php 
            $args = array(
              'post_type' => 'services',
              'tax_query' => array(
                array(
                  'taxonomy' => 'services-tag',
                  'field' => 'term_id',
                  'terms' => $term->term_id
                )
              )
            );
              
            $query = new WP_Query( $args );
            ?>

            <?php 
              if ( $query->have_posts() ):
                while ( $query->have_posts() ):
                  $query->the_post();
                  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
            ?>

              <div class="col-md-4 col-12">
                <div class="card">
                  <img src="<?= $featured_img_url; ?>" class="card-img-top" alt="<?= the_title(); ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?= the_title(); ?></h5>
                    <p class="card-text"><?=  wp_trim_words( get_the_content(), 5 ); ?></p>
                  </div>
                </div>
              </div>

            <?php 
                endwhile; 
              endif; 
            wp_reset_postdata(); 
            ?>


            </div>
              
            </div>
          <?php endforeach; ?>
        </div>
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
