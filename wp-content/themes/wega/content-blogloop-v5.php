<?php 
// BLOGLOOP-V2

// THUMBNAIL
$post_img = '';
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'wega_blog_900x550' );
if ($thumbnail_src) {
    $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.the_title_attribute('echo=0').'" />';
    $post_col = 'col-md-12';
}else{
    $post_col = 'col-md-12 no-featured-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post col-md-12 list-view blogloop-v2 blogloop-no-flex'); ?> > 
    <div class="blog_custom">
        
        <?php /*POST THUMBNAIL*/ ?>
        <?php if ($post_img) { ?>
            <!-- POST THUMBNAIL -->
            <div class="post-thumbnail">
                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="relative">
                    <?php echo wp_kses($post_img, 'image'); ?>
                </a>
            </div>
        <?php } ?>

        <!-- POST DETAILS -->
        <div class="post-details">
            <div class="post-details-holder">

                <!-- POST METAS (DATE / TAGS / AUTHOR / COMMENTS) -->
                <div class="post-category-comment-date row">
                    <!-- POST META: DATE -->
                    <span class="post-date">
                        <a title="<?php the_title_attribute() ?>" href="<?php echo esc_url(get_the_permalink()); ?>">
                            <i class="icon-calendar"></i>
                             <?php echo esc_html(get_the_date(get_option('date_format'))); ?>
                        </a>
                    </span>
                    <!-- POST META: TAGS -->
                    <span class="post-tags">
                        <?php echo get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i> ', ', ' ); ?>
                    </span>
                    <!-- POST META: AUTHOR -->
                    <span class="post-author"><i class="icon-user icons"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a></span>
                </div>

                <!-- POST TITLE -->
                <h3 class="post-name row">
                    <a title="<?php the_title_attribute() ?>" href="<?php echo esc_url(get_the_permalink()); ?>">
                        <?php if(is_sticky(get_the_ID())){ ?>
                            <!-- STICKY POST LABEL -->
                            <span class="post-sticky-label">
                                <i class="fa fa-bookmark"></i>
                            </span>
                        <?php } ?>
                        <!-- POST TITLE -->
                        <?php the_title(); ?>
                    </a>
                </h3>

                <!-- POST CONTENT / EXCERPT -->
                <div class="post-excerpt row">
                    <?php
                        /* translators: %s: Name of current post */
                        the_excerpt();
                    ?>

                    <div class="clearfix"></div>

                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wega' ),
                            'after'  => '</div>',
                        ) );
                    ?>

                    <div class="clearfix"></div>

                    <p>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-link">
                            <i class="fa fa-angle-right" aria-hidden="true"></i><?php echo esc_html__( 'Continue Reading', 'wega' ); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</article>