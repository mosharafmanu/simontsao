<?php
/**
 * Quote and content section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$quote_content   = get_sub_field( 'quote_content' );
$body_content    = get_sub_field( 'body_content' );
$bottom_note     = get_sub_field( 'bottom_note' );
$quote_position  = get_sub_field( 'quote_position' ) ?: 'left';
$bottom_style    = get_sub_field( 'bottom_content_style' ) ?: 'highlighted_note';

$quote_column_classes = 'col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-5 align-self-center';
$body_column_classes  = 'col-sm-12 order-sm-2 col-lg-8 col-md-8';

if ( 'right' === $quote_position ) {
	$quote_column_classes .= ' order-lg-2';
	$body_column_classes  .= ' order-lg-1';
}
?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="<?php echo esc_attr( $quote_column_classes ); ?>">
				<?php if ( $quote_content ) : ?>
					<h4 class="text-center ml-lg-4 mr-lg-4 mb-sm-5 mb-5">
						<?php echo wp_kses_post( $quote_content ); ?>
					</h4>
				<?php endif; ?>
			</div>

			<div class="<?php echo esc_attr( $body_column_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center mb-5"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="quote-content-section__body">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $bottom_note ) : ?>
			<div class="row">
				<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
					<?php if ( 'body_content' === $bottom_style ) : ?>
						<div class="quote-content-section__bottom-content pt-5">
							<?php echo wp_kses_post( $bottom_note ); ?>
						</div>
					<?php else : ?>
						<h5 class="pt-5 text-lg-center">
							<?php echo wp_kses_post( $bottom_note ); ?>
						</h5>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
