<?php
/**
* @package moran
* @subpackage header template
* @version v0.2-beta.5
* Template Name: Header template
* Description: contains HTML metadata and Header block that display logo and navigation elements.
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description'): wp_title(); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime(get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="all" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="site_container">
  <header>
<div class="header-row row">
    <div class="header_branding">
      <?php if(is_singular() && toc_get_index()): ?>
        <div class="control-toc header-item inline">
          <div class="toc_show-hide">
            <div class="show-hide_btn ctrl-btn">
              <span class="btn_toc btn">
                <i class="fa fa-file-text"></i>
              </span>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="branding_switch header-item inline">
        <div class="switch_btn ctrl-btn">
            <span class="btn_lang btn">
              <?php pll_the_languages(array('hide_current'=> 1, 'display_names_as'=> 'slug')); ?>
            </span>
        </div>
      </div>
      <div class="branding_site header-item inline">
        <?php if(get_theme_mod('logo')): ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="logo">
          <img src="<?php echo esc_url(get_theme_mod('logo'));?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
        </a>
        <?php else: ?>
        <h1>
          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php echo bloginfo('name'); ?></a>
        </h1>
        <?php endif; ?>

      </div>
    </div>
    <div class="header_navigation">
      <?php if(is_singular()): ?>
      <div class="control-options header-item inline">
        <div class="options_show-hide">
          <div class="show-hide_btn ctrl-btn">
            <span class="btn_toc btn">
              <i class="fa fa-cog"></i>
            </span>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="navigation_menu header-item inline">
        <span class="menu_title"><?php echo _e('Menu', 'moran'); ?></span>
        <div class="menu_btn ctrl-btn">
          <span class="btn_full-menu btn">
            <i class="fa fa-bars"></i>
          </span>
          <span class="btn_close-all btn">
            <i class="fa fa-close"></i>

          </span>
        </div>
      </div>
      <div class="navigation_search header-item inline">
        <div class="search_btn ctrl-btn">
          <span class="btn_search btn">
            <i class="fa fa-search"></i>
          </span>
        </div>
      </div>

    </div>

  </div>
  <div class="header_overlay header_callables">
      <?php  // Show Category navigation
      wp_nav_menu(array(
        'theme_location' => 'category',
        'container_id'   => 'overlay_full-menu',
        'container_class'=> 'overlay_full-menu overlay_item',
        'menu_class'     => 'nav-cat_menu',
      )); ?>
      <div class="overlay_full-info overlay_item">
        <div class="info_social">
          <?php social_profile(); ?>
        </div>
        <div class="info_credit">
          <?php  get_template_part('templates/footer', 'credit'); ?>
        </div>
    </div>
  </div>
  </header>
  <main>

    <div class="main_container container">
      <?php if (is_singular()) get_sidebar (); ?>
