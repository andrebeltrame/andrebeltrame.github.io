<?php
/**
 * Template Name: Conteúdo Flexível
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php
  if( have_rows('flex_content') ):
    while ( have_rows('flex_content') ) : the_row();
      get_template_part('templates/flexible', get_row_layout());
    endwhile;
  else:
    // no layout found
    get_template_part('templates/flexible', '404');
  endif;
  ?>
<?php endwhile; ?>
