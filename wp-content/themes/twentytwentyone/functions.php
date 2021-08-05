<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentytwentyone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => __( 'Secondary menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );


/**
 * Generate Sportsblog APIs
 *
 */

add_action( 'rest_api_init', 'register_sportsblog_api_hooks');

function register_sportsblog_api_hooks() {
	
	/* Fetch Categories */
	register_rest_route( 'sportsblog/v1', '/sports-category/get-categories/(?P<perPageVal>\d+)/(?P<offsetVal>\d+)/(?P<filterVal>\w+)', array(
	/*register_rest_route( 'sportsblog/v1', '/sports-category/get-categories/(?P<perPageVal>[\d]+)/(?P<offsetVal>[\w]+)', array(*/
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => WP_REST_Server::ALLMETHODS,
	    'callback' => 'sportsblogGetCategories'
  	));

	/* Add Category */
	register_rest_route( 'sportsblog/v1', '/sports-category/add-category/', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => WP_REST_Server::ALLMETHODS,
	    'callback' => 'sportsblogAddCategory',
	    'args' => array(
	    	'store_code' => array(
	    		'type' => 'string'
	    	)
	    )
  	));

	/* Get Category */
	register_rest_route( 'sportsblog/v1', '/sports-category/get-category-details/(?P<catId>\d+)', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => 'GET',
	    'callback' => 'sportsblogGetCategoryDetails'
  	));

	/* Update Category */
	register_rest_route( 'sportsblog/v1', '/sports-category/update-category/', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => 'PUT',
	    'callback' => 'sportsblogUpdateCategory'
  	));

	/* Delete Category */
	register_rest_route( 'sportsblog/v1', '/sports-category/delete-category/(?P<catId>\d+)', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => 'DELETE',
	    'callback' => 'sportsblogDeleteCategory'
  	));

  	/* Fetch Sports Blog */
	register_rest_route( 'sportsblog/v1', '/sports-blog/get-blogs/', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => WP_REST_Server::ALLMETHODS,
	    'callback' => 'sportsblogGetBlogs'
  	));

	/* Add Sports Blog */
	register_rest_route( 'sportsblog/v1', '/sports-blog/add-blog/', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => WP_REST_Server::ALLMETHODS,
	    'callback' => 'sportsblogAddBlog',
	    /*'args' => array(
	    	'store_code' => array(
	    		'type' => 'string'
	    	)
	    )*/
  	));

	/* Get Sports Blog */
	register_rest_route( 'sportsblog/v1', '/sports-blog/get-blog-details/(?P<blogId>\d+)', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => 'GET',
	    'callback' => 'sportsblogGetBlogDetails',
	    /*'args' => array(
	    	'store_code' => array(
	    		'type' => 'string'
	    	)
	    )*/
  	));

  	/* Update Sports Blog */
	register_rest_route( 'sportsblog/v1', '/sports-blog/update-blog/', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => 'PUT',
	    'callback' => 'sportsblogUpdateBlog'
  	));

	/* Delete Sports Blog */
	register_rest_route( 'sportsblog/v1', '/sports-blog/delete-blog/(?P<blogId>\d+)', array(
	    /*'methods' => WP_REST_Server::CREATABLE,*/
	    'methods' => 'DELETE',
	    'callback' => 'sportsblogDeleteBlog'
  	));


	/* Add User */
	register_rest_route( 'sportsblog/v1', '/user-auth/add-user/', array(
	    'methods' => WP_REST_Server::CREATABLE,
	    /*'methods' => WP_REST_Server::ALLMETHODS,*/
	    'callback' => 'sportsblogAddUser',
	    'args' => array(
	    	'store_code' => array(
	    		'type' => 'string'
	    	)
	    )
  	));

	/*register_rest_route( 'enroute/v1', '/order-details/(?P<id>\d+)', array(
	    'methods' => WP_REST_Server::ALLMETHODS,
	    'callback' => 'n2_enroute_order_details'
  	));

	register_rest_route( 'enroute/v1', '/product-details/(?P<id>\d+)', array(
	    'methods' => WP_REST_Server::ALLMETHODS,
	    'callback' => 'n2_enroute_product_details'
  	));*/

}

/*
 * Add User
 *
 *	
*/
if(!function_exists('sportsblogAddUser')) {
	function sportsblogAddUser(WP_REST_Request $requestParams) {
		$requestedData = $requestParams->get_params();
		$first_name = $requestedData['first_name'];
		$last_name = $requestedData['last_name'];
		$email = $requestedData['email'];
		$phone = $requestedData['phone'];
		$password = $requestedData['password'];

		$userID = wp_create_user($email, $password, $email);
		$getUser = new WP_User($userID);
		$getUser->remove_role('subscriber');
		$getUser->add_role('blog_owner');
		update_user_meta($userID, 'first_name', $first_name);
		update_user_meta($userID, 'last_name', $last_name);
		update_user_meta($userID, 'phone', $phone);

		if(!is_wp_error($userID)) {
			return ['status' => 200, 'message' => 'You have registered successfully.'];
		} else {
			return ['status' => 400, 'message' => 'Registration can not be completed.'];
		}

	}
}

