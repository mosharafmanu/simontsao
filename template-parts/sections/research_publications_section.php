<?php
/**
 * Research publications section layout.
 *
 * @package Simontsao
 */

$section_heading      = get_sub_field( 'section_heading' );
$intro_text           = get_sub_field( 'intro_text' );
$publications_content = get_sub_field( 'publications_content' );
$reference_note       = get_sub_field( 'reference_note' );
$cta_content          = get_sub_field( 'cta_content' );
$show_divider_above   = (bool) get_sub_field( 'show_divider_above' );

if ( ! function_exists( 'simontsao_render_research_publications_html' ) ) {
	/**
	 * Render publications content with controlled inline span classes.
	 *
	 * @param string $content Raw WYSIWYG content.
	 * @return string
	 */
	function simontsao_render_research_publications_html( $content ) {
		$allowed_html = wp_kses_allowed_html( 'post' );

		if ( ! isset( $allowed_html['span'] ) ) {
			$allowed_html['span'] = [];
		}

		$allowed_html['span']['class'] = true;
		$allowed_html['p']['class']    = true;
		$allowed_html['a']['class']    = true;
		$allowed_html['a']['target']   = true;
		$allowed_html['a']['rel']      = true;

		return wp_kses( $content, $allowed_html );
	}
}

if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) {
	simontsao_render_section_divider();
}
?>

<div class="bloc section section-light">
	<div class="container bloc-no-padding-lg bloc-no-padding-md bloc-sm">
		<div class="row">
			<div class="col text-left">
				<?php if ( $section_heading ) : ?>
					<h2 class="mb-4 text-primary h3 mt-lg-5 mt-md-5 mt-sm-4 mt-4"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $intro_text ) : ?>
					<h5 class="mb-4 mb-lg-5 mt-lg-5"><?php echo wp_kses_post( $intro_text ); ?></h5>
				<?php endif; ?>

				<?php if ( $publications_content ) : ?>
					<div class="ml-lg-5 mr-lg-5 mb-lg-5 mb-sm-5 research-publications-section__content">
						<?php echo simontsao_render_research_publications_html( $publications_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $reference_note ) : ?>
					<h5 class="mb-4 text-primary text-lg-center float-lg-none mt-lg-5 mt-md-5 mt-sm-4">
						<?php echo simontsao_render_research_publications_html( $reference_note ); ?>
					</h5>
				<?php endif; ?>

				<?php if ( $cta_content ) : ?>
					<h5 class="mb-4 text-lg-center text-primary mb-lg-5">
						<?php echo simontsao_render_research_publications_html( $cta_content ); ?>
					</h5>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
