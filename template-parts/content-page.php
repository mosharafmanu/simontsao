<?php
/**
 * Page content template
 *
 * @package Simontsao
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	// Check if page title should be displayed (ACF field)
	$show_title = true;

	if ( function_exists( 'get_field' ) ) {
		$show_title = get_field( 'show_page_title' );

		// Default to true if not explicitly set to false
		if ( ! isset( $show_title ) || $show_title === null ) {
			$show_title = true;
		}
	}

	// Display title if enabled
	if ( $show_title ) :
		?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title h2-style">', '</h1>' ); ?>
		</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		// Handle paginated posts
		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simontsao' ),
				'after'  => '</div>',
			]
		);
		?>
	</div>

</article>
