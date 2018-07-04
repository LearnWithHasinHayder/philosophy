<article class="masonry__brick entry format-audio" data-aos="fade-up">

    <div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
            <?php the_post_thumbnail("philosophy-home-square"); ?>
        </a>
        <div class="audio-wrap">
            <audio id="player" src="<?php echo get_template_directory_uri();?>/assets/media/AirReview-Landmarks-02-ChasingCorporate.mp3" width="100%" height="42" controls="controls"></audio>
        </div>
    </div>

    <?php get_template_part( "template-parts/common/post/summary" ); ?>

</article> <!-- end article -->