<article class="album-card album-<?php the_ID(); ?>">
				
    <a href="<?php the_permalink(); ?>" class="album-card__link modal-link" data-id="<?php the_ID(); ?>" data-type="<?php echo get_post_type(); ?>">
                
        <img class="lazy album-card__img" <?php lazy_load_thumbnail(get_the_ID(),'thumb-640', '1200px') ?>  />
        <div class="album-card__container">
                <h2 class="album-card__title"><?php the_title(); ?></h2>
                <span class="album-card__date"><?php the_field('data_sesji'); ?>,<?php the_field('miejsce'); ?></span>
        </div>
    </a>
     
</article>