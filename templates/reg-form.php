<div data-url="<?php echo admin_url('admin-ajax.php'); ?>"  id="registration-form" class="tab">
            <div class="tab-wrapper">
                <ul class="tab-header">
                    <li class="tab-header-item">Personal Information</li>
                    <li class="tab-header-item">Background Information</li>
                    <li class="tab-header-item">Done</li>
                </ul>

                <ul class="tab-body">
                    <li class="tab-body-item">
                        <div class="container">
                            <!-- row firstname and second name -->
                            <form id="registration-form-1"  method="post">
                                <div class="form-group">
                                    <div class="form-group-inline">
                                        <input name="first_name" id="first_name" type="text" placeholder="First Name">
                                    </div>
                                    <div class="form-group-inline">
                                        <input name="last_name" id="last_name" type="text" placeholder="Last Name">
                                    </div>
                                </div>
                            
                            <div class="form-group">
                                <!-- row phone number -->
                                <div class="form-group-inline">
                                    <select class="country-code" name="phone_code" id="phone_code">
                                        <option value="256">256</option> <!-- ug -->
                                        <option value="254">255</option>
                                        <option value="254">254</option>
                                        <option value="254">257</option>
                                        <option value="254">211</option>
                                        <option value="267">250</option>
                                    </select>
                                    <input id="phone_number" name="phone_number" type="text" placeholder="Phone Number">
                                </div>
                                <!--  row email -->
                                <div class="form-group-inline">
                                    <input name="email" id="email" type="email" placeholder="Email Address">
                                </div>
                            </div>
                            <!-- row date of birth -->
                            <div class="form-group">
                                <div class="form-group-inline">
                                    <div class="form-group column">
                                        <label for="">Gender</label>
                                        <div id="gender" class="form-group full-width">
                                            <div class="form-group">
                                                <span><input name="gender" value="male" type="radio"></span>
                                                <label for="">Male</label>
                                            </div>
                                            <div class="form-group">
                                                <span> <input name="gender" value="female" type="radio"></span>
                                                <label for="">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inline">
                                    <div class="form-group column">
                                        <label for="">Date of Birth</label>
                                        <div class="form-group full-width">
                                            <input id="date_of_birth"  name="date_of_birth" type="date">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Physical address -->
                            <div class="form-group">
                                <input id="physical_address" name="physical_address" placeholder="Physical Address" type="text">
                            </div>
                        </form>
                        </div>
                    </li>
                    <li class="tab-body-item">

                        <div class="container">
                            <form id="registration-form-2"  action="">
                                <label for="">Higest Level Attained</label>
                                <div class="form-group">
                                    <div class="form-group-inline">
                                        <select name="education_level"  id="education_level" >
                                            <option value="none">None</option>
                                            <option value="ple">PLE</option>
                                            <option value="uce">UCE</option>
                                            <option value="uace">UACE</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group-inline">
                                        <input name="other_education_level" required id="other_education_level" disabled type="text" placeholder="If other fill it here">
                                    </div>
                                    <div class="form-group">
                                        <span><input type="checkbox" name="in_school" id="in_school"></span>
                                        <label for="">Still in school</label>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <div class="form-group">
                                        <span><input  type="checkbox" name="working" id="working"></span>
                                        <label for="">Employed or working?</label>
                                    </div>
    
                                    <div class="form-group">
                                        <input type="text" name="occupation" id="occupation" disabled placeholder="Occupation" />
                                    </div>
                                </div>
    
                                <div class="form-group column">
                                    <label for="">Please rate your computer knowledge.</label>
                                    <div class="form-group column">
                                        <div class="form-group full-width">
                                            <span><input value="1" type="radio" name="computer_skills" id="computer_skills"></span>
                                            <label for="">I don't know anything</label>
                                        </div>
                                        <div class="form-group full-width">
                                            <span><input value="2" type="radio" name="computer_skills" id="computer_skills"></span>
                                            <label for="">I can switch it on, off and use a mouse?</label>
                                        </div>
                                        <div class="form-group full-width">
                                            <span><input value="3" type="radio" name="computer_skills" id="computer_skills"></span>
                                            <label for="">I can use Internet and email, computers, word processing</label>
                                        </div>
                                        <div class="form-group full-width">
                                            <span><input value="4" type="radio" name="computer_skills" id="computer_skills" ></span>
                                            <label for="">I can use multimedia, and spreadsheets and databases</label>
                                        </div>
                                        <div class="form-group full-width">
                                            <span><input value="5" type="radio" name="computer_skills" id="computer_skills"></span>
                                            <label for="">I can do programming and scripting.</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </li>
                    <li class="tab-body-item">
                        <h2>Your information has been submitted</h2>

                        <div class="container" >
                            <form id="registration-form-3"  action="">
                                <h4>How did you know about smartup ?</h4>

                                <div class="form-group">
                                    <span>
                                        <input name="how_you_knew_about_suf" type="radio">
                                    </span>
                                    <label for="">Freind/Family</label>
                                </div>
    
                                <div class="form-group">
                                    <span>
                                        <input type="radio" name="how_you_knew_about_suf" >
                                    </span>
                                    <label for="">News / Tv / Radio</label>
                                </div>
                                
                                <div class="form-group">
                                    <span>
                                        <input type="radio" name="how_you_knew_about_suf" >
                                    </span>
                                    <label for="">Social Media</label>
                                </div>
                                
                                <div class="form-group">
                                    <span>
                                        <input type="radio" name="how_you_knew_about_suf" >
                                    </span>
                                    <label for="">School</label>
                                </div>  
    
                                <div class="form-group">
                                    <span>
                                        <input type="radio" name="how_you_knew_about_suf" >
                                    </span>
                                    <label for="">Community Leader</label>
                                </div>  
                            </form>
                        
                            <br />
                        </div>
                    </li>
                </ul>

                <div class="buttons">
                    <button id="prev_btn">previous</button>
                    <button id="next_btn">next</button>
                </div>

                <div class="success">
                    <p>Thank you for submitting. Record has been saved</p>
                </div>
            </div>
            
        </div>
