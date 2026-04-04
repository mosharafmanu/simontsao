<?php
/**
 * Intro callout section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$callout_content = get_sub_field( 'callout_content' );
?>

<div class="bloc section bg-repeat section-light">
	<div class="container bloc-lg b-divider bloc-sm-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 mt-lg-5 mb-5 text-lg-left h1"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $callout_content ) : ?>
					<div class="blockquote callout-accent">
						<div class="mb-lg-5">
							<?php echo wp_kses_post( $callout_content ); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

