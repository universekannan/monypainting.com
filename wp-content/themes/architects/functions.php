<?php
/**
 * Theme functions and definitions
 *
 * @package Architects
 */

/**
 * After setup theme hook
 */
function architects_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'architects', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/architects-customizer-options.php';	
}
add_action( 'after_setup_theme', 'architects_theme_setup' );

/**
 * Load assets.
 */

function architects_theme_css() {
	wp_enqueue_style( 'architects-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('architects-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('architects-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );	
	wp_enqueue_style('architects-bootstrap-smartmenus-css', get_stylesheet_directory_uri() . "/assets/css/bootstrap-smartmenus.css" ); 
	wp_dequeue_script( 'designexo-custom-js' );
	wp_enqueue_script('architects-custom-js', get_stylesheet_directory_uri() . "/assets/js/custom.js" );
}
add_action( 'wp_enqueue_scripts', 'architects_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function architects_parent_theme_options() {
	$designexo_mods = get_option( 'theme_mods_designexo' );
	if ( ! empty( $designexo_mods ) ) {
		foreach ( $designexo_mods as $designexo_mod_k => $designexo_mod_v ) {
			set_theme_mod( $designexo_mod_k, $designexo_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'architects_parent_theme_options' );

/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_architects_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	set_theme_mod( 'designexo_page_header_background_color', 'rgba(0,0,0,0.6)' );
	set_theme_mod( 'designexo_testomonial_background_image', get_stylesheet_directory_uri().'/assets/img/theme-testi-bg.jpg' );
	set_theme_mod( 'designexo_theme_color', 'theme-gorse' );
	set_theme_mod( 'designexo_typography_disabled', true );
	set_theme_mod( 'designexo_typography_h1_font_family', 'Fira Sans' );
	set_theme_mod( 'designexo_typography_h2_font_family', 'Fira Sans' );
	set_theme_mod( 'designexo_typography_h3_font_family', 'Fira Sans' );
	set_theme_mod( 'designexo_typography_h4_font_family', 'Fira Sans' );
	set_theme_mod( 'designexo_typography_h5_font_family', 'Fira Sans' );
	set_theme_mod( 'designexo_typography_h6_font_family', 'Fira Sans' );
	set_theme_mod( 'designexo_typography_widget_title_font_family', 'Fira Sans' );
	set_theme_mod( 'designexo_main_header_style', 'center_logo' );
	set_theme_mod( 'designexo_service_content_alignment', 'center' );
	set_theme_mod( 'designexo_project_column_layout', '3' );
	set_theme_mod( 'designexo_blog_column_layout', '3' );
	
	
	update_option( 'fresh_architects_site_activate', true );
}

/**
 * Page header
 *
 */
function architects_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'architects_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/architects-page-header.jpg',
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'architects_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'architects_custom_header_setup' );

/**
 * Custom background
 *
 */
function architects_custom_background_setup() {
	add_theme_support( 'custom-background', apply_filters( 'architects_custom_background_args', array(
		'default-color' => '202020',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'architects_custom_background_setup' );

/**
 * Custom Theme Script
*/
function architects_custom_theme_css() {
	$architects_testomonial_background_image = get_theme_mod('designexo_testomonial_background_image');
	?>
    <style type="text/css">
		<?php if($architects_testomonial_background_image != null) : ?>
		.theme-testimonial { 
		        background-image: url(<?php echo esc_url( $architects_testomonial_background_image ); ?>); 
                background-size: cover;
				background-position: center center;
		}
        <?php endif; ?>
    </style>
 
<?php }
add_action('wp_footer','architects_custom_theme_css');


if ( ! function_exists( 'architects_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see architect_decor_custom_header_setup().
	 */
	function architects_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;