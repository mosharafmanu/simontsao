<?php
/**
 * Nipple reconstruction section layout.
 *
 * @package Simontsao
 */

$section_heading    = get_sub_field( 'section_heading' );
$show_divider_above = get_sub_field( 'show_divider_above' );
$highlight_text     = get_sub_field( 'highlight_text' );
$body_content       = get_sub_field( 'body_content' );
$subheading         = get_sub_field( 'subheading' );
$subheading_content = get_sub_field( 'subheading_content' );
?>

<?php if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) : ?>
	<?php simontsao_render_section_divider(); ?>
<?php endif; ?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-sm-lg" id="nipple-reconstruction">
		<div class="row" id="nipple-reconstruction-overview">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5 mb-5"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent" id="nipple-reconstruction-preview">
						<p><?php echo nl2br( esc_html( $highlight_text ) ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="mt-lg-5 mb-lg-5 mt-md-5 mb-md-5" id="nipple-reconstruction-text">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $subheading ) : ?>
					<h3 class="mb-4 text-primary" id="free-nipple-graft"><?php echo esc_html( $subheading ); ?></h3>
				<?php endif; ?>

				<?php if ( $subheading_content ) : ?>
					<div class="mb-lg-5" id="free-nipple-graft-text">
						<?php echo wp_kses_post( $subheading_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
