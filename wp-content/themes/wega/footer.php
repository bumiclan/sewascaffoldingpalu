<?php
/**
 * The template for displaying the footer.
 *
*/
?>

    <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
        <?php if (wega('mt_backtotop_status') == true) { ?>
        <!-- BACK TO TOP BUTTON -->
        <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="<?php echo esc_url('#0'); ?>">
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </a>
        <?php } ?>
    <?php } ?>



    <!-- FOOTER -->
    <?php $theme_init = new wega_init_class; ?>
    <footer class="<?php echo esc_attr($theme_init->wega_get_footer_variant()); ?>">

        <!-- FOOTER TOP -->
        <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
            <div class="row footer-top">
                <div class="container">
                <?php          
                    //FOOTER ROW #1
                    echo wega_footer_row1();
                    //FOOTER ROW #2
                    echo wega_footer_row2();
                    //FOOTER ROW #3
                    echo wega_footer_row3();
                 ?>
                </div>
            </div>
        <?php } ?>

        <!-- FOOTER BOTTOM -->
        <div class="row footer-div-parent">
            <div class="footer">
                <div class="container">
                	<p class="copyright">
                        <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                            <?php echo wega('mt_footer_text'); ?>
                        <?php }else{ ?>
                            <?php echo esc_html__('The entirety of this site is protected by Copyright ModelTheme.com', 'wega'); ?>
                            <span class="pull-right"><?php echo esc_html__('Elite Author on ThemeForest', 'wega'); ?></span> 
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>



<?php wp_footer(); ?>
</body>
</html>