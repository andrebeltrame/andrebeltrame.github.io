<?php get_template_part('templates/page', 'header'); ?>
<div class="container blog-container">
	<div class="col-md-8">
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="post-entry">
    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('post-image') ?></a>
    <p class="category-title"><?php the_category( ', ' ); ?></p>
    <h2>
        <a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    </h2>
    <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>

    <?php the_excerpt('Leia mais') ?>
    
    </div>
    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>

	</div>
	
	<div class="col-md-4">
		<?php get_sidebar() ?>
	</div>	
	
</div>