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
 * @package Simontsao
 */

get_header();

// Get page slug for main tag class
$page_slug = '';
if ( is_singular( 'page' ) ) {
	global $post;
	if ( $post ) {
		$page_slug = 'page-' . $post->post_name;
	}
}
?>

	<main id="primary" class="site-main <?php echo esc_attr( $page_slug ); ?>">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				// Check if ACF Flexible Content exists
				if ( function_exists( 'have_rows' ) && have_rows( 'cms' ) ) :
					// Load ACF Flexible Content sections
					simontsao_flexible_content( 'cms' );
				else :
					?>
					<div class="container bloc-md-lg bloc-sm">
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
					</div>
					<?php
				endif;
			endwhile;
		else :
			?>
			<div class="container bloc-md-lg bloc-sm">
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			</div>
			<?php
		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
