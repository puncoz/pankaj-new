<?php
/**
 * Created by PhpStorm.
 * User: puncoz
 * Date: 2/22/2016
 * Time: 4:49 PM
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>
<body>

<div class="container">
<!--    <a class="skip-link screen-reader-text hidden-s" href="#content">--><?php //_e( 'Skip to content', 'personalblog' ); ?><!--</a>-->

    <div class="section profile">

        <div class="row prof-pic">
            <div class="col s12">
                <div class="center-align">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/pankajnepal.jpg" alt="er.pankajnepal" class="responsive-img circle prof-pic">
                </div>
                <hr/>
            </div>
        </div>

        <div class="row social-links">
            <div class="col s12">
                <div class="center-align">
                    <a href="#" class="btn-floating waves-effect waves-light bgcolor">
                        <span class="fa fa-facebook"></span>
                    </a>
                    <a href="#" class="btn-floating waves-effect waves-light bgcolor">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a href="#" class="btn-floating waves-effect waves-light bgcolor">
                        <span class="fa fa-linkedin"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row prof-desc">
            <div class="col s12">
                <h1 class="center">Pankaj Kumar Nepal</h1>
            </div>
            <div class="col s8 offset-s2">
                <p class="center">
                    I am Pankaj and this is my portfolio.<br/>
                    I am a Web/PHP developer who develop web based application mainly in PHP using Codeigniter as a server-side framework and Bootstrap as a client-side framework.
                </p>
            </div>
        </div>

    </div><!-- .section -->

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <div class="section nav">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'primary-menu',
                    ) );
                    ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="divider margin20-top"></div>