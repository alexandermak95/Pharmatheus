<?php
/* Template Name: 2 columns image on the right */
get_header();
 ?>
 <br>
 <div class="container">
   <div class="row" style="margin: 0 auto;">
  <?php if (have_posts()):
    while (have_posts()) : the_post();?>
    <div class="col-md-6" id="left-column">
      <h1 id="h1"><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>
    </div>
    <div class="col-md-6" id="right-column">
      <?php the_post_thumbnail(); ?>
    </div>
<?php endwhile; endif; ?>
  </div>
</div>
 <?php
get_footer();
  ?>
