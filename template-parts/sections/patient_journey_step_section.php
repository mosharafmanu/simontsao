<?php
/**
 * Patient journey step section layout.
 *
 * @package Simontsao
 */

$section_heading      = get_sub_field( 'section_heading' );
$intro_text           = get_sub_field( 'intro_text' );
$list_items           = get_sub_field( 'list_items' );
$list_style_variant   = get_sub_field( 'list_style_variant' ) ?: 'default';
$body_content         = get_sub_field( 'body_content' );
$bottom_content       = get_sub_field( 'bottom_content' );
$bottom_cta_content   = get_sub_field( 'bottom_cta_content' );
$section_image        = get_sub_field( 'section_image' );
$show_divider_above   = (bool) get_sub_field( 'show_divider_above' );
$add_heading_padding  = (bool) get_sub_field( 'add_heading_bottom_padding' );

$container_classes    = 'container bloc-md-lg bloc-sm bloc-md-md';
$image_column_classes = 'col-sm-12 order-sm-1 col-lg-4 col-md-4 align-self-start';
$content_column_classes = 'col-sm-12 order-sm-2 col-lg-8 col-md-8';
$heading_classes      = 'mg-md text-primary text-center';
$intro_classes        = 'mg-md text-primary';
$image_class          = 'img-fluid mx-auto d-block img-style';
$image_render_args    = [
	'class'         => $image_class,
	'sizes'         => '(max-width: 991px) 100vw, 213px',
	'lazy'          => true,
	'fetchpriority' => 'auto',
	'fallback_size' => 'medium',
	'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
];

if ( ! function_exists( 'simontsao_render_patient_journey_list_item' ) ) {
	/**
	 * Render safe inline text for patient journey list fields.
	 *
	 * @param string $content Raw field content.
	 * @return string
	 */
	function simontsao_render_patient_journey_inline_text( $content ) {
		return wp_kses(
			(string) $content,
			[
				'br'     => [],
				'span'   => [
					'class' => true,
					'style' => true,
				],
				'strong' => [
					'class' => true,
					'style' => true,
				],
				'b'      => [
					'class' => true,
					'style' => true,
				],
				'a'      => [
					'class'  => true,
					'href'   => true,
					'target' => true,
					'rel'    => true,
				],
			]
		);
	}

	/**
	 * Render a patient journey list item.
	 *
	 * @param array  $item Repeater row data.
	 * @param string $list_style_variant Current list style.
	 * @return void
	 */
	function simontsao_render_patient_journey_list_item( $item, $list_style_variant ) {
		$default_text        = $item['default_text'] ?? '';
		$lead_text           = $item['lead_text'] ?? '';
		$supporting_text     = $item['supporting_text'] ?? '';
		$has_highlighted_row = 'highlighted_lead_text' === $list_style_variant && ( $lead_text || $supporting_text );

		if ( $has_highlighted_row ) {
			?>
			<li>
				<p>
					<?php if ( $lead_text ) : ?>
						<span class="year"><?php echo simontsao_render_patient_journey_inline_text( $lead_text ); ?></span>
					<?php endif; ?>
					<?php if ( $lead_text && $supporting_text ) : ?>
						<?php echo esc_html( ' - ' ); ?>
					<?php endif; ?>
					<?php if ( $supporting_text ) : ?>
						<?php echo nl2br( simontsao_render_patient_journey_inline_text( $supporting_text ) ); ?>
					<?php endif; ?>
				</p>
			</li>
			<?php
			return;
		}

		if ( 'default' === $list_style_variant && $default_text ) {
			?>
			<li><p><?php echo nl2br( simontsao_render_patient_journey_inline_text( $default_text ) ); ?></p></li>
			<?php
		}
	}
}

if ( ! function_exists( 'simontsao_render_patient_journey_html' ) ) {
	/**
	 * Render safe HTML for patient journey section content.
	 *
	 * @param string $content Raw WYSIWYG content.
	 * @return string
	 */
	function simontsao_render_patient_journey_html( $content ) {
		$allowed_html = wp_kses_allowed_html( 'post' );

		if ( ! isset( $allowed_html['span'] ) ) {
			$allowed_html['span'] = [];
		}

		$allowed_html['span']['class'] = true;
		$allowed_html['span']['style'] = true;
		$allowed_html['b']['style']    = true;
		$allowed_html['p']['class']    = true;
		$allowed_html['a']['class']    = true;
		$allowed_html['a']['target']   = true;
		$allowed_html['a']['rel']      = true;

		return wp_kses( $content, $allowed_html );
	}
}

if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) {
	simontsao_render_section_divider();
}

if ( $add_heading_padding ) {
	$heading_classes .= ' h3-padding-bottom';
}

$image_render_args['class'] = $image_class;
?>

<div class="bloc section section-light">
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $image_column_classes ); ?>">
				<?php
				if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture( $section_image, $image_render_args );
				}
				?>
			</div>
			<div class="<?php echo esc_attr( $content_column_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<h2 class="<?php echo esc_attr( $heading_classes ); ?>"><?php echo esc_html( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $intro_text ) : ?>
					<h5 class="<?php echo esc_attr( $intro_classes ); ?>"><?php echo simontsao_render_patient_journey_html( $intro_text ); ?></h5>
				<?php endif; ?>

				<?php if ( $list_items ) : ?>
					<div>
						<ul class="custom-list">
							<?php foreach ( $list_items as $item ) : ?>
								<?php simontsao_render_patient_journey_list_item( $item, $list_style_variant ); ?>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div>
						<?php echo simontsao_render_patient_journey_html( $body_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $bottom_content || $bottom_cta_content ) : ?>
			<div class="row">
				<div class="col text-left">
					<?php if ( $bottom_content ) : ?>
						<p class="text-lg-center p-padding-bottom">
							<?php echo simontsao_render_patient_journey_html( $bottom_content ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $bottom_cta_content ) : ?>
						<h5 class="mb-4 text-primary text-lg-center float-lg-none mt-lg-5">
							<?php echo simontsao_render_patient_journey_html( $bottom_cta_content ); ?>
						</h5>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
