<?php
define( 'CS_ACTIVE_FRAMEWORK', false ); // default true
define( 'CS_ACTIVE_METABOX', true ); // default true
define( 'CS_ACTIVE_TAXONOMY', false ); // default true
define( 'CS_ACTIVE_SHORTCODE', false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE', false ); // default true

function philosophy_csf_metabox() {
    CSFramework_Metabox::instance( array() );
}

add_action( "init", "philosophy_csf_metabox" );

function philosophy_page_metabox( $options ) {

    $page_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta( $page_id, '_wp_page_template', true );
    if ( !in_array($current_page_template,array('about.php','contact.php')) ) {
        return $options;
    }


    $options[] = array(
        'id'        => 'page-metabox',
        'title'     => __( 'Page Meta Info', 'philosophy' ),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'page-section1',
                'title'  => __( 'Page Settings', 'philosophy' ),
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'page-heading',
                        'type'    => 'text',
                        'title'   => __( 'Page Heading', 'philosophy' ),
                        'default' => __( 'Page Heading', 'philosophy' )
                    ),
                    array(
                        'id'      => 'page-teaser',
                        'type'    => 'textarea',
                        'title'   => __( 'Teaser Text', 'philosophy' ),
                        'default' => __( 'Teaser Text', 'philosophy' )
                    ),
                    array(
                        'id'      => 'is-favorite',
                        'type'    => 'switcher',
                        'title'   => __( 'Is Favorite', 'philosophy' ),
                        'default' => 1
                    ),
                    array(
                        'id'         => 'is-favorite-extra',
                        'type'       => 'switcher',
                        'title'      => __( 'Extra Check', 'philosophy' ),
                        'default'    => 0,
                        'dependency' => array( 'is-favorite', '==', '1' )
                    ),
                    array(
                        'id'         => 'is-favorite-extra',
                        'type'       => 'text',
                        'title'      => __( 'Favorite Text', 'philosophy' ),
                        'dependency' => array( 'is-favorite-extra', '==', '1' )
                    ),
                    /*array(
                        'id'         => 'page-favorite-text',
                        'type'       => 'text',
                        'title'      => __( 'Favorite Text', 'philosophy' ),
                        'dependency' => array( 'is-favorite|is-favorite-extra', '==|==', '1|1' )
                    ),*/

                    array(
                        'id'         => 'support-language',
                        'type'       => 'checkbox',
                        'title'      => __( 'Languages', 'philosophy' ),
                        'options'    => array(
                            'bangla'  => 'Bangla',
                            'english' => 'English',
                            'french'  => 'French'
                        ),
                        'attributes' => array(
                            'data-depend-id' => 'support-language'
                        )
                    ),
                    array(
                        'id'         => 'extra-language-data',
                        'type'       => 'text',
                        'title'      => __( 'Extra Data', 'philosophy' ),
//                        'dependency' => array( 'support-language_bangla|support-language_english', '==|==', '1|1' )
                        'dependency' => array( 'support-language', 'any', 'bangla,english' )
                    )

                )
            ),
            array(
                'name'   => 'page-section2',
                'title'  => __( 'Extra Settings', 'philosophy' ),
                'icon'   => 'fa fa-book ',
                'fields' => array(
                    array(
                        'id'      => 'page-heading2',
                        'type'    => 'text',
                        'title'   => __( 'Page Heading 2', 'philosophy' ),
                        'default' => __( 'Page Heading 2', 'philosophy' )
                    ),
                    array(
                        'id'      => 'page-teaser2',
                        'type'    => 'textarea',
                        'title'   => __( 'Teaser Text 2', 'philosophy' ),
                        'default' => __( 'Teaser Text 2', 'philosophy' )
                    ),
                    array(
                        'id'      => 'is-favorite2',
                        'type'    => 'switcher',
                        'title'   => __( 'Is Favorite 2', 'philosophy' ),
                        'default' => 1
                    ),
                )
            )
        )
    );

    return $options;
}

add_filter( 'cs_metabox_options', 'philosophy_page_metabox' );

function philosophy_upload_metabox($options){

    $options[] = array(
        'id'        => 'page-upload-metabox',
        'title'     => __( 'Upload Files', 'philosophy' ),
        'post_type' => 'page',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'   => 'page-section1',
                'title'  => __( 'Upload Files', 'philosophy' ),
                'icon'   => 'fa fa-image',
                'fields' => array(
                    array(
                        'id'      => 'page-upload',
                        'type'    => 'upload',
                        'title'   => __( 'Upload PDF', 'philosophy' ),
                        'settings'      => array(
                            'upload_type'  => 'video/mp4',
                            'button_title' => __('Upload','philosophy'),
                            'frame_title'  => __('Select a PDF','philosophy'),
                            'insert_title' => __('Use this PDF','philosophy')
                        ),
                    ),
                    array(
                        'id'      => 'page-image',
                        'type'    => 'image',
                        'title'   => __( 'Upload Image', 'philosophy' ),
                        'add_title'   => __( 'Add An Image', 'philosophy' ),
                    ),
                    array(
                        'id'      => 'page-gallery',
                        'type'    => 'gallery',
                        'title'   => __( 'Upload Image', 'philosophy' ),
                        'add_title'   => __( 'Add Images', 'philosophy' ),
                        'edit_title'   => __( 'Edit Gallery', 'philosophy' ),
                        'clear_title'   => __( 'Clear Gallery', 'philosophy' ),
                    ),
                    array(
                        'id'        => 'fieldset_1',
                        'type'      => 'fieldset',
                        'title'     => 'Fieldset Field',
                        'fields'    => array(

                            array(
                                'id'    => 'fieldset_1_text',
                                'type'  => 'text',
                                'title' => 'Text Field',
                            ),

                            array(
                                'id'    => 'fieldset_1_textarea',
                                'type'  => 'textarea',
                                'title' => 'Textarea Field',
                            ),

                        ),
                    ),

                    array(
                        'id'              => 'unique_option_901',
                        'type'            => 'group',
                        'title'           => 'Group Field',
                        'button_title'    => 'Add New',
                        'accordion_title' => 'Add New Field',
                        'fields'          => array(
                            array(
                                'id'    => 'featured_posts',
                                'type'  => 'select',
                                'title'=>'select a book',
                                'options'=>'posts',
                                'query_args'     => array(
                                    'post_type'    => 'book',
                                    'posts_per_page'=>-1,
                                    'orderby'      => 'post_date',
                                    'order'        => 'DESC',
                                ),
                            ),

                        ),
                    ),

                )
            )
        )
    );

    return $options;
}
add_filter( 'cs_metabox_options', 'philosophy_upload_metabox' );









