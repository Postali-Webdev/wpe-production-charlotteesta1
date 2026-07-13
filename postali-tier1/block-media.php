    <section class="media">
        <div class="container">
            <div class="columns">
                <div class="column-full block centered">
                    <h2><?php the_field('media_block_headline','options'); ?></h2>
                    <?php if ( have_rows('articles','options') ): ?>
                    <div class="media-blocks">
                    <?php while ( have_rows('articles','options') ): the_row(); ?>  
                        <div class="media-block">
                            <div class="img">
                                <?php 
                                $image = get_sub_field('image');
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="copy">
                                <?php 
                                $image = get_sub_field('logo');
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                                <p class="large"><?php the_sub_field('headline'); ?></p>
                                <?php 
                                $link = get_sub_field('link');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>