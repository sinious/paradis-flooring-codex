<?php
/**
 * Theme bootstrap for Paradis Flooring Codex.
 */

if ( ! function_exists( 'paradis_flooring_codex_editor_style' ) ) :
	/**
	 * Load editor styling.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'paradis_flooring_codex_editor_style' );

if ( ! function_exists( 'paradis_flooring_codex_enqueue_styles' ) ) :
	/**
	 * Load the theme stylesheet directly.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_enqueue_styles() {
		wp_enqueue_style(
			'paradis-flooring-codex-style',
			get_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		wp_style_add_data(
			'paradis-flooring-codex-style',
			'path',
			get_theme_file_path( 'style.css' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'paradis_flooring_codex_enqueue_styles' );

if ( ! function_exists( 'paradis_flooring_codex_enqueue_google_fonts' ) ) :
	/**
	 * Load Google Fonts used by the theme.
	 *
	 * @return void
	 */
	function paradis_flooring_codex_enqueue_google_fonts() {
		wp_enqueue_style(
			'paradis-flooring-codex-fonts',
			'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap',
			array(),
			null
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'paradis_flooring_codex_enqueue_google_fonts' );

if ( ! function_exists( 'paradis_flooring_codex_filter_site_title' ) ) :
	/**
	 * Filter core/site-title to render "Paradis" instead of the full site title on inner pages.
	 *
	 * @param string $block_content The block content HTML.
	 * @param array  $block         The block details.
	 * @return string               Filtered block content HTML.
	 */
	function paradis_flooring_codex_filter_site_title( $block_content, $block ) {
		$classes = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
		if ( strpos( $classes, 'pfc-inner-logo' ) !== false || strpos( $classes, 'pfc-logo-main' ) !== false ) {
			if ( preg_match( '/<a[^>]*>/i', $block_content ) ) {
				$block_content = preg_replace( '/(<a[^>]*>).*?(<\/a>)/is', '$1Paradis$2', $block_content );
			} else {
				$block_content = preg_replace( '/(<[^>]+>).*?(<\/[^>]+>)/is', '$1Paradis$2', $block_content );
			}
		}
		return $block_content;
	}
endif;
add_filter( 'render_block_core/site-title', 'paradis_flooring_codex_filter_site_title', 10, 2 );



