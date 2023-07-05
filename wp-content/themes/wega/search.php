<?php
/**
 * The template for displaying search results.
 *
 */

get_header(); 

$class_row = "col-md-12";
$sidebar = "sidebar-1";
if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
    if ( wega('mt_blog_layout') == 'mt_blog_fullwidth' ) {
        $class_row = "col-md-12";
    }elseif ( wega('mt_blog_layout') == 'mt_blog_right_sidebar' or wega('mt_blog_layout') == 'mt_blog_left_sidebar') {
        $class_row = "col-md-8";
    }
    $sidebar = wega('mt_blog_layout_sidebar');
} else {
    $class_row = "col-md-8";
}

if (!is_active_sidebar( $sidebar )) {
    $class_row = "col-md-12";
}

// theme_ini
$theme_init = new wega_init_class;
?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php echo wega_header_title_breadcrumbs(); ?>

    <!-- Page content -->
    <div class="high-padding">
        <!-- Blog content -->
        <div class="container blog-posts">
            <div class="row">

                <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                    <?php if ( wega('mt_blog_layout') != '' && wega('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <div class="col-md-4 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
                        <?php } ?>
                    <?php } ?>
                    <?php }else{ ?>
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <div class="col-md-4 sidebar-content">
                                <?php get_sidebar(); ?>
                            </div>
                        <?php } ?>
                <?php } ?>

                <div class="<?php echo esc_attr($class_row); ?> main-content">
                <?php if ( have_posts() ) : ?>
                    <div class="row">

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php /* Loop - Variant 1 */ ?>
                            <?php get_template_part( 'content', 'blogloop-v5' ); ?>
                        <?php endwhile; ?>

                    </div>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>

                <div class="clearfix"></div>
                
                <div class="modeltheme-pagination-holder col-md-12">             
                    <div class="modeltheme-pagination pagination">             
                        <?php the_posts_pagination(); ?>
                    </div>
                </div>

                </div>

                <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                    <?php if ( wega('mt_blog_layout') != '' && wega('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <div class="col-md-4 sidebar-content">
                                <?php dynamic_sidebar( $sidebar ); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } else{ ?>
                        <?php if (is_active_sidebar($sidebar)) { ?>
                            <div class="col-md-4 sidebar-content">
                                <?php get_sidebar(); ?>
                            </div>
                        <?php } ?>
                <?php } ?>
                
            </div>
        </div>
    </div>
<?php get_footer(); ?>