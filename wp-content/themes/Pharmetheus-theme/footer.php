
    </div>
      <footer>
        <div class="container">
          <div class="row" style="margin: 0 auto;">
            <div class="col-md-3">
              <h3><?php echo get_theme_mod("footer-headline-1");?></h3>
              <p><?php echo get_theme_mod("footer-address");?></p>
              <p><?php echo get_theme_mod("footer-contact");?></p>
            </div>
            <div class="col-md-3">
              <h3><?php echo get_theme_mod("footer-headline-2");?></h3>
              <nav id="footer-menu" class="menu-footermeny.container">
                <ul id="menu-footermeny" class="menu">
                  <?php wp_nav_menu(array("theme_location" => "footermeny")); ?>
                </ul>
              </nav>
            </div>
            <div class="col-md-6" style="text-align:center;">
              <?php while (have_rows("options", "option")): the_row(); ?>
                <?php if (get_row_layout() == "footer_social") : ?>
                  <?php $link = get_sub_field("link"); ?>
              <a href="<?php echo $link["url"] ?>" target="_blank" class="linkedin">
  							<?php echo $link["title"]; ?> <span class="icon"></span>
  						</a>
            <?php elseif (get_row_layout() == "copy_rights") : ?>
              <p class="copyright"><?php the_sub_field("text"); ?></p>
            <?php endif; endwhile; ?>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script  defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAek2X6YRcS4XJ1SalmKH7YsKda63eMau0&callback=initMap"></script>
  </body>
  <?php wp_footer(); ?>
</html>
