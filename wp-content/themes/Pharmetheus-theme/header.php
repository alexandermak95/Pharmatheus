<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
  </head>
  <?php wp_head(); ?>
  <body>
    <header>
      <div class="container-fluid top-bar">
        <div class="row">
          <div class="col-md-5">
            <div class="content">
              <button class="col-xs-1 navbar-toggler navbar-right" type="button" id="flip" onclick="openNav()" data-toggle="collapse" href="#menu-content">
                <span class="navbar-toggler-icon">&#9776;</span>
              </button>
              <div class="collapse" id="menu-content">
                <?php get_sidebar("main-sidebar") ?>
              </div>
            </div>
            <a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php while (have_rows("options", "option")) : the_row();?>
                <?php if (get_row_layout() == "logo") :?>
               <img src="<?php the_sub_field("image"); ?>" alt="">
             <?php endif; endwhile; ?>
            </a>
          </div>
          <div class="col-md-6">
						<form id="search" class="search-form">
              <?php get_search_form(); ?>
						</form>
          </div>
        </div>
      </div>
          <nav id="headnav" class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
              <ul class="navbar-nav mr-auto">
                <?php wp_nav_menu(array(
                  'theme_location' => 'Main Menu',
                  'menu' => 'Main Menu',
                  'container_id' => 'cssmenu',
                  'walker' => new CSS_Menu_Walker()
              )); ?>
              </ul>
          </nav>
    </header>
    <body>
      <div id="wrap" style="background: #e9f0f1;">
        <div id="page-start" class="main">
