<div class="request-container ">
<div class="degree-container">
<div class="bg"></div>
</div>
  <div class="container">
    <div class="row align-items-center justify-content-center ">
      <div class="col-md-10 col-12 request-inner">
        <h2 class="request-title"><?php echo get_field('info_title'); ?></h2>
        <p class="request-copy"><?php echo get_field('info_copy'); ?></p>
        <div class="btn-container">
          <?php
            $link = get_field('button_1_link');
            if( $link ):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
          <a href="<?php echo esc_url($link_url); ?>" class="btn blue-btn" target="<?php echo esc_attr( $link_target ); ?>">
            <?php echo esc_html( $link_title ); ?>
          </a>
        <?php endif;
        $link = get_field('button_2_link');
        if( $link ):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

          <a href="<?php echo esc_url($link_url); ?>" class="btn blue-btn" target="<?php echo esc_attr( $link_target ); ?>">
            <?php echo esc_html( $link_title ); ?>
          </a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

