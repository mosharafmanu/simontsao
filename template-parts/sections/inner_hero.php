<?php
/**
 * Reusable inner hero section layout.
 *
 * @package Simontsao
 */

$hero_title            = get_sub_field( 'hero_title' );
$hero_summary          = get_sub_field( 'hero_summary' );
$background_image      = get_sub_field( 'background_image' );
$mobile_background     = get_sub_field( 'mobile_background_image' );
$show_title_surface    = (bool) get_sub_field( 'show_title_surface' );
$title_color           = get_sub_field( 'title_color' ) ?: 'white';
$desktop_background    = '';
$mobile_background_url = '';
$title_color_value     = 'rgba(0,58,93,1.00)';

if ( $background_image && ! empty( $background_image['ID'] ) ) {
	$desktop_background = wp_get_attachment_image_url( $background_image['ID'], 'full' );
}

if ( $mobile_background && ! empty( $mobile_background['ID'] ) ) {
	$mobile_background_url = wp_get_attachment_image_url( $mobile_background['ID'], 'full' );
}

$style_rules = [];

if ( $desktop_background ) {
	$style_rules[] = sprintf( '--inner-hero-bg-desktop:url(%s)', esc_url( $desktop_background ) );
}

if ( $mobile_background_url ) {
	$style_rules[] = sprintf( '--inner-hero-bg-mobile:url(%s)', esc_url( $mobile_background_url ) );
}

$hero_classes       = 'bloc section b-parallax has-parallax text-primary none section-dark inner-hero';
$title_classes      = 'mg-md text-lg-center hero-title hero-title-scale';
$summary_classes    = 'mg-md hero-summary hero-summary-surface';
$content_has_summary = ! empty( $hero_summary );

if ( $show_title_surface ) {
	$title_classes .= ' text-primary hero-title-surface';
}

if ( 'white' === $title_color ) {
	$title_color_value = 'rgba(255,255,255,0.80)';
}

$style_rules[] = sprintf( '--inner-hero-title-color:%s', esc_attr( $title_color_value ) );
?>

<div class="<?php echo esc_attr( $hero_classes ); ?>"<?php echo $style_rules ? ' style="' . esc_attr( implode( ';', $style_rules ) ) . '"' : ''; ?>>
	<div class="parallax inner-hero__background"></div>

	<div class="container bloc-xxl bloc-lg-lg inner-hero__container">
		<div class="row">
			<div class="col">
				<?php if ( $hero_title ) : ?>
					<h1 class="<?php echo esc_attr( $title_classes ); ?>" style="color: var(--inner-hero-title-color) !important;"><?php echo wp_kses_post( $hero_title ); ?></h1>
				<?php endif; ?>

				<?php if ( $content_has_summary ) : ?>
					<div class="<?php echo esc_attr( $summary_classes ); ?>">
						<?php echo wp_kses_post( $hero_summary ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
