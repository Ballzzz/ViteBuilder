<?php

/**
 *  Header Theme
 * 
 * @package ViteBuilder
 */
require_once('C:/xampp/htdocs/wordpress/wp-content/themes/ViteBuilder/inc/helper/template-tag.php');
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <?php  wp_head();?>
    
</head>
<body <?php body_class();?>>
<?php wp_body_open();?>
<div id="page" class="site">
    <header id="masthead" class="site-head" role="banner">
        <?php get_template_part( 'template-parts/header/nav');?>
    </header>
    <div id="content" class="site-content">


