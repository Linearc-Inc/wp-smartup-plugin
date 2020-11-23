<?php 


function innovation_customiser($wp_customize)
{
    $innovations = new WP_Query(array(
        'post_type' => 'innovations',
    ));
    $posts = $innovations->posts;
    $my_posts = array();
    foreach ($posts as $post) {
        $my_posts[$post->ID] = $post->post_title;
    }
    
    $wp_customize->add_setting(
        'innovation_of_the_year', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
        array(
        'default' =>'1', //Default setting/value to save
        'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, //Pass the $wp_customize object (required)
            'innovation_of_the_year_control', //Set a unique ID for the control
            array(
            'label' => __('Select Innovation To Appear As Innovation of the year', 'linearc'), //Admin-visible name of the control
            'settings' => 'innovation_of_the_year', //Which setting to load and manipulate (serialized is okay)
            'priority' => 10, //Determines the order this control appears in for the specified section
            'section' => 'static_front_page', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'type' => 'select',
            'choices' => $my_posts,
            )
        )
    );
}


add_action('customize_register', 'innovation_customiser');