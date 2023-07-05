<?php 
/**
* 
* [Widgets]
* 
**/
/* ========= social_icons ===================================== */
class wega_address_social_icons extends WP_Widget {
    function __construct() {
        parent::__construct('wega_address_social_icons', esc_attr__('MT - Contact + Social links', 'modeltheme'),array( 'description' => esc_attr__( 'MT - Contact information + Social icons', 'modeltheme' ), ) );
    }
    public function widget( $args, $instance ) {
        $widget_title = $instance[ 'widget_title' ];
        $widget_contact_details = $instance[ 'widget_contact_details' ];
        $widget_social_icons = $instance[ 'widget_social_icons' ];
        echo  $args['before_widget']; ?>
        <div class="sidebar-social-networks address-social-links">
            <?php if($widget_title) { ?>
               <h3 class="widget-title"><?php echo esc_attr($widget_title); ?></h3>
            <?php } ?>
            <?php if('on' == $instance['widget_contact_details']) { ?>
                <div class="contact-details">
                    <?php if(wega('mt_contact_phone')) { ?>
                        <p><span class="footer-detail"><?php esc_html_e('Phone: ','modeltheme'); ?><a href="tel:<?php echo esc_attr(str_replace(' ', '', esc_attr( wega('mt_contact_phone')))); ?>"><?php echo esc_attr( wega('mt_contact_phone')); ?></a></span></p>
                    <?php } ?>
                    <?php if(wega('mt_contact_email')) { ?>
                        <p><span class="footer-detail"><?php esc_html_e('Email: ','modeltheme'); ?></span><a href="mailto:<?php echo esc_attr( wega('mt_contact_email')); ?>"><?php echo esc_attr( wega('mt_contact_email')); ?></a></p>
                    <?php } ?>
                    <?php if(wega('mt_contact_address')) { ?>
                        <p><span class="footer-detail"><?php esc_html_e('Address: ','modeltheme') ?></span><?php echo esc_attr( wega('mt_contact_address')); ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if('on' == $instance['widget_social_icons']) { ?>
                <ul class="social-links">
                <?php if ( wega('mt_social_fb') && wega('mt_social_fb') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( wega('mt_social_fb') ) ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_tw') && wega('mt_social_tw') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_tw') ) ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_youtube') && wega('mt_social_youtube') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_youtube') ) ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_pinterest') && wega('mt_social_pinterest') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_pinterest') ) ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_linkedin') && wega('mt_social_linkedin') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_linkedin') ) ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_skype') && wega('mt_social_skype') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_skype') ) ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_instagram') && wega('mt_social_instagram') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_instagram') ) ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_dribbble') && wega('mt_social_dribbble') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_dribbble') ) ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_deviantart') && wega('mt_social_deviantart') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_deviantart') ) ?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_digg') && wega('mt_social_digg') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_digg') ) ?>" target="_blank"><i class="fa fa-digg"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_flickr') && wega('mt_social_flickr') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_flickr') ) ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_stumbleupon') && wega('mt_social_stumbleupon') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_stumbleupon') ) ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_tumblr') && wega('mt_social_tumblr') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_tumblr') ) ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                <?php } ?>
                <?php if ( wega('mt_social_vimeo') && wega('mt_social_vimeo') != '' ) { ?>
                    <li><a href="<?php echo esc_url( wega('mt_social_vimeo') ) ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
                <?php } ?>
                </ul>
            <?php } ?>
            
        </div>
        <?php echo  $args['after_widget'];
    }
    public function form( $instance ) {
        # Widget Title
        if ( isset( $instance[ 'widget_title' ] ) ) {
            $widget_title = $instance[ 'widget_title' ];
        } else {
            $widget_title = esc_attr__( 'Social icons', 'modeltheme' );
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>"><?php esc_attr_e( 'Widget Title:','modeltheme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widget_title' )); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>">
        </p>
        <p>
            <input type="checkbox" <?php checked($instance['widget_contact_details'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('widget_contact_details')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_contact_details')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('widget_contact_details')); ?>"><?php esc_attr_e( 'Show contact informations box','modeltheme' ); ?></label>
        </p>
        <p>
            <input type="checkbox" <?php checked($instance['widget_social_icons'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('widget_social_icons')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_social_icons')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('widget_social_icons')); ?>"><?php esc_attr_e( 'Show social icons','modeltheme' ); ?></label>
        </p>
      
      <?php   
  /*      <p>
            <input type="checkbox" name="widget_contact_details" id="widget_contact_details"> <label for="widget_contact_details">Show contact informations box</label><br>
            <input type="checkbox" name="widget_social_icons" id="widget_social_icons"> <label for="widget_social_icons">Show social icons</label><br>
        </p>
*/
        ?>
        <p><?php esc_attr_e( '* Social Network account must be set from MT - Theme Panel.','modeltheme' ); ?></p>
        <?php 
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ?  $new_instance['widget_title']  : '';
        $instance['widget_contact_details'] = ( ! empty( $new_instance['widget_contact_details'] ) ) ?  $new_instance['widget_contact_details']  : '';
        $instance['widget_social_icons'] = ( ! empty( $new_instance['widget_social_icons'] ) ) ?  $new_instance['widget_social_icons']  : '';
        return $instance;
    }
}
/* ========= wega_recent_entries_with_thumbnail ===================================== */
class wega_recent_entries_with_thumbnail extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct('wega_recent_entries_with_thumbnail', esc_attr__('MT - Recent Posts with thumbnails', 'modeltheme'),array( 'description' => esc_attr__( 'MT - Recent Posts with thumbnails', 'modeltheme' ), ) );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $recent_posts_title = $instance[ 'recent_posts_title' ];
        $recent_posts_number = $instance[ 'recent_posts_number' ];
        echo  $args['before_widget'];
        $args_recenposts = array(
                'posts_per_page'   => $recent_posts_number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish' 
                );
        $recentposts = get_posts($args_recenposts);
        $myContent  = "";
        $myContent .= '<h3 class="widget-title">'.$recent_posts_title.'</h3>';
        $myContent .= '<ul>';
        foreach ($recentposts as $post) {
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'wega_post_pic200x200' );
            $myContent .= '<li class="row">';
                $myContent .= '<div class="vc_col-md-2 post-thumbnail relative">';
                    $myContent .= '<a href="'. get_permalink($post->ID) .'">';
                        if($thumbnail_src) { $myContent .= '<img src="'. $thumbnail_src[0] . '" alt="'. $post->post_title .'" />';
                        }else{ $myContent .= '<img src="http://placehold.it/100x100" alt="'. $post->post_title .'" />'; }
                        $myContent .= '<div class="thumbnail-overlay absolute">';
                            $myContent .= '<i class="fa fa-plus absolute"></i>';
                        $myContent .= '</div>';
                    $myContent .= '</a>';
                $myContent .= '</div>';
                $myContent .= '<div class="vc_col-md-10 post-details">';
                    $myContent .= '<a href="'. get_permalink($post->ID) .'">'. $post->post_title.'</a>';
                    $myContent .= '<span class="post-date">'.get_the_date(get_option( 'date_format'), $post->ID ).'</span>';
                $myContent .= '</div>';
            $myContent .= '</li>';
        }
        $myContent .= '</ul>';
        echo  $myContent;
        echo  $args['after_widget'];
    }
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        
        # Widget Title
        if ( isset( $instance[ 'recent_posts_title' ] ) ) {
            $recent_posts_title = $instance[ 'recent_posts_title' ];
        } else {
            $recent_posts_title = esc_attr__( 'Recent posts', 'modeltheme' );
        }
        # Number of posts
        if ( isset( $instance[ 'recent_posts_number' ] ) ) {
            $recent_posts_number = $instance[ 'recent_posts_number' ];
        } else {
            $recent_posts_number = '5';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>"><?php esc_attr_e( 'Widget Title:','modeltheme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_title' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>"><?php esc_attr_e( 'Number of posts:','modeltheme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_number' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_number ); ?>">
        </p>
        <?php 
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['recent_posts_title'] = ( ! empty( $new_instance['recent_posts_title'] ) ) ?  $new_instance['recent_posts_title']  : '';
        $instance['recent_posts_number'] = ( ! empty( $new_instance['recent_posts_number'] ) ) ? strip_tags( $new_instance['recent_posts_number'] ) : '';
        return $instance;
    }
} 

/* ========= wega_post_thumbnails_slider ===================================== */
class wega_post_thumbnails_slider extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct('wega_post_thumbnails_slider', esc_attr__('MT - Post thumbnails slider', 'modeltheme'),array( 'description' => esc_attr__( 'MT - Post thumbnails slider', 'modeltheme' ), ) );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $recent_posts_title = $instance[ 'recent_posts_title' ];
        $recent_posts_number = $instance[ 'recent_posts_number' ];
        echo  $args['before_widget'];
        $args_recenposts = array(
                'posts_per_page'   => $recent_posts_number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish' 
                );
        $recentposts = get_posts($args_recenposts);
        $myContent  = "";
        $myContent .= '<h3 class="widget-title">'.$recent_posts_title.'</h3>';
        $myContent .= '<div class="slider_holder relative">';
            $myContent .= '<div class="slider_navigation absolute">';
                $myContent .= '<a class="btn prev pull-left"><i class="fa fa-angle-left"></i></a>';
                $myContent .= '<a class="btn next pull-right"><i class="fa fa-angle-right"></i></a>';
            $myContent .= '</div>';
            $myContent .= '<div class="post_thumbnails_slider owl-carousel owl-theme">';
            foreach ($recentposts as $post) {
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'wega_post_pic700x450' );
                $myContent .= '<div class="item">';
                    $myContent .= '<a href="'. get_permalink($post->ID) .'">';
                        if($thumbnail_src) { $myContent .= '<img src="'. $thumbnail_src[0] . '" alt="'. $post->post_title .'" />';
                        }else{ $myContent .= '<img src="http://placehold.it/700x450" alt="'. $post->post_title .'" />'; }
                    $myContent .= '</a>';
                $myContent .= '</div>';
            }
            $myContent .= '</div>';
        $myContent .= '</div>';
        echo  $myContent;
        echo  $args['after_widget'];
    }
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        
        # Widget Title
        if ( isset( $instance[ 'recent_posts_title' ] ) ) {
            $recent_posts_title = $instance[ 'recent_posts_title' ];
        } else {
            $recent_posts_title = esc_attr__( 'Post thumbnails slider', 'modeltheme' );
        }
        # Number of posts
        if ( isset( $instance[ 'recent_posts_number' ] ) ) {
            $recent_posts_number = $instance[ 'recent_posts_number' ];
        } else {
            $recent_posts_number = '5';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>"><?php esc_attr_e( 'Widget Title:','modeltheme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_title' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>"><?php esc_attr_e( 'Number of posts:','modeltheme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_number' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_number ); ?>">
        </p>
        <?php 
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['recent_posts_title'] = ( ! empty( $new_instance['recent_posts_title'] ) ) ?  $new_instance['recent_posts_title']  : '';
        $instance['recent_posts_number'] = ( ! empty( $new_instance['recent_posts_number'] ) ) ? strip_tags( $new_instance['recent_posts_number'] ) : '';
        return $instance;
    }
} 
/* ========= wega_social_share ===================================== */
class wega_social_share extends WP_Widget {
    function __construct() {
        parent::__construct('wega_social_share', esc_attr__('MT - Social Share Icons', 'modeltheme'),array( 'description' => esc_attr__( 'MT - Social Share Icons', 'modeltheme' ), ) );
    }
    public function widget( $args, $instance ) {
        $widget_title = $instance[ 'widget_title' ];
        $facebook = $instance['share-facebook'] ? 'true' : 'false';
        $twitter = $instance['share-twitter'] ? 'true' : 'false';
        $linkedin = $instance['share-linkedin'] ? 'true' : 'false';
        $digg = $instance['share-digg'] ? 'true' : 'false';
        $pinterest = $instance['share-pinterest'] ? 'true' : 'false';
        $reddit = $instance['share-reddit'] ? 'true' : 'false';
        $stumbleupon = $instance['share-stumbleupon'] ? 'true' : 'false';
        echo  $args['before_widget'];
        $siteurl = get_permalink();
        $sitetitle = get_bloginfo('title');
        $sitedescription = get_bloginfo('description');
         ?>
        <div class="sidebar-share-social-links">
            <h3><?php echo  $instance[ 'widget_title' ];?></h3>
            <ul class="share-social-links">
                <?php if('on' == $instance['share-facebook'] ) { ?>
                <li class="facebook">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_attr($siteurl); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
                <?php } if('on' == $instance['share-twitter'] ) {?>
                <li class="twitter">
                    <a href="https://twitter.com/intent/tweet?url=<?php echo esc_attr($siteurl); ?>&amp;text=<?php echo esc_attr($sitedescription); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                </li>
                <?php } if('on' == $instance['share-linkedin'] ) {?>
                <li class="linkedin">
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_attr($siteurl); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                </li>
                <?php } if('on' == $instance['share-digg'] ) {?>
                <li class="digg">
                    <a href="http://www.digg.com/submit?url=<?php echo esc_attr($siteurl); ?>" target="_blank"><i class="fa fa-digg"></i></a>
                </li>
                <?php } if('on' == $instance['share-pinterest'] ) {?>
                <li class="pinterest">
                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_attr($siteurl); ?>&amp;media=<?php echo esc_attr(wega('mt_logo', 'url')); ?>&amp;description=<?php echo esc_attr($sitedescription); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                </li>
                <?php } if('on' == $instance['share-reddit'] ) {?>
                <li class="reddit">
                    <a href="http://reddit.com/submit?url=<?php echo esc_attr($siteurl); ?>&amp;title=<?php echo esc_attr($sitetitle); ?>" target="_blank"><i class="fa fa-reddit"></i></a>
                </li>
                <?php } if('on' == $instance['share-stumbleupon'] ) {?>
                <li class="stumbleupon">
                    <a href="http://www.stumbleupon.com/submit?url=<?php echo esc_attr($siteurl); ?>&amp;title=<?php echo esc_attr($sitetitle); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php 
        echo  $args['after_widget'];
    }
    public function form( $instance ) {
        # Widget Title
        if ( isset( $instance[ 'widget_title' ] ) ) {
            $widget_title = $instance[ 'widget_title' ];
        } else {
            $widget_title = esc_attr__( 'Social icons', 'modeltheme' );
        }
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>"><?php esc_attr_e( 'Widget Title:','modeltheme' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widget_title' )); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>">
        </p>
        <p><?php esc_attr_e( 'Check what Social SHARE Buttons do you want to display','modeltheme' ); ?></p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-facebook'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('share-facebook')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-facebook')); ?>"><?php esc_attr_e( 'Facebook','modeltheme' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-twitter'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('share-twitter')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-twitter')); ?>"><?php esc_attr_e( 'Twitter','modeltheme' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-linkedin'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('share-linkedin')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-linkedin')); ?>"><?php esc_attr_e( 'Linkedin','modeltheme' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-digg'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-digg')); ?>" name="<?php echo esc_attr($this->get_field_name('share-digg')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-digg')); ?>"><?php esc_attr_e( 'Digg','modeltheme' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-pinterest'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('share-pinterest')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-pinterest')); ?>"><?php esc_attr_e( 'Pinterest','modeltheme' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-reddit'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-reddit')); ?>" name="<?php echo esc_attr($this->get_field_name('share-reddit')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-reddit')); ?>"><?php esc_attr_e( 'Reddit','modeltheme' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-stumbleupon'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-stumbleupon')); ?>" name="<?php echo esc_attr($this->get_field_name('share-stumbleupon')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-stumbleupon')); ?>"><?php esc_attr_e( 'Stumbleupon','modeltheme' ); ?></label>
        </p>
                
        <?php 
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ?  $new_instance['widget_title']  : '';
        
        $instance['share-facebook'] = ( ! empty( $new_instance['share-facebook'] ) ) ?  $new_instance['share-facebook']  : '';
        $instance['share-twitter'] = ( ! empty( $new_instance['share-twitter'] ) ) ?  $new_instance['share-twitter']  : '';
        $instance['share-linkedin'] = ( ! empty( $new_instance['share-linkedin'] ) ) ?  $new_instance['share-linkedin']  : '';
        $instance['share-digg'] = ( ! empty( $new_instance['share-digg'] ) ) ?  $new_instance['share-digg']  : '';
        $instance['share-pinterest'] = ( ! empty( $new_instance['share-pinterest'] ) ) ?  $new_instance['share-pinterest']  : '';
        $instance['share-reddit'] = ( ! empty( $new_instance['share-reddit'] ) ) ?  $new_instance['share-reddit']  : '';
        $instance['share-stumbleupon'] = ( ! empty( $new_instance['share-stumbleupon'] ) ) ?  $new_instance['share-stumbleupon']  : '';
        return $instance;
    }
}
// Register Widgets
function wega_register_widgets() {
    register_widget( 'wega_address_social_icons' );
    register_widget( 'wega_social_share' );
    register_widget( 'wega_recent_entries_with_thumbnail' );
    register_widget( 'wega_post_thumbnails_slider' );
}
add_action( 'widgets_init', 'wega_register_widgets' );