<?php
/**
 * Template Name: Contact
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
                    <?php the_content(); ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <p><strong>Our Office</strong></p>
                    <p><?php the_field('address','options'); ?></p>
                    <p class="sidebar-more"><a href="<?php the_field('driving_directions','options'); ?>" title="Get Directions" target="blank">Get Directions</a> <span class="icon-tick-down"></span></p>
                    <iframe src="<?php the_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div><!-- #front-page -->

<?php get_footer();?>