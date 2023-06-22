<?php
/*
 * This is the child theme for UltraPress theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'planty_enqueue_styles' );

function planty_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
    wp_register_script('buttonplusminusjs', get_stylesheet_directory_uri() . '/js/buttonplusminus.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('buttonplusminusjs');
    wp_register_style('font_syne_800', 'https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap', array(), null, 'all');
    wp_register_style('font_syne_700', 'https://fonts.googleapis.com/css2?family=Syne:wght@700&display=swap', array(), null, 'all');
    wp_register_style('font_syne_600', 'https://fonts.googleapis.com/css2?family=Syne:wght@600&display=swap', array(), null, 'all');
    wp_register_style('font_syne_500', 'https://fonts.googleapis.com/css2?family=Syne:wght@500&display=swap', array(), null, 'all');
    wp_register_style('font_syne_400', 'https://fonts.googleapis.com/css2?family=Syne:wght@400&display=swap', array(), null, 'all');
    wp_enqueue_style('font_syne_800');
    wp_enqueue_style('font_syne_700');
    wp_enqueue_style('font_syne_600');
    wp_enqueue_style('font_syne_500');
    wp_enqueue_style('font_syne_400');
}


/*
 * Your code goes below
 */
function show_cans(){
    echo "<div class='cans-line'>";
    for($i=2; $i<18; $i++){
        echo "<img id='can" . $i . "' src='" . get_stylesheet_directory_uri() . "/img/planty5 ". $i . ".png' alt='can" . $i . "' />";
    }
    echo "</div>";
}

add_action('loop_end', 'show_cans');

function menu_with_admin($items, $args){
    (is_user_logged_in())? $items.="<li><a id='extend-menu-item' class='link-added' href='" . home_url('/') . "wp-admin'>Admin</a><li>" : $items;  
    return $items;
}

add_filter('wp_nav_menu_items', 'menu_with_admin', 10, 2);


function plugin_neccassary(){
    if(!is_plugin_active("fluentform/fluentform.php")): 
        echo "<div class='notice notice-warning settings-error is-dismissible'><p><strong><span>Planty Theme need the following plugin : <em><a class='' href='" . admin_url() . "/plugin-install.php?tab=plugin-information&plugin=fluentform&TB_iframe=true&width=772&height=878'>Fluent Forms</a></em></span></strong></div>"; 
    endif;
}

add_action('admin_notices', 'plugin_neccassary');