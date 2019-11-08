<!-- TODO: Style accordions. -->
<h2><?= get_sub_field('title'); ?></h2>

<?php $num = 0; $expand = true;  ?>
<?php if( have_rows('rows') ): ?>
  <div id="accordionGroup" class="Accordion">
  <?php while ( have_rows('rows') ) : the_row(); $num++; ?>
    <?php if ( $num != 1 ) : $expand = false; endif; ?>

      <h3>
        <button aria-expanded="<?php echo $expand ?>"
                class="Accordion-trigger"
                aria-controls="sect<?php echo $num ?>"
                id="accordion<?php echo $num ?>id">
          <span class="Accordion-title">
            <?= get_sub_field('title'); ?>
            <span class="Accordion-icon"></span>
          </span>
        </button>
      </h3>
      <div id="sect<?php echo $num ?>"
       role="region"
       aria-labelledby="accordion<?php echo $num ?>id"
       class="Accordion-panel"
       hidden="">
       <?= get_sub_field('content'); ?>
      </div>

  <?php endwhile; ?>
  </div>
<?php endif; ?>
