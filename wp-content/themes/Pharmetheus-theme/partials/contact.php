<div id="wrapper" class="container">
	<div class="row" style="margin: 0 auto;">
    <?php while (have_rows("contact")) : the_row(); ?>
		<div class="col-md-9">
      <?php if (get_row_layout() == "contact_info") : ?>
			<div class="textblock">
				<h1><?php the_sub_field("title");?></h1>
				<p><?php the_sub_field("text"); ?></p>
      </div>
<?php endif; endwhile; ?>
        <?php
        $location = get_field('new_map', 'option');
        ?>
        <div id="map" class="acf-map">
        	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
    </div>
  </div>
</div>
