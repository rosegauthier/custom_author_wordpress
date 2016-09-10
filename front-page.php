<?php get_header();  ?>


<div class="main">

	<div class="full">
		<?php // Start the loop ?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<!-- GENRES SECTION VISIBLE IF USER INPUTS INFO -->
			<?php 
				if(have_rows('type')) {
					?>
					<section class="genres">
						<div class="container">
							<?php
							while(have_rows('type')) {
								the_row();
								$typeImage = get_sub_field('icon');	
							?>
								<div class="single-genre">
									<img src="<?php echo $typeImage['url']; ?>">
									<h3><?php the_sub_field('genre_name'); ?></h3>
									<p><?php the_sub_field('description'); ?></p>
								</div>
							<?php
							} // end while
							?>
						</div>
					</section>
					<?php
				} // end if
			?>

			<!-- ABOUT THE BOOK -->
			<section class="story">
				<h2><?php the_field('story_section_heading'); ?></h2>
				<div class="story-description container clearfix">
					<div class="half-container">
						<?php $describeBookImage = get_field('descriptive_image'); ?>
						<div class="story-description-image">
							<img src="<?php echo $describeBookImage['url']; ?>">
						</div>
					</div>
					<div class="story-description-info">
						<h3><?php the_field('describe_book_heading'); ?></h3>
						<p><?php the_field('book_description'); ?></p>
					</div>
				</div>
				<div class="story-description container clearfix">
					<div class="half-container">
						<?php $synopsisBookImage = get_field('synopsis_image'); ?>
						<div class="story-synopsis-image">
							<img src="<?php echo $synopsisBookImage['url']; ?>">
						</div>
					</div>
					<div class="story-description-info">
						<h3 class="overview-heading"><?php the_field('book_synopis_heading'); ?></h3>
						<p><?php the_field('book_synopsis'); ?></p>
					</div>
				</div>
			</section>
			
			<!-- COUNTDOWN -->
			<?php 
				if(get_field('release_date')) {
					$countdownImage = get_field('countdown_background');
					?>
					<section class="countdown" style="background-image: url(<?php echo $countdownImage['url']; ?>)">
						<div class="countdown-overlay">
							<div id="release-date" class="container">
								<div class="days">
									<span></span>
									<p>Days</p>
								</div>
								<div class="hours">
									<span></span>
									<p>Hours</p>
								</div>
								<div class="minutes">
									<span></span>
									<p>Minutes</p>
								</div>
								<div class="seconds">
									<span></span>
									<p>Seconds</p>
								</div>
							</div>
							<?php the_field('subscribe_field'); ?>
						</div>
					</section>
					<?php
				} // end if
			?>


			<section class="blog-preview clearfix">
				<h2 class="section-title">Blog</h2>
			    <ul class="clearfix">
				    <?php
				     $postslist = get_posts('numberposts=2');
					     foreach ($postslist as $post) :
					        setup_postdata($post);
					    	$featuredImage = hackeryou_featured_image_url($post);
					     ?>
					     <div class="entry">
					    	 <div class="entry-image" style="background-image: url(<?php echo $featuredImage; ?>)"></div>
					    	 <div class="entry-info">
					    	 	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					    	 	<?php the_time(get_option('date_format')) ?>
					    	 </div>
					     </div>
				     <?php endforeach; ?>
			    </ul>
			</section>

			<section class="front-page-contact">
				<h2 class="section-title contact-heading">Contact</h2>
				<div class="container-small">
       			 	<?php the_field('home_page_contact', 'options'); ?>
       			</div>
			</section>	
			

		<?php endwhile; // end the loop?>
	</div> <!-- /,content -->

</div> <!-- /.main -->

<?php get_footer(); ?>