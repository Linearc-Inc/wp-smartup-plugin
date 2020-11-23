<?php
/*
@package linarcfootball
    ==========================
    Theme custom post types
    =========================
*/

add_action('init', 'slider_custom_post_type');
function slider_custom_post_type()
{
    $labels = array(
        'name' => 'Slider',
        'singular_name' => 'Slider',
        'add_new' => 'Add Slide',
        'add_new_item' => 'Add Slide',
    );

    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => false,
        'public' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'supports' => array('thumbnail'),
    );

    register_post_type('slides', $args);
}


add_action('add_meta_boxes', 'slide_data_meta_box');

function slide_data_meta_box()
{
    add_meta_box('slide_data', 'Slider', 'slider_funded_callback', 'slides');
}

function slider_funded_callback($post)
{
    wp_nonce_field('save_slide_data', 'save_slide_data_nonce');
    $value = $post->post_title;
    echo '<br/><div class="meta">';
    echo '<label>Big title</label><br/><br/>';
    echo '<input class="components-text-control__input ui-autocomplete-input" type="text" id="post_title" name="post_title" value="'.esc_attr($value).'" size="25" >';
    echo '<p class="howto" >title that appears on top</p>'; 
    echo '</div>';

    //Sub title
    $value = get_post_meta($post->ID, '_slide_sub_title_key', true);
    echo '<div class="meta">';
    echo '<label>Sub title</label><br/><br/>';
    echo '<input class="components-text-control__input ui-autocomplete-input" type="text" id="slide_sub_title" name="slide_sub_title" value="'.esc_attr($value).'" size="25" >';
    echo '<p class="howto" >title that appears below the bigger title</p>'; 
    echo '</div>';


      //Sub title
      $value = get_post_meta($post->ID, '_slide_text_key', true);
      echo '<div class="meta">';
      echo '<label>Text</label><br/><br/>';
      echo '<textarea class="components-text-control__input ui-autocomplete-input" style="width:100%;max-height:100px;min-height:100px;" type="text" id="slide_text" name="slide_text"  size="25" >'.esc_attr($value).'</textarea>';
      echo '<p class="howto" >more info about the slide</p>'; 
      echo '</div>';


          //Sub title
        $link = get_post_meta($post->ID, '_slide_btn1_link_key', true);
        $name = get_post_meta($post->ID, '_slide_btn1_name_key', true);
        echo '<div class="meta">';
        echo '<label>First Button</label><br/><br/>';
        echo '<div class="row">
                <input style="width:30%;"  placeholder="Button Name" type="text" id="slide_btn1_name" name="slide_btn1_name" value="'.esc_attr($name).'" size="10" >
                <input  style="width:50%;" placeholder="Button Link" type="url" id="slide_btn1_link" name="slide_btn1_link" value="'.esc_attr($link).'" size="10" >
             </div>';
        echo '</div>';

        //Sub title
        $link = get_post_meta($post->ID, '_slide_btn2_link_key', true);
        $name = get_post_meta($post->ID, '_slide_btn2_name_key', true);
        echo '<br/><div class="meta">';
        echo '<label>Second Button</label><br/><br/>';
        echo '<div class="row">
                <input style="width:30%;"  placeholder="Button Name" type="text" id="slide_btn2_name" name="slide_btn2_name" value="'.esc_attr($name).'" size="10" >
                <input  style="width:50%;" placeholder="Button Link" type="url" id="slide_btn2_link" name="slide_btn2_link" value="'.esc_attr($link).'" size="10" >
                </div>';
        echo '</div>';

}

add_action('save_post', 'save_slide_data');

function save_slide_data($post_id)
{
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (!isset($_POST['post_title'])) {
        return;
    }
    remove_action('save_post', 'save_slide_data');
    update_post_meta($post_id, '_slide_sub_title_key', sanitize_text_field($_POST['_slide_sub_title_key']));
    update_post_meta($post_id, '_slide_text_key', sanitize_text_field($_POST['slide_text']));
    update_post_meta($post_id, '_slide_btn2_link_key', sanitize_url($_POST['slide_btn2_link'],'https'));
    update_post_meta($post_id, '_slide_btn1_link_key', sanitize_url($_POST['slide_btn1_link'],'https'));
    update_post_meta($post_id, '_slide_btn2_name_key', sanitize_text_field($_POST['slide_btn2_name']));
    update_post_meta($post_id, '_slide_btn1_name_key', sanitize_text_field($_POST['slide_btn1_name']));
    $post_title = sanitize_text_field($_POST['post_title']);
    add_action('save_post', 'save_slide_data');

}