<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uri-tedx
 */

?>
<! DOCTYPE html>
<html <?php language_attributes(); ?>>
	
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() . '/images/favicon.png'; ?>">

</head>
	
<body <?php body_class(); ?>>
	
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'uri' ); ?></a>

	<div id="masthead">
		<header id="brandbar" class="site-header" role="banner">
				
			<div class="content-width">
				<a href="https://www.uri.edu/tedx/" title="TEDxURI"><img src="<?php echo get_stylesheet_directory_uri() . '/images/logo_uri_white.png'; ?>" alt="TEDxURI" /></a>
				<input type="checkbox" id="tedx-nav-toggle" role="presentation" aria-label="Open the TEDxURI site menu when browsing on mobile">
				<label for="tedx-nav-toggle" id="tedx-nav-label"><span>Menu</span></label>
				<ul id="tedx-nav">
					<li id="ln-talks"><a href="https://www.uri.edu/tedx/talks">Talks</a></li>
					<li id="ln-speakers"><a href="https://www.uri.edu/tedx/presenters">Presenters</a></li>
					<li id="ln-attend"><a href="https://www.uri.edu/tedx/attend">Attend</a></li>
					<li id="ln-about"><a href="https://www.uri.edu/tedx/about">About</a></li>
				</ul>
			</div>

		</header><!-- #brandbar -->
	</div>
	
	<div id="content" class="site-content">
		
	
