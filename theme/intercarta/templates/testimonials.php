<div class="wrapper-testimonial">
  <div class="testimonial">
    <div class="content ellipsis">
      <?php the_content();  ?>
      <p class="author"><?php the_field('name');  ?></p>
    </div>
    <a href="#" class="read-more">Continuar lendo</a>
  </div>
  <div class="logo" style="background-image: url('<?php echo get_home_url(null, get_field('logo')); ?>');">
    <?php the_title(); ?>
  </div>
</div>
