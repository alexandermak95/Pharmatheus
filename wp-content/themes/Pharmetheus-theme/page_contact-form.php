<?php
/*
Template Name: Contact form
*/

get_header();
 ?>
<?php if (have_posts()): ?>
  <div class="container">
    <div class="row" style="margin: 0 auto;">
      <div class="col-md-8">
      <?php
    while (have_posts()) : the_post();?>
      <h1 style="margin: 6% 0 6% 0;" id="h1"><?php the_title(); ?></h1>
      <p style="margin-top:-5%;"><?php the_content(); ?></p>
    <?php endwhile; endif; ?>
    </div>
  </div>
</div>
 <?php
get_footer();
  ?>
