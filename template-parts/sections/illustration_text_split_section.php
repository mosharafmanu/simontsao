<?php
/**
 * Illustration and text split section layout.
 *
 * @package Simontsao
 */

$section_heading           = get_sub_field( 'section_heading' );
$style_variant             = get_sub_field( 'style_variant' ) ?: 'standard';
$image_position            = get_sub_field( 'image_position' ) ?: 'left';
$heading_alignment         = get_sub_field( 'heading_alignment' ) ?: 'left';
$highlight_text            = get_sub_field( 'highlight_text' );
$intro_text                = get_sub_field( 'intro_text' );
$body_content              = get_sub_field( 'body_content' );
$supporting_links_content  = get_sub_field( 'supporting_links_content' );
$section_image             = get_sub_field( 'section_image' );
$list_items                = get_sub_field( 'list_items' );
$list_style_variant        = get_sub_field( 'list_style_variant' ) ?: 'default';
$add_top_spacing           = (bool) get_sub_field( 'add_top_spacing' );
$add_divider               = (bool) get_sub_field( 'add_divider' );
$show_divider_above        = (bool) get_sub_field( 'show_divider_above' );
$row_classes               = 'row';
$heading_classes           = 'mb-4 text-primary mt-5 mt-lg-0 mb-lg-4';
$list_classes              = 'custom-list';
$links_classes             = 'mb-4 mt-lg-3 feature-content-section__links h5';
$container_classes         = 'container bloc-no-padding-lg bloc-sm bloc-lg-sm bloc-md-md';
$image_column_classes      = 'text-left text-lg-center col-12 align-self-start col-lg-4';
$content_column_classes    = 'text-left offset-0 order-1 col-12 align-self-start col-lg-8';
$top_surgery_image_class   = 'col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-5 align-self-center';
$top_surgery_content_class = 'col-sm-12 order-sm-2 col-lg-8 col-md-8';
$uses_plain_intro_variant  = in_array( $style_variant, [ 'top_surgery', 'plain_intro' ], true );
$is_research_overview      = is_page( 'research' ) && 'Research Overview' === wp_strip_all_tags( (string) $section_heading );
$image_render_args         = [
	'class'         => 'img-fluid mx-auto d-block img-protected illustratormedium',
	'sizes'         => '(max-width: 991px) 100vw, 213px',
	'lazy'          => true,
	'fetchpriority' => 'auto',
	'fallback_size' => 'medium',
	'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
];

if ( ! function_exists( 'simontsao_render_split_section_list_item' ) ) {
	/**
	 * Render a structured list item for the illustration/text split section.
	 *
	 * @param array  $item               Repeater row data.
	 * @param string $list_style_variant Current list style variant.
	 * @return void
	 */
	function simontsao_render_split_section_list_item( $item, $list_style_variant ) {
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
					<?php echo esc_html( ' - ' ); ?>
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
			<li><p><?php echo nl2br( esc_html( $default_text ) ); ?></p></li>
			<?php
		}
	}
}

if ( ! function_exists( 'simontsao_render_split_intro_text' ) ) {
	/**
	 * Render intro text with limited inline formatting support.
	 *
	 * @param string $content Intro text content.
	 * @return string
	 */
	function simontsao_render_split_intro_text( $content ) {
		$allowed_html = [
			'br'   => [],
			'span' => [
				'class' => true,
			],
			'a'    => [
				'class'  => true,
				'href'   => true,
				'target' => true,
				'rel'    => true,
			],
		];

		return wp_kses( $content, $allowed_html );
	}
}

if ( $add_top_spacing ) {
	$row_classes .= ' mt-lg-5';
}

if ( 'center' === $heading_alignment ) {
	$heading_classes .= ' text-center';
} else {
	$heading_classes .= ' text-left';
}

if ( 'highlighted_lead_text' === $list_style_variant && ! $is_research_overview ) {
	$list_classes  .= ' feature-content-section__list--research';
	$links_classes .= ' feature-content-section__links--research';
}

if ( $show_divider_above && function_exists( 'simontsao_render_section_divider' ) ) {
	simontsao_render_section_divider();
}

