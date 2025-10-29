<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>



<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="article-single-featured-image">
                        <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <img src="<?php echo $featImg[0]; ?>" class="article-featured-image"  />
                        <?php } else { ?>
                            <img src="<?php echo $blogDefault; ?>" id="article-featured-image-default" class="article-featured-image" >
                        <?php } ?>
                    </div>
                    <div class="spacer-60"></div>
                    <?php the_content(); ?>
                    <div class="spacer-30"></div>
                    <a href="<?php if( is_singular('testimonials') ) {
                        echo '/testimonials/';
                    } else {
                        echo '/blog/';
                    }?>" class="btn">View All <?php if( is_singular('testimonials') ) {
                        echo 'Testimonials';
                    } else {
                        echo 'Blogs';
                    } ?></a>
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