
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               
            </div>
        </div><!-- br-pageheader -->

        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> You are a <?php echo $user_info->name; ?> User </h6>
            <form action="admin/insert_edited_profile" method="post">
                <div class="form-layout form-layout-1">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                            <label class="form-control-label">Username: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="user_name" value="<?php echo $user_info->username; ?>" >
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="email_no" value="<?php echo $user_info->email; ?>" >
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                            <label class="form-control-label">Phone No: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="phone_no" value="<?php echo $user_info->user_phone_no; ?>" >
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12 mt-3">
                            <center> <h3 class="">Change Password</h3> </center>  
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                            <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
                            <input class="form-control new_password" required type="password" name="new_password" value="" placeholder="Enter New Password">
                            </div>
                        </div><!-- col-8 -->

                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                            <input class="form-control confirm_password" required type="password" name="confirm_password" value="" placeholder="Enter Confirm Password">
                            </div>
                        </div><!-- col-8 -->
                    
                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <center class="submit_btn_assign"> </center>
                    </div><!-- form-layout-footer -->

                </div><!-- form-layout -->
            </form>


    </div>







    <script>
        $('.confirm_password').keyup(function (e) { 
            let new_password = $('.new_password').val();
            let confirm_password = $('.confirm_password').val();

            if (new_password == confirm_password) {
                $('.submit_btn_assign').html(`
                                            <button class="btn btn-info" type="submit">Submit</button>
                                            <button class="btn btn-danger" type="reset">Cancel</button>
                                        `);
            }else {
                $('.submit_btn_assign').html(`<p style="color:red; font-weight:bold; font-size: 14px;">New Password and Confirm Password must be same ...</p>`);
            }
        });
    </script>