if ( $is_research_overview ) {
	$container_classes      = 'container bloc-lg bloc-lg-lg';
	$image_column_classes   = 'col-sm-12 order-sm-1 col-lg-4 col-md-4 align-self-start bloc-margin-bottom text-left';
	$content_column_classes = 'col-sm-12 order-sm-2 col-lg-8 col-md-8';
	$heading_classes        = 'mg-md text-primary text-center';
	$links_classes          = 'mt-lg-5';
	$image_render_args      = [
		'class'         => 'img-fluid mx-auto d-block img-rd-lg img-padding-bottom mt-lg-5',
		'sizes'         => '(max-width: 991px) 100vw, 214px',
		'lazy'          => true,
		'fetchpriority' => 'auto',
		'fallback_size' => 'medium',
		'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large' ],
	];
}

if ( $add_divider ) {
	$container_classes .= ' b-divider';
}

if ( 'right' === $image_position ) {
	$image_column_classes      .= ' order-1 order-lg-2';
	$content_column_classes    .= ' order-2 order-lg-1';
	$top_surgery_image_class   .= ' order-lg-2';
	$top_surgery_content_class .= ' order-lg-1';
} else {
	$image_column_classes      .= ' order-1';
	$content_column_classes    .= ' order-2';
}

if ( $uses_plain_intro_variant ) :
	?>
		<div class="bloc section section-light">
			<div class="container bloc-lg bloc-md-lg">
			<div class="row">
				<div class="<?php echo esc_attr( $top_surgery_image_class ); ?>">
					<?php
					if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
						simontsao_render_responsive_picture(
							$section_image,
							[
								'class'         => 'img-fluid mx-auto d-block img-hospital--style mb-5 img-protected',
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

				<div class="<?php echo esc_attr( $top_surgery_content_class ); ?>">
					<?php if ( $section_heading ) : ?>
						<h2 class="text-primary text-center mb-5"><?php echo wp_kses_post( $section_heading ); ?></h2>
					<?php endif; ?>

					<?php if ( $intro_text ) : ?>
						<h5 class="mb-4"><?php echo simontsao_render_split_intro_text( $intro_text ); ?></h5>
					<?php endif; ?>

					<?php if ( $body_content ) : ?>
						<div class="feature-content-section__content">
							<?php echo wp_kses_post( $body_content ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $list_items ) : ?>
						<div class="feature-content-section__list">
							<ul class="custom-list">
								<?php foreach ( $list_items as $item ) : ?>
									<?php simontsao_render_split_section_list_item( $item, $list_style_variant ); ?>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php if ( $supporting_links_content ) : ?>
						<div>
							<?php echo wp_kses_post( $supporting_links_content ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	return;
endif;
?>

<div class="bloc section section-light">
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<div class="<?php echo esc_attr( $row_classes ); ?>">
			<div class="<?php echo esc_attr( $image_column_classes ); ?>">
				<?php
				if ( $section_image && function_exists( 'simontsao_render_responsive_picture' ) ) {
					simontsao_render_responsive_picture( $section_image, $image_render_args );
				}
				?>
			</div>

			<div class="<?php echo esc_attr( $content_column_classes ); ?>">
				<?php if ( $section_heading ) : ?>
					<h2 class="<?php echo esc_attr( $heading_classes ); ?>"><?php echo wp_kses_post( $section_heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $highlight_text ) : ?>
					<div class="blockquote callout-accent">
						<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="feature-content-section__content">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

					<?php if ( $list_items ) : ?>
						<div class="feature-content-section__list">
							<ul class="<?php echo esc_attr( $list_classes ); ?>">
								<?php foreach ( $list_items as $item ) : ?>
									<?php if ( $is_research_overview && 'highlighted_lead_text' === $list_style_variant ) : ?>
										<?php
										$lead_text       = $item['lead_text'] ?? '';
										$supporting_text = $item['supporting_text'] ?? '';
										?>
										<?php if ( $lead_text || $supporting_text ) : ?>
											<li>
												<p>
													<?php if ( $lead_text ) : ?>
														<span class="year"><?php echo esc_html( $lead_text ); ?></span>
													<?php endif; ?>
													<?php if ( $lead_text && $supporting_text ) : ?>
														<?php echo esc_html( ' - ' ); ?>
													<?php endif; ?>
													<?php if ( $supporting_text ) : ?>
														<?php echo nl2br( esc_html( $supporting_text ) ); ?>
													<?php endif; ?>
												</p>
											</li>
										<?php endif; ?>
									<?php else : ?>
										<?php simontsao_render_split_section_list_item( $item, $list_style_variant ); ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

				<?php if ( $supporting_links_content ) : ?>
					<div class="<?php echo esc_attr( $links_classes ); ?>">
						<?php echo wp_kses_post( $supporting_links_content ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
