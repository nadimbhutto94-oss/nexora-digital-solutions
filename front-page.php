<?php
/**
 * Front page template for Nexora Digital Child.
 *
 * @package Nexora_Digital_Child
 */
get_header();
?>
<main id="primary" class="nexora-home">
	<section class="nexora-hero">
		<div class="nexora-wrap">
			<div class="nexora-eyebrow">Digital strategy · Design · Development</div>
			<h1>Build a stronger business for the digital world.</h1>
			<p>Nexora Digital Solutions helps growing businesses turn good ideas into clear digital experiences, useful websites, and measurable customer growth.</p>
			<p><a class="nexora-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Let’s talk about your project →</a></p>
		</div>
	</section>

	<section class="nexora-section">
		<div class="nexora-wrap">
			<div class="nexora-eyebrow">What we do</div>
			<h2>Practical digital services, built around your goals.</h2>
			<p>From your first website to a more effective online presence, we combine thoughtful planning with dependable delivery.</p>
			<div class="nexora-grid">
				<article class="nexora-card"><div class="nexora-number">01</div><h3>Website Design & Development</h3><p>Responsive, accessible websites that explain what you do and make it easy for customers to take the next step.</p></article>
				<article class="nexora-card"><div class="nexora-number">02</div><h3>Brand & Digital Strategy</h3><p>A clear message, consistent visual identity, and a practical plan to reach the right audience online.</p></article>
				<article class="nexora-card"><div class="nexora-number">03</div><h3>Search & Content</h3><p>Helpful content and search-friendly foundations that make your business easier to discover.</p></article>
			</div>
		</div>
	</section>

	<section class="nexora-section nexora-section--cream">
		<div class="nexora-wrap">
			<div class="nexora-grid">
				<div><div class="nexora-eyebrow">Why Nexora</div><h2>Small-team attention. Big-picture thinking.</h2></div>
				<div class="nexora-card"><h3>Clear communication</h3><p>We keep priorities, milestones, and next steps understandable from kickoff to launch.</p></div>
				<div class="nexora-card"><h3>Built to be useful</h3><p>Every design decision supports a real customer need, not just a visual trend.</p></div>
			</div>
		</div>
	</section>

	<section class="nexora-section">
		<div class="nexora-wrap">
			<div class="nexora-band">
				<div><h2>Have a project in mind?</h2><p>Tell us where you want to go. We’ll help you map the next practical step.</p></div>
				<a class="nexora-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact our team →</a>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
