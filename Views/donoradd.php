
<?php
include("../Enums/bloodgroup.php");
include("../Enums/gender.php");
include("../Enums/occupation.php");
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0 maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Jquery datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
    <!-- Jquery datatable -->
    <link href="../Content/Custom/style.css" rel="stylesheet" />
    <link href="../Content/Custom/site.css" rel="stylesheet" />
    <title>Register as a Donor</title>
</head>

<body>
    <section class="register">
        <div class="container register_page">
            <?php  session_start(); if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
            <div class="register_page_card background-white padding-xy border-radius">
                <div class="register_page_card_header background-red border-radius text-center padding-half-xy mb-3 color-white">
                    <h2>Register</h2>
                    <p>Register to become a blood donor</p>
                </div>

                <form id="mainForm" action="../Controllers/donaraddpost.php" onSubmit="return ValidateRegistrationForm();" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" class="form-control" placeholder="Write Your Name Here" name="full_name" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Email</label>

                                <input type="Email" class="form-control" placeholder="Write Your Email Here" name="email" required>

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="Password" class="form-control" placeholder="Write Your Password Here" name="password" required>

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="Password" class="form-control" placeholder="Confirm Your Password" name="confirm_password" required>

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Write Your Mobile Number Here" name="mobile_number" required>

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Your Blood Group</label>
                                <select id="" class="form-control" name="blood_group" required>
                                    <?php
                                        $bldgrp = bloodgroup::getArray();
                                        foreach($bldgrp as $key => $value):
                                            echo '<option value="'.$key.'">'.$value.'</option>'; 
                                        endforeach;
                                    ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group" class="form-control">
                                <label>Gender</label>
                                <select id="" class="form-control" name="gender">
                                <?php
                                        $gndr = gender::getArray();
                                        foreach($gndr as $key => $value):
                                            echo '<option value="'.$key.'">'.$value.'</option>'; 
                                        endforeach;
                                    ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Division</label>
                                <select id="division" class="form-control" name="division">
                                <option value="">Select Division</option>
                            </select>

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>District</label>
                                <select id="district" class="form-control" name="district">
                                <option value="">Select District</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Thana</label>
                                <select id="thana" class="form-control" name="thana">
                                <option value="">Select Thana</option>
                                
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <input type="text" placeholder="MM/DD/YYYY" class="form-control" id="dob" name="birth_date" readonly>

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Occupation</label>
                                <select id="" class="form-control" name="occupation">
                                <option value="">Select Occupation</option>
                                <?php
                                        $occptn = occupation::getArray();
                                        foreach($occptn as $key => $value):
                                            echo '<option value="'.$key.'">'.$value.'</option>'; 
                                        endforeach;
                                    ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Social Contact(fb/linkedin/..)</label>
                                <input type="text" placeholder="Social Link" class="form-control" name="social_link">

                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Last Donated</label>
                                <input type="text" placeholder="MM/DD/YYYY" class="form-control" id="lastdonate" name="last_donated_date" readonly>

                            </div>
                        </div>
                        <!-- <div class="col-sm-3 col-xs-6">
                            <label>Upload Image</label>
                            <input type="file" class="form-control" placeholder="Upload Image" accept="image/*" id="ImageUrl" name="profile_pic"/>
                            <span class="field-validation-valid text-danger" data-valmsg-for="File" data-valmsg-replace="true" id="spnfileTxt"></span>
                            <span class="field-validation-valid text-danger" id="spnfile"></span>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <label>Ready for donate?</label>
                            <input type="checkbox" id="" name="ready_to_donate" value="true" checked>
                        </div> -->
                    </div>
                    <span class="color-red">Already Registered? <a href="login.php">Login</a></span>
                    <br><br>
                    <button type="submit" class="btn btn-danger float-right">Register</button>
                    <a class="btn btn-danger float-left" href="index.php">Back to Home</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </section>



    <script src="../Scripts/jquery-3.3.1.js"></script>
    <script src="../Scripts/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        function ValidateRegistrationForm(){
            var isValid = true;
            return isValid;
        }

        $(document).ready(function(){
            $('#dob,#lastdonate').datepicker({
                autoclose:true,
                clearBtn:true,
                todayHighlight:true
            });
            PopulateDivisionSelectList();
        });

        function PopulateDivisionSelectList(){
            $('#division').html('');
                $('<option />', { text: 'Select Division', value: '' }).appendTo('#division');
            $.getJSON("../Controllers/divisionlistdata.php", function(res) {
                $.each(res, function(i, item) {
                    $('<option />', { value: item.id, text: item.name }).appendTo('#division');
                });
            })
        }

        function PopulateDistrictSelectList(divisionid){
            $('#district').html('');
            $('<option />', { text: 'Select District', value: '' }).appendTo('#district');
            $.getJSON("../Controllers/districtlistdata.php", function(res) {
                res = res.filter(f=>f.division_id==divisionid);
                $.each(res, function(i, item) {
                    $('<option />', { value: item.id, text: item.name }).appendTo('#district');
                });
            })
        }

        $('#division').change(function(){
            $('#thana').html('');
            $('<option />', { text: 'Select Thana', value: '' }).appendTo('#thana');
            PopulateDistrictSelectList($(this).val());
        });

        function PopulateThanaSelectList(districtid){
            $('#thana').html('');
            $('<option />', { text: 'Select Thana', value: '' }).appendTo('#thana');
            $.getJSON("../Controllers/thanalistdata.php", function(res) {
                res = res.filter(f=>f.district_id==districtid);
                $.each(res, function(i, item) {
                    $('<option />', { value: item.id, text: item.name }).appendTo('#thana');
                });
            })
        }

        $('#district').change(function(){

            PopulateThanaSelectList($(this).val());
        });
        
    </script>
<?php unset($_SESSION['msg']); ?>
</body>

</html>