<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Foodie Review Blog
 */

get_header(); ?>

<div id="content" >

    <section class="blogs-section pt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-12 col-md-12 col-12 align-self-center p-0">
                    <?php
                        $foodie_review_blog_hidepageboxes = get_theme_mod('foodie_review_blog_slider', true);
                        $foodie_review_blog_catData = get_theme_mod('foodie_review_blog_slider_cat');
                        if ($foodie_review_blog_hidepageboxes && $foodie_review_blog_catData) { ?>
                        <div id="slider-cat">
                            <div class="owl-carousel m-0">
                                <?php
                                    $foodie_review_blog_page_query = new WP_Query(
                                        array(
                                            'category_name' => esc_attr($foodie_review_blog_catData),
                                            'posts_per_page' => -1,
                                        )
                                    );
                                    while ($foodie_review_blog_page_query->have_posts()) : $foodie_review_blog_page_query->the_post(); ?>
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-7 col-12 align-self-center">
                                                <div class="text-content">
                                                    <?php if(get_theme_mod('foodie_review_blog_slider_subhead') != ''){ ?>
                                                        <p class="slider-subhead mb-3"><?php echo esc_html(get_theme_mod ('foodie_review_blog_slider_subhead','foodie-review-blog')); ?></p>
                                                    <?php } ?>
                                                    <h1><a href="<?php the_permalink(); ?>" class="text-uppercase"><?php the_title(); ?></a></h1>
                                                    <?php
                                                        $foodie_review_blog_trimexcerpt  = get_the_excerpt();
                                                        $foodie_review_blog_shortexcerpt = wp_trim_words($foodie_review_blog_trimexcerpt, $foodie_review_blog_num_words = 25);
                                                        echo '<p class="slider-content mt-2 mb-4">' . esc_html($foodie_review_blog_shortexcerpt) . '</p>';
                                                    ?>
                                                    <div class="sliderbtn">
                                                        <?php 
                                                            $foodie_review_blog_button_text = get_theme_mod('foodie_review_blog_button_text', 'Discover More');
                                                            $foodie_review_blog_icon = get_theme_mod('foodie_review_blog_button_icon', 'fa-solid fa-arrow-right');
                                                            $foodie_review_blog_button_link_slider = get_theme_mod('foodie_review_blog_button_link_slider', ''); 
                                                            if (empty($foodie_review_blog_button_link_slider)) {
                                                                $foodie_review_blog_button_link_slider = esc_url(get_permalink());
                                                            }
                                                            if ($foodie_review_blog_button_text || !empty($foodie_review_blog_button_link_slider)) { ?>
                                                            <?php if(get_theme_mod('foodie_review_blog_button_text', 'Discover More') != ''){ ?>
                                                                <a href="<?php echo esc_url($foodie_review_blog_button_link_slider); ?>" class="text-capitalize">
                                                                    <?php echo esc_html($foodie_review_blog_button_text); ?>
                                                                    <span class="screen-reader-text"><?php echo esc_html($foodie_review_blog_button_text); ?></span>
                                                                    <i class="<?php echo esc_attr($foodie_review_blog_icon); ?>"></i>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="review-content mt-4">
                                                        <div class="row">
                                                            <div class="col-xxl-3 col-xl-5 col-lg-3 col-md-4 col-5 align-self-center">
                                                                <div class="review-img">
                                                                    <?php if (empty(get_theme_mod('foodie_review_blog_review_img'))) { ?>
                                                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/review-img.png" alt="" class="post-image"/>
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo esc_url(get_theme_mod('foodie_review_blog_review_img')); ?>" alt="" />
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-9 col-xl-7 col-lg-9 col-md-8 col-7 align-self-center">
                                                                <?php if(get_theme_mod('foodie_review_blog_slider_review_num') != ''){ ?>
                                                                    <h3 class="review-num mb-0"><?php echo esc_html(get_theme_mod ('foodie_review_blog_slider_review_num','foodie-review-blog')); ?></h3>
                                                                <?php } ?>
                                                                <?php if(get_theme_mod('foodie_review_blog_slider_review_text') != ''){ ?>
                                                                    <p class="review-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_slider_review_text','foodie-review-blog')); ?></p>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 align-self-center">
                                                <div class="imagebox">
                                                    <?php if(has_post_thumbnail()){
                                                        the_post_thumbnail('full', array('class' => 'post-image'));
                                                    } else { ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" class="post-image"/>
                                                    <?php } ?>
                                                    <div class="slider-overlay"></div>
                                                    <div class="post-meta">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 text-center">
                                                                <?php echo do_shortcode('[posts_like_dislike]');?>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 text-center">
                                                                <div class="post-comments">
                                                                    <span><i class="fa-regular fa-comments me-2"></i><?php echo get_comments_number(); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 text-center">
                                                                <div class="post-views">
                                                                    <?php echo foodie_review_blog_get_post_views(get_the_ID()); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-3 text-center">
                                                                <div class="socialbox">
                                                                    <div class="share-btn-parent"><i class="fa-regular fa-share-from-square"></i>
                                                                    </div>
                                                                        <ul class="show-icon">
                                                                            <a class="twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fab fa-twitter align-middle" aria-hidden="true"></i></a>
                                                                            <a class="insta" href="https://www.instagram.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fab fa-instagram align-middle" aria-hidden="true"></i></a>
                                                                            <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fab fa-facebook-f align-middle " aria-hidden="true"></i></a>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-xl-5 col-lg-12 col-md-12 col-12 blogger-info align-self-center">
                    <?php
                        $foodie_review_blog_hidebloggerinfo = get_theme_mod('foodie_review_blog_blogger_info_hide', true);
                        if ($foodie_review_blog_hidebloggerinfo) { ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 col-12 align-self-center">
                                <div class="social-main-sec">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-2 col-md-2 col-3 align-self-center">
                                            <div class="profile-img">
                                                <?php if (empty(get_theme_mod('foodie_review_blog_profile_img'))) { ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/profile-img.png" alt="" class="post-image"/>
                                                <?php } else { ?>
                                                    <img src="<?php echo esc_url(get_theme_mod('foodie_review_blog_profile_img')); ?>" alt="" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-10 col-md-10 col-9 p-0 align-self-center">
                                            <?php if(get_theme_mod('foodie_review_blog_profile_name') != ''){ ?>
                                                <h3 class="profile-num mb-0 text-uppercase"><?php echo esc_html(get_theme_mod ('foodie_review_blog_profile_name','foodie-review-blog')); ?></h3>
                                            <?php } ?>
                                            <?php if(get_theme_mod('foodie_review_blog_profile_text') != ''){ ?>
                                                <p class="profile-text mb-0 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_profile_text','foodie-review-blog')); ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-main-sec mt-2 mb-4">
                                    <div class="row">
                                        <?php 
                                            for ($foodie_review_blog_i = 1; $foodie_review_blog_i <= 4; $foodie_review_blog_i++) { 
                                            $foodie_review_blog_social_title = get_theme_mod('foodie_review_blog_social_title' . $foodie_review_blog_i, '');
                                            $foodie_review_blog_social_text = get_theme_mod('foodie_review_blog_social_text' . $foodie_review_blog_i, '');
                                            $foodie_review_blog_icon = get_theme_mod('foodie_review_blog_social_icon' . $foodie_review_blog_i, '');
                                            ?>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 align-self-center p-0">
                                                <div class="social-box px-3 py-2">
                                                    <div class="row">
                                                        <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-2 col-3 align-self-center">
                                                            <div class="icon">
                                                                <?php if (!empty($foodie_review_blog_icon)) { ?>
                                                                    <i class="<?php echo esc_attr($foodie_review_blog_icon); ?>"></i>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-10 col-9 p-0 align-self-center">
                                                            <h3 class="social-heading mb-0 text-capitalize ps-2"><?php echo esc_html($foodie_review_blog_social_title); ?></h3>
                                                            <p class="social-text mb-0 ps-2"><?php echo esc_html($foodie_review_blog_social_text); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-12 col-12 align-self-center">
                                <div class="video-blog">
                                    <?php if(get_theme_mod('foodie_review_blog_video_heading') != ''){ ?>
                                        <h3 class="blog-heading mb-2 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_video_heading','foodie-review-blog')); ?></h3>
                                    <?php } ?>
                                    <div class="video-content">
                                        <?php 
                                        $foodie_review_blog_video_url = get_theme_mod('foodie_review_blog_video_link');
                                        $foodie_review_blog_dummy_image = get_template_directory_uri() . '/images/dummy-post.png';
                                        if (!empty($foodie_review_blog_video_url)) { ?>
                                            <div class="video-container">
                                                <iframe height="200" src="<?php echo esc_url($foodie_review_blog_video_url); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                        <?php } else { ?>
                                            <div class="video-container">
                                                <img src="<?php echo esc_url($foodie_review_blog_dummy_image); ?>" alt="Default Video Image" width="560" height="315">
                                            </div>
                                        <?php } ?>
                                        <?php if(get_theme_mod('foodie_review_blog_video_title') != ''){ ?>
                                            <h3 class="video-title mb-2 text-capitalize"><?php echo esc_html(get_theme_mod ('foodie_review_blog_video_title','foodie-review-blog')); ?></h3>
                                        <?php } ?>
                                        <?php if(get_theme_mod('foodie_review_blog_video_text') != ''){ ?>
                                            <p class="video-text mb-0"><?php echo esc_html(get_theme_mod ('foodie_review_blog_video_text','foodie-review-blog')); ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Trending Post Section -->
    <?php
        $foodie_review_blog_author_id = esc_attr(get_the_author_meta('ID'));
        $foodie_review_blog_author_link = esc_url(get_author_posts_url($foodie_review_blog_author_id));
        $foodie_review_blog_author_name = esc_html(get_the_author());
        $foodie_review_blog_hide_trending_section = get_theme_mod('foodie_review_blog_disabled_our_trending_section', true);
        $foodie_review_blog_catData = get_theme_mod('foodie_review_blog_trending_cat');
        $foodie_review_blog_post_cat = get_theme_mod('foodie_review_blog_posts'); 
        if ($foodie_review_blog_hide_trending_section){ ?>
        <section id="trending-section" class="py-5">
            <div class="container">
                <div class="blog-bx mb-4">
                    <?php if (get_theme_mod('foodie_review_blog_our_trending_title') != "") { ?>
                        <h2 class="trending-title mb-1 text-capitalize text-center"><?php echo esc_html(get_theme_mod('foodie_review_blog_our_trending_title', 'foodie-review-blog')); ?></h2>
                    <?php } ?>
                    <?php if (get_theme_mod('foodie_review_blog_our_trending_text') != "") { ?>
                        <p class="mb-2 text-center trending-text"><?php echo esc_html(get_theme_mod('foodie_review_blog_our_trending_text', 'foodie-review-blog')); ?></p>
                    <?php } ?>
                </div> 
                <div class="container">
                    <div class="row">
                        <?php
                            $foodie_review_blog_page_query = new WP_Query(
                                array(
                                    'category_name' => esc_attr($foodie_review_blog_catData),
                                    'posts_per_page' => -1,
                                )
                            );
                            while ($foodie_review_blog_page_query->have_posts()) : $foodie_review_blog_page_query->the_post(); ?>
                                
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="trending-blog p-3 mb-5">
                                            <h3><a href="<?php the_permalink(); ?>" class="text-uppercase"><?php the_title(); ?></a></h3>
                                            <div class="trending-image">
                                                <?php if(has_post_thumbnail()){
                                                    the_post_thumbnail('full', array('class' => 'post-image'));
                                                } else { ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" class="post-image"/>
                                                <?php } ?>
                                                <div class="slider-overlay"></div>

                                                <div class="socialbox">
                                                    <div class="share-btn-parent"><i class="fa-regular fa-share-from-square"></i>
                                                    </div>
                                                    <ul class="show-icon">
                                                        <a class="twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fab fa-twitter align-middle" aria-hidden="true"></i></a>
                                                        <a class="insta" href="https://www.instagram.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fab fa-instagram align-middle" aria-hidden="true"></i></a>
                                                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;text=<?php the_title(); ?>" target="_blank"><i class="fab fa-facebook-f align-middle " aria-hidden="true"></i></a>
                                                    </ul>
                                                </div>
                                                <div class="post-meta">
                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-4 text-center">
                                                            <?php echo do_shortcode('[posts_like_dislike]');?>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-4 text-center">
                                                            <div class="post-comments">
                                                                <span><i class="fa-regular fa-comments me-2"></i><?php echo get_comments_number(); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-4 text-center">
                                                            <div class="post-views">
                                                                <?php echo foodie_review_blog_get_post_views(get_the_ID()); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                $foodie_review_blog_trimexcerpt  = get_the_excerpt();
                                                $foodie_review_blog_shortexcerpt = wp_trim_words($foodie_review_blog_trimexcerpt, $foodie_review_blog_num_words = 25);
                                                echo '<p class="slider-content my-3">' . esc_html($foodie_review_blog_shortexcerpt) . '</p>';
                                            ?>
                                            <a href="<?php echo $foodie_review_blog_author_link; ?>" class="trending-author">
                                                <div class="author-img">
                                                    <?php if (empty(get_theme_mod('foodie_review_blog_author_img'))) { ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/profile-img.png" alt="" class="post-image"/>
                                                    <?php } else { ?>
                                                        <img src="<?php echo esc_url(get_theme_mod('foodie_review_blog_author_img')); ?>" alt="" />
                                                    <?php } ?>
                                                </div>
                                                <?php echo esc_html($foodie_review_blog_author_name); ?>
                                                <span class="screen-reader-text"><?php echo esc_html($foodie_review_blog_author_name); ?></span>
                                            </a>
                                        </div>
                                    </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
<?php get_footer(); ?>
