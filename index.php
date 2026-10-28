<?php
/**
 * Fallback template. The landing page itself lives in front-page.php.
 */
get_header();
?>
<main id="main">
	<div class="wrap section">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<h1>Nothing found</h1>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to the home page</a></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
