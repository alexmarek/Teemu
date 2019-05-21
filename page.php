<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Teemu_Laurell
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->

			<?php
				get_template_part( 'template-parts/home-section-1' );
				get_template_part( 'template-parts/home-section-2' );
				get_template_part( 'template-parts/home-section-3' );
				get_template_part( 'template-parts/home-section-4' );
				get_template_part( 'template-parts/home-section-5' );
				get_template_part( 'template-parts/home-section-6' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
