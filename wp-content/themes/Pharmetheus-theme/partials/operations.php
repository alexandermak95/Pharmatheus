
  <div class="container" id="wrapper">
    <div  class="row" style="margin: 0 auto; padding: 10px;">
      <?php while (have_rows("services")) : the_row(); ?>
        <?php if (get_row_layout() == "text_block") : ?>
			<div class="col-md-6">
				<div class="textblock">
					<h1 id="h1"><?php the_sub_field("title"); ?></h1>
					<p><?php the_sub_field("text"); ?></p>
          <h3> <?php the_sub_field("quote") ?> </h3>
          <br>
          </div>
          <br>
      </div>
			<div class="col-md-6">
					<?php the_post_thumbnail(); ?>
			</div>
    </div>
  </div>
  <?php endif; ?>

<?php if (have_rows("links")) : ?>
  <div class="container">
   <div class="row" id="arrows">
  <?php while (have_rows("links")) : the_row();
  $link = get_sub_field("link")
  ?>
    <a class="col-md-1 button-arrow" id="service-link" href="<?php echo $link['url']; ?>"> <span> <h4><?php echo $link['title']; ?></h4>  <p><?php the_sub_field('link_description');?></p> </span>  </a>
  <?php endwhile; endif;?>
  </div>
</div>

<?php endwhile; ?>
