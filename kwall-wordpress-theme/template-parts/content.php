<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kwall_Demo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="banner-section" style="background: url('/wp-content/uploads/2023/04/pexels-photo-1205651.png'), rgba(0,47,99);">
    <div class="container">
		<div class="row mx-0 align-items-end banners-inner">
		<div class="col-12">
		</div>
		</div>
    </div>
</div>
<div class="container">
	<header class="entry-header">

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
					
			<div class="entry-meta">
				<?php
				kwall_demo_posted_on();
				//kwall_demo_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', true )[0];?>" alt="">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kwall-demo' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kwall-demo' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
