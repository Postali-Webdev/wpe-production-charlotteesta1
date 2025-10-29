<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

//ACF Fields
$hero_image = get_field('hero_background_image');
$p1_tab = get_field('p1_tab');
$p1_image = get_field('p1_section_image');
$p2_tab = get_field('p2_tab');
$p2_image = get_field('p2_section_image');
$p3_tab = get_field('p3_tab');
$p3_block_copy = get_field('p3_block_copy');
$p4_tab = get_field('p4_tab');
$p4_image = get_field('p4_section_image');
$p5_tab = get_field('p5_tab');
$p5_image = get_field('p5_section_image');
$p5_block_copy = get_field('p5_block_copy');
?>

<div class="body-container">

    <section class="banner" style="background-image: url('<?php echo checkWebpCompatibility( $hero_image['url'] ); ?>');">
        <div class="fp-container">
            <div class="columns">
                <div class="column-50">
                    <h1><?php the_field('hero_title'); ?></h1>
                </div>
                <div class="column-50">
                    <?php the_field('hero_intro_text'); ?>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                        </div>
                        <div class="contact-block-right">
                            <p><?php the_field('hero_cta_copy'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="panel-1 no-pad" style="background-color: <?php the_field('p1_panel_background_color'); ?>">
        <div class="section-tab">
            <p class="number"><?php esc_html_e( $p1_tab['section_number'] ); ?></p>
            <p class="title"><?php esc_html_e( $p1_tab['section_title'] ); ?></p>
        </div>
        <div class="columns center-vert">
            <div class="column-50 true-50 copy">
                <div class="fp-container">
                    <?php the_field('p1_section_copy') ?>
                </div>
            </div>
            <div class="column-50 true-50 image">
                <img src="<?php echo esc_url($p1_image['url']); ?>" alt="<?php esc_html_e($p1_image['alt']); ?>" title="<?php esc_html_e($p1_image['title']); ?>">
            </div>
        </div>
    </section>

    <section class="break dk-green-bg">
        <div class="columns">
            <div class="column-full">
                <p class="big-text">It’s never too early to create an estate plan. Contact us today at <a href="tel:<?php the_field('phone_number','options'); ?>"><?php the_field('phone_number','options'); ?></a> to get started.</p>
            </div>
        </div>
    </section>

    <section class="panel-2 no-pad">
        <div class="section-tab">
            <p class="number"><?php esc_html_e( $p2_tab['section_number'] ); ?></p>
            <p class="title"><?php esc_html_e( $p2_tab['section_title'] ); ?></p>
        </div>
        <div class="section-wrap" style="background-color: <?php the_field('p2_panel_background_color'); ?>">
            <div class="columns center-vert">
                <div class="column-50 true-50 image">
                    <img src="<?php echo esc_url($p2_image['url']); ?>" alt="<?php esc_html_e($p2_image['alt']); ?>" title="<?php esc_html_e($p2_image['title']); ?>">
                </div>
                <div class="column-50 true-50 copy">
                    <div class="fp-container">
                        <?php the_field('p2_section_copy') ?>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-pa">
            <div class="container">
                <div class="columns">
                    <div class="column-full center-horizontal">
                        <p class="big-text"><?php the_field('p2_our_services_title'); ?></p>
                    </div>
                </div>
                <?php if( have_rows('p2_practice_areas') ) :?>
                    <div class="grid-columns-50 pa-wrapper">
                    <?php while( have_rows('p2_practice_areas') ) : the_row(); ?>
                        <?php if( get_sub_field('practice_area_page_link') ) : ?>
                        <a href="<?php the_sub_field('practice_area_page_link'); ?>" class="pa-block">
                        <?php else : ?>
                        <div class="pa-block">
                        <?php endif; ?>
                            <p class="pa-title"><?php the_sub_field('title'); ?></p>
                            <p><?php the_sub_field('copy'); ?></p>
                        <?php if( get_sub_field('practice_area_page_link') ) : ?>
                        </a>
                        <?php else : ?>
                        </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </section>

    <section class="panel-3 no-pad">
        <div class="section-tab">
            <p class="number"><?php esc_html_e( $p3_tab['section_number'] ); ?></p>
            <p class="title"><?php esc_html_e( $p3_tab['section_title'] ); ?></p>
        </div>
        <div class="grid-columns-50">
            <div class="copy" style="background-color: <?php the_field('p3_panel_background_color_left'); ?>">
                <div class="fp-container">
                    <?php the_field('p3_section_copy'); ?>
                </div>
            </div>

            <div class="copy copy-dk" style="background-color: <?php the_field('p3_panel_background_color_right'); ?>">
                <div class="fp-container">
                    <p class="big-text"><?php esc_html_e($p3_block_copy['group_title']); ?></p>
                    <?php if( $p3_block_copy['group_numbered_list']) : $count = 0; ?>
                        <div class="columns number-list">
                        <?php foreach( $p3_block_copy['group_numbered_list'] as $list_item ) : $count++; ?>
                            <div class="list-item column-50">
                                <p class="number"><?php esc_html_e( $count < 10 ? '0' . $count : $count ); ?></p>
                                <p><?php esc_html_e( $list_item['copy'] ); ?></p>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <p><?php esc_html_e( $p3_block_copy['group_copy'] ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="panel-4 no-pad">
        <div class="section-wrap" style="background-color: <?php the_field('p4_panel_background_color'); ?>">
            <div class="columns">
                <div class="column-50 true-50 image">
                    <div class="section-tab">
                        <p class="number"><?php esc_html_e( $p4_tab['section_number'] ); ?></p>
                        <p class="title"><?php esc_html_e( $p4_tab['section_title'] ); ?></p>
                    </div>
                    <img src="<?php echo esc_url($p4_image['url']); ?>" alt="<?php esc_html_e($p4_image['alt']); ?>" title="<?php esc_html_e($p4_image['title']); ?>">
                </div>
                <div class="column-50 true-50 copy">
                    <div class="fp-container">
                        <p class="large-text"><?php the_field('p4_section_title') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-pa">
            <div class="container">
                <?php if( have_rows('p4_other_practice_areas') ) :?>
                    <div class="grid-columns-50 pa-wrapper">
                <?php while( have_rows('p4_other_practice_areas') ) : the_row(); ?>
                    <!-- <a href="<?php the_sub_field('practice_area_page_link'); ?>" class="pa-block"> -->
                        <?php if( get_sub_field('practice_area_page_link') ) : ?>
                        <a href="<?php the_sub_field('practice_area_page_link'); ?>" class="pa-block">
                        <?php else : ?>
                        <div class="pa-block">
                        <?php endif; ?>
                            <p class="pa-title"><?php the_sub_field('title'); ?></p>
                            <p><?php the_sub_field('copy'); ?></p>
                        <?php if( get_sub_field('practice_area_page_link') ) : ?>
                            </a>
                        <?php else : ?>
                            </div>
                        <?php endif; ?>
                    <!-- </a> -->
                <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </section>

    <section class="panel-5 no-pad" style="background-color: <?php the_field('p1_panel_background_color'); ?>">
        <div class="section-tab">
            <p class="number"><?php esc_html_e( $p5_tab['section_number'] ); ?></p>
            <p class="title"><?php esc_html_e( $p5_tab['section_title'] ); ?></p>
        </div>
        <div class="columns">
            <div class="column-50 true-50 copy">
                <div class="fp-container">
                    <?php _e( $p5_block_copy['group_copy'] ); ?>
                    <div class="contact-block">
                        <p><?php esc_html_e($p5_block_copy['cta_copy']); ?></p>
                        <a href="tel:<?php the_field('phone_number','options'); ?>" class="btn"><?php the_field('phone_number','options'); ?></a>
                    </div>
                </div>
            </div>
            <div class="column-50 true-50 image">
                <img src="<?php echo esc_url($p5_image['url']); ?>" alt="<?php esc_html_e($p5_image['alt']); ?>" title="<?php esc_html_e($p5_image['title']); ?>">
            </div>
        </div>
        
    </section>

</div><!-- #front-page -->

<?php get_footer();?>