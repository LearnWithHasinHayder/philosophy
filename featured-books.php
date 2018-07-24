<?php
/**
 * Template Name: Featured Books
 */
?>
<?php get_header() ?>


    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <?php
                $philosophy_arguments = array(
                    'post_type'      => 'book',
                    'meta_key'       => 'is_featured',
                    'meta_value'     => true,
                    'posts_per_page' => 3
                );

                $philosophy_books = new WP_Query( $philosophy_arguments );
                while ( $philosophy_books->have_posts() ) {
                    $philosophy_books->the_post();

                    get_template_part( "template-parts/post-formats/post", get_post_format() );
                }
                ?>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <?php philosophy_pagination(); ?>
                </nav>
            </div>
        </div>


    </section> <!-- s-content -->


<?php get_footer(); ?>