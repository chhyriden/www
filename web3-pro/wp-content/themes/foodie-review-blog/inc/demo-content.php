<div class="theme-offer">
   <?php
     // POST and update the customizer and other related data of Foodie Review Blog
    if ( isset( $_POST['submit'] ) ) {

        // Posts Like Dislike installation and activation
        if (!is_plugin_active('posts-like-dislike/posts-like-dislike.php')) {
            $foodie_review_blog_plugin_slug = 'posts-like-dislike';
            $foodie_review_blog_plugin_file = 'posts-like-dislike/posts-like-dislike.php';
            $foodie_review_blog_installed_plugins = get_plugins();
            
            // Check if the plugin is already installed
            if (!isset($foodie_review_blog_installed_plugins[$foodie_review_blog_plugin_file])) {
                include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                include_once(ABSPATH . 'wp-admin/includes/file.php');
                include_once(ABSPATH . 'wp-admin/includes/misc.php');
                include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
                
                // Install the plugin from the WordPress repository
                $foodie_review_blog_upgrader = new Plugin_Upgrader();
                $foodie_review_blog_upgrader->install('https://downloads.wordpress.org/plugin/posts-like-dislike.latest-stable.zip');
            }
            
            // Activate the plugin
            activate_plugin($foodie_review_blog_plugin_file);
        }

        // ------- Create Main Menu --------
        $foodie_review_blog_menuname = 'Primary Menu';
        $foodie_review_blog_bpmenulocation = 'primary';
        $foodie_review_blog_menu_exists = wp_get_nav_menu_object( $foodie_review_blog_menuname );
    
        if ( !$foodie_review_blog_menu_exists ) {
            $foodie_review_blog_menu_id = wp_create_nav_menu( $foodie_review_blog_menuname );

            // Create Home Page
            $foodie_review_blog_home_title = 'Home';
            $foodie_review_blog_home = array(
                'post_type'    => 'page',
                'post_title'   => $foodie_review_blog_home_title,
                'post_content' => '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'home'
            );
            $foodie_review_blog_home_id = wp_insert_post($foodie_review_blog_home);
            // Assign Home Page Template
            add_post_meta($foodie_review_blog_home_id, '_wp_page_template', 'templates/template-home-page.php');
            // Update options to set Home Page as the front page
            update_option('page_on_front', $foodie_review_blog_home_id);
            update_option('show_on_front', 'page');
            // Add Home Page to Menu
            wp_update_nav_menu_item($foodie_review_blog_menu_id, 0, array(
                'menu-item-title' => __('Home', 'foodie-review-blog'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $foodie_review_blog_home_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create a new Page 
            $foodie_review_blog_pages_title = 'Pages';
            $foodie_review_blog_pages_content = '<p>Explore all the pages we have on our website...</p>';
            $foodie_review_blog_pages = array(
                'post_type'    => 'page',
                'post_title'   => $foodie_review_blog_pages_title,
                'post_content' => $foodie_review_blog_pages_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'pages'
            );
            $foodie_review_blog_pages_id = wp_insert_post($foodie_review_blog_pages);
            // Add Pages Page to Menu
            wp_update_nav_menu_item($foodie_review_blog_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'foodie-review-blog'),
                'menu-item-classes' => 'pages',
                'menu-item-url' => home_url('/pages/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $foodie_review_blog_pages_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Create About Us Page with Dummy Content
            $foodie_review_blog_about_title = 'About Us';
            $foodie_review_blog_about_content = 'Lorem ipsum dolor sit amet...';
            $foodie_review_blog_about = array(
                'post_type'    => 'page',
                'post_title'   => $foodie_review_blog_about_title,
                'post_content' => $foodie_review_blog_about_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_slug'    => 'about-us'
            );
            $foodie_review_blog_about_id = wp_insert_post($foodie_review_blog_about);
            // Add About Us Page to Menu
            wp_update_nav_menu_item($foodie_review_blog_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'foodie-review-blog'),
                'menu-item-classes' => 'about-us',
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
                'menu-item-object-id' => $foodie_review_blog_about_id,
                'menu-item-object' => 'page',
                'menu-item-type' => 'post_type'
            ));

            // Assign the menu to the primary location if not already set
            if ( ! has_nav_menu( $foodie_review_blog_bpmenulocation ) ) {
                $foodie_review_blog_locations = get_theme_mod( 'nav_menu_locations' );
                if ( empty( $foodie_review_blog_locations ) ) {
                    $foodie_review_blog_locations = array();
                }
                $foodie_review_blog_locations[ $foodie_review_blog_bpmenulocation ] = $foodie_review_blog_menu_id;
                set_theme_mod( 'nav_menu_locations', $foodie_review_blog_locations );
            }
        }

        // Header Section
        set_theme_mod( 'foodie_review_blog_the_custom_logo', esc_url( get_template_directory_uri().'/images/Logo.png'));
      
        //Topbar Section
        set_theme_mod( 'foodie_review_blog_advertise_text', 'Advertisement' );
        set_theme_mod( 'foodie_review_blog_advertise_text_link', '#' );
        set_theme_mod( 'foodie_review_blog_about_text', 'About' );
        set_theme_mod( 'foodie_review_blog_about_text_link', '#' );
        set_theme_mod( 'foodie_review_blog_contact_text', 'Contact' );
        set_theme_mod( 'foodie_review_blog_contact_text_link', '#' );
        set_theme_mod( 'foodie_review_blog_follow_us', 'Follow Us' );
        set_theme_mod( 'foodie_review_blog_whatsapp_link', '#' );
        set_theme_mod( 'foodie_review_blog_fb_link', '#' );
        set_theme_mod( 'foodie_review_blog_youtube_link', '#' );
        set_theme_mod( 'foodie_review_blog_instagram_link', '#' );
        
        //Slider Section
        set_theme_mod( 'foodie_review_blog_slider_subhead', 'We’re producing natural goods' );
        set_theme_mod( 'foodie_review_blog_button_text', 'Discover More' );
        set_theme_mod( 'foodie_review_blog_button_icon', 'fa-solid fa-arrow-right' );
        set_theme_mod( 'foodie_review_blog_button_link_slider', '#' );
        set_theme_mod( 'foodie_review_blog_review_img', get_template_directory_uri().'/images/review-img.png' );
        set_theme_mod( 'foodie_review_blog_slider_review_num', '20K+' );
        set_theme_mod( 'foodie_review_blog_slider_review_text', 'Happy Customer' );

        // Create the 'Foodie' category and retrieve its ID
        $foodie_review_blog_slider_category_id = wp_create_category('Foodie');

        // Set the slider category in theme mods
        set_theme_mod('foodie_review_blog_slider_cat', 'Foodie');
        
        // Create three posts and assign them to the 'Foodie' category
        for ($foodie_review_blog_i = 1; $foodie_review_blog_i <= 3; $foodie_review_blog_i++) {
            $foodie_review_blog_title = 'Whole food’s California quinoa salad with ricotta';
            $foodie_review_blog_content = 'Lorem Ipsum is simply dummy text of the printing and type setting industry.';
            
            // Create the post object
            $foodie_review_blog_my_post = array(
                'post_title'    => wp_strip_all_tags($foodie_review_blog_title),
                'post_content'  => $foodie_review_blog_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($foodie_review_blog_slider_category_id),  
            );
        
            // Insert the post into the database
            $foodie_review_blog_post_id = wp_insert_post($foodie_review_blog_my_post);
        
            // If the post was successfully created
            if ($foodie_review_blog_post_id && !is_wp_error($foodie_review_blog_post_id)) {
                // Set the image URL and paths
                $foodie_review_blog_image_url = esc_url( get_template_directory_uri() . '/images/slider.png');
                $foodie_review_blog_upload_dir = wp_upload_dir();
        
                // Download the image data using cURL
                $foodie_review_blog_response = wp_remote_get($foodie_review_blog_image_url);
                if (is_wp_error($foodie_review_blog_response)) {
                    error_log('Failed to fetch image data: ' . $foodie_review_blog_response->get_error_message());
                    continue;
                }
        
                $foodie_review_blog_image_data = wp_remote_retrieve_body($foodie_review_blog_response);
                if (empty($foodie_review_blog_image_data)) {
                    error_log("Image data could not be retrieved from $foodie_review_blog_image_url");
                    continue;
                }
        
                // Generate a unique file name for the image
                $foodie_review_blog_image_name = 'blogs' . $foodie_review_blog_i . '.png';
                $foodie_review_blog_unique_file_name = wp_unique_filename($foodie_review_blog_upload_dir['path'], $foodie_review_blog_image_name);
                $foodie_review_blog_filename = basename($foodie_review_blog_unique_file_name);
        
                // Set the full file path
                $foodie_review_blog_file = $foodie_review_blog_upload_dir['path'] . '/' . $foodie_review_blog_filename;
        
                // Ensure the uploads directory exists
                if (!wp_mkdir_p($foodie_review_blog_upload_dir['path'])) {
                    error_log('Failed to create directory: ' . $foodie_review_blog_upload_dir['path']);
                    continue;
                }
        
                // Initialize filesystem
                global $wp_filesystem;
                if (false === ($wp_filesystem = WP_Filesystem())) {
                    error_log('Filesystem could not be initialized.');
                    continue;
                }
        
                // Check if $wp_filesystem is a valid object
                if (!is_object($wp_filesystem)) {
                    error_log('Filesystem is not a valid object.');
                    continue;
                }
        
                // Write the image file to the server
                if (false === $wp_filesystem->put_contents($foodie_review_blog_file, $foodie_review_blog_image_data)) {
                    error_log('Failed to write image file to: ' . $foodie_review_blog_file);
                    continue;
                }
        
                // Check the file type
                $foodie_review_blog_wp_filetype = wp_check_filetype($foodie_review_blog_filename, null);
                if (!$foodie_review_blog_wp_filetype['type']) {
                    error_log('Failed to determine file type for: ' . $foodie_review_blog_filename);
                    continue;
                }
        
                // Prepare attachment data
                $foodie_review_blog_attachment = array(
                    'post_mime_type' => $foodie_review_blog_wp_filetype['type'],
                    'post_title'     => sanitize_file_name($foodie_review_blog_filename),
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                );
        
                // Insert the attachment into the media library
                $foodie_review_blog_attach_id = wp_insert_attachment($foodie_review_blog_attachment, $foodie_review_blog_file, $foodie_review_blog_post_id);
                if (is_wp_error($foodie_review_blog_attach_id)) {
                    error_log('Failed to insert attachment: ' . $foodie_review_blog_attach_id->get_error_message());
                    continue;
                }
        
                // Generate attachment metadata
                $foodie_review_blog_attach_data = wp_generate_attachment_metadata($foodie_review_blog_attach_id, $foodie_review_blog_file);
                if (!$foodie_review_blog_attach_data) {
                    error_log('Failed to generate attachment metadata for: ' . $foodie_review_blog_file);
                    continue;
                }
        
                // Update attachment metadata
                if (!wp_update_attachment_metadata($foodie_review_blog_attach_id, $foodie_review_blog_attach_data)) {
                    error_log('Failed to update attachment metadata for: ' . $foodie_review_blog_file);
                    continue;
                }
        
                // Set the attachment as the post's featured image
                if (!set_post_thumbnail($foodie_review_blog_post_id, $foodie_review_blog_attach_id)) {
                    error_log('Failed to set post thumbnail for post ID: ' . $foodie_review_blog_post_id);
                }
        
            } else {
                error_log("Failed to create post: " . print_r($foodie_review_blog_post_id, true));
            }
        }

        //Blogger Info Section
        set_theme_mod( 'foodie_review_blog_profile_img', get_template_directory_uri().'/images/profile-img.png' );
        set_theme_mod( 'foodie_review_blog_profile_name', 'KELVIN SHAH' );
        set_theme_mod( 'foodie_review_blog_profile_text', 'Food Bloger' );   
        set_theme_mod( 'foodie_review_blog_video_link', 'https://www.youtube.com/embed/9xwazD5SyVg' );
        set_theme_mod( 'foodie_review_blog_video_heading', 'New Recipe Every Sunday' );
        set_theme_mod( 'foodie_review_blog_video_title', 'Whole food’s California quinoa salad with ricotta' );
        set_theme_mod( 'foodie_review_blog_video_text', 'Lorem Ipsum is simply dummy text of the industry.' );

        // Define the social platforms and their respective data
        $foodie_review_blog_social_data = array(
            1 => array(
                'icon'  => 'fa-brands fa-instagram',
                'title' => 'Instagram',
                'text'  => '125 M Follower'
            ),
            2 => array(
                'icon'  => 'fa-brands fa-facebook',
                'title' => 'Facebook',
                'text'  => '130 M Follower'
            ),
            3 => array(
                'icon'  => 'fa-brands fa-snapchat',
                'title' => 'Snapchat',
                'text'  => '110 M Follower'
            ),
            4 => array(
                'icon'  => 'fa-brands fa-twitter',
                'title' => 'Twitter',
                'text'  => '115 M Follower'
            ),
        );
    
        // Loop through the social platforms and set theme mods
        foreach ($foodie_review_blog_social_data as $foodie_review_blog_key => $foodie_review_blog_data) {
            set_theme_mod('foodie_review_blog_social_icon' . $foodie_review_blog_key, $foodie_review_blog_data['icon']);
            set_theme_mod('foodie_review_blog_social_title' . $foodie_review_blog_key, $foodie_review_blog_data['title']);
            set_theme_mod('foodie_review_blog_social_text' . $foodie_review_blog_key, $foodie_review_blog_data['text']);
        }
        
        //Trending Post Section
        set_theme_mod( 'foodie_review_blog_our_trending_title', 'Trending Post' );
        set_theme_mod( 'foodie_review_blog_our_trending_text', 'Lorem Ipsum is simply dummy text of the printing and type setting industry.' );
        set_theme_mod( 'foodie_review_blog_author_img', get_template_directory_uri().'/images/profile-img.png' );

        $foodie_review_blog_featured_category_id = wp_create_category('Trending Tastes');
        set_theme_mod('foodie_review_blog_trending_cat', 'Trending Tastes');

        $foodie_review_blog_titles = array('The best fluffy butter milk pancakes with triple berry sauce', '40 Mother’s Day Breakfast and Brunch Recipes', 'Sweet Recipes for This May in Hyderabad');
        $foodie_review_blog_content = 'It is a long established fact that a reader will be distracted by the readable when looking its layout.';

        for ($foodie_review_blog_i = 0; $foodie_review_blog_i < 3; $foodie_review_blog_i++) {
            set_theme_mod('foodie_review_blog_title' . ($foodie_review_blog_i + 1), $foodie_review_blog_titles[$foodie_review_blog_i]);

            $foodie_review_blog_my_post = array(
                'post_title'    => wp_strip_all_tags($foodie_review_blog_titles[$foodie_review_blog_i]),
                'post_content'  => $foodie_review_blog_content,
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_category' => array($foodie_review_blog_featured_category_id),
            );

            $foodie_review_blog_post_id = wp_insert_post($foodie_review_blog_my_post);

            if (!is_wp_error($foodie_review_blog_post_id)) {
                $foodie_review_blog_image_url = get_template_directory_uri() . '/images/foodie-trending-posts/foodie-trending-post' . ($foodie_review_blog_i + 1) . '.png';
                $foodie_review_blog_image_id = media_sideload_image($foodie_review_blog_image_url, $foodie_review_blog_post_id, null, 'id');
                if (!is_wp_error($foodie_review_blog_image_id)) {
                    set_post_thumbnail($foodie_review_blog_post_id, $foodie_review_blog_image_id);
                } else {
                    error_log('Failed to set post thumbnail for post ID: ' . $foodie_review_blog_post_id);
                }
            } else {
                error_log('Failed to create post: ' . print_r($foodie_review_blog_post_id, true));
            }
        }

    //Footer Copyright Text
    set_theme_mod( 'foodie_review_blog_copyright_line', 'Foodie WordPress Theme' );

    // Show success message and the "View Site" button
         echo '<div class="success">Demo Import Successful</div>';
    }
     ?>
    <ul>
        <li>
        <hr>
        <?php 
        // Check if the form is submitted
        if ( !isset( $_POST['submit'] ) ) : ?>
           <!-- Show demo importer form only if it's not submitted -->
           <?php echo esc_html( 'Click on the below content to get demo content installed.', 'foodie-review-blog' ); ?>
          <br>
          <small><b><?php echo esc_html('Please take a backup if your website is already live with data. This importer will overwrite existing data.', 'foodie-review-blog' ); ?></b></small>
          <br><br>

          <form id="demo-importer-form" action="" method="POST" onsubmit="return confirm('Do you really want to do this?');">
            <input type="submit" name="submit" value="<?php echo esc_attr('Run Importer','foodie-review-blog'); ?>" class="button button-primary button-large">
          </form>
        <?php 
        endif; 

        // Show "View Site" button after form submission
        if ( isset( $_POST['submit'] ) ) {
        echo '<div class="view-site-btn">';
        echo '<a href="' . esc_url(home_url()) . '" class="button button-primary button-large" style="margin-top: 10px;" target="_blank">View Site</a>';
        echo '</div>';
        }
        ?>

        <hr>
        </li>
    </ul>
 </div>