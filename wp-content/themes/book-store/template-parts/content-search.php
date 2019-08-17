<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package book-store
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title my-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			book_store_posted_on();

			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->


	<div class="row">
		<div class="col-12 col-md-6 col-lg-5">
		<img src="<?php echo get_the_post_thumbnail_url();?>" class="img-fluid"/>
		</div>
		<div class="col-12 col-md-6 col-lg-7">
		<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

		</div>
	</div>




	<footer class="entry-footer">
		<?php book_store_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
