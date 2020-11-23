<?php 
function add_smartup_admin_menu() {
    add_dashboard_page('Smartup Manager', 'Smartup Manager', 'manage_options', 'smartup_manager', 'smartup_main_page' );

    function smartup_main_page($x)
    {
        require_once( smartup_plugin_dir_path() . 'page-templates/admin/admin-dashboard.php' );
    }
}
add_action('admin_menu', 'add_smartup_admin_menu');