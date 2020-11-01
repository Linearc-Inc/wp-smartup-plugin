<?php 

function add_user_types(){
    add_role('applicant', 'Applicant',array());
    
    add_role( 'champion', 'Champion', array(
    'read' =>'true',
    )
    );
}

function remove_user_types(){
    remove_role( 'applicant' );
    remove_role( 'champion' );
}
