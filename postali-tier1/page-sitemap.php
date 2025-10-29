<?php
/**
 * Template Name: Sitemap
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <?php if (have_posts()) : 
                        while (have_posts()) : the_post(); ?>
                        <div class="column-50 block">
                            <h2>Pages</h2> 
                            <ul class="sitemap">
                                <?php wp_list_pages("title_li=" ); ?>
                            </ul> 
                        </div>
                        <div class="column-50 block">
                            <h2>Blog Posts</h2> 
                            <ul class="sitemap">
                                <?php wp_get_archives('type=postbypost'); ?>
                            </ul>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer();?>