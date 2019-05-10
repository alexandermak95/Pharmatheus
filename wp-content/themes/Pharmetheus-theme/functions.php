<?php

function styles () {
  wp_enqueue_style("stylesheet", get_stylesheet_directory_uri(). "/css/style.css");
  wp_enqueue_style("Bootstrap", get_stylesheet_directory_uri(). "/css/bootstrap.min.css");
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri().'/css/font-awesome.css');
  wp_enqueue_script("BootsrapJS", get_template_directory_uri(). "/js/bootstrap.min.js", array("jquery"));
  wp_enqueue_style('owl-style', get_stylesheet_directory_uri().'/css/owl.carousel.css');
  wp_enqueue_script('owlscript', get_template_directory_uri().'/js/owl.carousel.js', array('jquery'));
  wp_enqueue_style('owl-style-default', get_stylesheet_directory_uri().'/css/owl.theme.default.css');
  wp_enqueue_script('javascript', get_template_directory_uri().'/js/script.js', array('jquery'), false, true);
  }


add_action("wp_enqueue_scripts", "styles");

function widget(){
  register_sidebar(array(

  "name" => ("main sidebar"),
  "id"   => "main-sidebar",
  "description" => ("Sidebar for all pages"),
));
}

add_action("widgets_init", "widget");

add_theme_support("post-thumbnails");

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' 	=> 'More options',
    'menu_title'	=> 'Fler inställningar',
    'menu_slug' 	=> 'options',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));
}

register_nav_menu("Main Menu", "Navbar");
register_nav_menu("footermeny", "Footer nav");

function footer_callout ($wp_customize) {
  $wp_customize->add_section("footer-section", array(
    "title" => "Footer customize"
  ));
  $wp_customize->add_setting("footer-headline-1", array(
    "default" => "Skriv in en title"
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, "footer-headline-1-control", array(
    "label" => "First title ",
    "section" => "footer-section",
    "settings" => "footer-headline-1",
    "type" => "text"
  )));

  $wp_customize->add_setting("footer-headline-2", array(
    "default" => "Skriv in en title"
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, "footer-headline-2-control", array(
    "label" => "Seconde title ",
    "section" => "footer-section",
    "settings" => "footer-headline-2",
    "type" => "text"
  )));

  $wp_customize->add_setting("footer-address", array(
    "default" => "Skriv in en address"
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, "footer-address", array(
    "label" => "Address ",
    "section" => "footer-section",
    "settings" => "footer-address",
    "type" => "textarea"
  )));

  $wp_customize->add_setting("footer-contact", array(
    "default" => "Skriv in en title"
  ));
  $wp_customize->add_control(new WP_Customize_Control($wp_customize, "footer-contact", array(
    "label" => "Contact info ",
    "section" => "footer-section",
    "settings" => "footer-contact",
    "type" => "textarea"
  )));

}
add_action("customize_register", "footer_callout");

function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform"  action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" placeholder="SEARCH >>" value="' . get_search_query() . '" name="s" id="s" />
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );


$api = array(

	'libraries'		=> 'places',
	'key'			=> 'AIzaSyAek2X6YRcS4XJ1SalmKH7YsKda63eMau0',
	'client'		=> '
8148720931-4d262vr7c4bq9kfv29gmrippqfsridjr.apps.googleusercontent.com
'

);

function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyAek2X6YRcS4XJ1SalmKH7YsKda63eMau0';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;

		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}

		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}


function custom_excerpt_more ($more){
  return '<a href="'.get_the_permalink().'"> [Read more]</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');



// custom post type
function software() {
  $args = array(
    'labels' => array(
      'name' => 'Softwares',
      'singular_name' => 'Software',
      'add_new_item' => 'add a new software',
      'all_items' => 'All Softwares',
      'edit_item' => 'Edit Software',
      'view_item' => 'Show Software',
      'update_item' => 'Update Software',
      'new_item' => 'New Software',
      'not_found' => 'No Softwares were found'),
    'public' => true,
    'menu_position' => 10,
    'menu_icon' => 'dashicons-layout',
    'rewrite' => array('slug' => 'software'),
    'has_archive' => true,
  );
  register_post_type('softwares', $args);
}
add_action('init', 'software');

?>
