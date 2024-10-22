<?php
/*
 * @package Foodie Review Blog
 */

function foodie_review_blog_admin_enqueue_scripts() {
    wp_enqueue_style( 'foodie-review-blog-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'foodie_review_blog_admin_enqueue_scripts' );

add_action('after_switch_theme', 'foodie_review_blog_options');

function foodie_review_blog_options() {
    global $pagenow;
    if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        wp_redirect( admin_url( 'themes.php?page=foodie-review-blog-demo' ) );
        exit;
    }
}

function foodie_review_blog_theme_info_menu_link() {

    $foodie_review_blog_theme = wp_get_theme();
    add_theme_page(
        sprintf( esc_html__( 'Welcome to %1$s %2$s', 'foodie-review-blog' ), $foodie_review_blog_theme->get( 'Name' ), $foodie_review_blog_theme->get( 'Version' ) ),
        esc_html__( 'Theme Info', 'foodie-review-blog' ),'edit_theme_options','foodie-review-blog','foodie_review_blog_theme_info_page'
    );

    // Add "Theme Demo Import" page
    add_theme_page(
        esc_html__( 'Theme Demo Import', 'foodie-review-blog' ),
        esc_html__( 'Theme Demo Import', 'foodie-review-blog' ),
        'edit_theme_options',
        'foodie-review-blog-demo',
        'foodie_review_blog_demo_content_page'
    );

}
add_action( 'admin_menu', 'foodie_review_blog_theme_info_menu_link' );

function foodie_review_blog_theme_info_page() {

    $foodie_review_blog_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'foodie-review-blog' ), esc_html($foodie_review_blog_theme->get( 'Name' )), esc_html($foodie_review_blog_theme->get( 'Version' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'foodie-review-blog' ); ?>
    </p>
    <div class="important-link">
        <p class="main-box columns-wrapper clearfix">
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Pro version of our theme', 'foodie-review-blog' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you exited for our theme? Then we will proceed for pro version of theme.', 'foodie-review-blog' ); ?></p>
                <a class="get-premium" href="<?php echo esc_url( FOODIE_REVIEW_BLOG_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'foodie-review-blog' ); ?></a>
                <p><strong><?php esc_html_e( 'Check all classic features', 'foodie-review-blog' ); ?></strong></p>
                <p><?php esc_html_e( 'Explore all the premium features.', 'foodie-review-blog' ); ?></p>
                <a href="<?php echo esc_url( FOODIE_REVIEW_BLOG_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'foodie-review-blog' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Need Help?', 'foodie-review-blog' ); ?></strong></p>
                <p><?php esc_html_e( 'Go to our support forum to help you out in case of queries and doubts regarding our theme.', 'foodie-review-blog' ); ?></p>
                <a href="<?php echo esc_url( FOODIE_REVIEW_BLOG_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'foodie-review-blog' ); ?></a>
                <p><strong><?php esc_html_e( 'Leave us a review', 'foodie-review-blog' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you enjoying our theme? We would love to hear your feedback.', 'foodie-review-blog' ); ?></p>
                <a href="<?php echo esc_url( FOODIE_REVIEW_BLOG_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'foodie-review-blog' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Check Our Demo', 'foodie-review-blog' ); ?></strong></p>
                <p><?php esc_html_e( 'Here, you can view a live demonstration of our premium them.', 'foodie-review-blog' ); ?></p>
                <a href="<?php echo esc_url( FOODIE_REVIEW_BLOG_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'foodie-review-blog' ); ?></a>
                <p><strong><?php esc_html_e( 'Theme Documentation', 'foodie-review-blog' ); ?></strong></p>
                <p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed theme setup.', 'foodie-review-blog' ); ?></p>
                <a href="<?php echo esc_url( FOODIE_REVIEW_BLOG_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'foodie-review-blog' ); ?></a>
            </div>
        </p>
    </div>
    <div id="getting-started">
        <h3><?php printf( esc_html__( 'Getting started with %s', 'foodie-review-blog' ),
        esc_html($foodie_review_blog_theme->get( 'Name' ))); ?></h3>
        <div class="columns-wrapper clearfix">
            <div class="column column-half clearfix">
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Description', 'foodie-review-blog' ); ?></h4>
                    <div class="theme-description-1"><?php echo esc_html($foodie_review_blog_theme->get( 'Description' )); ?></div>
                </div>
            </div>
            <div class="column column-half clearfix">
                <img src="<?php echo esc_url( $foodie_review_blog_theme->get_screenshot() ); ?>" alt=""/>
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Options', 'foodie-review-blog' ); ?></h4>
                    <p class="about">
                    <?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'foodie-review-blog' ),esc_html($foodie_review_blog_theme->get( 'Name' ))); ?></p>
                    <p>
                    <div class="themelink-1">
                        <a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Theme', 'foodie-review-blog' ); ?></a>
                        <a class="get-premium" href="<?php echo esc_url( FOODIE_REVIEW_BLOG_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Checkout Premium', 'foodie-review-blog' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'foodie-review-blog' ),
            esc_html($foodie_review_blog_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'foodie-review-blog' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url( FOODIE_REVIEW_BLOG_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'foodie-review-blog' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'foodie-review-blog' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}

function foodie_review_blog_demo_content_page() {

    $foodie_review_blog_theme = wp_get_theme();
    ?>
    <div class="container">
       <div class="start-box">
          <div class="columns-wrapper m-0"> 
             <div class="column column-half clearfix">
               <div class="wrapper-info"> 
                  <img src="<?php echo esc_url( get_template_directory_uri().'/images/Logo.png' ); ?>" />
                  <h2><?php esc_html_e( 'Welcome to Foodie Review Blog', 'foodie-review-blog' ); ?></h2>
                  <span class="version"><?php esc_html_e( 'Version', 'foodie-review-blog' ); ?>: <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></span>	
                  <p><?php esc_html_e( 'To begin, locate the demo importer button and click on it to initiate the importation of all the demo content.', 'foodie-review-blog' ); ?></p>
                  <?php require get_parent_theme_file_path( '/inc/demo-content.php' ); ?>
               </div>
             </div>
             <div class="column column-half clearfix">
             <div class="get-screenshot">
               <img src="<?php echo esc_url( get_template_directory_uri().'/screenshot.png' ); ?>" />
             </div>   
             </div>
          </div>
       </div>
    </div>
<?php
}

?>
