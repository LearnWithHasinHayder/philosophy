<article <?php post_class('masonry__brick entry format-standard'); ?> data-aos="fade-up">

    <div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
            <?php the_post_thumbnail("philosophy-home-square"); ?>
        </a>
    </div>

    <?php get_template_part( "template-parts/common/post/summary" ); ?>

</article> <!-- end article -->