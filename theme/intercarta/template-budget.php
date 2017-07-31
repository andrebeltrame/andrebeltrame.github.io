<?php
/**
 * Template Name: Orçamento
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <section <?php post_class('section budget-section')?>>
    <?php the_content(); ?>
  </section>
<?php endwhile; ?>
