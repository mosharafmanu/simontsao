<?php
/**
 * Unified overview section layout.
 *
 * @package Simontsao
 */

$current_layout            = get_row_layout();
$section_link              = get_sub_field( 'section_link' );
$section_heading           = get_sub_field( 'section_heading' );
$profile_heading           = get_sub_field( 'profile_heading' );
$heading_text              = $profile_heading ?: $section_heading;
$highlight_text            = get_sub_field( 'highlight_text' );
$intro_content             = get_sub_field( 'intro_content' );
$body_content              = get_sub_field( 'body_content' );
$supporting_links_content  = get_sub_field( 'supporting_links_content' );
$section_image             = get_sub_field( 'section_image' );
$profile_image             = get_sub_field( 'profile_image' );
$image_to_render           = $section_image ?: $profile_image;
$journey_callout_group     = get_sub_field( 'journey_callout_group' );
$journey_callout_content   = $journey_callout_group['journey_callout_content'] ?? get_sub_field( 'journey_callout_content' );
$journey_icon              = $journey_callout_group['journey_icon'] ?? get_sub_field( 'journey_icon' );
$use_shared_links_raw      = get_sub_field( 'use_shared_links' );
$use_shared_links          = null !== $use_shared_links_raw ? (bool) $use_shared_links_raw : false;
$shared_information_data   = function_exists( 'simontsao_get_additional_information_links_data' ) ? simontsao_get_additional_information_links_data() : [];

if ( $use_shared_links ) {
	$information_group_heading = $shared_information_data['information_heading'] ?? '';
	$surgeries_group_heading   = $shared_information_data['surgeries_heading'] ?? '';
	$information_links         = $shared_information_data['information_links'] ?? [];
	$surgeries_links           = $shared_information_data['surgeries_links'] ?? [];
} else {
	$information_group_heading = get_sub_field( 'information_group_heading' );
	$surgeries_group_heading   = get_sub_field( 'surgeries_group_heading' );
	$information_links         = get_sub_field( 'information_links' );
	$surgeries_links           = get_sub_field( 'surgeries_links' );
}

$has_links_groups = ! empty( $information_group_heading ) || ! empty( $surgeries_group_heading ) || ! empty( $information_links ) || ! empty( $surgeries_links );
$has_journey      = $journey_icon || $journey_callout_content;
$has_image        = ! empty( $image_to_render );
$has_section_link = ! empty( $section_link['title'] );

if ( $body_content && in_array( $current_layout, [ 'specialist_overview', 'breast_cancer_overview' ], true ) ) {
	$body_content = preg_replace( '/<p>/', '<p class="mb-4">', $body_content, 1 );
}

