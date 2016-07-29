<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';

/*--------------------LOGO --------------*/
function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; !important; background-position: center 10px !important; background-size: auto 52px !important;  border-radius: 1px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13); height: 52px !important; padding: 10px 0 !important; width: 100% !important; } </style>';
}
add_action('login_head', 'custom_loginlogo');

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/*--------------------/LOGO --------------*/

/*--------------FAQ---------------*/
function codex_int_faqs() {
  $labels = array(
    'name' => 'FAQ',
    'singular_name' => 'FAQ',
    'add_new' => 'Add FAQ',
    'add_new_item' => 'Add New FAQ',
    'edit_item' => 'Edit FAQ',
    'new_item' => 'New FAQs',
    'all_items' => 'All FAQ',
    'view_item' => 'View FAQ',
    'search_items' => 'Search FAQ',
    'not_found' =>  'No FAQ found',
    'not_found_in_trash' => 'No FAQ found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'FAQ'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faq_section' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor','thumbnail')
  ); 

  register_post_type( 'faq_section', $args ); 
}  
  add_action( 'init', 'codex_int_faqs' );
/*--------------/FAQ---------------*/

/***************************post_loop****************************/
function custom_post_loop_swd($post_type,$post_per_page,$order) {
	global $wbdb;
	global $post;
	$args = array('post_type' => $post_type ,'posts_per_page' => $post_per_page , 'order' => $order);
	return $demo_posts = new WP_Query($args);
    // return $custom_query = new WP_Query();
}
/*************************** /post_loop****************************/


/*--------------Contact Address---------------*/
function codex_int_contact_address() {
  $labels = array(
    'name' => 'Address',
    'singular_name' => 'Address',
    'add_new' => 'Add Address',
    'add_new_item' => 'Add New Address',
    'edit_item' => 'Edit Address',
    'new_item' => 'New Address',
    'all_items' => 'All Address',
    'view_item' => 'View Address',
    'search_items' => 'Search Address',
    'not_found' =>  'No Address found',
    'not_found_in_trash' => 'No Address found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Address'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'contact_address' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor','thumbnail')
  ); 

  register_post_type( 'contact_address', $args ); 
}  
  add_action( 'init', 'codex_int_contact_address' );
/*--------------/Contact Address---------------*/


/*-----------------Add Image Size---------------*/
add_image_size( 'address_section_page', 437, 278, true );
add_image_size( 'what_we_do_image_sec', 944, 686, true );
add_image_size( 'blog_section_outer', 457, 447, true );
add_image_size( 'logo_what_we_do', 86, 103, true );
add_image_size( 'portfolio_section_images_ajax_response', 263, 323, true );
add_image_size( 'home_page_category_sect', 480, 320, true );
add_image_size( 'portfolio_product_section', 92, 189, true );
/*-----------------Add Image Size---------------*/


/*--------------What We Do---------------*/
function codex_int_what_we_do() {
  $labels = array(
    'name' => 'What We Do',
    'singular_name' => 'What We Do',
    'add_new' => 'Add What We Do',
    'add_new_item' => 'Add New What We Do',
    'edit_item' => 'Edit What We Do',
    'new_item' => 'New What We Do',
    'all_items' => 'All What We Do',
    'view_item' => 'View What We Do',
    'search_items' => 'Search What We Do',
    'not_found' =>  'No What We Do found',
    'not_found_in_trash' => 'No What We Do found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'What We Do'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'what_we_do' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor','thumbnail')
  ); 

  register_post_type( 'what_we_do', $args ); 
}  
  add_action( 'init', 'codex_int_what_we_do' );
/*--------------/What We Do----------------*/


/********************Pagination Function*****************************/
if ( ! function_exists( 'my_pagination' ) ) :
function my_pagination() {
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
'format' => '?paged=%#%',
'current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages
) );
}
endif;

/******************** /Pagination Function*****************************/



/*---------------Products----------------*/
$labels = array(
'name' => _x( 'Products category', 'Products category' ),
'singular_name' => _x( 'Products category', 'Products category' ),
'search_items' => __( 'Search Products category' ),
'all_items' => __( 'All Products category' ),
'parent_item' => __( 'Parent Products category' ),
'parent_item_colon' => __( 'Parent Products category:' ),
'edit_item' => __( 'Edit Products category' ),
'update_item' => __( 'Update Products category' ),
'add_new_item' => __( 'Add New Products category' ),
'new_item_name' => __( 'New Products category' ),
'menu_name' => __( 'Products category' ),
);

