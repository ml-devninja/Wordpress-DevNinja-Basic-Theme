<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <?php // force Internet Explorer to use the latest rendering engine available ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title(''); ?></title>

    <?php // mobile meta (hooray!) ?>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no;"/>

    <?php // icons & favicons  ?>
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/apple-touch-icon.png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/favicon.png">
    <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon/favicon.ico">
    <![endif]-->


    <?php // wordpress head functions ?>
    <?php wp_head(); ?>
    <?php // end of wordpress head ?>

    <?php // drop Google Analytics Here ?>
    <?php // end analytics ?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<div class="container-fluid spacer__x2">
    <div class="container">
        <div class="col-sm-12">
            <?php echo wp_nav_menu(array(
                'menu' => 'desktop-menu',
                'menu_class' => 'list-unstyled list-inline'
            )); ?>
        </div>
    </div>
</div>