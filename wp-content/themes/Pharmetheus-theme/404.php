
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title();?></title>
    <?php wp_head();?>
  </head>
  <body>
    <div class="main-container">
      <header class="header-container">
        <section class="hero is-fullheight">
          <div class="hero-body" style="height: 100vh; background-image: url('http://greenish.haahe.net/wp-content/uploads/2018/12/james-forbes-191-unsplash.jpg');">
            <div id="not_found_text" class="container has-text-centered">
              <div style="color:white; padding:30%;">
                <h1 >Oops, you've gone too far. . .</h1>
                <br>
                <a href="<?php echo home_url(); ?>">
                  <input class="button" type="button" value="Take me home"></a>
              </div>
          </div>
        </div>
      </section>
    </header>
  </div>
  <script src="js/script.js"></script>
  </body>
  <?php wp_footer(); ?>
  </html>


<?php
//get_footer();
?>
