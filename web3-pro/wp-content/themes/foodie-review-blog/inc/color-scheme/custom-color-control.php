<?php

$foodie_review_blog_first_color = get_theme_mod('foodie_review_blog_first_color');
$foodie_review_blog_color_scheme_css = '';

/*------------------ Global First Color -----------*/
$foodie_review_blog_color_scheme_css .='.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .topbar, .page-template-template-home-page .page-template-template-home-page li.main-nav .current_page_item, .page-template-template-home-page li.main-nav .current_page_item, #slider-cat .sliderbtn a:hover, .postsec-list .search-form input.search-submit, #sidebar form .wp-block-search__button, .nav-links .page-numbers, span.page-numbers.current, .nav-links .page-numbers:hover, input.search-submit, .page-links a, .page-links span, .tagcloud a:hover, .copywrap, #slider-cat .owl-nav button:hover{';
  $foodie_review_blog_color_scheme_css .='background-color: '.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='.breadcrumb a, #commentform input#submit, span.onsale, .breadcrumb .current-breadcrumb, nav.woocommerce-MyAccount-navigation ul li, .woocommerce a.button, .woocommerce ul.products li.product .added_to_cart, span.onsale, .woocommerce button.button, .wc-block-components-totals-coupon__button.contained{';
  $foodie_review_blog_color_scheme_css .='background-color: '.esc_attr($foodie_review_blog_first_color).'!important';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='.postsec-list .wp-block-button__link, .site-main .wp-block-button__link, .tags a, .serach_inner, #button, #sidebar input.search-submit, #footer input.search-submit, form.woocommerce-product-search button, .widget_calendar caption, .widget_calendar #today, #footer input.search-submit, .breadcrumb .current-breadcrumb {';
  $foodie_review_blog_color_scheme_css .='background: '.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='.page-template-template-home-page .search-box i:hover, .page-template-template-home-page h1.site-title a:hover, .page-template-template-home-page .main-nav ul li a:hover, .page-template-template-home-page .main-nav li.current_page_item a, .page-template-template-home-page .main-nav .current_page_item a, .page-template-template-home-page .main-nav a:hover,.main-nav ul.sub-menu li a:hover, .main-nav ul li a:hover, .main-nav li.current_page_item a, .main-nav ul ul a:hover, #slider-cat .slider-subhead, #slider-cat .show_hide a:hover, #trending-section .show_hide a:hover, .listarticle h2 a:hover, #sidebar ul li::before, #sidebar .widget a:hover, #sidebar .widget a:active, .widget .tagcloud a:hover, #footer a:hover, #footer h6, #sidebar .widget-title, .ftr-4-box h5{';
  $foodie_review_blog_color_scheme_css .='color: '.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='#slider-cat h1 span, .video-title span, .postmeta a:hover, .woocommerce ul.products li.product .price, .woocommerce div.product p.price{';
  $foodie_review_blog_color_scheme_css .='color: '.esc_attr($foodie_review_blog_first_color).'!important';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='.site-main .wp-block-button.is-style-outline a, .postsec-list .wp-block-button.is-style-outline a, .widget .tagcloud a:hover{';
  $foodie_review_blog_color_scheme_css .='border: 1px solid'.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='span.onsale{';
  $foodie_review_blog_color_scheme_css .='border: 1px solid'.esc_attr($foodie_review_blog_first_color).'!important';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='.main-nav ul.sub-menu li a:focus, .main-nav ul ul a:focus, .serach_inner input[type="submit"]:focus, .postsec-list .search-form input.search-submit, #sidebar form .wp-block-search__button, #sidebar input[type="text"], #sidebar input[type="search"], #footer input[type="search"]{';
  $foodie_review_blog_color_scheme_css .='border: 2px solid'.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='blockquote {';
  $foodie_review_blog_color_scheme_css .='border-left: 5px solid'.esc_attr($foodie_review_blog_first_color).'!important';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='.main-nav li ul{';
  $foodie_review_blog_color_scheme_css .='border-top: 3px solid'.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='{';
  $foodie_review_blog_color_scheme_css .='border-bottom: 2px solid'.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='#sidebar .widget{';
  $foodie_review_blog_color_scheme_css .='border-bottom: 3px solid'.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .='.tagcloud a:hover{';
  $foodie_review_blog_color_scheme_css .='border-color: '.esc_attr($foodie_review_blog_first_color).'';
$foodie_review_blog_color_scheme_css .='}';

$foodie_review_blog_color_scheme_css .= '
@media screen and (max-width: 1000px) {
  .main-nav ul li a:hover, .main-nav li.current_page_item a {
    color: ' . esc_attr($foodie_review_blog_first_color) . ' !important;
  }
  .main-nav .current_page_item {
    background-color: ' . esc_attr($foodie_review_blog_first_color) . ' !important;
  }
}

@media screen and (max-width: 767px) {
  .page-template-template-home-page .main-header {
    border-bottom: 2px solid ' . esc_attr($foodie_review_blog_first_color) . ' !important;
  }
  .page-template-template-home-page .product-cart .cart-count {
    background-color: ' . esc_attr($foodie_review_blog_first_color) . ' !important;
  }
}';


