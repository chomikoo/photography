<article class="album-card album-<?php the_ID(); ?>">
								
    <a href="<?php the_permalink(); ?>" class="album-card__link">
        <?php
            $beforeID = get_field('przed');
            $afterID = get_field('po');
        ?>
        <div class="album-card__compare">
            <img class="album-card__img album-card__img--left lazy" <?php awesome_acf_responsive_image_lazyload( $beforeID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
            <img class="album-card__img album-card__img--right lazy" <?php awesome_acf_responsive_image_lazyload( $afterID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
        </div>

        <div class="album-card__container">
            <h2 class="album-card__title"><?php the_title(); ?></h2>
            <span class="album-card__date"><?php echo __('Retusz', 'photoportfolio'); ?></span>
        </div>
    </a>

</article>