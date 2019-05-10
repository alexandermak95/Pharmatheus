<?php
/* Template Name: software */
get_header();
 ?>
<?php
$args = array(
  'post_type' => array('softwares')
);
$software= new WP_QUERY($args);
 ?>
 <div class="container">
   <div class="row" style="margin: 0 auto; padding: 5%;">
     <?php  while ($software->have_posts()) : $software->the_post();?>
    <div class="col-md-4">
      <?php the_content(); ?>
    </div>
<?php endwhile; ?>
  </div>
</div>
 <?php
get_footer();
  ?>
