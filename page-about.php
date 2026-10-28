<?php
/**
 * Template Name: Nexora About Page
 * Template Post Type: page
 *
 * @package Nexora_Digital_Child
 */
get_header();
?>
<main class="nexora-page"><div class="nexora-wrap">
	<div class="nexora-eyebrow">About Nexora</div>
	<h1>Good digital work starts with understanding people.</h1>
	<p style="font-size:1.2rem;max-width:780px">Nexora Digital Solutions is a fictional digital partner created for this WordPress child-theme project. Our approach reflects how a thoughtful small agency can work: listen carefully, define the real problem, and deliver useful solutions with care.</p>
	<div class="nexora-grid">
		<article class="nexora-card"><div class="nexora-number">01</div><h3>Listen first</h3><p>We begin by understanding the audience, business goals, and constraints before recommending a solution.</p></article>
		<article class="nexora-card"><div class="nexora-number">02</div><h3>Make it clear</h3><p>We turn complex choices into a focused plan with visible milestones and straightforward communication.</p></article>
		<article class="nexora-card"><div class="nexora-number">03</div><h3>Keep improving</h3><p>We build with usability, maintainability, and future improvements in mind.</p></article>
	</div>
	<section class="nexora-section"><div class="nexora-band"><div><h2>Let’s work on something meaningful.</h2><p>Share your goals and start a practical conversation.</p></div><a class="nexora-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Nexora →</a></div></section>
</div></main>
<?php get_footer(); ?>
