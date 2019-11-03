<?php
$image = get_sub_field('image');
//echo '<pre>'; print_r($image); echo '</pre>';
?>

<figure class="wp-block-image full-width-image-row">
  <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
</figure>