$args = array(
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'products_category' ),
);

register_taxonomy( 'products_category', array( 'products_category' ), $args );
function codex_int_products_section() {
  $labels =array(
    'name' => 'Products',
    'singular_name' => 'Products',
    'add_new' => 'Add Products',
    'add_new_item' => 'Add New Products',
    'edit_item' => 'Edit Products',
    'new_item' => 'New Products',
    'all_items' => 'All Products',
    'view_item' => 'View Products',
    'search_items' => 'Search Products',
    'not_found' =>  'No Products found',
    'not_found_in_trash' => 'No Products found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Products'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'products' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     'taxonomies' => array('products_category'),

	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	
  ); 

  register_post_type( 'products', $args ); 

}
add_action( 'init', 'codex_int_products_section' );

/*---------------/Products----------------*/

/*--------------/Products Meta Box---------------*/
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

	$screens = array( 'products' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Price Section', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );
// add_action( 'save_post', 'myplugin_save_meta_box_data');
/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback( $post) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
		$post_id = $post->ID;
		global $wpdb;
	 ?>
	 
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<div class="meta-box-section">
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">View All Prices</button>
		</div>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog" style="width:900px !important;">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Price List</h4>
					</div>
					<div class="modal-body table-responsive">
						<table class="table">
							<thead>
							  <tr>
								<th>Style</th>
								<th>Doorset/Leaf</th>
								<th>Thickness</th>
								<th>whiteprimed</th>
								<th>crownsapele</th>
								<th>etimoe</th>
								<th>oak</th>
								<th>steamedbeech</th>
								<th>maple</th>
								<th>cherry</th>
								<th>wengue</th>
								<th>walnut</th>
								<th>zebrano</th>
								<th>ebony</th>
								<th>bleachedoak</th>
								<th>stonegrey</th>
								<th>greychoco</th>
								<th>ashgrey</th>
								<th>lightchoco</th>
								<th>rallacquer</th>
								<th>whitelacquer</th>
								<th>stainedoak</th>
								<th>stainedoak-lacquer</th>
								<th>stainedoak-hg-lacquer</th>
								<th>hg-matt-lacquer</th>
								<th>hgloss</th>
								<th>DoorOnly</th>
							  </tr>
							</thead>
							<tbody>
							<?php 
								foreach( $wpdb->get_results("SELECT * FROM `im_products_price_details` WHERE `post_id` = $post_id") as $key => $row)
								{
							?>
							  <tr>
								<td><?php if($row->style!= ""){echo $row->style;} else{ echo "Nill";} ?></td>
								<td><?php if($row->doorset_leaf!= ""){echo $row->doorset_leaf;} else{ echo "Nill";} ?></td>
								<td><?php if($row->thickness!= ""){echo $row->thickness;} else{ echo "Nill";} ?></td>
								<td><?php if($row->whiteprimed!= ""){echo $row->whiteprimed;} else{ echo "Nill";} ?></td>
								<td><?php if($row->crownsapele!= ""){echo $row->crownsapele;} else{ echo "Nill";} ?></td>
								<td><?php if($row->etimoe!= ""){echo $row->etimoe;} else{ echo "Nill";} ?></td>
								<td><?php if($row->oak!= ""){echo $row->oak;} else{ echo "Nill";} ?></td>
								<td><?php if($row->steamedbeech!= ""){echo $row->steamedbeech;} else{ echo "Nill";} ?></td>
								<td><?php if($row->maple!= ""){echo $row->maple;} else{ echo "Nill";} ?></td>
								<td><?php if($row->cherry!= ""){echo $row->cherry;} else{ echo "Nill";} ?></td>
								<td><?php if($row->wengue!= ""){echo $row->wengue;} else{ echo "Nill";} ?></td>
								<td><?php if($row->walnut!= ""){echo $row->walnut;} else{ echo "Nill";} ?></td>
								<td><?php if($row->zebrano!= ""){echo $row->zebrano;} else{ echo "Nill";} ?></td>
								<td><?php if($row->ebony!= ""){echo $row->ebony;} else{ echo "Nill";} ?></td>
								<td><?php if($row->bleachedoak!= ""){echo $row->bleachedoak;} else{ echo "Nill";} ?></td>
								<td><?php if($row->stonegrey!= ""){echo $row->stonegrey;} else{ echo "Nill";} ?></td>
								<td><?php if($row->greychoco!= ""){echo $row->greychoco;} else{ echo "Nill";} ?></td>
								<td><?php if($row->ashgrey!= ""){echo $row->ashgrey;} else{ echo "Nill";} ?></td>
								<td><?php if($row->lightchoco!= ""){echo $row->lightchoco;} else{ echo "Nill";} ?></td>
								<td><?php if($row->rallacquer!= ""){echo $row->rallacquer;} else{ echo "Nill";} ?></td>
								<td><?php if($row->whitelacquer!= ""){echo $row->whitelacquer;} else{ echo "Nill";} ?></td>
								<td><?php if($row->stainedoak!= ""){echo $row->stainedoak;} else{ echo "Nill";} ?></td>
								<td><?php if($row->stainedoak-lacquer!= ""){echo $row->stainedoak-lacquer;} else{ echo "Nill";} ?></td>
								<td><?php if($row->stainedoak-hg-lacquer!= ""){echo $row->stainedoak-hg-lacquer;} else{ echo "Nill";} ?></td>
								<td><?php if($row->hg-matt-lacquer!= ""){echo $row->hg-matt-lacquer;} else{ echo "Nill";} ?></td>
								<td><?php if($row->hgloss!= ""){echo $row->hgloss;} else{ echo "Nill";} ?></td>
								<td><?php if($row->DoorOnly!= ""){echo $row->DoorOnly;} else{ echo "Nill";} ?></td>
							  </tr>
							  <?php  
								}
								?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
	<?php
	
}
/**********************************************Meta Box End**************************************/
/*--------------Case Strudy---------------*/
function codex_int_case_study() {
  $labels = array(
    'name' => 'Case Study',
    'singular_name' => 'Case Study',
    'add_new' => 'Add Case Study',
    'add_new_item' => 'Add New Case Study',
    'edit_item' => 'Edit Case Study',
    'new_item' => 'New Case Study',
    'all_items' => 'All Case Study',
    'view_item' => 'View Case Study',
    'search_items' => 'Search Case Study',
    'not_found' =>  'No Case Study found',
    'not_found_in_trash' => 'No Case Study found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Case Study'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'case_study' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor','thumbnail')
  ); 

  register_post_type( 'case_study', $args ); 
}  
  add_action( 'init', 'codex_int_case_study' );
