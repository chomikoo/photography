<article class="<?php echo $i; ?> album-card album-<?php the_ID(); ?> <?php if( $grid ) { echo ($i%3) ? 'grid--v1' : 'grid--v2'; }?>">
				
    <a href="<?php the_permalink(); ?>" class="album-card__link modal-link">
                
        <img class="lazy album-card__img" <?php lazy_load_thumbnail(get_the_ID(),'thumb-640', '1200px') ?>  />
        <div class="album-card__container">
            <h2 class="album-card__title"><?php the_title(); ?></h2>
            <span class="album-card__date"><?php the_field('data_sesji'); ?>,<?php the_field('miejsce'); ?></span>
        </div>
    </a>
     
</article>