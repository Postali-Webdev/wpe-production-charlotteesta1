<?php
/**
 * Template Name: Landing
 * @package Postali Child
 * @author Postali LLC
**/

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array (
	'post_type' => 'page',
    'paged' => $paged,
	'posts_per_page' => '-1',
	'post_status' => 'publish',
    'post_parent'   => 0,
	'order' => 'DESC',
    'meta_query' => [
        [
            'key'   => '_wp_page_template',
            'value' => 'page-interior.php'
        ]
    ]
);
$the_query = new WP_Query($args);

get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <h3>We understand the <span class="gold">importance of planning</span>.<br>We have <span class="gold">solutions</span>.</h3>
                    <div class="block-grid">
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
                            $child_args = array (
                                'post_type' => 'page',
                                'post_per_page' => '-1',
                                'post_status' => 'publish',
                                'post_parent'   => $post->ID,
                                'order' => 'DESC',
                                'meta_query' => [
                                    [
                                        'key'   => '_wp_page_template',
                                        'value' => 'page-interior.php'
                                    ]
                                ]
                            );
                            $child_query = new WP_Query($child_args);
                            $child_pages_count = $child_query->found_posts;
                        ?>
                            <article>
                                <div class="copy-wrapper">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <p class="subtitle-text"><?php echo get_field('h1_title_optional') ? get_field('h1_title_optional') : get_the_title(); ?></p>
                                    </a>
                                </div>
                                <?php if( $child_query->have_posts() ) : ?>
                                <div class="child-pa-wrapper">
                                    <p class="view-all-btn">View All Pages</p>
                                    <ul class="list inactive list-<?php echo $child_pages_count >= 5 ? '5' : $child_pages_count; ?>">
                                        <?php while( $child_query->have_posts() ) : $child_query->the_post();
                                            $title = get_the_title();
                                            $link = get_the_permalink();
                                            ?>
                                            <li><a href="<?php echo esc_url($link); ?>"><?php echo get_field('h1_title_optional') ? get_field('h1_title_optional') : get_the_title(); ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                                <?php endif; wp_reset_query();?>
                            </article>
                        <?php endwhile; ?>
                        <div class="spacer-60"></div>
                        <?php post_pagination($paged, $the_query->max_num_pages);  wp_reset_query();?>
                    </div>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
            <div class="columns">
                <div class="column-66 block">
                    <?php get_template_part('block', 'cta'); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>