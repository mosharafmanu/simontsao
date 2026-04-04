<?php
/**
 * Surgery techniques section layout.
 *
 * @package Simontsao
 */

$section_heading      = get_sub_field( 'section_heading' );
$show_divider_above   = get_sub_field( 'show_divider_above' );
$intro_callout_content = get_sub_field( 'intro_callout_content' );
$technique_items      = get_sub_field( 'technique_items' );
$bottom_heading       = get_sub_field( 'bottom_heading' );
$bottom_content       = get_sub_field( 'bottom_content' );

if ( ! function_exists( 'simontsao_render_surgery_techniques_html' ) ) {
	/**
	 * Render rich text content for surgery techniques while preserving inline classes.
	 *
	 * @param string $content Raw WYSIWYG content.
	 * @return string
	 */
	function simontsao_render_surgery_techniques_html( $content ) {
		$allowed_html = wp_kses_allowed_html( 'post' );

		if ( ! isset( $allowed_html['span'] ) ) {
			$allowed_html['span'] = [];
		}

		$allowed_html['span']['class'] = true;
		$allowed_html['p']['class']    = true;
		$allowed_html['a']['class']    = true;
		$allowed_html['a']['target']   = true;
		$allowed_html['a']['rel']      = true;

		return wp_kses( $content, $allowed_html );
	}
}
?>

<?php if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) : ?>
	<?php simontsao_render_section_divider(); ?>
<?php endif; ?>

<div class="bloc section section-light">
	<div class="container bloc-lg bloc-sm-lg">
		<div class="row">
			<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
				<?php if ( $section_heading ) : ?>
					<h2 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5 mb-5"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $intro_callout_content ) : ?>
					<div class="blockquote callout-accent">
						<?php echo simontsao_render_surgery_techniques_html( $intro_callout_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $technique_items ) : ?>
			<?php foreach ( $technique_items as $index => $item ) : ?>
				<?php
				$technique_image   = $item['technique_image'] ?? null;
				$technique_heading = $item['technique_heading'] ?? '';
				$intro_content     = $item['intro_content'] ?? '';
				$content_blocks    = $item['content_blocks'] ?? [];
				$is_last_item      = $index === array_key_last( $technique_items );
				?>
				<div class="row mb-lg-5 mt-lg-5">
					<div class="col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-5 mt-5 align-self-start">
						<?php
						if ( $technique_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
							simontsao_render_responsive_picture(
								$technique_image,
								[
									'class'         => 'img-fluid mx-auto d-block img-hospital--style mb-lg-0 img-protected mb-0 mb-sm-5',
									'alt'           => $technique_image['alt'] ?? '',
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

					<div class="col-sm-12 order-sm-2 col-lg-8 col-md-8 align-self-center">
						<?php if ( $technique_heading ) : ?>
							<h3 class="mb-4 text-primary"><?php echo esc_html( $technique_heading ); ?></h3>
						<?php endif; ?>

						<?php if ( $intro_content ) : ?>
							<div class="surgery-techniques-section__intro-content">
								<?php echo simontsao_render_surgery_techniques_html( $intro_content ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $content_blocks ) : ?>
							<?php foreach ( $content_blocks as $block ) : ?>
								<?php if ( ! empty( $block['block_heading'] ) ) : ?>
									<h4 class="mb-4 text-primary"><?php echo esc_html( $block['block_heading'] ); ?></h4>
								<?php endif; ?>

								<?php if ( ! empty( $block['block_content'] ) ) : ?>
									<div class="surgery-techniques-section__block-content">
										<?php echo simontsao_render_surgery_techniques_html( $block['block_content'] ); ?>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>

				<?php if ( ! $is_last_item ) : ?>
					<div class="row d-sm-none d-flex">
						<div class="col">
							<div class="divider-h">
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if ( $bottom_heading || $bottom_content ) : ?>
			<div class="row">
				<div class="order-1 col-12 col-sm-12 order-lg-1 bloc-style col-lg-12">
					<?php if ( $bottom_heading ) : ?>
						<h3 class="text-primary text-center pt-5 pt-lg-0 text-lg-left mt-lg-5 mb-5"><?php echo esc_html( $bottom_heading ); ?></h3>
					<?php endif; ?>

					<?php if ( $bottom_content ) : ?>
						<div class="surgery-techniques-section__bottom-content">
							<?php echo simontsao_render_surgery_techniques_html( $bottom_content ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
