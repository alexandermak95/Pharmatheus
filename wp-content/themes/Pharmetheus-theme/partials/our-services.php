
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
          <?php if (have_rows("links")) : ?>
              <div class="row">
          <?php while (have_rows("links")) : the_row();
          $link = get_sub_field("link")
          ?>
            <a class="col-md-3" id="service-link" href="<?php echo $link['url']; ?>"> <span><?php echo $link['title']; ?></span> </a>
        <?php endwhile; endif;?>
            </div>
          </div>
          <br>
      </div>
			<div class="col-md-6">
        <br>
					<?php the_post_thumbnail(); ?>
			</div>
    </div>
  </div>
          <?php endif; ?>
        <?php endwhile; ?>
