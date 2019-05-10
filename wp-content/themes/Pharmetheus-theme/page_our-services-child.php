<?php
/* Template Name: Our services child page */
get_header();
 ?>
 <br>
 <div class="container">
   <div class="row" style="margin: 0 auto;">
  <?php if (have_posts()):
    while (have_posts()) : the_post();?>
    <div class="col-md-8">
      <h1 id="h1"><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>
    </div>
    <br><br>
    <div class="row">
      <div class="col-md-12">
        <?php the_post_thumbnail(); ?>
      </div>
    </div>
<?php endwhile; endif; ?>

  </div>
</div>
 <?php
get_footer();
  ?>
