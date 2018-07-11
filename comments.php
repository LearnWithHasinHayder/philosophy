<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">

            <h3 class="h2">
                <?php
                $philosophy_cn = get_comments_number();
                if ( $philosophy_cn <= 1 ) {
                    echo esc_html($philosophy_cn) . " " . __( "Comment", "philosophy" );
                } else {
                    echo esc_html($philosophy_cn) . " " . __( "Comments", "philosophy" );
                }
                ?>
            </h3>

            <!-- commentlist -->
            <ol class="commentlist">

                <?php
                wp_list_comments();
                ?>

            </ol> <!-- end commentlist -->

            <div class="comments-pagination">
                <?php
                the_comments_pagination( array(
                    'screen_reader_text' => __( 'Pagination', 'philosophy' ),
                    'prev_text'          => '<' . __( 'Previous Comments', 'philosophy' ),
                    'next_text'          => '>' . __( 'Next Comments', 'philosophy' ),
                ) );
                ?>
            </div>


            <!-- respond
            ================================================== -->
            <div class="respond">

                <h3 class="h2">
                    <?php _e("Add Comment","philosophy"); ?>
                </h3>

                <?php
                comment_form();
                ?>

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div> <!-- end comments-wrap -->