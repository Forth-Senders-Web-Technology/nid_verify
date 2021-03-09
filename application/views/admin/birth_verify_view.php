    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="admin"> Dashboard </a>
                <span class="breadcrumb-item active">Birth Verify</span>
            </nav>
        </div><!-- br-pageheader -->

        <!--  br-pagebody --> 

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="d-flex justify-content-center" style="margin-top: 40px; margin-bottom: 30px">
                <div class="input-group wd-xs-400">
                    <input type="text" class="form-control serial_no" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Serial No">
                    <input type="text" class="form-control dob datepicker" placeholder="Birth Date">
                    <div class="input-group-btn">
                        <button class="btn btn-info birth_search_btn" style="cursor:pointer"><i class="fa fa-search"></i></button>
                    </div><!-- input-group-btn -->
                </div><!-- input-group -->                
            </div><!-- d-flex -->


            <div>
                <center><br>
                    <div style="width: 50%; display: none" class="table_diplay">
                        <table class="table">
                            <!-- class="thead-info" -->
                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    English Name</th>
                                <td style="color: black; padding-left: 30px;" class="person_name_en"></td>
                            </tr>
                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    Bangla Name</th>
                                <td style="color: black; padding-left: 30px;" class="person_name_bn"></td>
                            </tr>

                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    Father's Name English</th>
                                <td style="color: black; padding-left: 30px;" class="father_name_en"></td>
                            </tr>
                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    Father's Name Bangla</th>
                                <td style="color: black; padding-left: 30px;" class="father_name_bn"></td>
                            </tr>

                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    Mother's Name English</th>
                                <td style="color: black; padding-left: 30px;" class="mothser_name_en"></td>
                            </tr>
                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    Mother's Name Bangla</th>
                                <td style="color: black; padding-left: 30px;" class="mothser_name_bn"></td>
                            </tr>


                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    Birth Place English</th>
                                <td style="color: black; padding-left: 30px;" class="address_en"></td>
                            </tr>
                            <tr>
                                <th
                                    style="border: 1px solid; background-color: #17A2B8; color: white; text-align: right;">
                                    Birth Place Bangla</th>
                                <td style="color: black; padding-left: 30px;" class="address_bn"></td>
                            </tr>


                        </table>
                    </div><br>    
                </center>
            </div>



        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <script>
    
        $('.birth_search_btn').click(function () {
            let serial_no = $('.serial_no').val();
            let dob = $('.dob').val();


            if (serial_no == '' || dob == '') {
                toastr.warning('Hei Give serial and dob', 'Wrong');
            }else {
                $.ajax({
                    url: 'notfound/birth_data?serial='+serial_no+'&dob='+dob,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                    success: function (info) {
                        $('.table_diplay').css('display', 'block');
                        // english set
                        $('.person_name_en').html(info.personNameEn);
                        $('.father_name_en').html(info.fatherNameEn);
                        $('.mothser_name_en').html(info.motherNameEn);
                        $('.address_en').html(info.fullBirthPlaceEn);

                        // bangla set
                        $('.person_name_bn').html(info.personNameBn);
                        $('.father_name_bn').html(info.fatherNameBn);
                        $('.mothser_name_bn').html(info.motherNameBn);
                        $('.address_bn').html(info.fullBirthPlaceBn);

                    }
                });
            }
        });
    </script>