if ( 'specialist_overview' === $current_layout ) :
	?>
	<div class="bloc section section-light" id="conditions-treated">
		<div class="container bloc-md-lg bloc-sm" id="surgical-conditions-overview">
			<div class="row" id="melbourne-breast-surgeon">
				<div class="col-lg-12 col-md-12 mb-lg-5" id="melbourne-surgical-conditions">
					<?php if ( ! empty( $section_link['title'] ) ) : ?>
						<h2 class="mg-md mx-auto d-block text-lg-center text-primary h1" id="melbourne-breast-surgery">
							<span class="text-center text-lg-left pb-lg-2 d-block" id="breast-surgical-expert">
								<a class="link-primary" href="<?php echo esc_url( $section_link['url'] ?? '#' ); ?>"<?php echo ( ! empty( $section_link['target'] ) && '_blank' === $section_link['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $section_link['title'] ); ?></a>
							</span>
						</h2>
					<?php endif; ?>

					<div class="row align-items-center mt-lg-5 mb-lg-0">
						<div class="col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-0 align-self-start mt-3">
							<?php
							if ( $image_to_render && function_exists( 'simontsao_render_responsive_picture' ) ) {
								simontsao_render_responsive_picture(
									$image_to_render,
									[
										'class'         => 'img-fluid mx-auto d-block img-hospital--style mb-lg-0 img-protected',
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
							<?php if ( $heading_text ) : ?>
								<h3 class="mb-4 text-primary h2"><?php echo esc_html( $heading_text ); ?></h3>
							<?php endif; ?>

							<?php if ( $highlight_text ) : ?>
								<div class="blockquote callout-accent" id="surgical-understanding-and-experience">
									<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
								</div>
							<?php endif; ?>

							<?php if ( $body_content ) : ?>
								<div class="specialist-overview-content">
									<?php echo wp_kses_post( $body_content ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $supporting_links_content ) : ?>
								<div class="mb-4 h5 specialist-overview-links">
									<?php echo wp_kses_post( $supporting_links_content ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="col text-left text-sm-left">
					<div class="divider-h divider-0-background-color">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	return;
endif;

if ( 'breast_cancer_overview' === $current_layout ) :
	?>
	<div class="bloc section section-light callout-accent">
		<div class="container bloc-sm-lg bloc-sm">
			<div class="row">
				<div class="col-lg-12 col-md-12 mb-lg-5">
					<div class="row align-items-center mt-lg-2 mb-lg-2">
						<div class="col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-0 align-self-start mt-0">
							<?php
							if ( $image_to_render && function_exists( 'simontsao_render_responsive_picture' ) ) {
								simontsao_render_responsive_picture(
									$image_to_render,
									[
										'class'         => 'img-fluid mx-auto d-block img-hospital--style mb-lg-0 img-protected',
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
							<?php if ( $heading_text ) : ?>
								<h2 class="mb-4 text-primary"><?php echo esc_html( $heading_text ); ?></h2>
							<?php endif; ?>

							<?php if ( $highlight_text ) : ?>
								<div class="blockquote callout-accent">
									<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
								</div>
							<?php endif; ?>

							<?php if ( $body_content ) : ?>
								<div class="breast-cancer-overview-content">
									<?php echo wp_kses_post( $body_content ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $has_journey ) : ?>
								<div class="row mt-lg-5 mb-lg-5">
									<div class="mt-4 mb-4 col-4 col-lg-2 col-sm-2 mb-lg-4">
										<?php
										if ( $journey_icon && function_exists( 'simontsao_render_icon' ) ) {
											simontsao_render_icon(
												$journey_icon,
												[
													'class' => 'img-fluid mx-auto d-block img-bloc-3-style',
													'alt'   => $journey_icon['alt'] ?? '',
												]
											);
										}
										?>
									</div>
									<div class="col-8 col-sm-10 col-lg-8 align-self-center">
										<div class="mt-4 mb-4 h5">
											<?php echo wp_kses_post( $journey_callout_content ); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<div class="row">
								<div class="col-md-4 text-left col-lg-6">
									<?php if ( $information_group_heading ) : ?>
										<div class="blockquote mt-sm-5 mt-5 mt-md-0 callout-accent">
											<p class="callout-primary text-primary"><?php echo esc_html( $information_group_heading ); ?></p>
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

								<div class="col-md-4 text-left col-lg-6">
									<?php if ( $surgeries_group_heading ) : ?>
										<div class="blockquote callout-accent">
											<p class="text-primary"><?php echo esc_html( $surgeries_group_heading ); ?></p>
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
				</div>

				<div class="col text-left text-sm-left">
					<div class="divider-h divider-0-background-color">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	return;
endif;

if ( $has_image ) :
	$row_spacing_classes   = $has_section_link ? 'row align-items-center mt-lg-5 mb-lg-0' : 'row align-items-center mt-lg-2 mb-lg-2';
	$image_margin_classes  = $has_section_link ? 'col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-0 align-self-start mt-3' : 'col-sm-12 order-sm-1 col-lg-4 col-md-4 mt-lg-0 align-self-start mt-0';
	$container_classes     = $has_section_link ? 'container bloc-md-lg bloc-sm' : 'container bloc-sm-lg bloc-md';
	$container_id          = $has_section_link ? 'surgical-conditions-overview' : '';
	$outer_row_id          = $has_section_link ? 'melbourne-breast-surgeon' : '';
	$outer_col_id          = $has_section_link ? 'melbourne-surgical-conditions' : '';
	?>
	<div class="bloc section section-light">
		<div class="<?php echo esc_attr( $container_classes ); ?>"<?php echo $container_id ? ' id="' . esc_attr( $container_id ) . '"' : ''; ?>>
			<div class="row"<?php echo $outer_row_id ? ' id="' . esc_attr( $outer_row_id ) . '"' : ''; ?>>
				<div class="col-lg-12 col-md-12 mb-lg-5"<?php echo $outer_col_id ? ' id="' . esc_attr( $outer_col_id ) . '"' : ''; ?>>
					<?php if ( $has_section_link ) : ?>
						<h2 class="mg-md mx-auto d-block text-lg-center text-primary h1">
							<span class="text-center text-lg-left pb-lg-2 d-block">
								<a class="link-primary" href="<?php echo esc_url( $section_link['url'] ?? '#' ); ?>"<?php echo ( ! empty( $section_link['target'] ) && '_blank' === $section_link['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $section_link['title'] ); ?></a>
							</span>
						</h2>
					<?php endif; ?>

					<div class="<?php echo esc_attr( $row_spacing_classes ); ?>">
						<div class="<?php echo esc_attr( $image_margin_classes ); ?>">
							<?php
							if ( $image_to_render && function_exists( 'simontsao_render_responsive_picture' ) ) {
								simontsao_render_responsive_picture(
									$image_to_render,
									[
										'class'         => 'img-fluid mx-auto d-block img-hospital--style mb-5 mb-lg-0 img-protected',
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
							<?php if ( $heading_text ) : ?>
								<h2 class="mb-4 text-primary"><?php echo esc_html( $heading_text ); ?></h2>
							<?php endif; ?>

							<?php if ( $highlight_text ) : ?>
								<div class="blockquote callout-accent">
									<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
								</div>
							<?php endif; ?>

							<?php if ( $intro_content ) : ?>
								<div class="mb-4 top-surgery-overview-intro">
									<?php echo wp_kses_post( $intro_content ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $body_content ) : ?>
								<div class="mb-lg-4 top-surgery-overview-content">
									<?php echo wp_kses_post( $body_content ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $has_journey ) : ?>
								<div class="row mt-lg-5 mb-lg-5">
									<div class="mt-4 mb-4 col-4 col-lg-2 col-sm-2 mb-lg-4">
										<?php
										if ( $journey_icon && function_exists( 'simontsao_render_icon' ) ) {
											simontsao_render_icon(
												$journey_icon,
												[
													'class' => 'img-fluid mx-auto d-block img-bloc-3-style',
													'alt'   => $journey_icon['alt'] ?? '',
												]
											);
										}
										?>
									</div>
									<div class="col-8 col-sm-10 col-lg-8 align-self-center">
										<div class="mt-4 mb-4 h5">
											<?php echo wp_kses_post( $journey_callout_content ); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<?php if ( $supporting_links_content ) : ?>
								<div class="mb-4 h5 top-surgery-overview-links">
									<?php echo wp_kses_post( $supporting_links_content ); ?>
								</div>
							<?php endif; ?>

							<?php if ( $has_links_groups ) : ?>
								<div class="row">
									<div class="col-md-4 text-left col-lg-6">
										<?php if ( $information_group_heading ) : ?>
											<div class="blockquote mt-sm-5 mt-5 mt-md-0 callout-accent">
												<p class="callout-primary text-primary"><?php echo esc_html( $information_group_heading ); ?></p>
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

									<div class="col-md-4 text-left col-lg-6">
										<?php if ( $surgeries_group_heading ) : ?>
											<div class="blockquote callout-accent">
												<p class="text-primary"><?php echo esc_html( $surgeries_group_heading ); ?></p>
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
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="col text-left text-sm-left">
					<div class="divider-h divider-0-background-color">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	return;
endif;
?>

<div class="bloc section section-light" id="breast-cancer-treatment">
	<div class="container bloc-md-lg bloc-sm bloc-lg-sm bloc-md-md">
		<div class="row">
			<div class="col">
				<?php if ( ! empty( $section_link['title'] ) ) : ?>
					<h2 class="mg-md text-primary">
						<a class="link-primary" href="<?php echo esc_url( $section_link['url'] ?? '#' ); ?>"<?php echo ( ! empty( $section_link['target'] ) && '_blank' === $section_link['target'] ) ? ' target="_blank" rel="noopener noreferrer"' : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $section_link['title'] ); ?></a>
					</h2>
				<?php elseif ( $heading_text ) : ?>
					<h2 class="mg-md text-primary"><?php echo esc_html( $heading_text ); ?></h2>
				<?php endif; ?>

				<?php if ( empty( $section_link['title'] ) && $highlight_text ) : ?>
					<div class="blockquote callout-accent">
						<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
					</div>
				<?php elseif ( ! empty( $section_link['title'] ) ) : ?>
					<?php if ( $heading_text ) : ?>
						<h3 class="mb-4 text-primary h2"><?php echo esc_html( $heading_text ); ?></h3>
					<?php endif; ?>
					<?php if ( $highlight_text ) : ?>
						<div class="blockquote callout-accent">
							<p class="callout-accent"><?php echo esc_html( $highlight_text ); ?></p>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $intro_content ) : ?>
					<div class="mb-4 top-surgery-overview-intro">
						<?php echo wp_kses_post( $intro_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $body_content ) : ?>
					<div class="highlighted-text-section__content">
						<?php echo wp_kses_post( $body_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $has_journey ) : ?>
					<div class="row mt-lg-5 mb-lg-5">
						<div class="mt-4 mb-4 col-4 col-lg-2 col-sm-2 mb-lg-4">
							<?php
							if ( $journey_icon && function_exists( 'simontsao_render_icon' ) ) {
								simontsao_render_icon(
									$journey_icon,
									[
										'class' => 'img-fluid mx-auto d-block img-bloc-3-style',
										'alt'   => $journey_icon['alt'] ?? '',
									]
								);
							}
							?>
						</div>
						<div class="col-8 col-sm-10 col-lg-8 align-self-center">
							<div class="mt-4 mb-4 h5">
								<?php echo wp_kses_post( $journey_callout_content ); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $supporting_links_content ) : ?>
					<div class="mb-4 h5 top-surgery-overview-links">
						<?php echo wp_kses_post( $supporting_links_content ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $has_links_groups ) : ?>
					<div class="row">
						<div class="col-md-4 text-left col-lg-6">
							<?php if ( $information_group_heading ) : ?>
								<div class="blockquote mt-sm-5 mt-5 mt-md-0 callout-accent">
									<p class="callout-primary text-primary"><?php echo esc_html( $information_group_heading ); ?></p>
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

						<div class="col-md-4 text-left col-lg-6">
							<?php if ( $surgeries_group_heading ) : ?>
								<div class="blockquote callout-accent">
									<p class="text-primary"><?php echo esc_html( $surgeries_group_heading ); ?></p>
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
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
