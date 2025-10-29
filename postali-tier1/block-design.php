<?php 
    $GLOBALS['font_primary'] = get_field('font_primary','options');
    $GLOBALS['font_secondary'] = get_field('font_secondary','options');
    $body_font_color = get_field('body_font_color','options');
    $color_primary_1 = get_field('color_primary_1','options');
    $color_primary_2 = get_field('color_primary_2','options');
    $color_secondary_1 = get_field('color_secondary_1','options');
    $color_page_bg = get_field('color_page_bg','options');
    $color_banner_gradient = get_field('color_banner_gradient','options');

    // rgba value of primary color for gradient //
    list($r, $g, $b) = array_map(
        function ($c) {
          return hexdec(str_pad($c, 2, $c));
        },
        str_split(ltrim($color_banner_gradient, '#'), strlen($color_banner_gradient) > 4 ? 2 : 1)
      );
?>

<style type="text/css">  
    /* global */
    .btn { color:<?php echo $color_primary_1; ?> }

    /* header */
    header { background:<?php echo $color_primary_1; ?> !important; }
    header #header-top #header-top_right #header-top_menu .menu li a { font-family: <?php echo $GLOBALS['font_primary']; ?>; }
    header #header-top #header-top_right #header-top_menu .menu li:hover a { color:<?php echo $color_primary_2; ?>; }
    header #header-top #header-top_right #header-top_menu .menu li a::before { background:<?php echo $color_secondary_1; ?>; }
    header #header-top #header-top_right #header-top_menu .menu li.nav-contact a { background: <?php echo $color_primary_2; ?>; }
    header #header-top #header-top_right #header-top_menu .menu li.nav-contact a:hover { background: <?php echo $color_secondary_1; ?>; }
    header #header-top #header-top_right #header-top_menu .menu li .sub-menu { background: <?php echo $color_secondary_1; ?>; }
    header #header-top #header-top_right .navbar-form-search .search-form-container.hdn .search-input-group .btn { background: <?php echo $color_secondary_1; ?>; }
    header .navbar-form-search .form-control { font-family: <?php echo $GLOBALS['font_primary']; ?>; }
    
    /* body */
    .body-container { background:<?php echo $color_page_bg; ?> !important; }
    .body-container p { font-family: <?php echo $GLOBALS['font_primary']; ?>; color:<?php echo $body_font_color; ?>; }
    .body-container h2 { font-family: <?php echo $GLOBALS['font_primary']; ?>; color:<?php echo $body_font_color; ?>; }
    .body-container h3 { font-family: <?php echo $GLOBALS['font_primary']; ?>; color:<?php echo $body_font_color; ?>; }
    .body-container h4 { font-family: <?php echo $GLOBALS['font_primary']; ?>; color:<?php echo $body_font_color; ?>; }
    .body-container ul li, .body-container ol li { font-family: <?php echo $GLOBALS['font_primary']; ?>; color:<?php echo $body_font_color; ?>; }
    .body-container .btn { font-family: <?php echo $GLOBALS['font_primary']; ?>; background:<?php echo $color_primary_2; ?>; color:white; }
    .body-container .btn:hover { background:<?php echo $color_primary_1; ?>; color:white; }

    /* blocks */
    .awards { background:<?php echo $color_secondary_1; ?> !important; }
    .banner .banner-gradient { background:linear-gradient(0deg, <?php echo "rgba(" . $r . ", " . $g . ", " . $b . ",1)"; ?> 0%, <?php echo "rgba(" . $r . ", " . $g . ", " . $b . ",.85)"; ?> 50%); }
    .banner h1 { font-family: <?php echo $GLOBALS['font_secondary']; ?>; }
    .banner .btn { background:<?php echo $color_primary_2; ?> !important; color:<?php echo $color_secondary_1; ?>; }
    .banner .btn:hover { background: white !important; color:<?php echo $color_primary_2; ?>; }
    .banner .main-contact .contact-block-right a:hover { color:<?php echo $color_primary_2; ?> }

    /* sidebar */
    .sidebar-block .testimonial-block { background:<?php echo $color_secondary_1; ?> !important; }
    .sidebar-block .sidebar-spacer { border-bottom: 1px solid <?php echo $color_primary_1; ?>; }
    .sidebar-block .sidebar-header { color: #071f1e; background: #CAA962; font-family: <?php echo $GLOBALS['font_primary']; ?>; }
    .sidebar-block ul li { border-bottom: 1px solid <?php echo $color_primary_1; ?>; }
    .sidebar-block ul li a { font-family:<?php echo $GLOBALS['font_primary']; ?>; color:<?php echo $body_font_color; ?>; }
    .sidebar-block ul li a:hover { color:<?php echo $color_primary_2; ?>; }
    .sidebar-block .sidebar-more a { color:<?php echo $body_font_color; ?>; }
    .sidebar-block .sidebar-more a:hover { color:<?php echo $color_primary_2; ?>; }
    .sidebar-block .sidebar-more:hover span { color:<?php echo $color_primary_2; ?>; }

    /* contact form */
    .page-template-page-contact .gform_wrapper { background: <?php echo $color_primary_1; ?>; }
    .page-template-page-contact .gform_wrapper input[type="submit"] { background: #CAA962; font-family: <?php echo $GLOBALS['font_primary']; ?>; }
    .page-template-page-contact .gform_wrapper input[type="submit"]:hover { background: white !important; }

    /* footer */
    .footer { background:<?php echo $color_primary_1; ?> !important; } 
    .footer p, .footer ul li a { font-family: <?php echo $GLOBALS['font_primary']; ?>; }
    .footer p a:hover { color: <?php echo $color_primary_2; ?>; }
    .footer .menu #menu-footer-menu li a:hover { color: <?php echo $color_primary_2; ?>; }
    .footer a.social-link span:hover { background-color: <?php echo $color_primary_2; ?> !important; }
    .footer .footer-utility .utility a { font-family: <?php echo $GLOBALS['font_primary']; ?>; }
    .footer .footer-utility .utility a :hover { color: <?php echo $color_primary_2; ?>; }

    @media screen and (max-width:1024px) {
        header #header-top #header-top_right #header-top_menu .menu { background:<?php echo $color_primary_1; ?>; }
        header #header-top #header-top_right #header-top_menu .menu li:hover ul.sub-menu { background:<?php echo $color_page_bg; ?>; }
    }

    /* Interior Template */
    .home .banner .btn { background:<?php echo $color_primary_1; ?> !important; color:<?php echo $color_secondary_1; ?>; }
    .home .banner .btn:hover { background: white !important; color:<?php echo $color_primary_1; ?>; }
</style>