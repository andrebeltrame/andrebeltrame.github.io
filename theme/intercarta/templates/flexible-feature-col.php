<?php
  $class = get_sub_field('class');
  $length = count(get_sub_field('feature'));
  $colSize = 12 / $length;
?>
<?php if( have_rows('feature') ): ?>
<section class="section features <?php echo $class; ?>">
  <div class="container-fluid">
    <div class="section-content row">
      <?php while ( have_rows('feature') ) : the_row(); ?>
      <div class="col-md-<?php echo $colSize; ?> text-center feature <?php get_sub_field('class') ?>">
        <div class="feature-image">
          <img src="<?php echo get_home_url(null, get_sub_field('imagem')); ?>" alt="" class="img-responsive center-block">
        </div>
        <?php the_sub_field('content') ?>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>
