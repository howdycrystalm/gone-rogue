<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<footer>
		<div class="footer-menu-container">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
		</div>
		<?php
        $args = array(
            'post_type' => 'socials',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="footer-social-media-icons">
			<a href="<?php echo the_field('facebook_url'); ?>"><i class="fab fa-facebook-f fa-xl"></i></a>
			<a href="<?php echo the_field('twitter_url'); ?>"><i class="fab fa-twitter fa-xl"></i></a>
			<a href="<?php echo the_field('instagram_url'); ?>"><i class="fab fa-instagram fa-xl"></i></a>
			<a href="<?php echo the_field('youtube_url'); ?>"><i class="fab fa-youtube fa-xl"></i></a>
		</div>
		<?php endwhile;

			wp_reset_postdata();

				else :

				echo __( 'No socials found', 'textdomain' );

			endif;
		?>
		<div class="site-info">
			<span><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></span>
			<span><a href="#">Terms and Conditions</a></span>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>