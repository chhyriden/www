<?php
/**
 * Foodie Review Blog Theme Customizer
 *
 * @package Foodie Review Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function foodie_review_blog_customize_register( $wp_customize ) {

	function foodie_review_blog_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('foodie-review-blog-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	//Logo
    $wp_customize->add_setting('foodie_review_blog_logo_width', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'foodie_review_blog_sanitize_integer'
    ));
    $wp_customize->add_control(new Foodie_Review_Blog_Slider_Custom_Control($wp_customize, 'foodie_review_blog_logo_width', array(
    	'label'          => __( 'Logo Width', 'foodie-review-blog'),
        'section' => 'title_tagline',
        'settings' => 'foodie_review_blog_logo_width',
        'input_attrs' => array(
            'step' => 1,
            'min' => 0,
            'max' => 100,
        ),
    )));

	// color site title
	$wp_customize->add_setting('foodie_review_blog_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'foodie_review_blog_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'foodie_review_blog_sitetitle_color', array(
	   'settings' => 'foodie_review_blog_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'foodie-review-blog'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('foodie_review_blog_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
	));
	$wp_customize->add_control( 'foodie_review_blog_title_enable', array(
	   'settings' => 'foodie_review_blog_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','foodie-review-blog'),
	   'type'      => 'checkbox'
	));

	// color site tagline
	$wp_customize->add_setting('foodie_review_blog_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'foodie_review_blog_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_sitetagline_color', array(
	   'settings' => 'foodie_review_blog_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'foodie-review-blog'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('foodie_review_blog_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
	));
	$wp_customize->add_control( 'foodie_review_blog_tagline_enable', array(
	   'settings' => 'foodie_review_blog_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','foodie-review-blog'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('foodie_review_blog_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'foodie-review-blog'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('foodie_review_blog_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'foodie_review_blog_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('foodie_review_blog_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','foodie-review-blog'),
		'section' => 'foodie_review_blog_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('foodie_review_blog_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'foodie_review_blog_sanitize_choices',
	));
	$wp_customize->add_control('foodie_review_blog_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'foodie-review-blog'),
		'section'        => 'foodie_review_blog_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'foodie-review-blog'),
			'Right Sidebar' => __('Right Sidebar', 'foodie-review-blog'),
		),
	));	 

	$wp_customize->add_setting('foodie_review_blog_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'foodie_review_blog_sanitize_choices'
	 ));
	 $wp_customize->add_control('foodie_review_blog_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','foodie-review-blog'),
		'choices' => array(
			 'Yes' => __('Yes','foodie-review-blog'),
			 'No' => __('No','foodie-review-blog'),
		 ),
		'section' => 'foodie_review_blog_woocommerce_page_settings',
	 ));


	 $wp_customize->add_setting( 'foodie_review_blog_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'foodie_review_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control('foodie_review_blog_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','foodie-review-blog'),
		'section' => 'foodie_review_blog_woocommerce_page_settings'
    ));

	// single product page sidebar alignment
    $wp_customize->add_setting('foodie_review_blog_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'foodie_review_blog_sanitize_choices',
	));
	$wp_customize->add_control('foodie_review_blog_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'foodie-review-blog'),
		'section'        => 'foodie_review_blog_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'foodie-review-blog'),
			'Right Sidebar' => __('Right Sidebar', 'foodie-review-blog'),
		),
	));

	$wp_customize->add_setting('foodie_review_blog_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'foodie_review_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('foodie_review_blog_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','foodie-review-blog'),
		'section' => 'foodie_review_blog_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'foodie_review_blog_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'foodie_review_blog_sanitize_integer'
    ) );
    $wp_customize->add_control(new Foodie_Review_Blog_Slider_Custom_Control( $wp_customize, 'foodie_review_blog_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Product Img Border Radius','foodie-review-blog'),
		'section'=> 'foodie_review_blog_woocommerce_page_settings',
		'settings'=>'foodie_review_blog_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
    // Add a setting for number of products per row
    $wp_customize->add_setting('foodie_review_blog_products_per_row', array(
	    'default'   => '3',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'foodie_review_blog_sanitize_integer'  
    ));

   $wp_customize->add_control('foodie_review_blog_products_per_row', array(
	   'label'    => __('Products Per Row', 'foodie-review-blog'),
	   'section'  => 'foodie_review_blog_woocommerce_page_settings',
	   'settings' => 'foodie_review_blog_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
		      '2' => '2',
		'      3' => '3',
		      '4' => '4',
	  ),
   ) );

   // Add a setting for the number of products per page
   $wp_customize->add_setting('foodie_review_blog_products_per_page', array(
	'default'   => '9',
	'transport' => 'refresh',
	'sanitize_callback' => 'foodie_review_blog_sanitize_integer'
   ));

   $wp_customize->add_control('foodie_review_blog_products_per_page', array(
	  'label'    => __('Products Per Page', 'foodie-review-blog'),
	  'section'  => 'foodie_review_blog_woocommerce_page_settings',
	  'settings' => 'foodie_review_blog_products_per_page',
	  'type'     => 'number',
	  'input_attrs' => array(
		 'min'  => 1,
		 'step' => 1,
	 ),
   ));	

   $wp_customize->add_setting('foodie_review_blog_product_sale_position',array(
	'default' => 'Left',
	'sanitize_callback' => 'foodie_review_blog_sanitize_choices'
	));
	$wp_customize->add_control('foodie_review_blog_product_sale_position',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','foodie-review-blog'),
		'section' => 'foodie_review_blog_woocommerce_page_settings',
		'choices' => array(
			'Left' => __('Left','foodie-review-blog'),
			'Right' => __('Right','foodie-review-blog'),
		),
	) );    

	//Theme Options
	$wp_customize->add_panel( 'foodie_review_blog_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'foodie-review-blog' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('foodie_review_blog_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','foodie-review-blog'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','foodie-review-blog'),
		'priority'	=> 1,
		'panel' => 'foodie_review_blog_panel_area',
	));

	$wp_customize->add_setting('foodie_review_blog_box_layout',array(
		'default' => false,
		'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
	));
	$wp_customize->add_control( 'foodie_review_blog_box_layout', array(
	   'section'   => 'foodie_review_blog_site_layoutsec',
	   'label'	=> __('Check to Show Box Layout','foodie-review-blog'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('foodie_review_blog_preloader',array(
		'default' => true,
		'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
	));
	$wp_customize->add_control( 'foodie_review_blog_preloader', array(
	   'section'   => 'foodie_review_blog_site_layoutsec',
	   'label'	=> __('Check to Show preloader','foodie-review-blog'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting( 'foodie_review_blog_layout_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_layout_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_site_layoutsec'
	));	

	//Global Color
	$wp_customize->add_section('foodie_review_blog_global_color', array(
		'title'    => __('Manage Global Color Section', 'foodie-review-blog'),
		'panel'    => 'foodie_review_blog_panel_area',
	));

	$wp_customize->add_setting('foodie_review_blog_first_color', array(
		'default'           => '#0C7735',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'foodie_review_blog_first_color', array(
		'label'    => __('Theme Color', 'foodie-review-blog'),
		'section'  => 'foodie_review_blog_global_color',
		'settings' => 'foodie_review_blog_first_color',
	)));	

	$wp_customize->add_setting( 'foodie_review_blog_global_color_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_global_color_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_global_color'
	));	

	// Topbar Section
	$wp_customize->add_section('foodie_review_blog_topbar_section',array(
	    'title' => __('Manage Topbar Section','foodie-review-blog'),
	    'priority'  => null,
	    'panel' => 'foodie_review_blog_panel_area',
	));	

	$wp_customize->add_setting('foodie_review_blog_advertise_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_advertise_text', array(
	   'settings' => 'foodie_review_blog_advertise_text',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Add Advertisement Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_advertise_text_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_advertise_text_link', array(
	   'settings' => 'foodie_review_blog_advertise_text_link',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Add Link', 'foodie-review-blog'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('foodie_review_blog_about_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_about_text', array(
	   'settings' => 'foodie_review_blog_about_text',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Add About Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_about_text_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_about_text_link', array(
	   'settings' => 'foodie_review_blog_about_text_link',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Add Link', 'foodie-review-blog'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('foodie_review_blog_contact_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_contact_text', array(
	   'settings' => 'foodie_review_blog_contact_text',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Add Contact Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_contact_text_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_contact_text_link', array(
	   'settings' => 'foodie_review_blog_contact_text_link',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Add Link', 'foodie-review-blog'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('foodie_review_blog_follow_us',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_follow_us', array(
	   'settings' => 'foodie_review_blog_follow_us',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Add Follow Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_whatsapp_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_whatsapp_link', array(
	   'settings' => 'foodie_review_blog_whatsapp_link',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Facebook Link', 'foodie-review-blog'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('foodie_review_blog_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_fb_link', array(
	   'settings' => 'foodie_review_blog_fb_link',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Instagram Link', 'foodie-review-blog'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('foodie_review_blog_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_youtube_link', array(
	   'settings' => 'foodie_review_blog_youtube_link',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Twitter Link', 'foodie-review-blog'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('foodie_review_blog_instagram_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_instagram_link', array(
	   'settings' => 'foodie_review_blog_instagram_link',
	   'section'   => 'foodie_review_blog_topbar_section',
	   'label' => __('Pinterest Link', 'foodie-review-blog'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting( 'foodie_review_blog_topbar_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_topbar_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_topbar_section'
	));	

	// Slider Section
	$wp_customize->add_section('foodie_review_blog_slider_section',array(
	    'title' => __('Manage Slider Section','foodie-review-blog'),
	    'priority'  => null,
	    'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (502px x 420px).','foodie-review-blog'),
	    'panel' => 'foodie_review_blog_panel_area',
	));	

	$wp_customize->add_setting('foodie_review_blog_slider',array(
		'default' => true,
		'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_slider', array(
	   'settings' => 'foodie_review_blog_slider',
	   'section'   => 'foodie_review_blog_slider_section',
	   'label'     => __('Check To Enable This Section','foodie-review-blog'),
	   'type'      => 'checkbox'
	));

	$foodie_review_blog_categories = get_categories();
	$foodie_review_blog_cat_post = array();
	$foodie_review_blog_cat_post['0'] = 'Select';

	foreach ($foodie_review_blog_categories as $foodie_review_blog_category) {
	    $foodie_review_blog_cat_post[$foodie_review_blog_category->slug] = $foodie_review_blog_category->name;
	}

	$wp_customize->add_setting('foodie_review_blog_slider_cat', array(
	    'default' => '0',
	    'sanitize_callback' => 'foodie_review_blog_sanitize_choices',
	));

	$wp_customize->add_control('foodie_review_blog_slider_cat', array(
	    'type'    => 'select',
	    'choices' => $foodie_review_blog_cat_post,
	    'label'   => __('Select Category to display Latest Post', 'foodie-review-blog'),
	    'section' => 'foodie_review_blog_slider_section',
	));

	$wp_customize->add_setting('foodie_review_blog_slider_subhead',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_slider_subhead', array(
	   'settings' => 'foodie_review_blog_slider_subhead',
	   'section'   => 'foodie_review_blog_slider_section',
	   'label' => __('Add Slider Subheading', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_button_text',array(
		'default' => 'Discover More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_button_text', array(
	   'settings' => 'foodie_review_blog_button_text',
	   'section'   => 'foodie_review_blog_slider_section',
	   'label' => __('Add Button Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_button_icon',array(
        'default'=> 'fa-solid fa-arrow-right',
        'sanitize_callback' => 'sanitize_text_field'
    ));
        $wp_customize->add_control('foodie_review_blog_button_icon',array(
        'label' => __('Button Icon','foodie-review-blog'),
        'description' => __('Fontawesome Icon (e.g., fa-solid fa-arrow-right)','foodie-review-blog'),
        'section'=> 'foodie_review_blog_slider_section',
        'type'=> 'text'
    ));

	$wp_customize->add_setting('foodie_review_blog_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('foodie_review_blog_button_link_slider',array(
        'label' => esc_html__('Add Button Link','foodie-review-blog'),
        'section'=> 'foodie_review_blog_slider_section',
        'type'=> 'url'
    ));

    $wp_customize->add_setting('foodie_review_blog_review_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'foodie_review_blog_review_img',array(
	    'label' => __('Select Review Image','foodie-review-blog'),
	    'description'	=> __('Use the given image dimension (85px x 32px).','foodie-review-blog'),
	    'section' => 'foodie_review_blog_slider_section'
	)));

	$wp_customize->add_setting('foodie_review_blog_slider_review_num',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_slider_review_num', array(
	   'settings' => 'foodie_review_blog_slider_review_num',
	   'section'   => 'foodie_review_blog_slider_section',
	   'label' => __('Add Review', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_slider_review_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_slider_review_text', array(
	   'settings' => 'foodie_review_blog_slider_review_text',
	   'section'   => 'foodie_review_blog_slider_section',
	   'label' => __('Add Review Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting( 'foodie_review_blog_slider_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_slider_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_slider_section'
	));	

	// Blogger Info Section
	$wp_customize->add_section('foodie_review_blog_blogger_info_section', array(
	    'title'       => __('Manage Blogger Info Section', 'foodie-review-blog'),
	    'description' => __('<p class="sec-title">Manage Blogger Info Section</p>', 'foodie-review-blog'),
	    'priority'    => null,
	    'panel'       => 'foodie_review_blog_panel_area',
	));

	$wp_customize->add_setting('foodie_review_blog_blogger_info_hide',array(
		'default' => true,
		'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_blogger_info_hide', array(
	   'settings' => 'foodie_review_blog_blogger_info_hide',
	   'section'   => 'foodie_review_blog_blogger_info_section',
	   'label'     => __('Check To Enable This Section','foodie-review-blog'),
	   'type'      => 'checkbox'
	));

    $wp_customize->add_setting('foodie_review_blog_profile_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'foodie_review_blog_profile_img',array(
	    'label' => __('Select Profile Image','foodie-review-blog'),
	    'section' => 'foodie_review_blog_blogger_info_section'
	)));

	$wp_customize->add_setting('foodie_review_blog_profile_name',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_profile_name', array(
	   'settings' => 'foodie_review_blog_profile_name',
	   'section'   => 'foodie_review_blog_blogger_info_section',
	   'label' => __('Add Profile', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_profile_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_profile_text', array(
	   'settings' => 'foodie_review_blog_profile_text',
	   'section'   => 'foodie_review_blog_blogger_info_section',
	   'label' => __('Add Profile Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	for ($foodie_review_blog_i = 1; $foodie_review_blog_i <= 4; $foodie_review_blog_i++) {

        $wp_customize->add_setting('foodie_review_blog_social_icon'.$foodie_review_blog_i,array(
            'default'=> '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
            $wp_customize->add_control('foodie_review_blog_social_icon'.$foodie_review_blog_i,array(
            'label' => __('Social Icon','foodie-review-blog').$foodie_review_blog_i,
            'description' => __('Fontawesome Icon (e.g., fa-brands fa-instagram)','foodie-review-blog'),
            'section'=> 'foodie_review_blog_blogger_info_section',
            'type'=> 'text'
        ));

        $wp_customize->add_setting('foodie_review_blog_social_title' . $foodie_review_blog_i, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('foodie_review_blog_social_title' . $foodie_review_blog_i, array(
            'label'    => __('Add Title', 'foodie-review-blog') . $foodie_review_blog_i,
            'section'  => 'foodie_review_blog_blogger_info_section',
            'settings' => 'foodie_review_blog_social_title' . $foodie_review_blog_i,
        ));

        $wp_customize->add_setting('foodie_review_blog_social_text' . $foodie_review_blog_i, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('foodie_review_blog_social_text' . $foodie_review_blog_i, array(
            'label'    => __('Add Text', 'foodie-review-blog') . $foodie_review_blog_i,
            'section'  => 'foodie_review_blog_blogger_info_section',
            'settings' => 'foodie_review_blog_social_text' . $foodie_review_blog_i,
        ));
    }

	$wp_customize->add_setting('foodie_review_blog_video_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_video_link', array(
	   'settings' => 'foodie_review_blog_video_link',
	   'section'   => 'foodie_review_blog_blogger_info_section',
	   'label' => __('Video URL', 'foodie-review-blog'),
	   'description' => __('Enter the URL for the video (e.g., YouTube embed link).', 'foodie-review-blog'),
	   'type'      => 'url'
	));

    $wp_customize->add_setting('foodie_review_blog_video_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_video_heading', array(
	   'settings' => 'foodie_review_blog_video_heading',
	   'section'   => 'foodie_review_blog_blogger_info_section',
	   'label' => __('Add Blog Heading', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_video_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_video_title', array(
	   'settings' => 'foodie_review_blog_video_title',
	   'section'   => 'foodie_review_blog_blogger_info_section',
	   'label' => __('Add Blog Title', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('foodie_review_blog_video_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_video_text', array(
	   'settings' => 'foodie_review_blog_video_text',
	   'section'   => 'foodie_review_blog_blogger_info_section',
	   'label' => __('Add Blog Text', 'foodie-review-blog'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting( 'foodie_review_blog_blogger_info_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_blogger_info_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_blogger_info_section'
	));	

	// Trending Post Section
	$wp_customize->add_section('foodie_review_blog_our_trending_section', array(
	    'title'       => __('Manage Trending Post Section', 'foodie-review-blog'),
	    'description' => __('<p class="sec-title">Manage Trending Post Section</p>', 'foodie-review-blog'),
	    'priority'    => null,
	    'panel'       => 'foodie_review_blog_panel_area',
	));

	$wp_customize->add_setting('foodie_review_blog_disabled_our_trending_section', array(
	    'default'           => true,
	    'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('foodie_review_blog_disabled_our_trending_section', array(
	    'settings' => 'foodie_review_blog_disabled_our_trending_section',
	    'section'  => 'foodie_review_blog_our_trending_section',
	    'label'    => __('Check To Enable Section', 'foodie-review-blog'),
	    'type'     => 'checkbox',
	));

	$wp_customize->add_setting('foodie_review_blog_our_trending_title', array(
	    'default'           => ' ',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('foodie_review_blog_our_trending_title', array(
	    'settings' => 'foodie_review_blog_our_trending_title',
	    'section'  => 'foodie_review_blog_our_trending_section',
	    'label'    => __('Add Trending Post Title', 'foodie-review-blog'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('foodie_review_blog_our_trending_text', array(
	    'default'           => ' ',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('foodie_review_blog_our_trending_text', array(
	    'settings' => 'foodie_review_blog_our_trending_text',
	    'section'  => 'foodie_review_blog_our_trending_section',
	    'label'    => __('Add Trending Post Text', 'foodie-review-blog'),
	    'type'     => 'text',
	));

	$foodie_review_blog_categories = get_categories();
	$foodie_review_blog_cat_post = array();
	$foodie_review_blog_cat_post['0'] = 'Select';

	foreach ($foodie_review_blog_categories as $foodie_review_blog_category) {
	    $foodie_review_blog_cat_post[$foodie_review_blog_category->slug] = $foodie_review_blog_category->name;
	}

	$wp_customize->add_setting('foodie_review_blog_trending_cat', array(
	    'default' => '0',
	    'sanitize_callback' => 'foodie_review_blog_sanitize_choices',
	));

	$wp_customize->add_control('foodie_review_blog_trending_cat', array(
	    'type'    => 'select',
	    'choices' => $foodie_review_blog_cat_post,
	    'label'   => __('Select Category to display Latest Post', 'foodie-review-blog'),
	    'section' => 'foodie_review_blog_our_trending_section',
	));

	$wp_customize->add_setting('foodie_review_blog_author_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'foodie_review_blog_author_img',array(
	    'label' => __('Select Author Image','foodie-review-blog'),
	    'section' => 'foodie_review_blog_our_trending_section'
	)));

	$wp_customize->add_setting( 'foodie_review_blog_our_trending_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_our_trending_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_our_trending_section'
	));	

	//Blog post
	$wp_customize->add_section('foodie_review_blog_blog_post_settings',array(
        'title' => __('Manage Post Section', 'foodie-review-blog'),
        'priority' => null,
        'panel' => 'foodie_review_blog_panel_area'
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('foodie_review_blog_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'foodie_review_blog_sanitize_choices'
	));
	$wp_customize->add_control('foodie_review_blog_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'foodie-review-blog'),
     'description'   => __('This option work for blog page, archive page and search page.', 'foodie-review-blog'),
     'section' => 'foodie_review_blog_blog_post_settings',
     'choices' => array(
         'full' => __('Full','foodie-review-blog'),
         'left' => __('Left','foodie-review-blog'),
         'right' => __('Right','foodie-review-blog'),
         'three-column' => __('Three Columns','foodie-review-blog'),
         'four-column' => __('Four Columns','foodie-review-blog'),
         'grid' => __('Grid Layout','foodie-review-blog')
     ),
	) );

	$wp_customize->add_setting('foodie_review_blog_blog_post_description_option',array(
    	'default'   => 'Excerpt Content', 
        'sanitize_callback' => 'foodie_review_blog_sanitize_choices'
	));
	$wp_customize->add_control('foodie_review_blog_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','foodie-review-blog'),
        'section' => 'foodie_review_blog_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','foodie-review-blog'),
            'Excerpt Content' => __('Excerpt Content','foodie-review-blog'),
            'Full Content' => __('Full Content','foodie-review-blog'),
        ),
	) );

	$wp_customize->add_setting('foodie_review_blog_blog_post_thumb',array(
        'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('foodie_review_blog_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'foodie-review-blog'),
        'section'     => 'foodie_review_blog_blog_post_settings',
    ));

    $wp_customize->add_setting( 'foodie_review_blog_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'foodie_review_blog_sanitize_integer'
    ) );
    $wp_customize->add_control(new foodie_review_blog_Slider_Custom_Control( $wp_customize, 'foodie_review_blog_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','foodie-review-blog'),
		'section'=> 'foodie_review_blog_blog_post_settings',
		'settings'=>'foodie_review_blog_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting( 'foodie_review_blog_blog_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_blog_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_blog_post_settings'
	));	
    
	// Footer Section
	$wp_customize->add_section('foodie_review_blog_footer', array(
		'title'	=> __('Manage Footer Section','foodie-review-blog'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','foodie-review-blog'),
		'priority'	=> null,
		'panel' => 'foodie_review_blog_panel_area',
	));

	$wp_customize->add_setting('foodie_review_blog_footer_widget', array(
	    'default' => true,
	    'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox',
	));
	$wp_customize->add_control('foodie_review_blog_footer_widget', array(
	    'settings' => 'foodie_review_blog_footer_widget',
	    'section'   => 'foodie_review_blog_footer',
	    'label'     => __('Check to Enable Footer Widget', 'foodie-review-blog'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('foodie_review_blog_footer_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'foodie_review_blog_footer_bg_color', array(
        'label'    => __('Footer Background Color', 'foodie-review-blog'),
        'section'  => 'foodie_review_blog_footer',
    )));

	$wp_customize->add_setting('foodie_review_blog_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'foodie_review_blog_footer_bg_image',array(
        'label' => __('Footer Background Image','foodie-review-blog'),
        'section' => 'foodie_review_blog_footer',
    )));

	$wp_customize->add_setting('foodie_review_blog_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'foodie_review_blog_copyright_line', array(
	   'section' 	=> 'foodie_review_blog_footer',
	   'label'	 	=> __('Copyright Line','foodie-review-blog'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('foodie_review_blog_copyright_link',array(
    	'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'foodie_review_blog_copyright_link', array(
	   'section' 	=> 'foodie_review_blog_footer',
	   'label'	 	=> __('Copyright Link','foodie-review-blog'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('foodie_review_blog_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'foodie_review_blog_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_footercoypright_color', array(
	   'settings' => 'foodie_review_blog_footercoypright_color',
	   'section'   => 'foodie_review_blog_footer',
	   'label' => __('Coypright Color', 'foodie-review-blog'),
	   'type'      => 'color'
	));

	//  footer bg color
	$wp_customize->add_setting('foodie_review_blog_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'foodie_review_blog_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_footerbg_color', array(
	   'settings' => 'foodie_review_blog_footerbg_color',
	   'section'   => 'foodie_review_blog_footer',
	   'label' => __('BG Color', 'foodie-review-blog'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('foodie_review_blog_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'foodie_review_blog_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_footertitle_color', array(
	   'settings' => 'foodie_review_blog_footertitle_color',
	   'section'   => 'foodie_review_blog_footer',
	   'label' => __('Title Color', 'foodie-review-blog'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('foodie_review_blog_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'foodie_review_blog_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_footerdescription_color', array(
	   'settings' => 'foodie_review_blog_footerdescription_color',
	   'section'   => 'foodie_review_blog_footer',
	   'label' => __('Description Color', 'foodie-review-blog'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('foodie_review_blog_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'foodie_review_blog_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'foodie_review_blog_footerlist_color', array(
	   'settings' => 'foodie_review_blog_footerlist_color',
	   'section'   => 'foodie_review_blog_footer',
	   'label' => __('List Color', 'foodie-review-blog'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('foodie_review_blog_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'foodie_review_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'foodie_review_blog_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'foodie-review-blog' ),
        'section'        => 'foodie_review_blog_footer',
        'settings'       => 'foodie_review_blog_scroll_hide',
        'type'           => 'checkbox',
    )));

	$wp_customize->add_setting('foodie_review_blog_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'foodie_review_blog_sanitize_choices'
    ));
    $wp_customize->add_control('foodie_review_blog_scroll_position',array(
        'type' => 'radio',
        'section' => 'foodie_review_blog_footer',
        'label'	 	=> __('Scroll To Top Positions','foodie-review-blog'),
        'choices' => array(
            'Right' => __('Right','foodie-review-blog'),
            'Left' => __('Left','foodie-review-blog'),
            'Center' => __('Center','foodie-review-blog')
        ),
    ) );

	$wp_customize->add_setting( 'foodie_review_blog_footer_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('foodie_review_blog_footer_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		   <a target='_blank' href='". esc_url(FOODIE_REVIEW_BLOG_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'foodie_review_blog_footer'
	));	
    
	// Google Fonts
	$wp_customize->add_section( 'foodie_review_blog_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'foodie-review-blog' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'foodie_review_blog_headings_fonts', array(
		'sanitize_callback' => 'foodie_review_blog_sanitize_fonts',
	));
	$wp_customize->add_control( 'foodie_review_blog_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'foodie-review-blog'),
		'section' => 'foodie_review_blog_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'foodie_review_blog_body_fonts', array(
		'sanitize_callback' => 'foodie_review_blog_sanitize_fonts'
	));
	$wp_customize->add_control( 'foodie_review_blog_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'foodie-review-blog' ),
		'section' => 'foodie_review_blog_google_fonts_section',
		'choices' => $font_choices
	));
  
}
add_action( 'customize_register', 'foodie_review_blog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function foodie_review_blog_customize_preview_js() {
	wp_enqueue_script( 'foodie_review_blog_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'foodie_review_blog_customize_preview_js' );
