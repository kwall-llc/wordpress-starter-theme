<?php
/*
*Template Name: Single Person
*/

get_header();

  		while ( have_posts() ) :
  			the_post();
        get_template_part( 'template-parts/content', 'person' ); 
  			the_content();
        endwhile; // End of the loop.



get_footer();
?>