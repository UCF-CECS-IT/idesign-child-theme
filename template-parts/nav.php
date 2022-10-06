<?php
$image      = (bool) get_query_var( 'ucfwp_image_behind_nav', false );
$title_elem = ucfwp_get_nav_title_elem();

$menu_container_class = 'collapse navbar-collapse';
if ( ! $image ) {
	$menu_container_class = $menu_container_class . ' align-self-lg-stretch';
}

$menu = wp_nav_menu( array(
	'container'       => 'div',
	'container_class' => $menu_container_class,
	'container_id'    => 'header-menu',
	'depth'           => 2,
	'echo'            => false,
	'fallback_cb'     => 'bs4Navwalker::fallback',
	'menu_class'      => 'nav navbar-nav',
	'theme_location'  => 'header-menu',
	'walker'          => new bs4Navwalker()
) );

$logo = get_theme_mod( 'idesign_logo' );
$youtube = get_theme_mod( 'social_youtube' );
$facebook = get_theme_mod( 'social_facebook' );
$twitter = get_theme_mod( 'social_twitter' );


?>
<div class="bg-primary" style="z-index: 3">
	<div class="container d-flex flex-row justify-content-between py-2">
		<div class="d-flex flex-column justify-content-center">
			<a class="h2 d-inline align-middle text-secondary title-brand mb-0" href="<?php echo get_home_url(); ?>"><?php echo bloginfo( 'name' ); ?></a>
		</div>
		<div class="d-flex flex-column justify-content-center">
			<?php if ( $logo ): ?>
				<img class="header-logo" src="<?php echo $logo; ?>">
			<?php endif; ?>
		</div>
	</div>
</div>

<nav id="navbar" class="navbar navbar-toggleable-md navbar-custom navbar-inverse" aria-label="Site navigation">
	<div class="container d-flex flex-row flex-nowrap">
		<?php if ( $menu ): ?>
			<button class="navbar-toggler ml-auto align-self-start collapsed" type="button" data-toggle="collapse" data-target="#header-menu" aria-controls="header-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-text">Navigation</span>
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php echo $menu; ?>

			<!-- Icons -->
			<?php if ( $youtube || $facebook || $twitter ): ?>
				<div class="social-icons">
					<?php if ( $youtube ): ?>
						<a class="inline-block mx-1" href="<?php echo $youtube; ?>" target="_blank"><i class="fa fa-youtube-square fa-2x text-primary" aria-hidden="true"></i></a>
					<?php endif; ?>

					<?php if ( $facebook ): ?>
						<a class="inline-block mx-1" href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook-square fa-2x text-primary" aria-hidden="true"></i></a>
					<?php endif; ?>

					<?php if ( $twitter ): ?>
						<a class="inline-block mx-1" href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter-square fa-2x text-primary" aria-hidden="true"></i></a>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		<?php endif; ?>
	</div>
</nav>
