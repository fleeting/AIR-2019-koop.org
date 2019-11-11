<?php
/* Fields:
get_sub_field('title');
get_sub_field('description');
get_sub_field('image');
get_sub_field('button_text');
get_sub_field('button_link');
*/

$image = get_sub_field('image');
?>

<!-- TODO: Style small (inline) CTA. -->
<div class="cta-item">

  <?php if( !empty( $image ) ): ?>
    <div class="cta-image">
      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>
  <?php endif; ?>

  <div class="cta-content">
    <h3 class="title"><?php echo get_sub_field('title'); ?></h3>
    <p class="cta-item-content"><?php echo get_sub_field('description'); ?></p>
    <a href="#" class="btn btn-outline-light"><?php echo get_sub_field('button_text'); ?></a>
  </div>

</div>
