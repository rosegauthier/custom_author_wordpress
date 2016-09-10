<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ) ?>/images/favicon.ico" sizes="16x16">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
		<script>
				var releaseDate; 

				<?php 
					if(get_field('release_date')) {
					?>
				 	releaseDate = '<?php the_field('release_date'); ?>';
				<?php
					}
				 ?>
			</script>	
</head>


<body <?php body_class(); ?>>
  <div class="outer-wrapper">
	<header>
		<?php if( is_front_page() ) : ?>
			<?php $heroImage = get_field('header_image'); ?>
			<div class="hero-image" style="background-image: url(<?php echo $heroImage['url']; ?>)">
				<div class="header-bar clearfix">
					<h1>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
						  <?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<div class="hamburger">
						<span class="fa fa-bars"></span>
					</div>
					<?php wp_nav_menu( array(
					'container' => false,
					'theme_location' => 'primary'
					)); ?>
				</div>

				<?php 
					if(get_field('release_date')) {
						$featureBook = get_field('book_cover');
					?>
						<div class="feature clearfix">
							<div class="feature-book">
								<img src="<?php echo $featureBook['url']; ?>">
								<div class="feature-image"></div>
							</div>
							<div class="feature-info">
								<h2><?php the_field('feature_book_title') ?></h2>
								<p>By: <?php the_field('author_name') ?></p>
								<p><?php the_field('book_excerpt') ?></p>
							</div>
						</div>
					<?php
					}
				 ?>
			</div> <!-- .hero-image -->
		<?php endif; ?>

		<?php if( is_single() ) : ?>
			<?php
				if ( has_post_thumbnail() ) {
					$featuredImage = hackeryou_featured_image_url($post);
				} 
			?>
			<div class=" hero-image blog-hero-image" style="background-image: url(<?php echo $featuredImage; ?>)">
				<div class="header-bar clearfix">
					<h1>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
						  <?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<div class="hamburger">
						<span class="fa fa-bars"></span>
					</div>

					<?php wp_nav_menu( array(
					'container' => false,
					'theme_location' => 'primary'
					)); ?>
				</div>
			</div>
		 <?php endif; ?>

		<?php if( is_home() ) : ?>
			<div class="header-bar clearfix">
				<h1>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
					  <?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<div class="hamburger">
					<span class="fa fa-bars"></span>
				</div>

				<?php wp_nav_menu( array(
				'container' => false,
				'theme_location' => 'primary'
				)); ?>
			</div>
		<?php endif; ?>

		<?php if( is_page('contact') ||  is_page('about') ) : ?>
			<?php
				if ( has_post_thumbnail() ) {
					$featuredImage = hackeryou_featured_image_url($post);
				} 
			?>
			<div class="hero-image contact-about-hero-image" style="background-image: url(<?php echo $featuredImage; ?>)">
				<div class="header-bar clearfix">
					<h1>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
						  <?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<div class="hamburger">
						<span class="fa fa-bars"></span>
					</div>

					<?php wp_nav_menu( array(
					'container' => false,
					'theme_location' => 'primary'
					)); ?>
				</div>
			</div>
		<?php endif; ?>

	</header><!--/.header-->

