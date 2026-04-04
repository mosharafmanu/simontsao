<?php
/**
 * Flexible Content Renderer
 *
 * Renders ACF Flexible Content layouts dynamically based on available templates.
 *
 * @package Simontsao
 */

if ( ! function_exists( 'simontsao_flexible_content' ) ) {
	/**
	 * Render ACF Flexible Content sections
	 *
	 * @param string  $field_name Field name. Default 'cms'.
	 * @param int|null $post_id   Optional post ID. Uses current post if not provided.
	 * @return void
	 */
	function simontsao_flexible_content( $field_name = 'cms', $post_id = null ) {
		// Bail if ACF isn't active
		if ( ! function_exists( 'have_rows' ) ) {
			return;
		}

		// Use current post if no post ID provided
		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		// Nothing to render
		if ( ! have_rows( $field_name, $post_id ) ) {
			return;
		}

		// Track previous layout and section index for conditional styling
		$previous_layout = '';
		$section_index   = 0;

		while ( have_rows( $field_name, $post_id ) ) {
			the_row();

			$layout = get_row_layout();

			if ( empty( $layout ) ) {
				continue;
			}

			// Store previous layout and section index in global for templates to access
			$GLOBALS['simontsao_previous_layout'] = $previous_layout;
			$GLOBALS['simontsao_section_index']   = $section_index;

			$template_aliases = [
				'feature_content_section'          => 'illustration_text_split_section',
				'illustration_text_split_section' => 'illustration_text_split_section',
			];

			$template_slug = $template_aliases[ $layout ] ?? $layout;
			$template_path = 'template-parts/sections/' . $template_slug;
			$template_file = locate_template( $template_path . '.php' );

			if ( $template_file ) {
				get_template_part( $template_path );
			} elseif ( current_user_can( 'manage_options' ) && WP_DEBUG ) {
				// Debug hint for admins when a template is missing
				echo '<!-- Missing template: ' . esc_html( $template_path ) . '.php -->';
			}

			// Update previous layout and increment index for next iteration
			$previous_layout = $layout;
			$section_index++;
		}

		// Store the last layout globally for footer to access
		$GLOBALS['simontsao_last_layout'] = $previous_layout;

		// Clean up globals
		unset( $GLOBALS['simontsao_previous_layout'] );
		unset( $GLOBALS['simontsao_section_index'] );
	}
}

if ( ! function_exists( 'simontsao_get_last_flexible_layout' ) ) {
	/**
	 * Get the last flexible content layout name
	 *
	 * @param string  $field_name Field name. Default 'cms'.
	 * @param int|null $post_id   Optional post ID. Uses current post if not provided.
	 * @return string|false The last layout name or false if none found
	 */
	function simontsao_get_last_flexible_layout( $field_name = 'cms', $post_id = null ) {
		// Bail if ACF isn't active
		if ( ! function_exists( 'have_rows' ) ) {
			return false;
		}

		// Use current post if no post ID provided
		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		// Nothing to check
		if ( ! have_rows( $field_name, $post_id ) ) {
			return false;
		}

		$last_layout = '';

		while ( have_rows( $field_name, $post_id ) ) {
			the_row();
			$last_layout = get_row_layout();
		}

		// Reset the loop
		reset_rows();

		return $last_layout;
	}
}

if ( ! function_exists( 'simontsao_get_first_flexible_layout' ) ) {
	/**
	 * Get the first flexible content layout name
	 *
	 * @param string  $field_name Field name. Default 'cms'.
	 * @param int|null $post_id   Optional post ID. Uses current post if not provided.
	 * @return string|false The first layout name or false if none found
	 */
	function simontsao_get_first_flexible_layout( $field_name = 'cms', $post_id = null ) {
		// Bail if ACF isn't active
		if ( ! function_exists( 'have_rows' ) ) {
			return false;
		}

		// Use current post if no post ID provided
		if ( null === $post_id ) {
			$post_id = get_the_ID();
		}

		// Nothing to check
		if ( ! have_rows( $field_name, $post_id ) ) {
			return false;
		}

		$first_layout = '';

		// Get the first row
		if ( have_rows( $field_name, $post_id ) ) {
			the_row();
			$first_layout = get_row_layout();
		}

		// Reset the loop
		reset_rows();

		return $first_layout;
	}
}

if ( ! function_exists( 'simontsao_has_hero_first_section' ) ) {
	/**
	 * Check if the first flexible content section is a hero section
	 * Also checks for blog page which uses inner_hero from options
	 *
	 * @param string  $field_name Field name. Default 'cms'.
	 * @param int|null $post_id   Optional post ID. Uses current post if not provided.
	 * @return bool True if first section is hero_section or inner_hero
	 */
	function simontsao_has_hero_first_section( $field_name = 'cms', $post_id = null ) {
		// Check if it's the blog page (which uses inner_hero from options)
		if ( is_home() ) {
			return true;
		}

		// Check flexible content for other pages
		$first_layout = simontsao_get_first_flexible_layout( $field_name, $post_id );

		// Check if first layout is hero_section or inner_hero
		return in_array( $first_layout, [ 'hero_section', 'inner_hero' ], true );
	}
}

if ( ! function_exists( 'simontsao_render_section_divider' ) ) {
	/**
	 * Render the standalone divider block used between original static sections.
	 *
	 * @return void
	 */
	function simontsao_render_section_divider() {
		?>
		<div class="bloc section section-light d-sm-flex d-none">
			<div class="container bloc-no-padding-lg bloc-sm-md bloc-no-padding">
				<div class="row">
					<div class="col text-left text-sm-left">
						<div class="divider-h divider-0-background-color d-sm-block d-none"></div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
