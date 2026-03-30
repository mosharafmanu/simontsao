<?php
/**
 * Hero section layout.
 *
 * @package Simontsao
 */

$title            = get_sub_field( 'hero_title' );
$kicker           = get_sub_field( 'hero_kicker' );
$summary          = get_sub_field( 'hero_summary' );
$background_image = get_sub_field( 'hero_background_image' );
$background_style = '';

if ( $background_image && ! empty( $background_image['ID'] ) ) {
	$background_url = wp_get_attachment_image_url( $background_image['ID'], 'full' );

	if ( $background_url ) {
		$background_style = sprintf( ' style="background-image: url(%s);"', esc_url( $background_url ) );
	}
}
?>

<div class="bloc section b-parallax has-parallax section-dark" id="prof-simon-tsao">
	<div class="parallax bg-SurgerySplash"<?php echo $background_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	</div>
	<div class="container bloc-md-lg bloc-md" id="dr-simon-tsao">
		<div class="row" id="doctor-researcher-surgeon-top-surgery">
			<div class="col" id="leading-breast-surgeon-melbourne">
				<h1 class="mg-md text-lg-center hero-title hero-title-scale" id="a-prof-simon-tsao"><?php echo wp_kses_post( $title ); ?></h1>
				<p class="mg-md text-lg-center hero-kicker h4-style" id="doctor-researcher-surgeon"><?php echo esc_html( $kicker ); ?></p>
				<p class="mg-md hero-summary h6" id="f2m-surgeon-best-melbourne"><?php echo wp_kses_post( $summary ); ?></p>
			</div>
		</div>	
	</div>
</div>
