<?php


function register_champion($x){

    // echo $_POST['email'];
    // echo $_POST['first_name'];
    // echo $_POST['last_name'];
    // echo $_POST['phone_numner'];
    // echo $_POST['gender'];
    // echo $_POST['date_of_birth'];
    // echo $_POST['physical_address'];
    // echo $_POST['education_level'];
    // echo $_POST['in_school'];
    // echo $_POST['working'];
    // echo $_POST['occupation'];
    // echo $_POST['computer_skills'];
    
    $email = $_POST['email'];
    $fisrt_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];

    $user= get_user_by_email($email);
    if(!$user){
        $userdata = array(
            'user_login' =>  $email,
            'first_name' => $fisrt_name,
            'last_name' => $last_name,
            'user_email'=>$email,
            'role' => 'applicant',
            'user_pass'  =>  NULL // When creating an user, `user_pass` is expected.
        );
        $user_id = wp_insert_user( $userdata ) ;
        if (is_wp_error($user_id)) {
            wp_delete_user($user_id);
            die('Something went wrong');
        }else {
            if($_POST['working']=="yes"){
                update_user_meta( $user_id, 'working', $_POST['working'] );
            }else{
                update_user_meta( $user_id, 'working', $_POST['no'] );
            }
        
        
            if($_POST['in_school']=="yes"){
                update_user_meta( $user_id, 'in_school', $_POST['in_school'] );
            }else{
                update_user_meta( $user_id, 'in_school', $_POST['no'] );
            }
        
            update_user_meta( $user_id, 'date_of_birth', $_POST['date_of_birth'] );
            update_user_meta( $user_id, 'phone_number', $_POST['phone_number'] );
            update_user_meta( $user_id, 'gender', $_POST['gender'] );
            update_user_meta( $user_id, 'physical_address', $_POST['physical_address'] );
            update_user_meta( $user_id, 'highest_level_of_education', $_POST['education_level'] );
            update_user_meta( $user_id, 'computer_knowledge', $_POST['computer_skills'] );
            update_user_meta( $user_id, 'occupation', $_POST['occupation'] );
            die('Register Successfully');



        }
    }else{
        $roles = array(
            'administrator',
            'editor',
            'author',
            'contributor',
            'developer',
            'subscriber'
        );
        $user_roles = $user->roles;
        $intersect = array_intersect($roles, $user_roles);
        if (!empty($intersect)) {
            echo 'You are a subscriber by already';
        } else if(in_array('subscriber_not_confirmed',$user_roles)){
            echo "Please Check your email";
        }
    } 


    die();
}

add_action( 'wp_ajax_register_champion', 'register_champion' );
add_action( 'wp_ajax_nopriv_register_champion', 'register_champion' );