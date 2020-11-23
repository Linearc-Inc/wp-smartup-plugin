<?php

    echo '<h1>Smartup Admin Center</h1>';
    settings_errors(); 
?>

<section>
    <li><a href=" <?php echo admin_url('edit.php?post_type=innovations') ?>">Innovations</a></li>
    <li><a href=" <?php echo admin_url('edit.php?post_type=stories') ?>">Stories</a></li>
    <li><a href=" <?php echo admin_url('edit.php?post_type=slides') ?>">Slides</a></li>
</section>