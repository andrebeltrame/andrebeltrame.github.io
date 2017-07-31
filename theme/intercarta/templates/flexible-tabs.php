<section class="section section-tabs">
<?php
  // check if the repeater field has rows of data
  if( have_rows('tab') ):
?>
    <ul class="nav nav-tabs" role="tablist">
    <?php
    // loop through the rows of data
    $active = 'active';
    while ( have_rows('tab') ) : the_row();
    ?>
      <li role="presentation" class="<?php echo $active; $active = ''; ?> <?php echo sanitize_title(get_sub_field('name')); ?>">
        <a href="#<?php echo sanitize_title(get_sub_field('name')); ?>" aria-controls="<?php echo sanitize_title(get_sub_field('name')); ?>" role="tab" data-toggle="tab"><span><?php the_sub_field('name'); ?></span></a>
      </li>
    <?php
    endwhile;
    ?>
    </ul>

    <div class="tab-content">
    <?php
    // loop through the rows of data
    $active = 'in active';
    while ( have_rows('tab') ) : the_row();
    ?>
      <div role="tabpanel" class="tab-pane fade <?php echo $active; $active = ''; ?> <?php echo sanitize_title(get_sub_field('name')); ?>" id="<?php echo sanitize_title(get_sub_field('name')); ?>">

        <?php
        if( have_rows('tab_content') ):
          while ( have_rows('tab_content') ) : the_row();
            get_template_part('templates/flexible', get_row_layout());
          endwhile;
        else:
          // no layout found
          get_template_part('templates/flexible', '404');
        endif;
        ?>

      </div>
    <?php
    endwhile;
    ?>
    </div>

<?php
  endif;
?>
</section>
