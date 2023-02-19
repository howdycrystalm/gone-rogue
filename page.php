<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="site-main">
<h3>Satuday, 2/19. This page.php file is the default page.php from the underscores theme. The only change I made was to lines 24 and 25. I think this file/page will like a single blog post, and that is where custom archive pulls info from...</h1>
		<?php
		while ( have_posts() ) :
			the_post();

			//get_template_part( 'template-parts/content', 'page' );
      get_template_part( 'content', 'tmpl_archives' );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

