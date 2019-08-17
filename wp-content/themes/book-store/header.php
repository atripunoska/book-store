<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package book-store
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" sizes="128x128" href="<?php echo get_template_directory_uri();?>/favicon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wptime-plugin-preloader"></div>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'book-store'); ?></a>

		<header id="masthead" class="site-header">

	

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo home_url( '/' ); ?>">
			      <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"  class="logo" height="45"/> 
			    </a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			
			
					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'navbar-nav mr-auto mt-2 mt-lg-0'
					));
					?>
					<div class="cart-top">
					<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
							
							$count = WC()->cart->cart_contents_count;
							?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
							if ( $count > 0 ) {
								?>
								<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
								<?php
							}
								?></a>

						<?php } ?>
				</div>
					<form class="form-inline my-2 my-lg-0 mr-5 pr-3" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
						<input name="s" class="form-control mr-sm-2" type="text" value="<?php the_search_query(); ?>" placeholder="Search" aria-label="Search" />
						
					
						<input type="submit" class="btn btn-outline-info my-2 my-sm-0"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
					</form>
				
						</div>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">