<?php
/*
@package linarcfootball
    ==========================
    Theme custom post types
    =========================
*/

add_action('init', 'stories_custom_post_type');
function stories_custom_post_type()
{
    $labels = array(
        'name' => 'Stories',
        'singular_name' => 'Story',
        'add_new' => 'Add Story',
        'add_new_item' => 'Add Story',
        'menu_name' => 'Youth Stories',
        'name_admin_bar' => 'Youth Stories',
    );

    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_rest' => true,
        'public'=>true,
        'has_archive' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 26,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'author', 'excerpt', 'comments', 'post-formats','thumbnail'),
    );
    register_post_type('stories', $args);
}


/* Filter the single_template with our custom function*/
add_filter('single_template', 'story_custom_template');

function story_custom_template($single) {
    global $post;
    if ( $post->post_type == 'stories' ) {
        if ( file_exists( smartup_plugin_dir_path() . '/page-templates/stories/single-stories.php' ) ) {
            return smartup_plugin_dir_path() . '/page-templates/stories/single-stories.php';
        }else{
          die(smartup_plugin_dir_path() . '/page-templates/stories/single-stories.php');
        }
    }
    return $single;

}


add_filter('template_include', 'stories_archive');

function stories_archive( $template ) {
  
  if(is_post_type_archive('stories')) {
    $theme_files = array('archive-stories.php', get_template_directory().'/archive-stories.php');
    $exists_in_theme = locate_template($theme_files, false);
    if ( $exists_in_theme != '' ) {
      return $exists_in_theme;
    } else {
      return smartup_plugin_dir_path().'page-templates/stories/archive-stories.php';
    }
  }
  return $template;
}


add_action('add_meta_boxes', 'stories_add_meta_box');

function stories_add_meta_box()
{
    add_meta_box('pseudosticky', 'Is sticky', 'addbox', 'stories', 'side', 'high');

function addbox($post, $metabox) {  
 $entered = get_post_meta($post->ID, 'pseudosticky', true);

    ?>
    <label><input name="pseudosticky" type="checkbox"<?if($entered=="on")echo' checked="checked"';?>> Is sticky</label>
    <?
}
}
add_action('save_post', 'save_stories_data');
function save_stories_data($post_id)
{
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
        if(isset($_POST['pseudosticky'])){
        $my_data = $_POST['pseudosticky'];
        update_post_meta($post_id, 'pseudosticky', $my_data);
    }else{
        update_post_meta($post_id, 'pseudosticky', 'off');
    }
    
}