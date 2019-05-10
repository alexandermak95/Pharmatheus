<?php
if(is_active_sidebar("main-sidebar")) : ?>
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
		<div class="nav">
			<ul class="navbar-nav mr-auto">
				<?php wp_nav_menu(array(
					'theme_location' => 'Main Menu',
					'menu' => 'Main Menu',
					'container_id' => 'cssmenu',
					'walker' => new CSS_Menu_Walker()
			)); ?>
			</ul>
		</div>
		<div class="sidebar">
			<ul>
	    	<?php dynamic_sidebar("main-sidebar"); ?>
	    </ul>
		</div>

  </div>
</div>
	<?php endif; ?>
