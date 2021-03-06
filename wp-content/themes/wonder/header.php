<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wonder
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/js/plugins/flickity/flickity.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/plugins/flickity/flickity.pkgd.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site" <?php body_class(); ?>>
	<header id="masthead" class="site-header">
		<div class="site-branding">
            <a href="<?php echo home_url(); ?>" class="logo-wrapper" title="" style="font-size: 0px !important;">
                <?php if (get_field('logo', 'option')) : ?>
                    <img src="<?php echo get_field('logo', 'option'); ?>" alt="">
                <?php endif; ?>
            </a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wonder' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