/*--------------/Case Strudy----------------*/

/*--------------/Case Study Meta Box---------------*/
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_case_study_meta_box() {

	$screens = array( 'case_study' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Products Envolved', 'myplugin_textdomain' ),
			'myplugin_meta_box_case_study_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_case_study_meta_box' );
// add_action( 'save_post', 'myplugin_save_meta_box_data');
/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_case_study_callback( $post) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
		$post_id = $post->ID;
		global $wpdb;
	 ?>
	 
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<div class="meta-box-section">
			<div class="container">
			<?php 
			$i=1;
				foreach( $wpdb->get_results("SELECT * FROM `im_posts` WHERE `post_type` = 'products'") as $key => $row)
				{
					?>
					<div class="col-md-4">
					<label for="row<?php echo $i; ?>"><?php echo $row->post_title; ?></label>
					<input name="check_post_id[]" type="checkbox" class="form-class selected_<?php echo $row->ID; ?>" id="row<?php echo $i; ?>" value="<?php echo $row->ID; ?>">
					</div>
					<?php
					$i++;
				}
			?>
			
			<button type="button" class="btn-primary" onclick="save_results();">Save</button>
			</div>
		</div>
		<?php
		foreach( $wpdb->get_results("SELECT * FROM `im_case_study` WHERE `case_id` = '".$post_id."'") as $key => $row)
				{
					$products_id = $row->product_id;
					?>
					<script>
					jQuery(".selected_<?php echo $products_id;?>").attr('checked', true); 
					</script>
					<?php
				}
				?>
	
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
	<script>
	function save_results()
	{
		var check_post_id = "";
		var post_id = "<?php echo $post_id; ?>";
		jQuery.each(jQuery("input[name='check_post_id[]']:checked"), function() {
		check_post_id += (check_post_id?',':'') + jQuery(this).val();
			jQuery.ajax({
			type: "POST",
			url:"<?php bloginfo('template_url'); ?>/ajax/custom_meta_case.php",
			data:{check_post_id:check_post_id,post_id:post_id,format:'raw'},
			success:function(resp){
				location.reload();
			}
			});
		});
	}
	</script>
	<?php
	
}
/*--------------/Case Study Meta Box---------------*/



