<?php get_header();  ?>

<div class="main">
  <div class="container">
	<h2 class="section-title">Blog</h2>
	<div class="content">
	  <?php // Start the loop ?>
	  <?php if ( have_posts() ) while ( have_posts() ) : the_post();
	  ?>
		<div class="blog-post clearfix">
			<div class="blog-image">
				<?php
				if ( has_post_thumbnail() ) {
					$featuredImage = hackeryou_featured_image_url($post);
				} 
				?>
				<img src="<?php echo $featuredImage ?>">
			</div>
			<div class="blog-excerpt">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="blog-logistics">
					<span><?php echo get_the_date('F j, Y'); ?></span>
					<a href="<?php comments_link(); ?>" class="comments-counter"><?php comments_number(); ?></a>
				</div>

				<?php the_excerpt(); ?>

			</div>
		</div>
	  <?php endwhile; // end the loop?>
	<?php the_posts_pagination( array(
    'prev_text' => __( 'Prev', 'textdomain' ),
	) ); ?> 
	</div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>