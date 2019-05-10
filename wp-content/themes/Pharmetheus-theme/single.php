<?php
get_header();
 ?>
<?php if (have_posts()): ?>
  <br>
  <div class="container">
  <?php  while (have_posts()) : the_post();?>
    <div class="row" id="<?php echo get_the_ID(); ?>">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-9">
            <h2 style="text-align: center"><?php the_title(); ?></h2>
            <p ><?php the_content(); ?></p>
          </div>
          <div class="col-md-3">
            <?php the_post_thumbnail(); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>
 <?php
get_footer();
  ?>
