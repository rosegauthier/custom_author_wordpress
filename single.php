<?php get_header(); ?>

<div class="main">
  <div class="container">
    <div class="content single-blog-container">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2 class="entry-title"><?php the_title(); ?></h2>

          <div class="entry-meta blog-logistics">
            <span><?php echo get_the_date('F j, Y'); ?></span>
            <a href="<?php comments_link(); ?>" class="comments-counter"><?php comments_number(); ?></a>
          </div><!-- .entry-meta -->

          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->
        <div id="nav-below" class="navigation clearfix">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr;<br> %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '&rarr;<br> %title'); ?></p>
        </div><!-- #nav-below -->
        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>