<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>

	


			<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action('woocommerce_before_main_content');
			?>

			<?php while (have_posts()) : the_post(); ?>

			<?php wc_get_template_part('content', 'single-product'); ?>

			<?php endwhile; // end of the loop. 
			?>

			<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action('woocommerce_after_main_content');
			?>


			<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action('woocommerce_sidebar');
			?>
		<section class="others-reviews">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<hr>
				</div>
				<div class="col-12">
					<h4 class="mb-4">Погледнете ги и оцените на другите сајтови за оваа книга</h4>
				</div>
				<!--/col-12-->
				<div class="col-12">
					<div class="row">
						<div class="col-12 col-md-4 col-lg-3">
							<div class="nav flex-column nav-pills reviews-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Купи Книга</a>
								<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Сакам Книга</a>
							</div>
						</div>
						<div class="col-12 col-md-8 col-lg-9">
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
								<?php $kupi_kniga = get_field( "kupi_kniga" );
								  
								   $html = file_get_html($kupi_kniga);
								  
						
							   foreach($html->find('.comment_container') as $element) 
		   								echo $element.'<br>';
		   
								?>
								
								</div>
								<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
								<?php $sakam_knigi = get_field( "sakam_knigi" );
								
								$html2 = file_get_html($sakam_knigi);
								foreach($html2->find('.comment_container') as $element2) 
									echo $element2.'<br>';

								?>
								</div>
						
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
