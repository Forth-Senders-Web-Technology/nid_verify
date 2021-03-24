    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="admin"> Dashboard </a>
                <span class="breadcrumb-item active">Birth Verify</span>
            </nav>
        </div><!-- br-pageheader -->


        <h3 class="text-center"> এই সার্ভিস সম্পূর্ণ ফ্রী </h3>

        <!--  br-pagebody --> 

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="d-flex justify-content-center" style="margin-top: 40px; margin-bottom: 30px">
                <div class="input-group wd-xs-400">
                    <input type="text" class="form-control serial_no" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Serial No">
                    <input type="text" class="form-control dob " id="dateMask" placeholder="DD/MM/YYYY">
                    <div class="input-group-btn">
                        <button class="btn btn-info birth_search_btn" style="cursor:pointer"><i class="fa fa-search"></i></button>
                    </div><!-- input-group-btn -->
                </div><!-- input-group -->                
            </div><!-- d-flex -->


            <div>
                <center><br>
                    <div style="width: 50%; display: none" class="table_diplay">



                    <table class="table table-bordered table-colored table-success table-orange">
                        <thead class="">
                            <tr>
                                <th colspan="2" class=""> Bangla </th>
                                <th colspan="2" class=""> English </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="10p">নামঃ </td> 
                                <td class="person_name_bn"></td>
                                <td class="10p">Name:</td> <td class="person_name_en"></td></td>
                            </tr>
                            <tr>
                                <td class="10p">পিতার নামঃ</td> <td class="father_name_bn"></td>
                                <td class="10p">Father Name:</td> <td class="father_name_en"></td>
                            </tr>
                            <tr>
                                <td class="10p">মাতার নামঃ</td> <td class="mothser_name_bn"></td>
                                <td class="10p">Mother Name:</td> <td class="mothser_name_en"></td>
                            </tr>
                            <tr>
                                <td class="10p">জন্মস্থানঃ</td> <td class="address_bn"></td>
                                <td class="10p">Birth Place:</td> <td class="address_en"></td>
                            </tr>
                            <tr>
                                <td class="10p">রেজিষ্টার ইউনিয়নঃ</td> 
                                <td colspan="3" align="center" class="union_name"></td>
                            </tr>
                            <tr>
                                <td class="10p"> ইউনিয়নের ঠিকানাঃ </td>
                                <td colspan="3" align="center" class="union_address"></td>
                            </tr>
                        </tbody>
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

                        if (info.success == false) {
                            $('.table_diplay').css('display', 'none');
                            alert('data not found...');
                        }else {

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
                            $('.union_name').html(info.registrationOfficeName);
                            $('.union_address').html(info.officeAddress);
                        
                        }

                    }
                });
            } 
        });
    </script>