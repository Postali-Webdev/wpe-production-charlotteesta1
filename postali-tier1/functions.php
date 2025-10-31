<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
    if(get_field('include_results','options') == 'yes') {
	    require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
    };
    if(get_field('include_testiimonials','options') == 'yes') {
	    require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
    }

	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
		
		wp_register_style( 'icomoon', 'https://cdn.icomoon.io/152819/PostaliTier1/style-cf.css?913shr', array() );
		wp_enqueue_style('icomoon');

        wp_register_script('slick-scripts', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-scripts');

		wp_register_script('slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
		wp_enqueue_script('slick-custom');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-scripts');
        wp_register_script('search-scripts', get_stylesheet_directory_uri() . '/assets/js/search.min.js',array('jquery'), null, true); 
		wp_enqueue_script('search-scripts');

		if ( is_page_template( 'front-page.php' ) ) {

		// Home Page Javascript
		// wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.min.js', array('jquery'));
		// wp_enqueue_script('home-js');		
		}
	}

    //Remove Gutenberg Block Library CSS from loading on the frontend
    function remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    } 
   add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );
   

	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
				'footer-nav' => __( 'Footer Navigation', 'postali' ),
                'practice-areas-nav' => __( 'Pratice Areas Navigation', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Global Site Elements',
			'menu_title'    => 'Global Site Elements',
			'menu_slug'     => 'global-site-elements',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

	}

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	// Add Search Bar to Top Nav
	function mainmenu_navsearch($items, $args) {
		if ($args->theme_location == 'header-nav') {
			ob_start();
			?>
			<li class="menu-item menu-item-search search-holder">
				<form class="navbar-form-search" role="search" method="get" action="/">
					<div class="search-form-container hdn" id="search-input-container">
						<div class="search-input-group">
							<div class="form-group">
							<input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-search" id="search-button"><span class="icon-search-icon" aria-hidden="true"></span></button>
				</form>	
			</li>

			<?php
			$new_items = ob_get_clean();

			$items .= $new_items;
		}
		return $items;
	}
	add_filter('wp_nav_menu_items', 'mainmenu_navsearch', 10, 2);

	// Add template column to page list in wp-admin
	function page_column_views( $defaults ) {
		$defaults['page-layout'] = __('Template');
		return $defaults;
	}
	add_filter( 'manage_pages_columns', 'page_column_views' );

	function page_custom_column_views( $column_name, $id ) {
		if ( $column_name === 'page-layout' ) {
			$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( $set_template == 'default' ) {
				echo 'Default';
			}
			$templates = get_page_templates();
			ksort( $templates );
			foreach ( array_keys( $templates ) as $template ) :
				if ( $set_template == $templates[$template] ) echo $template;
			endforeach;
		}
	}
	add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );


	function klf_acf_input_admin_footer() { ?>
		<script type="text/javascript">
		(function($) {
		
		acf.add_filter('color_picker_args', function( args, $field ){
		
		// add the hexadecimal codes here for the colors you want to appear as swatches
		args.palettes = ['#ffffff', '#eaeaea', '#000000', '#071f1e', '#738776']
		
		// return colors
		return args;
		
		});
		
		})(jQuery);
		</script>
    
    <?php }
    add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

	function post_pagination($paged = '', $max_page = '') {
		if (!$paged) {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
		}
	
		if (!$max_page) {
			global $wp_query;
			$max_page = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
		}
	
		$big  = 999999999; // need an unlikely integer
	
		$html = paginate_links(array(
			'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format'     => '?paged=%#%',
			'current'    => max(1, $paged),
			'total'      => $max_page,
			'mid_size'   => 1,
			'prev_text'  => __(''),
			'next_text'  => __(''),
		));
	
		$html = "<div class='navigation pagination'>" . $html . "</div>";
	
		echo $html;
	}

	add_filter( 'wp_nav_menu_objects', 'pa_nav_limit', 10, 2 );
	function pa_nav_limit($items, $args) {
		// want our MAINMENU to have MAX of 7 items
		if ( $args->theme_location == 'practice-areas-nav' ) {
			$toplinks = 0;
			foreach ( $items as $k => $v ) {
				if ( $v->menu_item_parent == 0 ) {
					// count how many top-level links we have so far...
					$toplinks++;
				}
				// if we've passed our max # ...
				if ( $toplinks > 7 ) {
					unset($items[$k]);
				}
			}
		}
		return $items;
	}

	/* Add webp extension if supported by browser. Used in conjunction with imagify */
	function checkWebpCompatibility($image_url) {
		// Get image type + check if exists
		$image_type_check = @exif_imagetype($image_url . '.webp');
		if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
			// rules for existing webp image
			if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
				return;
			} else {
				return $image_url . '.webp';
			}
		} else {
			return $image_url;
		}
		return;
	}

	// Remove category archives
	add_action('template_redirect', 'jltwp_adminify_remove_archives_category');
	function jltwp_adminify_remove_archives_category()
	{
		if (is_category()){
			$target = get_option('siteurl');
			$status = '301';
			wp_redirect($target, 301);
			die();
		}
	}


    /**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );
?>