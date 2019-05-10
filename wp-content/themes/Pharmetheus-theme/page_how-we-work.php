<?php
/* Template Name: How we work */
get_header();
 ?>
<?php if (have_posts()):
  while (have_posts()) : the_post();?>
    <?php get_template_part("partials/operations"); ?>
<?php endwhile; endif; ?>

 <?php
get_footer();
  ?>
