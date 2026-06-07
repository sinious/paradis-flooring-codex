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

/**
 * Enqueue the Interactive Gallery Choice Engine Script
 */
function pfc_enqueue_gallery_game_assets() {
    // Only target the specific page layout to protect global compute overhead
    if ( is_page( 'gallery' ) ) {
        wp_enqueue_script(
            'pfc-gallery-game',
            get_template_directory_uri() . '/js/pfc-gallery-game.js',
            array(), // No heavy framework dependencies needed
            '1.0.0',
            true    // Injected into the footer to prevent blocking DOM render tracks
        );
    }
}
add_action( 'wp_enqueue_scripts', 'pfc_enqueue_gallery_game_assets' );

/**
 * Enqueue Core Smart Header Interaction Framework
 */
function pfc_enqueue_smart_header_script() {
    wp_enqueue_script(
        'pfc-smart-header',
        get_template_directory_uri() . '/js/pfc-smart-header.js',
        array(), 
        '1.0.0',
        true // Inject smoothly into footer to prevent rendering blocks on paint tracks
    );
}
add_action( 'wp_enqueue_scripts', 'pfc_enqueue_smart_header_script' );