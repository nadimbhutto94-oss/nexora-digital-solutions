<?php
/**
 * Beanloop Landing – theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const BEANLOOP_VERSION = '1.0.0';

/* ---------- Setup ---------- */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ) );
} );

/* ---------- Assets ---------- */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'beanloop-style', get_stylesheet_uri(), array(), BEANLOOP_VERSION );
	wp_enqueue_script( 'beanloop-main', get_template_directory_uri() . '/assets/js/main.js', array(), BEANLOOP_VERSION, array( 'in_footer' => true, 'strategy' => 'defer' ) );
} );

/* Remove emoji + embed bloat for a faster landing page. */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );

/* ---------- SEO: title tag ---------- */
add_filter( 'pre_get_document_title', function ( $title ) {
	if ( is_front_page() ) {
		return 'Beanloop | Fresh-Roasted Coffee Subscription, Delivered Monthly';
	}
	return $title;
} );

/* ---------- SEO: meta description, canonical, Open Graph ---------- */
add_action( 'wp_head', function () {
	if ( ! is_front_page() ) {
		return;
	}
	$desc  = 'Beanloop delivers small-batch, fresh-roasted coffee to your door every 2 or 4 weeks. Pick your roast, skip or cancel anytime. Your first bag is 50% off.';
	$url   = home_url( '/' );
	$image = get_template_directory_uri() . '/assets/img/hero.svg';
	?>
	<meta name="description" content="<?php echo esc_attr( $desc ); ?>">
	<link rel="canonical" href="<?php echo esc_url( $url ); ?>">
	<meta name="robots" content="index, follow, max-image-preview:large">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Beanloop | Fresh-Roasted Coffee Subscription">
	<meta property="og:description" content="<?php echo esc_attr( $desc ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="theme-color" content="#8a4b2a">
	<?php
}, 1 );

/* ---------- SEO: structured data (FAQ + Product) ---------- */
function beanloop_faqs() {
	return array(
		array( 'How fresh is the coffee?', 'We roast to order and ship within 48 hours of roasting, so your beans arrive at peak flavour, usually 3 to 5 days after the roast date.' ),
		array( 'Can I skip a delivery or cancel?', 'Yes. Skip, pause or cancel anytime from your account or by emailing us. There are no contracts and no cancellation fees.' ),
		array( 'Do you grind the beans for me?', 'We do. Choose whole bean, espresso, filter or French press grind when you sign up, and change it whenever you like.' ),
		array( 'How much does shipping cost?', 'Shipping is free on every subscription plan. One-off bags ship for a flat fee shown at checkout.' ),
		array( 'What if I do not like a roast?', 'Tell us within 14 days and we will send a replacement bag in a different roast, free of charge.' ),
	);
}

add_action( 'wp_head', function () {
	if ( ! is_front_page() ) {
		return;
	}
	$faq_items = array();
	foreach ( beanloop_faqs() as $faq ) {
		$faq_items[] = array(
			'@type'          => 'Question',
			'name'           => $faq[0],
			'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $faq[1] ),
		);
	}
	$graph = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type' => 'Organization',
				'name'  => 'Beanloop',
				'url'   => home_url( '/' ),
			),
			array(
				'@type'       => 'Product',
				'name'        => 'Beanloop Coffee Subscription',
				'description' => 'Small-batch, fresh-roasted coffee delivered every 2 or 4 weeks.',
				'brand'       => array( '@type' => 'Brand', 'name' => 'Beanloop' ),
				'offers'      => array(
					'@type'         => 'Offer',
					'price'         => '14.00',
					'priceCurrency' => 'USD',
					'availability'  => 'https://schema.org/InStock',
					'url'           => home_url( '/#plans' ),
				),
			),
			array(
				'@type'      => 'FAQPage',
				'mainEntity' => $faq_items,
			),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}, 5 );

/* ---------- Contact form handler (no plugin needed) ---------- */
function beanloop_handle_contact() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$redirect = remove_query_arg( 'sent', $redirect );

	if ( ! isset( $_POST['beanloop_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['beanloop_nonce'] ) ), 'beanloop_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'sent', 'error', $redirect ) . '#contact' );
		exit;
	}

	// Honeypot: bots fill this in, humans never see it.
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'sent', 'ok', $redirect ) . '#contact' );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	if ( '' === $name || ! is_email( $email ) || strlen( $message ) < 10 ) {
		wp_safe_redirect( add_query_arg( 'sent', 'invalid', $redirect ) . '#contact' );
		exit;
	}

	// Basic rate limit: one message per IP per minute.
	$ip  = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
	$key = 'beanloop_rl_' . md5( $ip );
	if ( get_transient( $key ) ) {
		wp_safe_redirect( add_query_arg( 'sent', 'wait', $redirect ) . '#contact' );
		exit;
	}
	set_transient( $key, 1, MINUTE_IN_SECONDS );

	$to      = get_option( 'admin_email' );
	$subject = sprintf( '[Beanloop] New message from %s', $name );
	$body    = "Name: {$name}\nEmail: {$email}\n\n{$message}";
	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$sent = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'sent', $sent ? 'ok' : 'error', $redirect ) . '#contact' );
	exit;
}
add_action( 'admin_post_nopriv_beanloop_contact', 'beanloop_handle_contact' );
add_action( 'admin_post_beanloop_contact', 'beanloop_handle_contact' );
