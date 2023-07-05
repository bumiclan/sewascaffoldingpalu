<header class="header1 center-h">


  <div class="container">
    <div class="row">
      <!-- LOGO -->
      
      
        <div class="col-md-4">
          <?php if(wega('mt_divider_header_info_1_status') == true){ ?>
            <!-- HEADER INFO 1 -->
            <div class="pull-left header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(wega('mt_divider_header_info_1_media_type') == true){ ?>
                  <i class="<?php echo esc_attr(wega('mt_divider_header_info_1_faicon')); ?>"></i>
                <?php }else{ ?>
                  <img src="<?php echo esc_url(wega('mt_divider_header_info_1_image_icon','url')); ?>" alt="image_icon" />
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <h3><?php echo esc_attr(wega('mt_divider_header_info_1_heading1')); ?></h3>
                <div class="clearfix"></div>
                <h5><?php echo esc_attr(wega('mt_divider_header_info_1_heading3')); ?></h5>
              </div>
            </div>
            <!-- // HEADER INFO 1 -->
          <?php } ?>
        </div>

        <div class="navbar-header col-md-4">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>

          <?php  $logo = get_template_directory_uri().'/images/logo.png';
          if (class_exists( 'ReduxFrameworkPlugin' )) {
            if (wega('mt_logo','url')) {
              $logo = wega('mt_logo','url');
            }
          } 
          if (function_exists( 'modeltheme_framework' )) {
            if (!empty(get_post_meta(get_the_ID(), 'smartowl_header_custom_logo', true))) {
              $logo = get_post_meta(get_the_ID(), 'smartowl_header_custom_logo', true);
            }
          }
         ?>
        <?php if(!empty($logo)){ ?>
          <div class="logo">
              <a href="<?php echo esc_url(get_site_url()); ?>">
                  <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
              </a>
          </div>
        <?php }else{ ?>
            <div class="logo no-logo">
                <a href="<?php echo esc_url(get_site_url()); ?>">
                  <?php echo esc_attr(get_bloginfo()); ?>
                </a>
            </div>
          <?php } ?>
        </div>

        <div class="col-md-4">
          <?php if(wega('mt_divider_header_info_2_status') == true){ ?>
            <!-- HEADER INFO 2 -->
            <div class="pull-right header-info-group">
              <div class="header-info-icon pull-left text-center">
                <?php if(wega('mt_divider_header_info_2_media_type') == true){ ?>
                  <i class="<?php echo esc_attr(wega('mt_divider_header_info_2_faicon')); ?>"></i>
                <?php }else{ ?>
                  <img src="<?php echo esc_url(wega('mt_divider_header_info_2_image_icon','url')); ?>" alt="image_icon" />
                <?php } ?>
              </div>
              <div class="header-info-labels pull-left">
                <h3><?php echo esc_attr(wega('mt_divider_header_info_2_heading1')); ?></h3>
                <div class="clearfix"></div>
                <h5><?php echo esc_attr(wega('mt_divider_header_info_2_heading3')); ?></h5>
              </div>
            </div>
            <!-- // HEADER INFO 2 -->
          <?php } ?>
        </div>


    </div>
  </div>


  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
        <div class="row">

          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-12">
            
            <ul class="menu nav navbar-nav nav-effect nav-menu">
              <?php
                if ( has_nav_menu( 'primary' ) ) {
                  $defaults = array(
                    'menu'            => '',
                    'container'       => false,
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => false,
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => ''
                  );

                  $defaults['theme_location'] = 'primary';

                  wp_nav_menu( $defaults );
                }else{
                  if( current_user_can('administrator') ) {
                    echo '<p class="no-menu text-right">';
                      echo esc_html__('Primary navigation menu is missing.', 'wega');
                    echo '</p>';
                  }
                }
              ?>
            </ul>

            <div class="header-nav-actions">

              <?php if(wega('mt_header_fixed_sidebar_menu_status') == true){ 
              
                if (is_active_sidebar( wega('mt_header_fixed_sidebar') )) {?>
                  <!-- MT BURGER -->
                  <div class="mt-nav-burger-holder">
                    <div id="mt-nav-burger" class="menu-item">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                  </div>
                <?php } ?>

                <?php if(wega('mt_header_is_search') == true){ ?>
                  <a href="#" class="mt-search-icon menu-item">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </a>
                <?php } ?>
              
            <?php } ?>
              
            </div>

          </div>


        </div>
    </div>
  </nav>
</header>
