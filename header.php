<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/favicon.svg' ); ?>" type="image/svg+xml">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header">
	<div class="wrap">
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Beanloop home">Bean<span>loop</span></a>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">Menu</button>
		<nav class="nav" id="site-nav" aria-label="Primary">
			<a href="#how">How it works</a>
			<a href="#plans">Plans</a>
			<a href="#reviews">Reviews</a>
			<a href="#faq">FAQ</a>
			<a class="btn" href="#plans">Start my box</a>
		</nav>
	</div>
</header>
