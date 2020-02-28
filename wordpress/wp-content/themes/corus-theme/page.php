<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main main-container">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				the_title( '<h1 class="entry-title">', '</h1>' );

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
