<div class="entry__text">
    <div class="entry__header">

        <div class="entry__date">
            <a href="single-standard.html"><?php echo esc_html( get_the_date() ); ?></a>
        </div>
        <h1 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    </div>
    <div class="entry__excerpt">
        <?php the_excerpt(); ?>
    </div>
    <div class="entry__meta">
        <span class="entry__meta-links">
            <?php
            echo get_the_tag_list();
            ?>
        </span>
    </div>
</div>