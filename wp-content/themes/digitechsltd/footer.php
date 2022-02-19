<?php
/** 
 * The theme footer.
 * 
 * @package bootstrap-basic4
 */
?>

    <footer id="site-footer" class="site-footer page-footer">
     <div class="container">
       <div class="row justify-content-center align-items-center">
         <div class="col-md-3 col-12">
          <a href="<?php echo esc_url(home_url('/')); ?>"
              title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
              <img class="img-fluid" src="<?=get_theme_file_uri().'/assets/img/logo.png' ?>"
                alt="<?=get_bloginfo('name', 'display') ?>" title="<?=get_bloginfo('name') ?>" />
              <span class="sr-only"> <?=get_bloginfo('name') ?> </span>
            </a>
         </div>
         <div class="col-md-6 col-12 text-center">
           <p><?= get_field('copy_right', 'option'); ?></p>
         </div>
         <div class="col-md-3 col-12">
            <ul class="list-inline text-right">
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
    </footer>

    <?php wp_footer(); ?> 
  </body>
</html>
