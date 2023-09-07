<div class="container">
  <hr class="blue-hr">
  <?php

  // Check rows exists.
  if( have_rows('stat_repeater') ):
    ?>
<div class="col-12">
  <div class="row">


  <?php
      // Loop through rows.
      while( have_rows('stat_repeater') ) : the_row();
      $stat_number = get_sub_field('stat_number');
      $stat_title = get_sub_field('stat_title');
      ?>

      <div class="col-md-3 col-6 stat-wrap">
        <span class="blue-stat"><?php echo $stat_number; ?></span>
        <hr class="divider">
        <p class="stat-copy"><?php echo $stat_title; ?></p>
      </div>



          <?php // End loop.
          endwhile;
            ?>
</div>
  </div>
<?php
  // No value.
  else :
      // Do something...
  endif;
?>

</div>