<?php



function smartup_page_tempalates(){
	Smartup\Plugin\PagesTemplater::get_instance(smartup_plugin_dir_path().'page-templates/',array( 
		//story-tempaltes
		'stories/archive-stories.php' => 'Stories Archive', 
		'stories/single-stories.php'=>'Single Story',
		//innovations
		'innovation/archive-innovation.php'=>'Innovations Archive',
		'innovation/single-innovation.php'=>'Single Innovation',
	));
}
add_action( 'plugins_loaded','smartup_page_tempalates' );