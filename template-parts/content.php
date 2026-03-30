<?php
/**
 * Post content template
 *
 * @package Simontsao
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content article-content-block-content">
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
