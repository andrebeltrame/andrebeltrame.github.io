<section class="section testimonials padding-top-60 padding-bottom-150">
<div class="container-fluid">
  <div class="section-content row">
    <div class="col-md-12 col-lg-6 col-lg-offset-3 text-center">

    <?php if(get_sub_field('title')): ?>
      <h2><?php the_sub_field('title'); ?></h2>
    <?php endif; ?>

    </div>
    <div class="col-md-10 col-md-offset-1 text-center">
      <div class="container-testimonials <?php echo (get_sub_field('slider')) ? 'testimonials-slider' : '' ; ?>">
      <?php
        if(get_sub_field('slider')):
          $args = array (
            'post_type'              => array( 'testimonials' ),
            'posts_per_page'         => '-1',
            'order'                  => 'ASC',
            'orderby'                => 'menu_order'
          );
        else:
          $args = array (
            'post_type'              => array( 'testimonials' ),
            'posts_per_page'         => '1',
            'orderby'                => 'rand',
          );
        endif;

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            // do something
            get_template_part('templates/testimonials');
          }
        } else {
          // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();
      ?>


      </div>
      <?php if(get_sub_field('button')): ?>
        <a href="<?php echo get_sub_field('page'); ?>" class="btn btn-white btn-more btn-center-mobile">Outros Depoimentos</a>
      <?php endif; ?>
    </div>
  </div>
</div>
</section>