/*---------------Portfolio----------------*/
$labels = array(
'name' => _x( 'Portfolio category', 'Portfolio category' ),
'singular_name' => _x( 'Portfolio category', 'Portfolio category' ),
'search_items' => __( 'Search Portfolio category' ),
'all_items' => __( 'All Portfolio category' ),
'parent_item' => __( 'Parent Portfolio category' ),
'parent_item_colon' => __( 'Parent Portfolio category:' ),
'edit_item' => __( 'Edit Portfolio category' ),
'update_item' => __( 'Update Portfolio category' ),
'add_new_item' => __( 'Add New Portfolio category' ),
'new_item_name' => __( 'New Portfolio category' ),
'menu_name' => __( 'Portfolio category' ),
);

$args = array(
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'portfolio_category' ),
);

register_taxonomy( 'portfolio_category', array( 'portfolio_category' ), $args );
function codex_int_portfolio_section() {
  $labels =array(
    'name' => 'Portfolio',
    'singular_name' => 'Portfolio',
    'add_new' => 'Add Portfolio',
    'add_new_item' => 'Add New Portfolio',
    'edit_item' => 'Edit Portfolio',
    'new_item' => 'New Portfolio',
    'all_items' => 'All Portfolio',
    'view_item' => 'View Portfolio',
    'search_items' => 'Search Portfolio',
    'not_found' =>  'No Portfolio found',
    'not_found_in_trash' => 'No Portfolio found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Portfolio'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Portfolios' ), 
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
     'taxonomies' => array('portfolio_category'),

	'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	
  ); 

  register_post_type( 'Portfolios', $args ); 

}
add_action( 'init', 'codex_int_portfolio_section' );

/*---------------/Portfolio----------------*/
/****************Gallery Section*********************/
function get_numerics ($str)
{
preg_match_all('/\d+/', $str, $matches);
return $matches[0];
}
/****************Gallery Section*********************/


/*--------------/Portfolio Meta Box---------------*/
/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_portfolio_meta_box() {

	$screens = array( 'portfolios' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Products Envolved', 'myplugin_textdomain' ),
			'myplugin_meta_box_portfolio_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_portfolio_meta_box' );
// add_action( 'save_post', 'myplugin_save_meta_box_data');
/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_portfolio_callback( $post) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
		$post_id = $post->ID;
		global $wpdb;
	 ?>
	 
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<div class="meta-box-section">
			<div class="container">
			<?php 
			$i=1;
				foreach( $wpdb->get_results("SELECT * FROM `im_posts` WHERE `post_type` = 'products'") as $key => $row)
				{
					?>
					<div class="col-md-4">
					<label for="row<?php echo $i; ?>"><?php echo $row->post_title; ?></label>
					<input name="check_post_id[]" type="checkbox" class="form-class selected_<?php echo $row->ID; ?>" id="row<?php echo $i; ?>" value="<?php echo $row->ID; ?>">
					</div>
					<?php
					$i++;
				}
			?>
			
			<button type="button" class="btn-primary" onclick="save_results();">Save</button>
			</div>
		</div>
		<?php
		foreach( $wpdb->get_results("SELECT * FROM `im_portfolio` WHERE `case_id` = '".$post_id."'") as $key => $row)
				{
					$products_id = $row->product_id;
					?>
					<script>
					jQuery(".selected_<?php echo $products_id;?>").attr('checked', true); 
					</script>
					<?php
				}
				?>
	
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
	<script>
	function save_results()
	{
		var check_post_id = "";
		var post_id = "<?php echo $post_id; ?>";
		jQuery.each(jQuery("input[name='check_post_id[]']:checked"), function() {
		check_post_id += (check_post_id?',':'') + jQuery(this).val();
			jQuery.ajax({
			type: "POST",
			url:"<?php bloginfo('template_url'); ?>/ajax/custom_meta_portfolio.php",
			data:{check_post_id:check_post_id,post_id:post_id,format:'raw'},
			success:function(resp){
				location.reload();
			}
			});
		});
	}
	</script>
	<?php
	
}
/*--------------/Portfolio Meta Box---------------*/