//---------------------------------Logo-Max-height--------- 
  $foodie_review_blog_logo_width = get_theme_mod('foodie_review_blog_logo_width');

  if($foodie_review_blog_logo_width != false){

    $foodie_review_blog_color_scheme_css .='.logo .custom-logo-link img{';

      $foodie_review_blog_color_scheme_css .='width: '.esc_html($foodie_review_blog_logo_width).'px;';

    $foodie_review_blog_color_scheme_css .='}';
  }

  // by default header
  $foodie_review_blog_slider = get_theme_mod('foodie_review_blog_slider', 'true');

  if($foodie_review_blog_slider != true){

  $foodie_review_blog_color_scheme_css .='.page-template-template-home-page .main-header{';

    $foodie_review_blog_color_scheme_css .='position: static;';

  $foodie_review_blog_color_scheme_css .='}';

  }

/*--------------------------- Woocommerce Product Image Border Radius -------------------*/

$foodie_review_blog_woo_product_img_border_radius = get_theme_mod('foodie_review_blog_woo_product_img_border_radius');
  if($foodie_review_blog_woo_product_img_border_radius != false){
    $foodie_review_blog_color_scheme_css .='.woocommerce ul.products li.product a img{';
    $foodie_review_blog_color_scheme_css .='border-radius: '.esc_attr($foodie_review_blog_woo_product_img_border_radius).'px;';
    $foodie_review_blog_color_scheme_css .='}';
}  

/*--------------------------- Scroll to top positions -------------------*/

$foodie_review_blog_scroll_position = get_theme_mod( 'foodie_review_blog_scroll_position','Right');
if($foodie_review_blog_scroll_position == 'Right'){
    $foodie_review_blog_color_scheme_css .='#button{';
        $foodie_review_blog_color_scheme_css .='right: 20px;';
    $foodie_review_blog_color_scheme_css .='}';
}else if($foodie_review_blog_scroll_position == 'Left'){
    $foodie_review_blog_color_scheme_css .='#button{';
        $foodie_review_blog_color_scheme_css .='left: 20px;';
    $foodie_review_blog_color_scheme_css .='}';
}else if($foodie_review_blog_scroll_position == 'Center'){
    $foodie_review_blog_color_scheme_css .='#button{';
        $foodie_review_blog_color_scheme_css .='right: 50%;left: 50%;';
    $foodie_review_blog_color_scheme_css .='}';
}

/*--------------------------- Footer Background Color -------------------*/

$foodie_review_blog_footer_bg_color = get_theme_mod('foodie_review_blog_footer_bg_color');
if($foodie_review_blog_footer_bg_color != false){
    $foodie_review_blog_color_scheme_css .='#footer{';
        $foodie_review_blog_color_scheme_css .='background-color: '.esc_attr($foodie_review_blog_footer_bg_color).' !important;';
    $foodie_review_blog_color_scheme_css .='}';
}

/*--------------------------- Footer background image -------------------*/

$foodie_review_blog_footer_bg_image = get_theme_mod('foodie_review_blog_footer_bg_image');
if($foodie_review_blog_footer_bg_image != false){
    $foodie_review_blog_color_scheme_css .='#footer{';
        $foodie_review_blog_color_scheme_css .='background: url('.esc_attr($foodie_review_blog_footer_bg_image).')!important;';
        $foodie_review_blog_color_scheme_css .= 'background-size: cover!important;';  
    $foodie_review_blog_color_scheme_css .='}';
}

/*--------------------------- Blog Post Page Image Box Shadow -------------------*/

$foodie_review_blog_blog_post_page_image_box_shadow = get_theme_mod('foodie_review_blog_blog_post_page_image_box_shadow',0);
if($foodie_review_blog_blog_post_page_image_box_shadow != false){
    $foodie_review_blog_color_scheme_css .='.post-thumb img{';
        $foodie_review_blog_color_scheme_css .='box-shadow: '.esc_attr($foodie_review_blog_blog_post_page_image_box_shadow).'px '.esc_attr($foodie_review_blog_blog_post_page_image_box_shadow).'px '.esc_attr($foodie_review_blog_blog_post_page_image_box_shadow).'px #cccccc;';
    $foodie_review_blog_color_scheme_css .='}';
}

/*--------------------------- Woocommerce Product Sale Position -------------------*/    

$foodie_review_blog_product_sale_position = get_theme_mod( 'foodie_review_blog_product_sale_position','Left');
if($foodie_review_blog_product_sale_position == 'Right'){
    $foodie_review_blog_color_scheme_css .='.woocommerce ul.products li.product .onsale{';
        $foodie_review_blog_color_scheme_css .='left:auto !important; right:.5em !important;';
    $foodie_review_blog_color_scheme_css .='}';
}else if($foodie_review_blog_product_sale_position == 'Left'){
    $foodie_review_blog_color_scheme_css .='.woocommerce ul.products li.product .onsale {';
        $foodie_review_blog_color_scheme_css .='right:auto !important; left:.5em !important;';
    $foodie_review_blog_color_scheme_css .='}';
}        

/*--------------------------- Shop page pagination -------------------*/

$foodie_review_blog_wooproducts_nav = get_theme_mod('foodie_review_blog_wooproducts_nav', 'Yes');
if($foodie_review_blog_wooproducts_nav == 'No'){
  $foodie_review_blog_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
    $foodie_review_blog_color_scheme_css .='display: none;';
  $foodie_review_blog_color_scheme_css .='}';
}

/*--------------------------- Related Product -------------------*/

$foodie_review_blog_related_product_enable = get_theme_mod('foodie_review_blog_related_product_enable',true);
if($foodie_review_blog_related_product_enable == false){
  $foodie_review_blog_color_scheme_css .='.related.products{';
    $foodie_review_blog_color_scheme_css .='display: none;';
  $foodie_review_blog_color_scheme_css .='}';
}