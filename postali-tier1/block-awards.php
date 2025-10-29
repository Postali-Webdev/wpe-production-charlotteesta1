    <section class="awards">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php if ( have_rows('awards','options') ): ?>
                    <?php while ( have_rows('awards','options') ): the_row(); ?>  
                        <?php 
                        $image = get_sub_field('award_image');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="award-img" />
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>