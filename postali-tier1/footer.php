<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

    <section class="footer">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="spacer-60"></div>
                <div class="column-25 block">
                    <p><strong>Contact Us</strong><br>
                    <a href="tel:<?php the_field('phone_number','options'); ?>" title="Call Today"><?php the_field('phone_number','options'); ?></a><br>
                    <a href="mailto:<?php the_field('email_address','options'); ?>" title="Email Today"><?php the_field('email_address','options'); ?></a>
                    </p>
                </div>
                <div class="column-50 address-map">
                    <div class="footer-address">
                        <p><strong>Office</strong><br>
                        <?php the_field('address','options'); ?><br>
                        <a href="<?php the_field('driving_directions','options'); ?>" title="Driving directions" target="blank">Directions</a>
                        </p>
                    </div>
                    <div class="footer-map">
                        <iframe src="<?php the_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="column-20 block menu">
                    <p><strong>Site Navigation</strong></p>
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav'
                        );
                        wp_nav_menu( $args );
                    ?>	
                </div>

                <div class="footer-social">
                    <?php if(get_field('social_facebook','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_facebook','options'); ?>" title="Facebook"><span class="icon-social-facebook"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_instagram','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_instagram','options'); ?>" title="Facebook"><span class="icon-social-instagram"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_linkedin','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_linkedin','options'); ?>" title="Facebook"><span class="icon-social-linkedin"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_twitter','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_twitter','options'); ?>" title="Facebook"><span class="icon-social-twitter"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_youtube','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_youtube','options'); ?>" title="Facebook"><span class="icon-social-youtube"></span></a>
                    <?php } ?>
                </div>
                <div class="footer-utility">
                    <div class="utility">
                    <?php if ( have_rows('utility_links','options') ): ?>
                    <?php while ( have_rows('utility_links','options') ): the_row(); ?>  
                        <a href="<?php the_sub_field('utility_page_link'); ?>"><?php the_sub_field('utility_link_text'); ?></a>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                    <div class="disclaimer">
                        <p class="small"><?php the_field('disclaimer_text','options'); ?></p>
                        <?php if(is_page_template('front-page.php')) { ?>
                        <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:30px 0 0;"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</footer>

<?php wp_footer(); ?>

<!-- Callrail Script -->
<script type="text/javascript" src="//cdn.callrail.com/companies/823120296/f8512433353becf601d3/12/swap.js"></script> 
<!-- /Callrail Script -->

</body>
</html>


