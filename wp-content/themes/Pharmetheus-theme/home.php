<?php
get_header();
 ?>
<?php if (have_posts()): ?>
  <div class="container-fluid" id="staff">
    <div class="row">
      <div class="col-md-12">
        <?php while (have_rows("options", "option")) : the_row(); ?>
          <?php if (get_row_layout() == "blog_headline") : ?>
        <h1><?php the_sub_field('headline'); ?></h1>
        <?php endif; endwhile; ?>
      </div>
    </div>
    <div class="row">
   <?php while (have_posts()) : the_post();?>
     <div class="col-sm-6 col-md-2" id="text-shower">
       <a  href="#<?php echo get_the_ID() ?>"><?php the_post_thumbnail(); ?></a>
       <div class="image-text" id="image-text">
         <p><?php the_title(); ?></p>
       </div>
     </div>

<?php endwhile; endif; ?>
    </div>
    <hr>
 <?php while (have_posts()) : the_post();?>
    <div class="row" id="<?php echo get_the_ID(); ?>">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-9">
            <h2><?php the_title(); ?></h2>
            <p ><?php the_content(); ?></p>
          </div>
          <div class="col-md-3">
            <?php the_post_thumbnail(); ?>
          </div>
        </div>
        <hr>
      </div>
    </div>
  <?php endwhile;?>
  </div>
 <?php
get_footer();
  ?>
