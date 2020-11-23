<?php 

if (is_admin()) {
//include dirname(__FILE__) . '/admin.php';
} else {

function champion_application_function($attrs, $content = null) {
        wp_enqueue_style( 'register_style' );
        ob_start();
        include( smartup_plugin_dir_path().'page-templates/reg-form.php');
        $buffer = ob_get_clean();
        $options = get_option('includeme', array());
        if (isset($options['shortcode'])) {
            $buffer = do_shortcode($buffer);
        }

        wp_enqueue_script( 'register_script' );
    return $buffer;
}

function lastest_stories_func( $atts ){

    wp_enqueue_style( 'register_style' );
    ob_start();
    include( smartup_plugin_dir_path().'page-templates/stories/latest_stories.php');
    $buffer = ob_get_clean();
    $options = get_option('includeme', array());
    if (isset($options['shortcode'])) {
        $buffer = do_shortcode($buffer);
    }

    wp_enqueue_script( 'register_script' );
    return $buffer;

}

function slider_show_func( $atts ){
    wp_enqueue_style( 'register_style' );
    ob_start();
    include( smartup_plugin_dir_path().'page-templates/slider.php');
    $buffer = ob_get_clean();
    $options = get_option('includeme', array());
    if (isset($options['shortcode'])) {
        $buffer = do_shortcode($buffer);
    }

    wp_enqueue_script( 'register_script' );
return $buffer;
}

function home_about_func( $atts ){
    wp_enqueue_style( 'register_style' );
    ob_start();
    include( smartup_plugin_dir_path().'page-templates/home-page-about.php');
    $buffer = ob_get_clean();
    $options = get_option('includeme', array());
    if (isset($options['shortcode'])) {
        $buffer = do_shortcode($buffer);
    }

    wp_enqueue_script( 'register_script' );
    return $buffer;
}

function home_icon_box_func( $atts ){
    wp_enqueue_style( 'register_style' );
    ob_start();
    include( smartup_plugin_dir_path().'page-templates/home-page-icon-box.php');
    $buffer = ob_get_clean();
    $options = get_option('includeme', array());
    if (isset($options['shortcode'])) {
        $buffer = do_shortcode($buffer);
    }

    wp_enqueue_script( 'register_script' );
return $buffer;
}

function home_limestone_func( $atts ){
    wp_enqueue_style( 'register_style' );
    ob_start();
    include( smartup_plugin_dir_path().'page-templates/home-page-limestone.php');
    $buffer = ob_get_clean();
    $options = get_option('includeme', array());
    if (isset($options['shortcode'])) {
        $buffer = do_shortcode($buffer);
    }

    wp_enqueue_script( 'register_script' );
    return $buffer;
}


function couses_page_func( $atts ){
    wp_enqueue_style( 'register_style' );
    ob_start();
    include( smartup_plugin_dir_path().'page-templates/courses.php');
    $buffer = ob_get_clean();
    $options = get_option('includeme', array());
    if (isset($options['shortcode'])) {
        $buffer = do_shortcode($buffer);
    }

    wp_enqueue_script( 'register_script' );
    return $buffer;
}

function innovation_of_the_year_func( $atts ){
    $annual_innovation = get_post(get_theme_mod('innovation_of_the_year', '2'));
    $post_thumbnail=get_the_post_thumbnail($annual_innovation->ID);
    $author=get_the_author_meta('display_name', $annual_innovation->post_author);
    $permalink=get_permalink($annual_innovation->ID);
    $str = <<<XML
    <div class="featured-cause">
    <div class="section-heading">
        <h2 class="entry-title">Innovation Of The Year</h2>
    </div><!-- .section-heading -->

    <div class="cause-wrap d-flex flex-wrap justify-content-between">
        <figure class="m-0">$post_thumbnail</figure>
        <div class="cause-content-wrap">
            <header class="entry-header d-flex flex-wrap align-items-center">
                <h3 class="entry-title w-100 m-0"><a href="$permalink">{$annual_innovation->post_title}</a></h3>
                <div class="cats-links">
                    <a href="<?php echo get_permalink($annual_innovation->ID); ?>">$author</a>
                </div><!-- .cats-links -->
            </header><!-- .entry-header -->

            <div class="entry-content">
                <p class="m-0">  {$annual_innovation->post_excerpt}  </p>
            </div><!-- .entry-content -->

            <div class="entry-footer mt-5">
                <a href="$permalink" class="btn gradient-bg mr-2">Read More</a>
            </div><!-- .entry-footer -->
        </div><!-- .cause-content-wrap -->

    </div><!-- .cause-wrap -->
</div><!-- .featured-cause -->
XML;
return $str;
}


add_shortcode( 'innovation_of_the_year', 'innovation_of_the_year_func' );
add_shortcode( 'slider_show', 'slider_show_func' );
add_shortcode( 'home_about', 'home_about_func' );
add_shortcode( 'couses_page', 'couses_page_func' );
add_shortcode( 'home_icon_box', 'home_icon_box_func' );
add_shortcode( 'home_limestone', 'home_limestone_func' );
add_shortcode( 'lastest_stories', 'lastest_stories_func' );
add_shortcode('champion_application', 'champion_application_function');
}