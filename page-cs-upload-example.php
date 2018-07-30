<?php
the_post();
get_header();
?>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php the_title() ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php the_date() ?></li>
                    <li class="cat">
                        In
                        <?php the_category( " " ); ?>
                    </li>
                </ul>
            </div> <!-- end s-content__header -->

            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php the_post_thumbnail( "large" ); ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <?php
                the_content();
                wp_link_pages( );

                $philosophy_page_meta = get_post_meta(get_the_ID(),'page-upload-metabox',true);
                echo "<pre>";
                print_r($philosophy_page_meta);
                echo "</pre>";

                echo $philosophy_page_meta['page-upload'];
                echo "<br/>";
                echo $philosophy_page_meta['page-image'];
                echo wp_get_attachment_image($philosophy_page_meta['page-image'],'medium');
                echo $philosophy_page_meta['page-gallery'];
                if($philosophy_page_meta['page-gallery']){
                    $philosophy_gallery_ids = explode(",",$philosophy_page_meta['page-gallery']);
                    foreach ( $philosophy_gallery_ids as $philosophy_gallery_id ) {
                        echo "<br/>";
                        echo wp_get_attachment_image($philosophy_gallery_id,'medium');
                    }
                }
                ?>


                <div class="s-content__author">
                    <?php echo get_avatar( get_the_author_meta( "ID" ) ); ?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ); ?>">
                                <?php the_author(); ?>
                            </a>
                        </h4>

                        <p>
                            <?php the_author_meta( "description" ); ?>
                        </p>

                        <ul class="s-content__author-social">
                            <?php
                            $philosophy_author_facebook  = get_field( "facebook", "user_" . get_the_author_meta( "ID" ) );
                            $philosophy_author_twitter   = get_field( "twitter", "user_" . get_the_author_meta( "ID" ) );
                            $philosophy_author_instagram = get_field( "instagram", "user_" . get_the_author_meta( "ID" ) );
                            ?>
                            <?php if ( $philosophy_author_facebook ): ?>
                                <li><a href="<?php echo esc_url( $philosophy_author_facebook ); ?>">Facebook</a></li>
                            <?php endif; ?>
                            <?php if ( $philosophy_author_twitter ): ?>
                                <li><a href="<?php echo esc_url( $philosophy_author_twitter ); ?>">Twitter</a></li>
                            <?php endif; ?>
                            <?php if ( $philosophy_author_instagram ): ?>
                                <li><a href="<?php echo esc_url( $philosophy_author_instagram ); ?>">Instagram</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <div class="s-content__prev">
                            <?php
                            $philosophy_prev_post = get_previous_post();
                            if ( $philosophy_prev_post ):
                                ?>
                                <a href="<?php echo get_the_permalink( $philosophy_prev_post ); ?>" rel="prev">
                                    <span><?php _e( "Previous Post", "philosophy" ); ?></span>
                                    <?php echo get_the_title( $philosophy_prev_post ); ?>
                                </a>
                            <?php
                            endif;
                            ?>
                        </div>
                        <div class="s-content__next">
                            <?php
                            $philosophy_next_post = get_next_post();
                            if ( $philosophy_next_post ):
                                ?>
                                <a href="<?php echo get_the_permalink( $philosophy_next_post ); ?>" rel="next">
                                    <span><?php _e( "Next Post", "philosophy" ); ?></span>
                                    <?php echo get_the_title( $philosophy_next_post ); ?>
                                </a>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


    </section> <!-- s-content -->


<?php get_footer(); ?>