<?php
/**
 * Responsive Picture Helper
 *
 * Renders responsive picture elements for ACF image array fields using only
 * default WordPress image sizes.
 *
 * @package Simontsao
 */

if ( ! function_exists( 'simontsao_render_responsive_picture' ) ) {
	/**
	 * Render a responsive picture element.
	 *
	 * @param array $image ACF image array with at least an ID and URL.
	 * @param array $args  Optional render arguments.
	 * @return string|void
	 */
	function Simontsao_render_responsive_picture( $image, $args = [] ) {
		$defaults = [
			'class'         => '',
			'alt'           => '',
			'sizes'         => '100vw',
			'lazy'          => true,
			'fetchpriority' => 'auto',
			'echo'          => true,
			'fallback_size' => 'large',
			'image_sizes'   => [ 'thumbnail', 'medium', 'medium_large', 'large', 'full' ],
			'width'         => 0,
			'height'        => 0,
		];

		$args = wp_parse_args( $args, $defaults );

		if ( ! is_array( $image ) || empty( $image['ID'] ) || empty( $image['url'] ) ) {
			return;
		}

		$file_id = (int) $image['ID'];
		$file_url = $image['url'];

		$allowed_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large', 'full' ];
		$image_sizes   = array_values(
			array_intersect(
				array_map( 'strval', (array) $args['image_sizes'] ),
				$allowed_sizes
			)
		);

		if ( empty( $image_sizes ) ) {
			$image_sizes = $allowed_sizes;
		}

		$fallback_size = in_array( $args['fallback_size'], $allowed_sizes, true ) ? $args['fallback_size'] : 'large';
		$alt           = $args['alt'] !== '' ? $args['alt'] : ( $image['alt'] ?? '' );
		$class         = trim( (string) $args['class'] );
		$sizes_attr    = (string) $args['sizes'];
		$loading       = $args['lazy'] ? 'lazy' : 'eager';
		$width_attr    = absint( $args['width'] );
		$height_attr   = absint( $args['height'] );

		$file_path = get_attached_file( $file_id );

		if ( $file_path && file_exists( $file_path ) ) {
			$extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );

			if ( 'svg' === $extension ) {
				$svg_content = file_get_contents( $file_path );

				if ( $svg_content && strpos( $svg_content, '<svg' ) !== false ) {
					$svg_label = esc_attr( $alt !== '' ? $alt : 'SVG Image' );
					$class_attr = $class !== '' ? ' class="' . esc_attr( $class ) . '"' : '';
					$svg_tag = preg_replace( '/<svg\b/', '<svg' . $class_attr . ' role="img" aria-label="' . $svg_label . '"', $svg_content, 1 );
					$svg_tag = preg_replace( '/<\?xml.*?\?>/', '', $svg_tag );

					if ( $args['echo'] ) {
						echo $svg_tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						return;
					}

					return $svg_tag;
				}
			}
		}

		$srcset_entries = [];

		foreach ( $image_sizes as $size_name ) {
			$size_data = wp_get_attachment_image_src( $file_id, $size_name );

			if ( ! $size_data || empty( $size_data[0] ) || empty( $size_data[1] ) ) {
				continue;
			}

			$srcset_entries[ (int) $size_data[1] ] = $size_data[0] . ' ' . (int) $size_data[1] . 'w';
		}

		if ( empty( $srcset_entries ) ) {
			$full_size = wp_get_attachment_image_src( $file_id, 'full' );

			if ( $full_size && ! empty( $full_size[0] ) ) {
				$srcset_entries[ (int) $full_size[1] ] = $full_size[0] . ' ' . (int) $full_size[1] . 'w';
			}
		}

		$fallback_image = wp_get_attachment_image_src( $file_id, $fallback_size );

		if ( ! $fallback_image || empty( $fallback_image[0] ) ) {
			$fallback_image = wp_get_attachment_image_src( $file_id, 'full' );
		}

		if ( ! $fallback_image || empty( $fallback_image[0] ) ) {
			$fallback_image = [
				$file_url,
				0,
				0,
			];
		}

		ksort( $srcset_entries );
		$srcset = implode( ', ', $srcset_entries );

		$html  = '<picture>';
		$html .= '<img';
		$html .= ' src="' . esc_url( $fallback_image[0] ) . '"';

		if ( $srcset !== '' ) {
			$html .= ' srcset="' . esc_attr( $srcset ) . '"';
		}

		$html .= ' sizes="' . esc_attr( $sizes_attr ) . '"';

		if ( $width_attr > 0 ) {
			$html .= ' width="' . esc_attr( (string) $width_attr ) . '"';
		} elseif ( ! empty( $fallback_image[1] ) ) {
			$html .= ' width="' . esc_attr( (string) $fallback_image[1] ) . '"';
		}

		if ( $height_attr > 0 ) {
			$html .= ' height="' . esc_attr( (string) $height_attr ) . '"';
		} elseif ( ! empty( $fallback_image[2] ) ) {
			$html .= ' height="' . esc_attr( (string) $fallback_image[2] ) . '"';
		}

		$html .= ' alt="' . esc_attr( $alt ) . '"';

		if ( $class !== '' ) {
			$html .= ' class="' . esc_attr( $class ) . '"';
		}

		$html .= ' loading="' . esc_attr( $loading ) . '"';

		if ( 'auto' !== $args['fetchpriority'] && in_array( $args['fetchpriority'], [ 'high', 'low' ], true ) ) {
			$html .= ' fetchpriority="' . esc_attr( $args['fetchpriority'] ) . '"';
		}

		$html .= ' />';
		$html .= '</picture>';

		if ( $args['echo'] ) {
			echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			return;
		}

		return $html;
	}
}
