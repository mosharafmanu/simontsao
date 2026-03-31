<?php
/**
 * Soft panel content section layout.
 *
 * @package Simontsao
 */

$section_heading = get_sub_field( 'section_heading' );
$panel_items     = get_sub_field( 'panel_items' );
?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="col-sm-12 col-md-8 col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h3 class="mb-4 text-primary mt-lg-4 mt-5 mb-lg-4"><?php echo esc_html( $section_heading ); ?></h3>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $panel_items ) : ?>
			<div class="row">
				<div class="col-sm-12 col-md-8 col-lg-12 bgc-4836">
					<?php foreach ( $panel_items as $index => $item ) : ?>
						<?php if ( ! empty( $item['item_heading'] ) ) : ?>
							<h5 class="text-primary<?php echo 0 === $index ? ' mt-lg-4 mt-3' : ''; ?>"><?php echo esc_html( $item['item_heading'] ); ?></h5>
						<?php endif; ?>

						<?php if ( ! empty( $item['item_content'] ) ) : ?>
							<p><?php echo wp_kses_post( $item['item_content'] ); ?></p>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
