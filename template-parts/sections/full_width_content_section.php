<?php
/**
 * Full width content section layout.
 *
 * @package Simontsao
 */

$main_heading    = get_sub_field( 'main_heading' );
$first_heading   = get_sub_field( 'first_heading' );
$callout_type    = get_sub_field( 'callout_type' ) ?: 'simple_intro_text';
$first_intro_text = get_sub_field( 'first_highlight_text' );
$rich_callout_content = get_sub_field( 'rich_callout_content' );
$first_intro_text_style = get_sub_field( 'first_intro_text_style' ) ?: 'highlighted_text';
$first_content   = get_sub_field( 'first_content' );
$second_content  = get_sub_field( 'second_content' );
$bottom_note     = get_sub_field( 'bottom_note' );
$cta_content     = get_sub_field( 'cta_content' );
$secondary_content_classes = 'full-width-content-section__secondary-content mt-lg-5 mt-5';
$previous_layout = $GLOBALS['simontsao_previous_layout'] ?? '';
$main_heading_wrapper_classes = 'mx-auto d-block text-lg-center text-primary';

if ( 'inner_hero' === $previous_layout ) {
	$main_heading_wrapper_classes .= ' mt-sm-5';
}

if ( ! function_exists( 'simontsao_render_full_width_content_html' ) ) {
	/**
	 * Render controlled rich text content for the full width content section.
	 *
	 * @param string $content Raw WYSIWYG content.
	 * @return string
	 */
	function simontsao_render_full_width_content_html( $content ) {
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
?>

<div class="bloc section section-light">
	<div class="container bloc-md-lg bloc-sm" id="surgical-conditions-overview">
		<div class="row" id="melbourne-breast-surgeon">
				<div class="col-lg-12 col-md-12" id="melbourne-surgical-conditions">
					<?php if ( $main_heading ) : ?>
						<div class="<?php echo esc_attr( $main_heading_wrapper_classes ); ?>" id="melbourne-breast-surgery">
							<div class="text-center text-lg-left pb-lg-2" id="breast-surgical-expert">
								<h2 class="mb-4 text-primary h1"><?php echo esc_html( $main_heading ); ?></h2>
							</div>
						</div>
					<?php endif; ?>

					<div class="row align-items-center mb-lg-0">
					<div class="col-sm-12 order-sm-2 align-self-center col-lg-12 col-md-12">
						<?php if ( $first_heading ) : ?>
							<h2 class="mb-4 text-primary"><?php echo esc_html( $first_heading ); ?></h2>
						<?php endif; ?>

						<?php if ( 'rich_callout' === $callout_type && $rich_callout_content ) : ?>
							<div class="blockquote callout-accent">
								<?php echo simontsao_render_full_width_content_html( $rich_callout_content ); ?>
							</div>
						<?php elseif ( 'simple_intro_text' === $callout_type && $first_intro_text ) : ?>
							<?php if ( 'intro_text' === $first_intro_text_style ) : ?>
								<h5 class="mb-4 full-width-content-section__intro-text"><?php echo nl2br( esc_html( $first_intro_text ) ); ?></h5>
							<?php else : ?>
								<div class="blockquote callout-accent">
									<p class="callout-accent"><?php echo nl2br( esc_html( $first_intro_text ) ); ?></p>
								</div>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ( $first_content ) : ?>
							<div class="full-width-content-section__content">
								<?php echo simontsao_render_full_width_content_html( $first_content ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $second_content ) : ?>
							<div class="<?php echo esc_attr( $secondary_content_classes ); ?>">
								<?php echo simontsao_render_full_width_content_html( $second_content ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $bottom_note ) : ?>
							<div class="full-width-content-section__bottom-note pt-5">
								<?php echo simontsao_render_full_width_content_html( $bottom_note ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $cta_content ) : ?>
							<div class="full-width-content-section__cta pt-5 text-lg-center">
								<?php echo simontsao_render_full_width_content_html( $cta_content ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
