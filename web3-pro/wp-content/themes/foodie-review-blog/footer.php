<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Foodie Review Blog
 */
?>
<div id="footer">
  <?php 
    $foodie_review_blog_footer_widget_enabled = get_theme_mod('foodie_review_blog_footer_widget', true);
    
    if ($foodie_review_blog_footer_widget_enabled !== false && $foodie_review_blog_footer_widget_enabled !== '') { ?>

        <div class="footer-widget">
            <div class="container">
            <div class="row">
            <!-- Footer 1 -->
            <div class="<?php echo is_active_sidebar('footer-1') ? 'col-lg-3 col-md-6 col-12' : 'col-lg-3'; ?> footer-block">
              <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
              <?php else : ?>
                <aside id="calendar" class="widget py-3" role="complementary" aria-label="calendar">
                  <h3 class="widget-title"><?php esc_html_e('Calendar', 'foodie-review-blog'); ?></h3>
                  <?php the_widget('WP_Widget_Calendar'); ?>
                </aside>
              <?php endif; ?>
            </div>

            <!-- Footer 2 -->
            <div class="<?php echo is_active_sidebar('footer-2') ? 'col-lg-3 col-md-6 col-12' : 'col-lg-3'; ?> footer-block">
              <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
              <?php else : ?>
                <aside id="meta" class="widget py-3" role="complementary">
                  <h3 class="widget-title"><?php esc_html_e('Meta', 'foodie-review-blog'); ?></h3>
                  <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                  </ul>
                </aside>
              <?php endif; ?>
            </div>

            <!-- Footer 3 -->
            <div class="<?php echo is_active_sidebar('footer-3') ? 'col-lg-3 col-md-6 col-12' : 'col-lg-3'; ?> footer-block">
              <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
              <?php else : ?>
                <aside id="categories" class="widget py-3" role="complementary">
                  <h3 class="widget-title"><?php esc_html_e('Categories', 'foodie-review-blog'); ?></h3>
                  <ul>
                    <?php wp_list_categories('title_li='); ?>
                  </ul>
                </aside>
              <?php endif; ?>
            </div>

            <!-- Footer 4 -->
            <div class="<?php echo is_active_sidebar('footer-4') ? 'col-lg-3 col-md-6 col-12' : 'col-lg-3'; ?> footer-block">
              <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
              <?php else : ?>
                <aside id="search-widget" class="widget py-3" role="complementary" aria-label="search-widget">
                  <h3 class="widget-title"><?php esc_html_e('Search', 'foodie-review-blog'); ?></h3>
                  <?php the_widget('WP_Widget_Search'); ?>
                </aside>
              <?php endif; ?>
            </div>
          </div> 
            </div>
        </div>
    <?php } ?>
    <div class="clear"></div>
  <div class="copywrap text-center">
    <div class="container">
      <p>
        <a href="<?php 
          $foodie_review_blog_copyright_link = get_theme_mod('foodie_review_blog_copyright_link', '');
          if (empty($foodie_review_blog_copyright_link)) {
              echo esc_url('https://www.theclassictemplates.com/products/free-foodie-wordpress-theme');
          } else {
              echo esc_url($foodie_review_blog_copyright_link);
          } ?>" target="_blank">
          <?php echo esc_html(get_theme_mod('foodie_review_blog_copyright_line', __('Foodie WordPress Theme', 'foodie-review-blog'))); ?>
        </a> 
        <?php echo esc_html('By Classic Templates', 'foodie-review-blog'); ?>
      </p>
    </div>
  </div>
</div>

<?php if(get_theme_mod('foodie_review_blog_scroll_hide',true)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'foodie-review-blog'); ?></a>
<?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
