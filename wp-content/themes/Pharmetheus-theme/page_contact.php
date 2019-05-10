<?php
/* Template Name: Contact us */
get_header();
 ?>
<?php if (have_posts()):
  while (have_posts()) : the_post();?>
    <?php get_template_part("partials/contact"); ?>
<?php endwhile; endif; ?>

 <?php
get_footer();
  ?>
