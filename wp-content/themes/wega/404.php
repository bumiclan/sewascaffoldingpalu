<?php
/**
 * The template for displaying 404 pages (not found).
 *
 */

get_header(); ?>

<?php 
// Theme Init
$theme_init = new wega_init_class;
if($theme_init->wega_get_page_404_template_variant() == 'page_404_v1_center'){
	$alignment = 'text-center';
	$grid_class = 'col-md-12';
}elseif ($theme_init->wega_get_page_404_template_variant() == 'page_404_v2_left') {
	$alignment = 'text-left';
	$grid_class = 'col-md-8';
}
?>

	<!-- Page content -->
	<div id="primary" class="content-area">
	    <main id="main" class="container blog-posts site-main">
	        <div class="col-md-12 main-content">
				<section class="error-404 not-found">
					<header class="page-header-404">
						<div class="high-padding row text-center">
							<?php if($theme_init->wega_get_page_404_template_variant() == 'page_404_v2_left'){ ?>
								<div class="col-md-4 sidebar-content">
									<?php get_sidebar(); ?>
								</div>
							<?php } ?>
							<div class="<?php echo esc_attr($grid_class); ?>">
								<img src="<?php echo esc_url(get_template_directory_uri().'/images/404.png'); ?>" alt="<?php esc_attr_e( '404 Not Found', 'wega' ); ?>" />
								<h2 class="page-title <?php echo esc_attr($alignment); ?>"><?php esc_html_e( 'Sorry, this page does not exist', 'wega' ); ?></h2>
								<p class="page-title <?php echo esc_attr($alignment); ?>"><?php esc_html_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'wega' ); ?></p>
								<a class="vc_button_404" href="<?php echo esc_url(get_site_url()); ?>"><?php esc_html_e( 'Back to Home', 'wega' ); ?></a>
							</div>

						</div>
					</header>
				</section>
			</div>
		</main>
	</div>

<?php get_footer(); ?>