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
$list_items      = get_sub_field( 'list_items' );
$quote_position  = get_sub_field( 'quote_position' ) ?: 'left';
$bottom_style    = get_sub_field( 'bottom_content_style' ) ?: 'highlighted_note';
$list_style      = get_sub_field( 'list_style_variant' ) ?: 'default';
$show_divider_above = (bool) get_sub_field( 'show_divider_above' );

$quote_column_classes = 'col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-5 align-self-center';
$body_column_classes  = 'col-sm-12 order-sm-2 col-lg-8 col-md-8';

if ( ! function_exists( 'simontsao_render_quote_content_section_list_item' ) ) {
	/**
	 * Render a structured bottom list item for the quote content section.
	 *
	 * @param array  $item       Repeater row data.
	 * @param string $list_style Current list style variant.
	 * @return void
	 */
	function simontsao_render_quote_content_section_list_item( $item, $list_style ) {
		$default_text        = $item['default_text'] ?? '';
		$lead_text           = $item['lead_text'] ?? '';
		$supporting_text     = $item['supporting_text'] ?? '';
		$has_highlighted_row = 'highlighted_lead_text' === $list_style && ( $lead_text || $supporting_text );

		if ( $has_highlighted_row ) {
			?>
			<li>
				<p>
					<?php if ( $lead_text ) : ?>
						<span><?php echo esc_html( $lead_text ); ?></span>
					<?php endif; ?>
					<?php if ( $lead_text && $supporting_text ) : ?>
						<span><?php echo esc_html( ' ' ); ?></span>
					<?php endif; ?>
					<?php if ( $supporting_text ) : ?>
						<?php echo nl2br( esc_html( $supporting_text ) ); ?>
					<?php endif; ?>
				</p>
			</li>
			<?php
			return;
		}

		if ( 'default' === $list_style && $default_text ) {
			?>
			<li>
				<p><?php echo nl2br( esc_html( $default_text ) ); ?></p>
			</li>
			<?php
		}
	}
}

if ( 'right' === $quote_position ) {
	$quote_column_classes .= ' order-lg-2';
	$body_column_classes  .= ' order-lg-1';
}

if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) {
	simontsao_render_section_divider();
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

						<?php if ( $list_items ) : ?>
							<div class="feature-content-section__list quote-content-section__bottom-list">
								<ul class="custom-list<?php echo 'highlighted_lead_text' === $list_style ? ' feature-content-section__list--research' : ''; ?>">
									<?php foreach ( $list_items as $item ) : ?>
										<?php simontsao_render_quote_content_section_list_item( $item, $list_style ); ?>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
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
