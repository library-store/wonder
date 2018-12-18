<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';
require get_template_directory() . '/options.php';

/**
 * Ẩn một số menu trong quản trị
 */

add_action('admin_head', 'register_css');
function register_css()
{
     echo '<style>#wp-admin-bar-flatsome-activate, .update-nag, #wp-admin-bar-flatsome_panel{ display: none !important; }
     </style>';
}

/**
 * My Woocommerce custom
 */

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' ); //Hide add to cart button
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 ); //Hide add to cart button


/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */


/*
 * Thêm shortcode cho UX Builder
 * Hiển thị Block dự dán
 */
function home_project_ux_builder_element()
{
    add_ux_builder_shortcode('home_project_view', array(
        'name'     => __('Home projects'),
        'category' => __('Content'),
        'priority' => 1,
        'options'  => array(
            'number' => array(
                'type'    => 'scrubfield',
                'heading' => 'Numbers',
                'default' => '12',
                'step'    => '1',
                'unit'    => '',
                'min'     => 1,
                //'max'   => 2
            ),
        ),
    ));
}

add_action('ux_builder_setup', 'home_project_ux_builder_element');

function home_project_view_func($atts)
{
    extract(shortcode_atts(array(
//        'number' => '1',
    ), $atts));
    ob_start();
    $args = array(
        'numberposts' => 12,
        'post_type'   => 'featured_item'
    );

    $latest_projects = get_posts( $args );

    echo '<div class="row large-columns-4 medium-columns- small-columns-2 row-small row-full-width">';
    foreach ($latest_projects as $project){
        $term = get_the_terms($project->ID, 'featured_item_category');
        $term_name = count($term) > 0 ? $term[0]->name : '';

        echo '
        <div class="col" data-id="'.$project->post_name.'">
            <div class="col-inner">
                <a href="'.get_permalink($project->ID).'" class="plain ">
                    <div class="portfolio-box box has-hover box-shade dark">
                        <div class="box-image">
                            <div class="image-cover" style="padding-top:100%;">
                                '.get_the_post_thumbnail( $project->ID, '', array( 'class' => '' ) ).'
                                <div class="shade"></div>
                            </div>
                        </div><!-- box-image -->
                        <div class="box-text text-center">
                            <div class="box-text-inner">
                                <h6 class="uppercase portfolio-box-title">'.$project->post_title.'</h6>
                                <p class="uppercase portfolio-box-category is-xsmall op-6">
                                    <span class="show-on-hover">'.$term_name.'</span>
                                </p>
                            </div><!-- box-text-inner -->
                        </div><!-- box-text -->
                    </div><!-- .box  -->
                </a>
            </div><!-- .col-inner -->
        </div>';
    }
    echo '</div>';

    if(count($latest_projects) > 8){
        echo '<a href="'.home_url().'/kien-truc-noi-that" target="_self" class="button primary expand"> <span>Xem tất cả</span> </a>';
    }

    return ob_get_clean();
}

add_shortcode('home_project_view', 'home_project_view_func');

/*
 * Thêm shortcode cho UX Builder
 * Hiển thị slide hình ảnh
 */
function slideshow_ux_builder_element()
{
    add_ux_builder_shortcode('slideshow_view', array(
        'name'     => __('My Slideshow'),
        'category' => __('Content'),
        'priority' => 1,
    ));
}

add_action('ux_builder_setup', 'slideshow_ux_builder_element');

function slideshow_view_func($atts)
{
    extract(shortcode_atts(array(
//        'number' => '1',
    ), $atts));
    ob_start();
    $args = array(
        'numberposts' => 12,
        'post_type'   => 'featured_item'
    );

    $latest_projects = get_posts( $args );

    echo '<div class="slider-wrapper relative " id="">
            <div class="slider slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal flickity-enabled is-draggable" data-flickity-options=\'{
                        "cellAlign": "center",
                        "imagesLoaded": true,
                        "lazyLoad": 1,
                        "freeScroll": true,
                        "wrapAround": true,
                        "autoPlay": 3000,
                        "pauseAutoPlayOnHover" : false,
                        "prevNextButtons": true,
                        "contain" : true,
                        "adaptiveHeight" : true,
                        "dragThreshold" : 5,
                        "percentPosition": true,
                        "pageDots": true,
                        "rightToLeft": false,
                        "draggable": true,
                        "selectedAttraction": 0.1,
                        "parallax" : 0,
                        "friction": 0.6
                    }\'>
            <div class="img has-hover x md-x lg-x y md-y lg-y is-selected">
                <div class="img-inner dark">
                    <img width="1280" height="720" src="https://wonder.vn/wp-content/uploads/2017/10/slider.jpg" class="attachment-original size-original" alt="" srcset="https://wonder.vn/wp-content/uploads/2017/10/slider.jpg 1280w, https://wonder.vn/wp-content/uploads/2017/10/slider-600x338.jpg 600w, https://wonder.vn/wp-content/uploads/2017/10/slider-711x400.jpg 711w, https://wonder.vn/wp-content/uploads/2017/10/slider-768x432.jpg 768w" sizes="(max-width: 1280px) 100vw, 1280px">
                </div>
            </div>
            <div class="img has-hover x md-x lg-x y md-y lg-y is-selected">
                <div class="img-inner dark">
                    <img width="1280" height="720" src="https://wonder.vn/wp-content/uploads/2017/10/slider.jpg" class="attachment-original size-original" alt="" srcset="https://wonder.vn/wp-content/uploads/2017/10/slider.jpg 1280w, https://wonder.vn/wp-content/uploads/2017/10/slider-600x338.jpg 600w, https://wonder.vn/wp-content/uploads/2017/10/slider-711x400.jpg 711w, https://wonder.vn/wp-content/uploads/2017/10/slider-768x432.jpg 768w" sizes="(max-width: 1280px) 100vw, 1280px">
                </div>
            </div>
            </div>
            <div class="loading-spin dark large centered"></div>
            </div><!-- .ux-slider-wrapper -->';

    return ob_get_clean();
}

add_shortcode('slideshow_view', 'slideshow_view_func');


/**
 * Override theme default specification for product # per row
 */
function loop_columns() {
    return 4; // 4 products per row
}
add_filter('loop_shop_columns', 'loop_columns', 999);
