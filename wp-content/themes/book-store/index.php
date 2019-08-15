<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package book-store
 */

get_header();
?>

<?php 



					//	$html = file_get_html('https://sakamknigi.mk/product/ponekogas-lazam/');
						// Find all images 
					//ss	echo $html;
// 					foreach($html->find('.comment_container') as $element) 
// echo $element.'<br>';


						//$html1 = file_get_html('https://www.librarything.com/work/9101638');
// foreach($html1->find('.bookReview') as $element1) 
// echo $element1.'<br>';


// $html2 = file_get_html('https://kupikniga.mk/product/ponekogash-lazham/');
// foreach($html2->find('.comment_container') as $element2) 
// echo $element2.'<br>';


						?>

						


	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row col-12">
				<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

				</div>
			</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
