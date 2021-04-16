

<!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               <h3> এই সার্ভিসের জন্য আপনার একাউন্ট থেকে <b class="services_rates"> <?php if (!empty($service_rate->serive_s_rate_s)) {
                   echo $service_rate->serive_s_rate_s;
               }  ?> </b> টাকা কেটে নেওয়া হবে। </h3> 
               
            </div>
        </div><!-- br-pageheader -->
        
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h5 class="text-center"></h5>
            <h4 class="tx-gray-800 mg-b-5">Your Balance: <span class="bal_value"></span></h4>
            <p class="mg-b-0"></p>
        </div>
        <!--  br-pagebody --> 




        <div class="br-pagebody mg-t-5 pd-x-30">
           

            <form action="download/create_card_by_submit_info" method="post" enctype="multipart/form-data" autocomplete="off" data-parsley-validate>


                <input type="hidden" class="serive_group_rates" name="serive_group_rates" value="<?php echo $service_rate->serive_s_rate_s; ?>">

                <div class="br-section-wrapper">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> Fill-up all information </h6>
                    <p class="mg-b-30 tx-gray-600"> </p>

                    <div class="form-layout form-layout-1 full_card_form"> </div>
                </div>
            </form>

        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

















<script>
     balance_query();

    let now_balance;

    let services_rate =  $('.serive_group_rates').val();

    function balance_query() {
        let total_added_money;
        let total_cut_money;
        $.ajax({
            type: "get",
            url: "admin/balance_query",
            data: "",
            dataType: "json",
            success: function (bal) {

                if (bal.payment_added) {
                    total_added_money = bal.payment_added;
                }else {
                    total_added_money = 0;
                }

                if (bal.payment_cut) {
                    total_cut_money = bal.payment_cut;
                }else {
                    total_cut_money = 0;
                }
                now_balance = parseInt(total_added_money) - parseInt(total_cut_money);

                $('.bal_value').html(now_balance);
                

                if (now_balance >= services_rate) {
                    $('.full_card_form').html(`

                    <div class="row mg-b-25">
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label">নাম বাংলা: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="bn_name" value="" placeholder="">
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label">নাম ইংরেজী: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="en_name" value="" placeholder="">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label">পিতার নাম বাংলা: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="f_name" value="" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label">মাতার নাম বাংলা: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="m_name" value="" placeholder="">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label">জন্ম তারিখ: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="dob" value="" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label">NID NO: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="nid_no" value="" placeholder="">
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="form-control-label">ঠিকানা: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="address" value="" placeholder="">
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                            <label class="form-control-label"> NID PIN / OLD NID NO : <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="nid_pin_no" value="" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                            <label class="form-control-label">রক্তের গ্রুপ: </label>
                            <input class="form-control" type="text" name="blood_group" value="" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                            <label class="form-control-label">জন্মস্থান: <span class="tx-danger">*</span></label>
                            <input class="form-control" required type="text" name="birth_place" value="" placeholder="">
                            </div>
                        </div>




                        <div class="col-lg-6">
                            <div class="form-group">
                                <img src="inc/img/porichoy_user.svg" class="pic_display" width="150px" height="150px" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <img src="inc/verify_file/porichoy_logo_color.png" class="sign_display mt-5"  width="250px" height="90px" alt="">
                            </div>
                        </div>



                        <div class="col-lg-6 mg-t-40 mg-lg-t-0">
                            <label class="custom-file">
                                <input type="file" required id="file2" name="pic_file" accept="image/*"  class="custom-file-input pic_select">
                                <span class="custom-file-control custom-file-control-primary pic_lebel"> ছবি সিলেক্ট করুন </span>
                            </label>
                        </div>

                        <div class="col-lg-6 mg-t-40 mg-lg-t-0">
                        <label class="custom-file">
                            <input type="file" id="file2" name="sign_file" required accept="image/*"  class="custom-file-input select_sign">
                            <span class="custom-file-control custom-file-control-primary sign_lebel"> স্বাক্ষর সিলেক্ট করুন </span>
                        </label>
                        </div>



                        </div><!-- row -->
                        <center>
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-info btn-lg"> Create </button>
                                <button type="reset" class="btn btn-secondary btn-lg">Cancel</button>
                            </div><!-- form-layout-footer -->
                        </center>
                    `);
                }else {
                    $('.full_card_form').html('<center><p style="color:black; font-size: 20px;">আপনার একাউন্টে টাকা বেশি নেই দয়া করে আগে রিচার্জ করুন ....</p> </center>');
                }
            }
        });
    }






    function readPIC(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.pic_display').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".pic_select").change(function(e){
        readPIC(this);
        var PicName = e.target.files[0].name;
        $('.pic_lebel').html(PicName);
    });










    function readSign(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.sign_display').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".select_sign").change(function(e){
        readSign(this);
        var SignName = e.target.files[0].name;
        $('.sign_lebel').html(SignName);
    });





</script>



