<!-- TODO: Style accordions. -->
<h2><?= get_sub_field('title'); ?></h2>

<?php if( have_rows('rows') ): ?>
  <?php while ( have_rows('rows') ) : the_row(); ?>
    <h3><?= get_sub_field('title'); ?></h3>
    <p><?= get_sub_field('content'); ?></p>
  <?php endwhile; ?>
<?php endif; ?>
