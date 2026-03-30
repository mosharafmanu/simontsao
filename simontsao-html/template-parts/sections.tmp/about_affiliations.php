<?php
/**
 * About affiliations section layout.
 *
 * @package Simontsao
 */

$section_heading       = get_sub_field( 'section_heading' );
$australian_heading    = get_sub_field( 'australian_heading' );
$australian_items      = get_sub_field( 'australian_items' );
$international_heading = get_sub_field( 'international_heading' );
$international_items   = get_sub_field( 'international_items' );

if ( ! function_exists( 'simontsao_render_affiliation_items' ) ) {
	/**
	 * Render an affiliation logo grid.
	 *
	 * @param array  $items Repeater items.
	 * @param string $row_class Row classes.
	 * @return void
	 */
	function simontsao_render_affiliation_items( $items, $row_class = '' ) {
		if ( empty( $items ) || ! is_array( $items ) ) {
			return;
		}
		?>
		<div class="row <?php echo esc_attr( $row_class ); ?>">
			<?php foreach ( $items as $item ) : ?>
				<?php
				$link  = $item['link'] ?? '';
				$image = $item['image'] ?? null;
				?>
				<div class="align-self-center col-12 mt-5 mb-5 col-sm-6 mt-sm-3 mb-sm-3 col-lg-4">
					<?php if ( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>" target="_blank" rel="noopener noreferrer">
					<?php endif; ?>

					<?php
					if ( $image && function_exists( 'simontsao_render_responsive_picture' ) ) {
						simontsao_render_responsive_picture(
							$image,
							[
								'class'         => 'img-fluid mx-auto d-block',
								'alt'           => $image['alt'] ?? '',
								'sizes'         => '(max-width: 991px) 100vw, 360px',
								'lazy'          => true,
								'fetchpriority' => 'auto',
								'fallback_size' => 'medium_large',
								'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large', 'large' ],
							]
						);
					}
					?>

					<?php if ( $link ) : ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}
?>

<div class="bloc section bg-repeat section-light" id="about-affiliations">
	<div class="container bloc-lg b-divider bloc-sm-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $australian_heading ) : ?>
					<h3 class="text-primary pt-5 h5-padding-bottom text-sm-center text-lg-left h5"><?php echo esc_html( $australian_heading ); ?></h3>
				<?php endif; ?>

				<?php simontsao_render_affiliation_items( $australian_items ); ?>

				<?php if ( $international_heading ) : ?>
					<h3 class="text-primary pt-5 h5-padding-bottom text-sm-center text-lg-left h5"><?php echo esc_html( $international_heading ); ?></h3>
				<?php endif; ?>

				<?php simontsao_render_affiliation_items( $international_items, 'pb-lg-5 row-padding-bottom' ); ?>
			</div>
		</div>
	</div>
</div>