/*
 * Get Sports Categories
 *
 */
//function sportsblog_get_categories($data) {
if(!function_exists('sportsblogGetCategories')) {
	function sportsblogGetCategories($data) {

		//$order = wc_get_order($data['id']);

	    $per_page =  $data->get_param('perPageVal');
		$offsetVal = $data->get_param('offsetVal');
		$filterVal = $data->get_param('filterVal');
		//$page = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
		$page = ( $offsetVal ) ? $offsetVal : 1;
	    $offset = ( $page - 1 ) * $per_page;
	    $termArgs = ['hide_empty' => false, 'number' => $per_page, 'offset' => $offset];
	    if($filterVal != "all") {
	    	$termArgs['name__like'] = $filterVal;
	    }
		$getSportsCategory = get_terms('sports_blog_category', $termArgs);
		$getTotalSportsCategory = get_terms('sports_blog_category', ['hide_empty' => false]);
		if(!empty($getSportsCategory)) {
			return ['status' => 200, 'message' => 'Sports categories fetched successfully.', 'categories' => $getSportsCategory, 'count' => count($getTotalSportsCategory)];
		} else {
			return ['status' => 400, 'message' => 'No sports category found.', 'categories' => [], 'count' => 0];
		}
	}
}

/*
 * Add Sports Category
 *
 */
if(!function_exists('sportsblogAddCategory')) {
	function sportsblogAddCategory(WP_REST_Request $requestParams) {
		$requestedData = $requestParams->get_params();

		//'store_code' => $requestParams->get_param('store_code')
		$category_name = $requestedData['category_name'];
		$category_desc = $requestedData['category_desc'];
		$termArg = ['description' => $category_desc];

		$categoryInserted = wp_insert_term($category_name, 'sports_blog_category', $termArg);
		if(!empty($categoryInserted)) {
			return ['status' => 200, 'message' => 'Sports category added successfully.'];
		} else {
			return ['status' => 400, 'message' => 'No category added.'];
		}
	}
}

/*
 * Get Sports Category Details
 *
 */
if(!function_exists('sportsblogGetCategoryDetails')) {
	function sportsblogGetCategoryDetails($data) {
		$catId = $data->get_param( 'catId' );
		$getCategoryDetails = get_term_by('id', $catId, 'sports_blog_category');
		if(!empty($getCategoryDetails)) {
			return ['status' => 200, 'message' => 'Category details received.', 'catDetails' => $getCategoryDetails];
		} else {
			return ['status' => 400, 'message' => 'No category found.', 'catDetails' => ''];
		}
	}
}

/*
 * Update Sports Category
 *
 */
if(!function_exists('sportsblogUpdateCategory')) {
	function sportsblogUpdateCategory(WP_REST_Request $requestParams) {
		$requestedData = $requestParams->get_params();
		$category_id = $requestedData['category_id'];
		$category_name = $requestedData['category_name'];
		$category_desc = $requestedData['category_desc'];
		$updatedData = [
			'name' => $category_name,
			'description' => $category_desc
		];
		$updateCategory = wp_update_term($category_id, 'sports_blog_category', $updatedData);
		if(!empty($updateCategory)) {
			return ['status' => 200, 'message' => 'Category details updated.'];
		} else {
			return ['status' => 400, 'message' => 'No category updated.'];
		}
	}
}


/*
 * Delete Sports Category
 *
 */
if(!function_exists('sportsblogDeleteCategory')) {
	function sportsblogDeleteCategory($data) {
		$catId = $data->get_param('catId');
		$deleteCategory = wp_delete_term($catId, 'sports_blog_category');
		if($deleteCategory) {
			return ['status' => 200, 'message' => 'Category deleted.'];
		} else {
			return ['status' => 400, 'message' => 'No category deleted.'];
		}
	}
}


/*
 * Get Sports Blogs
 *
 */
if(!function_exists('sportsblogGetBlogs')) {
	function sportsblogGetBlogs() {

		//$order = wc_get_order($data['id']);
		$getSportsBlogs = get_posts(['post_type' => 'sportsblog', 'posts_per_page' => -1]);

		if(is_array($getSportsBlogs) && count($getSportsBlogs) > 0) {
			$blogArr = [];
			$i = 0;
			foreach ($getSportsBlogs as $eachSportsCat) {
				$blogImg = wp_get_attachment_image_src(get_post_thumbnail_id($eachSportsCat->ID), 'full');
				$blogCat = wp_get_object_terms($eachSportsCat->ID, 'sports_blog_category');
				$blogArr[$i]['ID'] = $eachSportsCat->ID;
				$blogArr[$i]['title'] = $eachSportsCat->post_title;
				$blogArr[$i]['posted_on'] = $eachSportsCat->post_date;
				$blogArr[$i]['category'] = (!empty($blogCat)) ? $blogCat[0]->name : 'Uncategorized';
				$blogArr[$i]['content'] = $eachSportsCat->post_content;
				$blogArr[$i]['image'] = $blogImg[0];
				$i++;
			}
		}

		if(!is_wp_error($getSportsCategory)) {
			return ['status' => 200, 'message' => 'Sports blogs fetched successfully.', 'blogData' => $blogArr];
		} else {
			return ['status' => 400, 'message' => 'No sports blog found.', 'blogData' => []];
		}
	}
}

