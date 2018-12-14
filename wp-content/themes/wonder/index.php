<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wonder
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <?php if ( is_home() ) : ?>
                <div id="main-slideshow" class="main-carousel carousel js-flickity">

                    <?php if (get_field('slideshow', 'option')) { ?>
                        <?php foreach (get_field('slideshow', 'option') as $opt) { ?>
                                <div class="carousel-cell">
                                    <img src="<?php echo $opt['img_src']; ?>" alt="<?php echo $opt['img_title']; ?>">
                                </div>
                        <?php } ?>
                    <?php } ?>

                </div>
            <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
