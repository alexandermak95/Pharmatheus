
<?php get_header(); ?>
<br>
    <div class="container">
      <div class="row">
        <div  class="col-xs-12 col-md-9">
          <br>
          <?php get_search_form(); ?>
          <?php if(have_posts()): ?>
            <?php  while (have_posts()) : the_post();?>
                <article>
                  <?php the_post_thumbnail();?>
                  <a href="<?php the_permalink();?>"> <h2 class="title"><?php the_title(); ?> </h2></a>
                  <p><?php  the_excerpt();?></p>
                </article>
                  <?php endwhile; ?>
                    <?php echo paginate_links(); ?>
            </div>
              <?php else : ?>
                <p>No matches! Try again or go back to the start page</p>
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
            <br><br>
        </div>
      </div>
<?php get_footer(); ?>
