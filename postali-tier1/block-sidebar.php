<?php if(get_field('add_testimonial','options')) { ?>
    <div class="testimonial-block">
        <p class="testimonial"><?php the_field('sidebar_testimonial','options'); ?></p>
        <p><strong><?php the_field('sidebar_testimonial_author','options'); ?></strong></p>
    </div>
    <?php if( !is_post_type_archive( 'testimonials' ) ) : ?>
    <div class="spacer-30"></div>
    <p class="sidebar-more"><a href="/testimonials/" title="Read more testimonials">Read More Testimonials</a> <span class="icon-tick-down"></span></p>
    <?php endif; ?>
    <div class="sidebar-spacer"></div>
<?php } ?>

<?php if(get_field('add_result','options')) { ?>
    <div class="sidebar-header">NOTABLE RESULT</div>
    <div class="result-block">
        <p class="large"><strong><?php the_field('sidebar_result_headline','options'); ?></strong></p>
        <p class="result"><?php the_field('sidebar_result','options'); ?></p>
    </div>
    
    <?php if( !is_post_type_archive( 'results' ) ) : ?>
    <div class="spacer-30"></div>
    <p class="sidebar-more"><a href="/results/" title="Read more results">Read More Results</a> <span class="icon-tick-down"></span></p>
    <?php endif; ?>

    <div class="sidebar-spacer"></div>
<?php } ?>

<?php if(get_field('add_practice_area_menu','options')) { ?>
    <div class="sidebar-header">OUR PRACTICE AREAS</div>
    <div class="sidebar-menu">
        <?php the_field('practice_area_menu','options'); ?>	
    </div>
<?php } ?>

<?php if(is_single()) { ?>
    <!-- Related Posts Block --> 
    <?php $categories = get_the_category();
    $category_id = $categories[0]->cat_ID; ?>

    <?php $args = array( 
        'posts_per_page'    => 5, 
        'post__not_in'      => array( $post->ID ),
        'order_by'          => 'date',
        'order'             => 'desc'  
    );

    $recent_posts = get_posts( $args );
    $count = count($recent_posts); 
    ?>

    <?php if ($count >= 1) : ?>
    <div class="sidebar-spacer"></div>
    <div class="sidebar-header">RECENT LEGAL BLOGS</div>
    <div class="sidebar-menu">
        <ul>
        <?php                 
        $recent_posts = get_posts( $args );
        foreach ( $recent_posts as $post ) : setup_postdata( $post ); ?>
            <li>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>                
            </li>
        <?php endforeach; 
        wp_reset_postdata();?>
        </ul>
    </div>
    <div class="spacer-30"></div>
    <p class="sidebar-more"><a href="/blog/" title="All Blogs">View All Blogs</a> <span class="icon-tick-down"></span></p>

    <?php endif; ?>

<?php } ?>