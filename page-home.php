<?php
/**
 * Template Name: Nexora Custom Landing Page
 * Template Post Type: page
 *
 * @package Nexora_Digital_Child
 */
get_header();
?>
<main class="nexora-home">
	<section class="nexora-hero"><div class="nexora-wrap">
		<div class="nexora-eyebrow">Digital strategy · Design · Development</div>
		<h1>Build a stronger business for the digital world.</h1>
		<p>Nexora Digital Solutions helps growing businesses turn good ideas into clear digital experiences, useful websites, and measurable customer growth.</p>
		<p><a class="nexora-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Let’s talk about your project →</a></p>
	</div></section>
	<section class="nexora-section"><div class="nexora-wrap">
		<div class="nexora-eyebrow">Our services</div><h2>Practical digital services, built around your goals.</h2>
		<div class="nexora-grid">
			<article class="nexora-card"><div class="nexora-number">01</div><h3>Website Design & Development</h3><p>Responsive websites that communicate your value and help customers get in touch.</p></article>
			<article class="nexora-card"><div class="nexora-number">02</div><h3>Brand & Digital Strategy</h3><p>Consistent messaging and a practical digital plan that fits your business.</p></article>
			<article class="nexora-card"><div class="nexora-number">03</div><h3>Search & Content</h3><p>Useful content and search-friendly foundations to improve online discovery.</p></article>
		</div>
	</div></section>
	<section class="nexora-section nexora-section--cream"><div class="nexora-wrap">
		<div class="nexora-band"><div><h2>Ready to make your next move?</h2><p>Let’s discuss your goals and shape a sensible plan.</p></div><a class="nexora-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Get in touch →</a></div>
	</div></section>
</main>
<?php get_footer(); ?>
