<?php
/**
 * Template Name: Ajax Page
 */
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
                $nonce = wp_create_nonce('ajaxtest');
                ?>

                <form action="<?php echo home_url("/") ?>" method="post">

                    <label for="info">Some Information</label>
                    <input type="text" id="info" name="info">
<!--                    <input type="hidden" value="--><?php //echo $nonce;?><!--">-->
                    <?php wp_nonce_field('ajaxtest');?>
                    <br/>

                    <input id="ajaxsubmit" type="submit" value="Post Via Ajax">
                </form>


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


                    </div>
                </div>



            </div> <!-- end s-content__main -->

        </article>


    </section> <!-- s-content -->


<?php get_footer(); ?>