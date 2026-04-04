<?php
/**
 * Compact text section layout.
 *
 * @package Simontsao
 */

$show_divider_above = get_sub_field( 'show_divider_above' );
$section_heading    = get_sub_field( 'section_heading' );
$body_content       = get_sub_field( 'body_content' );
?>

<?php if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) : ?>
	<?php simontsao_render_section_divider(); ?>
<?php endif; ?>

<div class="bloc section section-light">
	<div class="container bloc-no-padding-lg bloc-sm">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center text-lg-left mt-lg-5 mb-lg-5 pt-lg-0 pt-0"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="pt-5 text-lg-left pt-lg-0">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
