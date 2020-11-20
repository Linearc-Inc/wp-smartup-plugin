<?php 

if (is_admin()) {
include dirname(__FILE__) . '/admin.php';
} else {

function champion_application_function($attrs, $content = null) {
        wp_enqueue_style( 'register_style' );
        ob_start();
        include( smartup_plugin_dir_path().'templates/reg-form.php');
        $buffer = ob_get_clean();
        $options = get_option('includeme', array());
        if (isset($options['shortcode'])) {
            $buffer = do_shortcode($buffer);
        }

        wp_enqueue_script( 'register_script' );
    return $buffer;
}

// Here because the funciton MUST be define before the "add_shortcode" since 
// "add_shortcode" check the function name with "is_callable".
add_shortcode('champion_application', 'champion_application_function');
}