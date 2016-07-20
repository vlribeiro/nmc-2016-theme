<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage NMC2016
 * @since NMC2016 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
</head>

<body <?php body_class(); ?>>

  <!-- Headers -->
  <header>
    <!-- Mobile header -->
    <section class="nmc-top-bar hide-for-medium">
      <div class="relative">
        <button class="nmc-top-bar__action-button fa fa-bars"></button>
        <a class="nmc-top-bar__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php bloginfo('template_directory')?>/img/nmc-logo-mobile.png" width="80" alt="Logo Não Me Critica" />
        </a>
      </div>

      <?php if ( has_nav_menu('principal')) : ?>
        <nav class="nmc-top-bar__menu hide">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'principal',
              'menu_class'     => '',
             ) );
          ?>
        </nav>
      <?php endif; ?>
    </section>

    <!-- Desktop header -->
    <section class="nmc-header hide-for-small-only">
			<div class="row">
				<div class="column shrink">
					<a class="nmc-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php bloginfo('template_directory')?>/img/nmc-logo-site.png" width="200" alt="Logo Não Me Critica" />
					</a>
				</div>
				<div class="column align-self-bottom">
          <?php if ( has_nav_menu('principal')) : ?>
  					<nav class="nmc-header__menu">
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'principal',
                  'menu_class'     => 'menu align-right',
                 ) );
              ?>
  					</nav>
        <?php endif; ?>
				</div>
			</div>
		</section>
  </header>

  <div>
