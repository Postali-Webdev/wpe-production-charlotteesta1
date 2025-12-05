
<?php if ( get_field('banner_background_image') ) { 
    $bg_image = get_field('banner_background_image');
} elseif( is_home() ) { 
    $bg_image = '/wp-content/uploads/2023/06/blog-landing-header-img.jpg';
} else { 
    $bg_image = get_field('default_background_image','options');
} ?>
<section class="banner" style="background-image:url('<?php echo checkWebpCompatibility( $bg_image ); ?>');">
    <div class="container">
    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        <div class="columns">
            <div class="column-50 block">
                <?php if(is_single()) { ?>
                    <p class="blog-date"><strong><?php the_date(); ?></strong></p>
                <?php } ?>
                <?php if (is_404()) { ?>
                    <h1><?php the_field('404_header_banner_title','options'); ?></h1>
                <?php } elseif (is_home()) { ?>
                    <h1><?php the_field('blog_header_banner_title','options'); ?></h1>
                <?php } elseif (is_search()) { ?>
                    <h1 class="post-title"><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
                <?php } elseif (is_post_type_archive('testimonials')) { ?>
                    <h1><?php the_field('testimonials_header_banner_title','options'); ?></h1>
                <?php } elseif (is_post_type_archive('results')) { ?>
                    <h1><?php the_field('results_header_banner_title','options'); ?></h1>
                <?php } elseif (is_page_template('page-interior.php')) { ?>
                    <h1><?php echo get_the_title(); ?></h1>
                <?php } else { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } ?>
                <div class="spacer-15"></div>
                <?php if (is_404()) { ?>
                    <p><?php the_field('404_header_banner_subheadline','options'); ?></p>
                <?php } elseif (is_home()) { ?>
                    <p><?php the_field('blog_header_banner_subheadline','options'); ?></p>
                <?php } elseif (is_post_type_archive('testimonials')) { ?>
                    <p><?php the_field('testimonials_header_banner_subheadline','options'); ?></p>
                <?php } elseif (is_post_type_archive('results')) { ?>
                    <p><?php the_field('results_header_banner_subheadline','options'); ?></p>
                <?php } else { ?>
                    <p><?php the_field('banner_value_proposition'); ?></p>
                <?php } ?>
                <?php if(is_single() && !is_singular('testimonials')) { ?>
                    <p class="cta">Written by <?php the_field('blog_author','options'); ?> </p>
                    <p>Category: <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></p>
                <?php } elseif ( is_single() && is_singular('testimonials') ) { ?>
                    <p class="cta">Written by <?php the_field('testimonial_author'); ?> </p>
                <?php } else { ?>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                        </div>
                        <?php if (!is_page_template('page-contact.php')) { ?>
                        <div class="contact-block-right">
                            <a href="/contact/" title="Online form">Online Form</a>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

            <?php if(is_single()) { ?>
                <div class="blog-cta">
                    <p>Prepare for Everything. Start Now.</p>
                    <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                    <div class="spacer-15"></div>
                    <a href="/contact/" title="Online form">Online Form</a>
                </div>
            <?php } ?>

        </div>
    </div>
    <?php if(get_field('include_gradient_overlay','options')) { ?>
        <div class="banner-gradient"></div>
    <?php } ?>
</section>