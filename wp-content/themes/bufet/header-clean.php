<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">

    <?php
        $bufet = get_option('bufet');

        if( isset( $bufet['preloader'] ) && $bufet['preloader'] == true ) :
    ?>

        <div class="preloader-wrapper">
            <div class="preloader loading">
              <span class="slice"></span>
              <span class="slice"></span>
              <span class="slice"></span>
              <span class="slice"></span>
              <span class="slice"></span>
              <span class="slice"></span>
            </div>
        </div>

    <?php endif; ?>


    <?php if( isset( $bufet['scrolltotop'] ) && $bufet['scrolltotop'] == true  ) : ?>
        <a href="#home" class="scrolltotop homepage-1"><span class="ti-angle-double-up"></span></a>
    <?php endif; ?>
