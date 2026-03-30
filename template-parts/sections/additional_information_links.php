<?php
/**
 * Additional information links section layout.
 *
 * @package Simontsao
 */

$section_heading         = get_sub_field( 'section_heading' );
$section_image           = get_sub_field( 'section_image' );
$use_shared_links        = (bool) get_sub_field( 'use_shared_links' );
$shared_information_data = function_exists( 'simontsao_get_additional_information_links_data' ) ? simontsao_get_additional_information_links_data() : [];

if ( $use_shared_links ) {
	$information_heading = $shared_information_data['information_heading'] ?? '';
	$information_links   = $shared_information_data['information_links'] ?? [];
	$surgeries_heading   = $shared_information_data['surgeries_heading'] ?? '';
	$surgeries_links     = $shared_information_data['surgeries_links'] ?? [];
} else {
	$information_heading = get_sub_field( 'information_group_heading' );
	$information_links   = get_sub_field( 'information_links' );
	$surgeries_heading   = get_sub_field( 'surgeries_group_heading' );
	$surgeries_links     = get_sub_field( 'surgeries_links' );
}

if ( ! $section_heading ) {
	$section_heading = __( 'Links to Additional Information', 'simontsao' );
}
?>

<div class="bloc section section-light b-divider">
	<div class="container bloc-md-lg bloc-sm">
		<div class="row" id="simon-tsao-melbourne-l">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<h2 class="text-primary text-center text-lg-left mt-lg-5 mb-5"><?php echo esc_html( $section_heading ); ?></h2>
			</div>
		</div>

		<div class="row" id="breast-information-and-surgeries">
			<div class="col-md-4 text-left" id="chest-image">
				<?php
				if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture(
						$section_image,
						[
							'class'         => 'img-fluid mx-auto d-block img-protected illustratormedium',
							'sizes'         => '(max-width: 991px) 100vw, 213px',
							'lazy'          => true,
							'fetchpriority' => 'auto',
							'fallback_size' => 'medium',
							'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
						]
					);
				}
				?>
			</div>

			<div class="col-md-4 text-left" id="breast-information-menu">
				<?php if ( $information_heading ) : ?>
					<div class="blockquote callout-primary mt-sm-5 mt-5 mt-md-0">
						<p class="callout-primary text-primary"><?php echo esc_html( $information_heading ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $information_links ) : ?>
					<p class="text-accent related-links">
						<?php foreach ( $information_links as $item ) : ?>
							<?php $link = $item['link'] ?? null; ?>
							<?php if ( ! empty( $link['title'] ) ) : ?>
								<a class="link-accent" href="<?php echo esc_url( $link['url'] ?? '#' ); ?>"<?php echo ( ! empty( $link['target'] ) && '_blank' === $link['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $link['title'] ); ?></a><br>
							<?php endif; ?>
						<?php endforeach; ?>
					</p>
				<?php endif; ?>
			</div>

			<div class="col-md-4 text-left" id="breast-surgeries-menu">
				<?php if ( $surgeries_heading ) : ?>
					<div class="blockquote callout-primary">
						<p class="text-primary"><?php echo esc_html( $surgeries_heading ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $surgeries_links ) : ?>
					<p class="text-accent related-links">
						<?php foreach ( $surgeries_links as $item ) : ?>
							<?php $link = $item['link'] ?? null; ?>
							<?php if ( ! empty( $link['title'] ) ) : ?>
								<a class="link-accent" href="<?php echo esc_url( $link['url'] ?? '#' ); ?>"<?php echo ( ! empty( $link['target'] ) && '_blank' === $link['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $link['title'] ); ?></a><br>
							<?php endif; ?>
						<?php endforeach; ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
