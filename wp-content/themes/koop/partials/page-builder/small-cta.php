<?php
$image = get_sub_field('image');
?>

<div class="cta-item">
  <?php if( !empty( $image ) ): ?>
    <div class="cta-image">
      <img src="<?= esc_url($image['url']); ?>" alt="<?= esc_attr($image['alt']); ?>" />
    </div>
  <?php endif; ?>

  <div class="cta-content">
    <h3 class="title"><?= get_sub_field('title'); ?></h3>
    <p class="cta-item-content"><?= get_sub_field('description'); ?></p>
    <?php if(!empty( get_sub_field('button_link') )) { ?><a href="<?= get_sub_field('button_link'); ?>" class="btn btn-outline-light"><?= get_sub_field('button_text'); ?></a><?php } ?>
  </div>
</div>
