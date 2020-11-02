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


add_action( 'show_user_profile', 'crf_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'crf_show_extra_profile_fields' );

function crf_show_extra_profile_fields( $user ) {
	$roles = array(
        'applicant',
		'champion'
	);
	$intersect = array_intersect($roles, $user->roles);
	if (empty($intersect)) {
		return;
	}
	?>

<?php


		$date_of_birth = get_the_author_meta( 'date_of_birth', $user->ID );
		$phone_number = get_the_author_meta( 'phone_number', $user->ID );
		$gender = get_the_author_meta( 'gender', $user->ID );
		$physical_address = get_the_author_meta( 'physical_address', $user->ID );
		$highest_level_of_education = get_the_author_meta( 'highest_level_of_education', $user->ID );
		$computer_knowledge = get_the_author_meta( 'computer_knowledge', $user->ID );
		$occupation = get_the_author_meta( 'occupation', $user->ID );
		$working = get_the_author_meta( 'working', $user->ID );
		$in_school = get_the_author_meta( 'in_school', $user->ID );
		$disablity = get_the_author_meta( 'disablity', $user->ID );
		$nin_number = get_the_author_meta( 'nin_number', $user->ID );
	?>
	
	
	
	<h3><?php esc_html_e( 'Applicant Information', 'crf' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="Date Of Birth"><?php esc_html_e( 'Date of birth', 'crf' ); ?></label></th>
			<td>
				<input name="date_of_birth" id="date_of_birth" value="<?php echo esc_attr( $date_of_birth ); ?>" type="date" />
			</td>
        </tr>
        
        <tr>
			<th><label for="Phone Number"><?php esc_html_e( 'Phone Number', 'crf' ); ?></label></th>
			<td>
				<input type="tel" id="phone_number" value="<?php echo esc_attr( $phone_number ); ?>" name="phone_number" />
			</td>
        </tr>
        
        <tr>
			<th><label for="Gender"><?php esc_html_e( 'Gender', 'crf' ); ?></label></th>
			<td>               
                <fieldset>
                <legend class="screen-reader-text"><span>Gender</span></legend>

                    <div class="radio-option">
                    <input <?php echo ($gender=='male')?"checked":"" ?> value="male" id="gender_male" name="gender" type="radio" class="tog">
                    <label for="male">Male</label>
                    </div>


                    <div class="radio-option">
                    <input <?php echo ($gender=='female')?"checked":"" ?> value="female" id="gender_female" name="gender" type="radio" class="tog">
                    <label for="female">Female</label>
                    </div>

                </fieldset>
			</td>
        </tr>
        

        <tr>
			<th><label for="Physical Address"><?php esc_html_e( 'Physical Address', 'crf' ); ?></label></th>
			<td>
				<input id="physical_address" name="physical_address" type="text" value="<?php echo esc_attr( $physical_address ); ?>" />
			</td>
        </tr>


        <tr>
			<th><label for="Highest Level Of Education"><?php esc_html_e( 'Highest Level Of Education', 'crf' ); ?></label></th>
			<td>
				<input id="highest_level_of_education" name="highest_level_of_education" type="text"  value="<?php echo esc_attr( $highest_level_of_education ); ?>"  />
			</td>
        </tr>

        <tr>
			<th><label for="Still In School"><?php esc_html_e( 'Still In School', 'crf' ); ?></label></th>
			<td>
				<input type="checkbox" id="in_school" name="in_school" value="yes"  <?php echo ($in_school=='yes')?"checked":"" ?> /> <label for="">Check if still in school</label>
			</td>
        </tr>


        <tr>
			<th><label for="Occupation"><?php esc_html_e( 'Occupation', 'crf' ); ?></label></th>
			<td>
				<input type="text" id="occupation" name="occupation" value="<?php echo esc_attr( $occupation ); ?>" />
			</td>
        </tr>

        <tr>
			<th><label for="Working Class"><?php esc_html_e( 'Working Class', 'crf' ); ?></label></th>
			<td>
				<input type="checkbox" name="working" value="yes" <?php echo ($working=='yes')?"checked":"" ?> /> <label for="">Check a person goes to work</label>
			</td>
        </tr>

        <tr>
			<th><label for="Computer Knowledge"><?php esc_html_e( 'Computer Knowledge', 'crf' ); ?></label></th>
			<td>
                <input  name="computer_knowledge" id="computer_knowledge" type="range" min="1" max="5" value="<?php echo esc_attr( $computer_knowledge ); ?>" >
			</td>
        </tr>


		<tr>
			<th><label for="Disablity"><?php esc_html_e( 'Disablity', 'crf' ); ?></label></th>
			<td>
				<input type="text" id="disablity" name="disablity" value="<?php echo esc_attr( $disablity ); ?>" />
			</td>
        </tr>


		<tr>
			<th><label for="National ID Number"><?php esc_html_e( 'Passport Or National ID Number', 'crf' ); ?></label></th>
			<td>
				<input type="text" id="nin_number" name="nin_number" value="<?php echo esc_attr( $nin_number ); ?>" />
			</td>
        </tr>

	</table>



	<?php
}


add_action( 'user_profile_update_errors', 'crf_user_profile_update_errors', 10, 3 );
function crf_user_profile_update_errors( $errors, $update, $user ) {
	//Display errors
}



add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
	}
	

	if($_POST['working']){
		update_user_meta( $user_id, 'working', $_POST['working'] );
	}else{
		update_user_meta( $user_id, 'working', $_POST['no'] );
	}


	if($_POST['in_school']){
		update_user_meta( $user_id, 'in_school', $_POST['in_school'] );
	}else{
		update_user_meta( $user_id, 'in_school', $_POST['no'] );
	}

    update_user_meta( $user_id, 'date_of_birth', $_POST['date_of_birth'] );
    update_user_meta( $user_id, 'phone_number', $_POST['phone_number'] );
	update_user_meta( $user_id, 'gender', $_POST['gender'] );
	update_user_meta( $user_id, 'physical_address', $_POST['physical_address'] );
    update_user_meta( $user_id, 'highest_level_of_education', $_POST['highest_level_of_education'] );
    update_user_meta( $user_id, 'computer_knowledge', $_POST['computer_knowledge'] );
    update_user_meta( $user_id, 'disablity', $_POST['disablity'] );
    update_user_meta( $user_id, 'occupation', $_POST['occupation'] );
    update_user_meta( $user_id, 'nin_number', $_POST['nin_number'] );
}