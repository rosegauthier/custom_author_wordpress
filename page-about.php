<?php get_header();  ?>

<div class="main">
  <div class="full">

    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <section>
          <h2 class="section-title"><?php the_field('about_section_title') ?></h2>
          <h2 class="about-feature-title container-small"><?php the_field('feature_book_title') ?></h2>
          <?php the_content(); ?>
          <div class="book-description container-small"><?php the_field('book_description') ?></div>
        </section>

        <!-- COUNTDOWN -->
        <?php 
          if(get_field('release_date')) {
            $countdownImage = get_field('countdown_background');
            ?>
            <section class="countdown about-countdown" style="background-image: url(<?php echo $countdownImage['url']; ?>)">
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

      <section class="book-synopsis container-small">
        <h2 class="section-title"><?php the_field('book_synopsis_title'); ?></h2>
        <h3><?php the_field('book_synopsis_heading'); ?></h2>
        <div><?php the_field('book_synopsis'); ?></div>
      </section>

      <?php 
        if(get_field('release_date')) {
          $featureBook = get_field('book_cover');
        ?>
          <section class="about-feature">
            <div class="about-feature-book feature-book">
              <img src="<?php echo $featureBook['url']; ?>">
              <div class="feature-image"></div>
            </div>
          </section>
        <?php
        }
       ?>

        <script>
          var releaseDate = '<?php the_field('release_date'); ?>';
        </script>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>