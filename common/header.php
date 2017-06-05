<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Stylesheets -->
    <!-- Le styles -->
    <?php
    queue_css_url('http://fonts.googleapis.com/css?family=Oxygen');
    queue_css_url('http://fonts.googleapis.com/css?family=Inconsolata');
    queue_css_file(array(
        'bootstrap',
        'font-awesome',
        'style',
    ));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    // jQuery is enabled by default in Omeka and in most themes.
    // queue_js_url('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    // queue_js_url('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
    queue_js_file(array(
        'bootstrap.min',
        'jquery.bxSlider.min',
    ));
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
   
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
     
   <!--  <button type="button" href="#content" id="skipnav" class="btn btn-danger">Skip to main content</button> -->
    <div id="wrap">
        <header role="banner">
            <div id="site-title" href="http://pennds.org/archaebot_database/">
                <?php echo link_to_home_page(theme_logo()); ?>
            </div>
            
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
        </header>

        <nav id="top-nav" class="top" role="navigation">
            <?php echo public_nav_main(); ?> 
        </nav>

      <div id="content" role="main" tabindex="-1"></div>
            <?php
                if(! is_current_url(WEB_ROOT)) {
                  fire_plugin_hook('public_content_top', array('view'=>$this));
                }
            ?>
