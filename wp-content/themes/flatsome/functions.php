<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */


/*
 * Ví dụ về thêm shortcode cho UX Builder
 * Hiển thị 1 số tùy chỉnh
 * Author levantoan.com
 */
function home_project_ux_builder_element()
{
    add_ux_builder_shortcode('home_project_view', array(
        'name'     => __('Home projects'),
        'category' => __('Content'),
        'priority' => 1,
        'options'  => array(
//            'number' => array(
//                'type'    => 'scrubfield',
//                'heading' => 'Numbers',
//                'default' => '1',
//                'step'    => '1',
//                'unit'    => '',
//                'min'     => 1,
//                //'max'   => 2
//            ),
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
        echo '
        <div class="col" data-id="Showroom, shop, building, office">
            <div class="col-inner">
                <a href="https://wonder.vn/du-an/showroom-shop-building-office/sky-optical/" class="plain ">
                    <div class="portfolio-box box has-hover box-shade dark">
                        <div class="box-image">
                            <div class="image-cover" style="padding-top:100%;">
                                <img width="1020" height="638"
                                     src="https://wonder.vn/wp-content/uploads/2018/10/08-1280x800.jpg"
                                     class="attachment-large size-large" alt=""
                                     srcset="https://wonder.vn/wp-content/uploads/2018/10/08-1280x800.jpg 1280w, https://wonder.vn/wp-content/uploads/2018/10/08-640x400.jpg 640w, https://wonder.vn/wp-content/uploads/2018/10/08-768x480.jpg 768w, https://wonder.vn/wp-content/uploads/2018/10/08-600x375.jpg 600w, https://wonder.vn/wp-content/uploads/2018/10/08.jpg 1400w"
                                     sizes="(max-width: 1020px) 100vw, 1020px">
                                <div class="shade"></div>
                            </div>
                        </div><!-- box-image -->
                        <div class="box-text text-center">
                            <div class="box-text-inner">
                                <h6 class="uppercase portfolio-box-title">Sky Optical</h6>
                                <p class="uppercase portfolio-box-category is-xsmall op-6">
                                    <span class="show-on-hover">Showroom, shop, building, office</span>
                                </p>
                            </div><!-- box-text-inner -->
                        </div><!-- box-text -->
                    </div><!-- .box  -->
                </a>
            </div><!-- .col-inner -->
        </div>';
    }

    echo '</div>';

    return ob_get_clean();
}

add_shortcode('home_project_view', 'home_project_view_func');

/**
 * Override theme default specification for product # per row
 */
function loop_columns() {
    return 4; // 4 products per row
}
add_filter('loop_shop_columns', 'loop_columns', 999);