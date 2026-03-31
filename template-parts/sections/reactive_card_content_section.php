<?php
/**
 * Reactive card and content section layout.
 *
 * @package Simontsao
 */

$section_heading       = get_sub_field( 'section_heading' );
$heading_level         = get_sub_field( 'heading_level' ) ?: 'h2';
$highlight_text        = get_sub_field( 'highlight_text' );
$body_content          = get_sub_field( 'body_content' );
$list_style_variant    = get_sub_field( 'list_style_variant' ) ?: 'default';
$list_items            = get_sub_field( 'list_items' );
$bottom_note           = get_sub_field( 'bottom_note' );
$card_image            = get_sub_field( 'card_image' );
$card_position         = get_sub_field( 'card_position' ) ?: 'right';
$add_card_top_spacing  = (bool) get_sub_field( 'add_card_top_spacing' );
$section_index         = isset( $GLOBALS['simontsao_section_index'] ) ? (int) $GLOBALS['simontsao_section_index'] : wp_rand( 1, 9999 );
$section_id            = 'reactive-card-section-' . $section_index;
$card_image_url        = '';
$list_classes          = 'custom-list';

if ( ! function_exists( 'simontsao_render_reactive_card_list_item' ) ) {
	/**
	 * Render a structured list item for the reactive card content section.
	 *
	 * @param array  $item               Repeater row data.
	 * @param string $list_style_variant Current list style variant.
	 * @return void
	 */
	function simontsao_render_reactive_card_list_item( $item, $list_style_variant ) {
		$default_text        = $item['default_text'] ?? '';
		$lead_text           = $item['lead_text'] ?? '';
		$supporting_text     = $item['supporting_text'] ?? '';
		$has_highlighted_row = 'highlighted_lead_text' === $list_style_variant && ( $lead_text || $supporting_text );

		if ( $has_highlighted_row ) {
			?>
			<li>
				<?php if ( $lead_text ) : ?>
					<strong><?php echo esc_html( $lead_text ); ?></strong>
				<?php endif; ?>
				<?php if ( $lead_text && $supporting_text ) : ?>
					<?php echo esc_html( ' ' ); ?>
				<?php endif; ?>
				<?php if ( $supporting_text ) : ?>
					<?php echo nl2br( esc_html( $supporting_text ) ); ?>
				<?php endif; ?>
			</li>
			<?php
			return;
		}

		if ( 'default' === $list_style_variant && $default_text ) {
			?>
			<li><?php echo nl2br( esc_html( $default_text ) ); ?></li>
			<?php
		}
	}
}

if ( ! in_array( $heading_level, [ 'h2', 'h3' ], true ) ) {
	$heading_level = 'h2';
}

if ( $card_image ) {
	$card_image_url = $card_image['sizes']['medium_large'] ?? $card_image['url'] ?? '';
}

if ( 'highlighted_lead_text' === $list_style_variant ) {
	$list_classes .= ' feature-content-section__list--research';
}

$card_column_classes = 'col-lg-4 col-md-4 pb-5';
$text_column_classes = 'col-sm-12 order-sm-2 col-lg-8 col-md-8';

if ( 'left' === $card_position ) {
	$card_column_classes .= ' order-sm-1 order-lg-1 order-md-2 align-self-start';
	$text_column_classes .= ' order-2 order-md-1 order-lg-2';
} else {
	$card_column_classes .= ' order-lg-2 order-1 order-md-2';
	$text_column_classes .= ' order-lg-1 order-2 order-md-1';
}

if ( $add_card_top_spacing ) {
	$card_column_classes .= ' pt-5';
}
?>

<div class="bloc section section-light" id="<?php echo esc_attr( $section_id ); ?>">
	<?php if ( $card_image_url ) : ?>
		<style>
			#<?php echo esc_html( $section_id ); ?> .reactive-card {
				background-image: url('<?php echo esc_url( $card_image_url ); ?>');
				background-size: auto 100%;
				height: 450px;
				color: transparent !important;
				display: flex;
				flex-direction: column;
				justify-content: flex-end;
				position: relative;
				background-blend-mode: lighten;
				background-position: center top;
				filter: saturate(5%);
				margin: 10px;
				padding: 28px;
				border-radius: 28px;
				transition: all 0.5s ease-in-out;
			}

			#<?php echo esc_html( $section_id ); ?> .reactive-card:hover {
				background-size: auto 102%;
				background-blend-mode: normal;
				color: #003A5D !important;
				filter: saturate(100%);
				padding: 28px;
				border-radius: 28px;
				background-color: transparent;
			}
		</style>
	<?php endif; ?>

	<div class="container bloc-lg bloc-md-lg">
		<div class="row">
			<div class="<?php echo esc_attr( $card_column_classes ); ?>">
				<?php if ( $card_image_url ) : ?>
					<div class="reactive-card"></div>
				<?php endif; ?>
			</div>

			<div class="<?php echo esc_attr( $text_column_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<<?php echo esc_html( $heading_level ); ?> class="text-primary text-center h3-padding-bottom float-none mb-5"><?php echo esc_html( $section_heading ); ?></<?php echo esc_html( $heading_level ); ?>>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent">
						<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="reactive-card-content-section__body">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $list_items ) : ?>
					<div class="feature-content-section__list reactive-card-content-section__list">
						<ul class="<?php echo esc_attr( $list_classes ); ?>">
							<?php foreach ( $list_items as $item ) : ?>
								<?php simontsao_render_reactive_card_list_item( $item, $list_style_variant ); ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( $bottom_note ) : ?>
					<div class="reactive-card-content-section__note text-accent">
						<?php echo wp_kses_post( $bottom_note ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
