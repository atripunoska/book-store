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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="se-pre-con"></div>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'book-store'); ?></a>

		<header id="masthead" class="site-header">


			<nav class="navbar navbar-dark bg-dark">
				<a class="navbar-brand" href="#">Navbar</a>

			
					<?php
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'nav mx-auto'
					));
					?>
					<form class="form-inline" action="<?php echo home_url( '/' ); ?>" method="get">
						<input name="s" class="form-control mr-sm-2" type="text" value="<?php the_search_query(); ?>" placeholder="Search" aria-label="Search" />
						
						<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
					</form>
				
				
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">