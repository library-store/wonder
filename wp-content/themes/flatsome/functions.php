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
function devvn_ux_builder_element()
{
    add_ux_builder_shortcode('devvn_viewnumber', array(
        'name'     => __('Ví dụ về Element'),
        'category' => __('Content'),
        'priority' => 1,
        'options'  => array(
            'number' => array(
                'type'    => 'scrubfield',
                'heading' => 'Numbers',
                'default' => '1',
                'step'    => '1',
                'unit'    => '',
                'min'     => 1,
                //'max'   => 2
            ),
        ),
    ));
}

add_action('ux_builder_setup', 'devvn_ux_builder_element');

function devvn_viewnumber_func($atts)
{
    extract(shortcode_atts(array(
        'number' => '1',
    ), $atts));
    ob_start();
    echo 'Bạn nhập số ' . $number;
    return ob_get_clean();
}

add_shortcode('devvn_viewnumber', 'devvn_viewnumber_func');