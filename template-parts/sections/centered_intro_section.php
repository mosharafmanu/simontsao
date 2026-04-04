<?php
/**
 * Centered intro section layout.
 *
 * @package Simontsao
 */

$main_heading = get_sub_field( 'main_heading' );
$intro_text   = get_sub_field( 'intro_text' );
$container_classes = 'container bloc-lg b-divider bloc-sm-lg';
$show_divider_above = (bool) get_sub_field( 'show_divider_above' );

if ( $intro_text ) {
	$intro_text = trim( $intro_text );
	$intro_text = preg_replace( '#^<p>(.*)</p>$#s', '$1', $intro_text );
}

if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) {
	simontsao_render_section_divider();
}

if ( is_page( 'top-surgery' ) && 'Patient Underlying Health and Consent' === wp_strip_all_tags( (string) $main_heading ) ) {
	$container_classes = 'container bloc-lg bloc-sm-lg';
}

if ( is_page( 'sensory-preservation-top-surgery' ) ) {
	$container_classes = 'container bloc-lg bloc-sm-lg';
}
?>

<div class="bloc section bg-repeat section-light">
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $main_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5 mb-5 h1"><?php echo esc_html( $main_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $intro_text ) : ?>
					<h5 class="pt-5 text-lg-center pt-lg-5"><?php echo wp_kses_post( $intro_text ); ?></h5>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
