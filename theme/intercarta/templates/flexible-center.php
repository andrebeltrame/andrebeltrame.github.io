<?php
  $fullBGClass = (get_sub_field('full-bg')) ? 'section-full-bg' : '';
  $fullBGClass = (get_sub_field('color-overlayer')) ? $fullBGClass . ' section-full-bg-overlay' : $fullBGClass;
  $inline = "";
  if(get_sub_field('full-bg')) {
    if(get_sub_field('bg-rand')){
      $images = get_sub_field('img-rand');
      if($images) {
        $rand = array_rand($images, 1);
        $image = get_home_url(null, $images[$rand]['url']);
        $inline = "style='background-image:url($image)'";
      }
    } else {
      $image = get_home_url(null, get_sub_field('image'));
      $inline = "style='background-image:url($image)'";
    }
  }
?>

<section class="section <?php echo get_sub_field('class'); ?> <?php echo $fullBGClass; ?>" <?php echo $inline; ?>>
<div class="container-fluid">
  <div class="section-content row">
    <div class="col-md-12 col-lg-8 col-lg-offset-2 text-center">
      <?php the_sub_field('content'); ?>
    </div>
  </div>
</div>
</section>
