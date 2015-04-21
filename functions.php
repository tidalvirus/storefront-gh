<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

add_action( 'init', 'storefront_custom_logo' );
function storefront_custom_logo() {
	remove_action( 'storefront_header', 'storefront_site_branding', 20 );
	add_action( 'storefront_header', 'storefront_display_custom_logo', 20 );
}

add_filter('storefront_credit_link','custom_remove_footer_credit',10);
function custom_remove_footer_credit(){
	    return false; //return true to show it.
}

function storefront_display_custom_logo() {
?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link" rel="home">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?>" />
	</a>
<?php
}

