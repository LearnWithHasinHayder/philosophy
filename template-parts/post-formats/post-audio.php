<?php
$philosophy_audio_file = "";
if(function_exists("the_field")){
    $philosophy_audio_file = get_field("source_file");
}
?>
<article <?php post_class('masonry__brick entry format-audio'); ?> data-aos="fade-up">

    <div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
            <?php the_post_thumbnail("philosophy-home-square"); ?>
        </a>
        <?php if($philosophy_audio_file): ?>
        <div class="audio-wrap">
            <audio id="player" src="<?php echo esc_url($philosophy_audio_file); ?>" width="100%" height="42" controls="controls"></audio>
        </div>
        <?php
        endif;
        ?>
    </div>

    <?php get_template_part( "template-parts/common/post/summary" ); ?>

</article> <!-- end article -->