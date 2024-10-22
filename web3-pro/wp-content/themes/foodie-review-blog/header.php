<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Foodie Review Blog
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('foodie_review_blog_preloader', true) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'foodie-review-blog' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'foodie_review_blog_box_layout', false) != "" ) { echo 'class="boxlayout"'; } ?>>

<div class="mainhead">
    <div class="topbar py-2">
      <div class="container p-0">
        <div class="row m-0">
          <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12 align-self-center d-flex gap-5 topbar-text p-0">
            <?php if(get_theme_mod('foodie_review_blog_advertise_text') != ''){ ?>
              <a target="_blank" href="<?php echo esc_url(get_theme_mod('foodie_review_blog_advertise_text_link')); ?>"><p class="advertise-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_advertise_text','foodie-review-blog')); ?></p></a> 
            <?php } ?>
            <?php if(get_theme_mod('foodie_review_blog_about_text') != ''){ ?>
              <a target="_blank" href="<?php echo esc_url(get_theme_mod('foodie_review_blog_about_text_link')); ?>"><p class="about-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_about_text','foodie-review-blog')); ?></p></a> 
            <?php } ?>
            <?php if(get_theme_mod('foodie_review_blog_contact_text') != ''){ ?>
              <a target="_blank" href="<?php echo esc_url(get_theme_mod('foodie_review_blog_contact_text_link')); ?>"><p class="contact-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_contact_text','foodie-review-blog')); ?></p></a> 
            <?php } ?>
          </div>
          <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12 align-self-center text-center top-search p-0">
            <div class="main-search d-inline-block">
              <span class="search-box text-center">
                <button type="button" class="search-open"><i class="fas fa-search"></i></button>
              </span>
            </div>
            <div class="search-outer">
              <div class="serach_inner w-100 h-100">
                <?php get_search_form(); ?>
              </div>
              <button type="button" class="search-close"><span>X</span></button>
            </div>
          </div>
          <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 align-self-center">
            <div class="social-icons d-flex gap-3 justify-content-end align-item-center">
              <?php if(get_theme_mod('foodie_review_blog_follow_us') != ''){ ?>
                <p class="follow-us mb-0 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_follow_us','foodie-review-blog')); ?></p>
              <?php } ?>
              <?php if ( get_theme_mod('foodie_review_blog_whatsapp_link') != "") { ?>
                <a title="<?php echo esc_attr('whatsapp', 'foodie-review-blog'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('foodie_review_blog_whatsapp_link')); ?>"><i class="fa-brands fa-whatsapp"></i></a> 
              <?php } ?>
              <?php if ( get_theme_mod('foodie_review_blog_fb_link') != "") { ?> 
                <a title="<?php echo esc_attr('facebook', 'foodie-review-blog'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('foodie_review_blog_fb_link')); ?>"><i class="fa-brands fa-facebook-f"></i></a>
              <?php } ?>
              <?php if ( get_theme_mod('foodie_review_blog_youtube_link') != "") { ?>
                <a title="<?php echo esc_attr('youtube', 'foodie-review-blog'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('foodie_review_blog_youtube_link')); ?>"><i class="fa-brands fa-youtube"></i></a>
              <?php } ?>
              <?php if ( get_theme_mod('foodie_review_blog_instagram_link') != "") { ?> 
                <a title="<?php echo esc_attr('instagram', 'foodie-review-blog'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('foodie_review_blog_instagram_link')); ?>"><i class="fa-brands fa-instagram"></i></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-header py-4">
      <div class="container">
        <div class="row">
          <div class="col-xxl-3 col-xl-3 col-lg-5 col-md-4 col-sm-9 col-9 align-self-center p-0">
            <div class="logo">
              <?php foodie_review_blog_the_custom_logo(); ?>
              <div class="site-branding-text">
                <?php if (get_theme_mod('foodie_review_blog_title_enable', true)) { ?>
                  <?php if (is_front_page() && is_home()) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                  <?php endif; ?>
                <?php } ?>
                <?php $foodie_review_blog_description = get_bloginfo('description', 'display');
                if ($foodie_review_blog_description || is_customize_preview()) : ?>
                  <?php if (get_theme_mod('foodie_review_blog_tagline_enable', false)) { ?>
                    <span class="site-description"><?php echo esc_html($foodie_review_blog_description); ?></span>
                  <?php } ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-xxl-1 col-xl-1 col-lg-2 col-md-2 col-sm-3 col-3 align-self-center p-0">
            <div class="header">
              <div class="toggle-nav text-center">
                <?php if (has_nav_menu('primary')) { ?>
                  <button role="tab"><i class="fa-solid fa-bars-staggered"></i></button>
                <?php } ?>
              </div>
              <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Top Menu', 'foodie-review-blog'); ?>">
                  <ul class="mobile_nav">
                    <?php wp_nav_menu(array(
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu',
                      'items_wrap' => '%3$s',
                      'fallback_cb' => 'wp_page_menu',
                    )); ?>
                  </ul>
                  <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE', 'foodie-review-blog'); ?></a>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 align-self-center p-0">
          </div>
        </div>
      </div>
    </div>
</div>