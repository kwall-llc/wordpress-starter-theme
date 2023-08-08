<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kwall_Demo
 */

        if (have_rows('footer', 'option')) {
            while (have_rows('footer', 'option')) {
                the_row();
                $footerlogo = get_sub_field('footer_logo');
                $footerlink = get_sub_field('footer_logo_link');
                $footerctas = get_sub_field('footer_ctas');
				$footeraddress = get_sub_field('footer_address');
                $socialicons = get_sub_field('social_icons');
                $footermenucolumns = get_sub_field('footer_menu_columns');
                $footercopyright = get_sub_field('footer_copyright');
                $footer_bg_img = get_sub_field('footer_bg_img');
				$facebook = get_sub_field('facebook_link');
				$twitter = get_sub_field('twitter_link');
				$instagram = get_sub_field('instagram_link');
				$youtube = get_sub_field('youtube_link');
				$linkedin = get_sub_field('linked_link');
            }
        }
?>

<div class="footer-border"></div>
	<footer id="colophon" class="site-footer">
	<!-- <div class="footer-bg" style="background:url('<?= $footer_bg_img; ?>');"></div> -->
		<div class="site-info ">
				<div class="container m-auto ">
					<div class="row footer-center">
						<div class="col-md-3 col-12">
						<?php if (!empty($footerlogo)): ?>
							<img src="<?= $footerlogo; ?>" alt="Footer Logo">
							<?php endif; ?>
						</div>
						<div class="col-md-6 col-12">
							<h3><?= get_bloginfo( 'name' ); ?></h3>
							<div>
								<?= $footeraddress; ?>
							</div>
							<div class="social-media">
                  <?php if (!empty($facebook)): ?>
                      <a href="<?= $facebook['url']; ?>">
                          <i class="fa-brands fa-facebook-f"></i>
                      </a>
                  <?php endif; ?>
				  <?php if (!empty($instagram)): ?>
                      <a href="<?= $instagram['url']; ?>">
                          <i class="fa-brands fa-instagram"></i>
                      </a>
                  <?php endif; ?>
 
				  <?php if (!empty($linkedin)): ?>
                      <a href="<?= $linkedin['url']; ?>">
                          <i class="fa-brands fa-linkedin"></i>
                      </a>
                  <?php endif; ?>
				  <?php if (!empty($twitter)): ?>
                      <a href="<?= $twitter['url']; ?>">
                          <i class="fa-brands fa-twitter"></i>
                      </a>
                  <?php endif; ?>
                  <?php if (!empty($youtube)): ?>
                      <a href="<?= $youtube['url']; ?>">
                          <i class="fa-brands fa-youtube"></i>
                      </a>
                  <?php endif; ?>

                </div>
						</div>
						<div class="col-md-3 col-12">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
								<div>
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div><!-- #primary-sidebar -->
							<?php endif; ?>
						</div>
					</div>
				</div>


		</div><!-- .site-info -->
		<div class="footer-lower">
			<div class="">
			<div class="container m-auto">
				<div class="row footer-lower--inner align-items-center">


				<div class="col-6">
					&copy; <?php echo date ('Y'); ?> <?php echo get_bloginfo( 'name' ); ?>
				</div>
			<div class="col-6 to-top">
				<a href="#" id="totop"> BACK TO THE TOP <i class="fa fa-arrow-up" aria-hidden="true"></i></a>
			</div>
			</div>
			</div>
					</div>
		</div>


	</footer><!-- #colophon -->
</div><!-- #page -->

<script type="text/javascript">
	jQuery(document).ready(function( $ ) {
		$("#totop").on("click", function() {
    $("body").scrollTop(0);
});
	});
</script>

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
