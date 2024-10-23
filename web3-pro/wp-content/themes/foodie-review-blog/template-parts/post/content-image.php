<?php
/**
 * @package Foodie Review Blog
 */
?>

<?php
    $foodie_review_blog_post_date = get_the_date();
    $foodie_review_blog_year = get_the_date('Y');
    $foodie_review_blog_month = get_the_date('m');

    $foodie_review_blog_author_id = get_the_author_meta('ID');
    $foodie_review_blog_author_link = esc_url(get_author_posts_url($foodie_review_blog_author_id));
    $foodie_review_blog_author_name = get_the_author();

    $foodie_review_blog_blog_post_thumb =  get_theme_mod( 'foodie_review_blog_blog_post_thumb', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="listarticle">
        <?php if ($foodie_review_blog_blog_post_thumb == 1 ) {?> 
            <?php if (has_post_thumbnail() ){ ?>
                <div class="post-thumb">
                   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
            <?php } ?>
        <?php } ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type()) : ?>
                <div class="postmeta">
                    <div class="post-date">
                        <a href="<?php echo esc_url(get_month_link($foodie_review_blog_year, $foodie_review_blog_month)); ?>">
                            <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($foodie_review_blog_post_date); ?>
                            <span class="screen-reader-text"><?php echo esc_html($foodie_review_blog_post_date); ?></span>
                        </a>
                    </div>
                    <div class="post-comment">&nbsp; &nbsp;
                        <a href="<?php echo esc_url(get_comments_link()); ?>">
                            <i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                            <span class="screen-reader-text"><?php comments_number(); ?></span>
                        </a>
                    </div>
                    <div class="post-author">&nbsp; &nbsp;
                        <a href="<?php echo $foodie_review_blog_author_link; ?>">
                            <i class="fas fa-user"></i> &nbsp; <?php echo esc_html($foodie_review_blog_author_name); ?>
                            <span class="screen-reader-text"><?php echo esc_html($foodie_review_blog_author_name); ?></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </header>
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php if(get_theme_mod('foodie_review_blog_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $content = get_the_content(); ?>
                    <p><?php echo wpautop($content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('foodie_review_blog_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html($excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?>         
        </div>
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'foodie-review-blog' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'foodie-review-blog' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div>
        <?php endif; ?>
        <div class="clear"></div>    
    </div>
</article>