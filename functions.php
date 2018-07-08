<?php

require_once( get_theme_file_path( "/inc/tgm.php" ) );
require_once( get_theme_file_path( "/inc/attachments.php" ) );

if ( site_url() == "http://demo.lwhh.com" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

function philosophy_theme_setup() {
    load_theme_textdomain( "philosophy" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support( "post-formats", array( "image", "gallery", "quote", "audio", "video", "link" ) );
    add_editor_style( "/assets/css/editor-style.css" );


    register_nav_menu( "topmenu", __( "Top Menu", "philosophy" ) );
    add_image_size( "philosophy-home-square", 400, 400, true );
}

add_action( "after_setup_theme", "philosophy_theme_setup" );

function philosophy_assets() {
    wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.css" ), null, "1.0" );
    wp_enqueue_style( "fonts-css", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.0" );
    wp_enqueue_style( "base-css", get_theme_file_uri( "/assets/css/base.css" ), null, "1.0" );
    wp_enqueue_style( "vendor-css", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.0" );
    wp_enqueue_style( "main-css", get_theme_file_uri( "/assets/css/main.css" ), null, "1.0" );
    wp_enqueue_style( "philosophy-css", get_stylesheet_uri(), null, VERSION );

    wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.0" );
    wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.0" );
    wp_enqueue_script( "plugins-js", get_theme_file_uri( "/assets/js/plugins.js" ), array( "jquery" ), "1.0", true );
    wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), "1.0", true );
}

add_action( "wp_enqueue_scripts", "philosophy_assets" );

function philosophy_pagination() {
    global $wp_query;
    $links = paginate_links( array(
        'current'  => max( 1, get_query_var( 'paged' ) ),
        'total'    => $wp_query->max_num_pages,
        'type'     => 'list',
        'mid_size' => apply_filters( "philosophy_pagination_mid_size", 3 )
    ) );
    $links = str_replace( "page-numbers", "pgn__num", $links );
    $links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
    $links = str_replace( "next pgn__num", "pgn__next", $links );
    $links = str_replace( "prev pgn__num", "pgn__prev", $links );
    echo $links;
}

remove_action( "term_description", "wpautop" );

function philosophy_widgets() {
    register_sidebar( array(
        'name'          => __( 'About Us Page', 'philosophy' ),
        'id'            => 'about-us',
        'description'   => __( 'Widgets in this area will be shown on about us page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Maps Section', 'philosophy' ),
        'id'            => 'contact-maps',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Information Section', 'philosophy' ),
        'id'            => 'contact-info',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
}

add_action( "widgets_init", "philosophy_widgets" );

function category_before_title() {
    echo "<p>Before Title</p>";
}

add_action( "philosphy_before_category_title", "category_before_title" );

function category_after_title() {
    echo "<p>After Title</p>";
}

add_action( "philosphy_after_category_title", "category_after_title" );

function category_after_desc() {
    echo "<p>After Description</p>";
}

add_action( "philosphy_after_category_description", "category_after_desc" );


function beginning_category_page( $category_title ) {
    if ( "New" == $category_title ) {
        $visit_count = get_option( "category_new" );
        $visit_count = $visit_count ? $visit_count : 0;
        $visit_count ++;
        update_option( "category_new", $visit_count );
    }
}

add_action( "philosphy_category_page", "beginning_category_page" );


function philosophy_home_banner_class( $class_name ) {
    if ( is_home() ) {
        return $class_name;
    } else {
        return "";
    }
}

add_filter( "philosophy_home_banner_class", "philosophy_home_banner_class" );

function pagination_mid_size( $size ) {
    return 2;
}

add_filter( "philosophy_pagination_mid_size", "pagination_mid_size" );

function uppercase_text( $param1, $param2, $param3 ) {
    return ucwords( $param1 ) . " " . strtoupper( $param2 ) . " " . ucwords( $param3 );
}

add_filter( "philosophy_text", "uppercase_text", 10, 3 );






