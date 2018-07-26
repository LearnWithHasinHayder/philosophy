<?php
/*
 * Example setup for the custom Attached Posts field for CMB2.
 */

/**
 * Get the bootstrap! If using as a plugin, REMOVE THIS!
 */

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_attached_posts_field_metaboxes_example() {

    $post_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $post_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $example_meta = new_cmb2_box( array(
        'id'           => 'cmb2_attached_posts_field',
        'title'        => __( 'Attached Posts', 'philosophy' ),
        'object_types' => array( 'book' ), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => false, // Show field names on the left
    ) );

    $example_meta->add_field( array(
        'name'    => __( 'Chapters', 'philosophy' ),
        'desc'    => __( 'Drag Chapters from the left column to the right column to attach them to this page.<br />You may rearrange the order of the posts in the right column by dragging and dropping.', 'philosophy' ),
        'id'      => 'attached_cmb2_attached_posts',
        'type'    => 'custom_attached_posts',
        'column'  => true, // Output in the admin post-listing as a custom column. https://github.com/CMB2/CMB2/wiki/Field-Parameters#column
        'options' => array(
            'show_thumbnails' => true, // Show thumbnails on the left
            'filter_boxes'    => true, // Show a text box for filtering the results
            'query_args'      => array(
                'posts_per_page' => -1,
                'post_type'      => 'chapter',
                'meta_key'=>'parent_book',
                'meta_value'=> $post_id
            ), // override the get_posts args
        ),
    ) );



}
add_action( 'cmb2_init', 'cmb2_attached_posts_field_metaboxes_example' );