/*
 * Add Sports Blog
 *
 */
if(!function_exists('sportsblogAddBlog')) {
	function sportsblogAddBlog(WP_REST_Request $requestParams) {
		$requestedData = $requestParams->get_params();
		$title = $requestedData['title'];
		$category = $requestedData['category'];
		$desc = $requestedData['desc'];
		$blog_image = $_FILES['blog_image'];

		$blogData = [
			'post_title' => $title,
			'post_content' => $desc,
			'post_type' => 'sportsblog',
			'post_status' => 'publish'
		];

		$blogId = wp_insert_post($blogData);
		wp_set_object_terms($blogId, $category, 'sports_blog_category');
		$uploadedBlogImg = common_file_upload($blog_image);
		$uploadedBlogImgID = create_attachment($uploadedBlogImg);
		set_post_thumbnail($blogId, $uploadedBlogImgID);

		if(!is_wp_error($blogId)) {
			return ['status' => 200, 'message' => 'Sports blog added successfully.'];
		} else {
			return ['status' => 400, 'message' => 'Sports can not be created.'];
		}
		return $_POST;
	}
}

/*
 * Get Sports Blog Details
 *
 */
if(!function_exists('sportsblogGetBlogDetails')) {
	function sportsblogGetBlogDetails($data) {
		$blogId = $data->get_param( 'blogId' );
		$getBlogDetails = get_post($blogId);
		$blogImg = wp_get_attachment_image_src(get_post_thumbnail_id($blogId), 'full');
		$blogCat = wp_get_object_terms($blogId, 'sports_blog_category');
		$blogArr['title'] = $getBlogDetails->post_title;
		$blogArr['posted_on'] = $getBlogDetails->post_date;
		$blogArr['category'] = (!empty($blogCat)) ? $blogCat[0]->slug : '';
		$blogArr['content'] = $getBlogDetails->post_content;
		$blogArr['image'] = $blogImg[0];

		if(!is_wp_error($blogArr)) {
			return ['status' => 200, 'message' => 'Blog details received.', 'blogDetails' => $blogArr];
		} else {
			return ['status' => 400, 'message' => 'No blog found.', 'blogDetails' => ''];
		}
	}
}

/*
 * Update Sports Blog
 *
 */
if(!function_exists('sportsblogUpdateBlog')) {
	function sportsblogUpdateBlog(WP_REST_Request $requestParams) {
		$requestedData = $requestParams->get_params();
		$blogId = $requestedData['blogId'];
		$blog_title = $requestedData['blog_title'];
		$blog_category = $requestedData['blog_category'];
		$blog_desc = $requestedData['blog_desc'];

		if(!empty($_FILES['blog_image']['name'])) {
			$uploadedBlogImg = common_file_upload($_FILES['blog_image']);
			$uploadedBlogImgID = create_attachment($uploadedBlogImg);
			set_post_thumbnail($blogId, $uploadedBlogImgID);
		}

		$updatedData = [
			'ID' => $blogId,
			'post_title' => $blog_title,
			'post_content' => $blog_desc
		];
		$updateBlog = wp_update_post($updatedData);
		wp_set_object_terms($blogId, $blog_category, 'sports_blog_category');
		if(!is_wp_error($updateBlog)) {
			return ['status' => 200, 'message' => 'Blog details updated.'];
		} else {
			return ['status' => 400, 'message' => 'No blog updated.'];
		}
	}
}

/*
 * Delete Sports Blog
 *
 */
if(!function_exists('sportsblogDeleteBlog')) {
	function sportsblogDeleteBlog($data) {
		$blogId = $data->get_param('blogId');
		$deleteBlog = wp_delete_post($blogId);
		if(!is_wp_error($deleteBlog)) {
			return ['status' => 200, 'message' => 'Blog deleted.'];
		} else {
			return ['status' => 400, 'message' => 'No blog deleted.'];
		}
	}
}


/*
 * Generate Random String
 *
 */
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/*
 * Common File Upload
 *
 */
function common_file_upload($uploadedFile) {
    if (!function_exists('wp_handle_upload')) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    $upload_overrides = array('test_form' => false);

    $movefile = wp_handle_upload($uploadedFile, $upload_overrides);

    if ($movefile && !isset($movefile['error'])) {
        return $movefile;
    } else {
        return $movefile['error'];
    }
}

/*
 * Create File Attachment
 *
 */
function create_attachment($uploadedFile) {
	$filename = $uploadedFile['file'];

	$attachment = array(
	    'guid' => $uploadedFile['url'],
	    'post_mime_type' => $uploadedFile['type'],
	    'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
	    'post_status' => 'inherit'
	);

	$attach_id = wp_insert_attachment($attachment, $filename);

	require_once( ABSPATH . 'wp-admin/includes/image.php' );

	$attach_data = wp_generate_attachment_metadata($attach_id, $filename);
	wp_update_attachment_metadata($attach_id, $attach_data);
	return $attach_id;
}
