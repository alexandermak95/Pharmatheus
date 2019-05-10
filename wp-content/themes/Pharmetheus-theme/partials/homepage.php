<section class="slideshow" data-autoplay="5000" data-singleitem="false" data-items="1">
  <?php while (have_rows("slider")): the_row(); ?>
    <div class="slide">
      <img src="<?php the_sub_field('image'); ?>" alt="">
        <div class="row">
              <p class="col-md-8"><?php the_sub_field('text'); ?></p>
            </div>
          </div>
<?php endwhile; ?>
</section>
<section class="news">
  <div class="container">
    <div class="row" style="margin: 0 auto;">
      <?php if (have_rows("news")) : ?>
        <?php while (have_rows("news")): the_row(); ?>
          <?php if (get_row_layout() == "newswrap") : ?>
      <div class="col-md-8">
        <p><?php the_sub_field("text");?></p>
        <?php elseif (get_row_layout() == "buttons") : ?>
          <?php $link = get_sub_field("link")?>
          <?php $link2 = get_sub_field("link_2")?>
          <div class="row">
            <div class="col-md-6" style="margin-bottom: 5px">
                <a href="<?php echo $link["url"]; ?>" class="block-link"></a>
                  <div class="block-button block-button-left">
                  <div class="icon">
                    <img src="<?php the_sub_field("image");?>">
                  </div>
                  <div class="content">
                    <h3><a href="<?php echo $link["url"]; ?>"><?php echo $link["title"]; ?></a></h3>
                    <p></p>
                  </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 5px">
                <a href="<?php echo $link2["url"];?>" class="block-link"></a>
                <div class="block-button block-button-right">
                  <div class="icon">
                    <img src="<?php the_sub_field("image_2");?>">
                  </div>
                  <div class="content">
                    <h3><a href="<?php echo $link2["url"]; ?>"><?php echo $link2["title"]; ?></a></h3>
                    <p></p>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <?php elseif (get_row_layout() == "newsletter"): ?>
      <div id="news" class="col-md-4">
          <h3><?php the_sub_field("title"); ?></h3>
          <p><?php the_sub_field("news_text"); ?></p>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endwhile; endif; ?>
<section class="images">
  <div class="container">
    <div class="row" style="margin: 0 auto;">
      <?php while (have_rows("images")) : the_row(); ?>
        <?php if (get_row_layout() == "image_section") : ?>
          <?php $links = get_sub_field("title"); ?>
      <div class="col-md-4">
        <h3>
          <a href="<?php echo $links['url'];?>"><?php echo $links['title'];?></a>
        </h3>
        <div style="border: solid 1px #ffffff;">
          <a href="<?php echo $links['url'];?>">
            <img src="<?php the_sub_field("image"); ?>">
          </a>
        </div>
      </div>
      <?php endif; endwhile; ?>
    </div>
  </div>
</section>
