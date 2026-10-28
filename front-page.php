<?php
/**
 * Front page template: the Beanloop landing page.
 */
get_header();

$img   = get_template_directory_uri() . '/assets/img/';
$state = isset( $_GET['sent'] ) ? sanitize_key( wp_unslash( $_GET['sent'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification
?>
<main id="main">

	<!-- HERO: one headline, one call-to-action -->
	<section class="hero" aria-labelledby="hero-title">
		<div class="wrap">
			<div>
				<p class="eyebrow">Small-batch coffee subscription</p>
				<h1 id="hero-title">Coffee roasted this week, at your door this week.</h1>
				<p class="hero__lead">Beanloop roasts to order and ships within 48 hours, so every cup tastes like it came from your favourite cafe. Skip or cancel anytime.</p>
				<div class="hero__cta">
					<a class="btn" href="#plans">Get 50% off your first bag</a>
					<a class="btn btn--ghost" href="#how">See how it works</a>
				</div>
				<p class="hero__proof">Rated 4.9/5 by 2,300+ coffee lovers. Free shipping on every plan.</p>
			</div>
			<div class="hero__art">
				<img src="<?php echo esc_url( $img . 'hero.svg' ); ?>" width="600" height="600" alt="Steaming cup of coffee on a saucer beside an open bag of roasted coffee beans" fetchpriority="high">
			</div>
		</div>
	</section>

	<!-- HOW IT WORKS -->
	<section class="section section--alt" id="how" aria-labelledby="how-title">
		<div class="wrap">
			<div class="section__head">
				<p class="eyebrow">Why Beanloop</p>
				<h2 id="how-title">Fresh coffee without the thinking</h2>
				<p>Three simple steps, and a bag that always arrives before the last one runs out.</p>
			</div>
			<div class="grid grid--3 steps">
				<article class="card">
					<img class="card__icon" src="<?php echo esc_url( $img . 'icon-roast.svg' ); ?>" width="56" height="56" alt="Coffee bean icon" loading="lazy">
					<h3>Pick your roast</h3>
					<p>Choose light, medium or dark, whole bean or ground. Not sure? Our taster pack covers all three.</p>
				</article>
				<article class="card">
					<img class="card__icon" src="<?php echo esc_url( $img . 'icon-calendar.svg' ); ?>" width="56" height="56" alt="Calendar icon" loading="lazy">
					<h3>Set your schedule</h3>
					<p>Every 2 or 4 weeks. Skip, pause or change plans in two clicks whenever life gets busy.</p>
				</article>
				<article class="card">
					<img class="card__icon" src="<?php echo esc_url( $img . 'icon-box.svg' ); ?>" width="56" height="56" alt="Delivery box icon" loading="lazy">
					<h3>Enjoy it fresh</h3>
					<p>We roast on Monday and Tuesday, ship within 48 hours and print the roast date on every bag.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- PLANS -->
	<section class="section" id="plans" aria-labelledby="plans-title">
		<div class="wrap">
			<div class="section__head">
				<p class="eyebrow">Plans</p>
				<h2 id="plans-title">Simple pricing, free shipping</h2>
				<p>Your first bag is 50% off on any plan. No contract.</p>
			</div>
			<div class="grid grid--3">
				<article class="card price">
					<h3>Solo</h3>
					<p class="price__amount">$14 <small>/ bag</small></p>
					<ul>
						<li>One 250g bag</li>
						<li>Every 4 weeks</li>
						<li>Free shipping</li>
					</ul>
					<a class="btn btn--ghost" href="#contact">Choose Solo</a>
				</article>
				<article class="card price price--featured">
					<span class="price__tag">Most popular</span>
					<h3>Duo</h3>
					<p class="price__amount">$26 <small>/ 2 bags</small></p>
					<ul>
						<li>Two 250g bags, any roasts</li>
						<li>Every 2 or 4 weeks</li>
						<li>Free shipping</li>
					</ul>
					<a class="btn" href="#contact">Choose Duo</a>
				</article>
				<article class="card price">
					<h3>Office</h3>
					<p class="price__amount">$60 <small>/ 1kg</small></p>
					<ul>
						<li>One 1kg bag for the team</li>
						<li>Every 2 weeks</li>
						<li>Free shipping</li>
					</ul>
					<a class="btn btn--ghost" href="#contact">Choose Office</a>
				</article>
			</div>
		</div>
	</section>

	<!-- REVIEWS -->
	<section class="section section--alt" id="reviews" aria-labelledby="reviews-title">
		<div class="wrap">
			<div class="section__head">
				<p class="eyebrow">Reviews</p>
				<h2 id="reviews-title">Loved by people who care about their morning cup</h2>
				<p>Sample reviews for this fictional project.</p>
			</div>
			<div class="grid grid--3">
				<blockquote class="card quote">
					<p>The roast date on the bag is a game changer. My espresso has never tasted this good at home.</p>
					<footer>Aanya R., Duo plan</footer>
				</blockquote>
				<blockquote class="card quote">
					<p>Skipping a delivery took ten seconds. That flexibility is why I stayed subscribed.</p>
					<footer>Marcus T., Solo plan</footer>
				</blockquote>
				<blockquote class="card quote">
					<p>Our whole office switched. The 1kg bag disappears in a week and nobody misses the old stuff.</p>
					<footer>Priya S., Office plan</footer>
				</blockquote>
			</div>
		</div>
	</section>

	<!-- FAQ ACCORDION (interactive element) -->
	<section class="section" id="faq" aria-labelledby="faq-title">
		<div class="wrap">
			<div class="section__head">
				<p class="eyebrow">FAQ</p>
				<h2 id="faq-title">Questions, answered</h2>
			</div>
			<div class="faq" data-faq>
				<?php foreach ( beanloop_faqs() as $i => $faq ) : ?>
					<div class="faq__item">
						<h3 class="faq__q">
							<button class="faq__btn" type="button" aria-expanded="false" aria-controls="faq-a-<?php echo (int) $i; ?>" id="faq-q-<?php echo (int) $i; ?>">
								<?php echo esc_html( $faq[0] ); ?>
							</button>
						</h3>
						<div class="faq__a" id="faq-a-<?php echo (int) $i; ?>" role="region" aria-labelledby="faq-q-<?php echo (int) $i; ?>">
							<div><?php echo esc_html( $faq[1] ); ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CONTACT FORM (interactive element) -->
	<section class="section section--alt" id="contact" aria-labelledby="contact-title">
		<div class="wrap">
			<div class="section__head">
				<p class="eyebrow">Get started</p>
				<h2 id="contact-title">Tell us what you like, we will do the rest</h2>
				<p>Send your plan and roast preference. We reply within one business day.</p>
			</div>
			<div class="contact">
				<?php if ( 'ok' === $state ) : ?>
					<div class="notice notice--ok" role="status">Thanks! Your message is on its way. We will reply within one business day.</div>
				<?php elseif ( 'invalid' === $state ) : ?>
					<div class="notice notice--err" role="alert">Please check your name, email and message (at least 10 characters) and try again.</div>
				<?php elseif ( 'wait' === $state ) : ?>
					<div class="notice notice--err" role="alert">Please wait a minute before sending another message.</div>
				<?php elseif ( 'error' === $state ) : ?>
					<div class="notice notice--err" role="alert">Something went wrong sending your message. Please try again shortly.</div>
				<?php endif; ?>

				<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" novalidate data-contact-form>
					<input type="hidden" name="action" value="beanloop_contact">
					<?php wp_nonce_field( 'beanloop_contact', 'beanloop_nonce' ); ?>
					<div class="hp" aria-hidden="true">
						<label for="website">Leave this field empty</label>
						<input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
					</div>
					<div class="field">
						<label for="name">Your name</label>
						<input type="text" id="name" name="name" autocomplete="name" required>
						<div class="error" data-error-for="name"></div>
					</div>
					<div class="field">
						<label for="email">Email address</label>
						<input type="email" id="email" name="email" autocomplete="email" required>
						<div class="error" data-error-for="email"></div>
					</div>
					<div class="field">
						<label for="message">Your plan and roast preference</label>
						<textarea id="message" name="message" rows="5" required minlength="10"></textarea>
						<div class="error" data-error-for="message"></div>
					</div>
					<button class="btn" type="submit">Send my request</button>
				</form>
			</div>
		</div>
	</section>

	<!-- FINAL CTA -->
	<section class="cta-band" aria-labelledby="cta-title">
		<div class="wrap">
			<h2 id="cta-title">Your best cup is one box away</h2>
			<p>Get 50% off your first bag. Cancel anytime, no questions asked.</p>
			<a class="btn" href="#plans">Start my box</a>
		</div>
	</section>

</main>
<?php
get_footer();
