
<!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               <h3> এই সার্ভিসের জন্য আপনার একাউন্ট থেকে <b> <?php if (!empty($service_rate->serive_s_rate_s)) {
                   echo $service_rate->serive_s_rate_s;
               }  ?> </b> টাকা কেটে নেওয়া হবে। </h3> 
            </div>
        </div><!-- br-pageheader -->
            
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Your Balance: <span class="bal_value"></span></h4>
            <p class="mg-b-0"></p>
        </div>
        
        <!--  br-pagebody --> 
        <div class="br-pagebody">
            
            <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#new_nid_requ"> NID খোঁজার আবেদন </a>


            <div class="br-section-wrapper">
                <div class="row">
                    <div class="input-group col-4">
                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        <input type="text" class="form-control fc-datepicker query_date" placeholder="DD/MM/YYYY">
                        <button class="btn btn-teal mg-b-2 search_datewise_data">Search</button>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table id="datatable2" class="table display responsive table-bordered table-colored table-pink">
                        <thead>
                            <tr>
                                <th class="wd-15p">SL</th>
                                <th class="wd-25p">Status</th>
                                <th class="wd-15p des_col">Description</th>
                                <th class="wd-25p">NID No</th>
                                <th class="wd-25p">Pin No</th>
                                <th class="wd-25p">Remark</th>
                            </tr>
                        </thead>
                        <tbody class="table_assign_data">
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->


            </div>

        </div>
        
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



          <!-- BASIC MODAL -->
          <div id="new_nid_requ" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"> Request for NID No </h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25 get_nid_request_form">

                </div>
                <div class="modal-footer">
                    <button type="button" class="save_btn btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save changes</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
          <!-- BASIC MODAL -->





    <script>

        $(document).on('click', '.save_btn', function () {
            insert_search_number_request();
        });

        $(document).on('click', '.search_datewise_data', function () {
            let query_date = $('.query_date').val();
            get_full_data_table(query_date);
        });

        let services_rate = '<?php echo $service_rate->serive_s_rate_s; ?>';
        balance_query();
        get_full_data_table();

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

                    if (now_balance >= services_rate) {
                        $('.get_nid_request_form').html(`  
                                <div class="err_show" >  </div>                          
                            <div class="row no-gutters">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Division<span class="tx-danger">*</span></label>
                                        <select class="form-control select2 div_list" name="div_list" required data-placeholder="Division">
                                            <option value="" > Select Division </option>
                                            <?php foreach ($div_info as $div) { ?>
                                                <option value="<?php echo $div->div_id;  ?>" val_name="<?php echo $div->div_bn_name;  ?>" > <?php echo $div->div_bn_name;  ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label">District<span class="tx-danger">*</span></label>
                                        <select class="form-control select2 dis_list" val_name="" name="dis_list"  required data-placeholder="District"> </select>
                                    </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Upazilla<span class="tx-danger">*</span></label>
                                        <select class="form-control select2 up_list" val_name="" name="up_list" required data-placeholder="Upazilla"> </select>
                                    </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Union<span class="tx-danger">*</span></label>
                                        <select class="form-control select2 un_list" val_name="" name="un_list" required data-placeholder="Union"> </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control person_name" type="text" name="person_name" value="" placeholder="Enter Name">
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Father Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control father_name" type="text" name="slip_no" value="" placeholder="Enter Father Name">
                                    </div>
                                </div> 
                                <div class="col-md-6 mg-t--1 mg-md-t-0">
                                    <div class="form-group mg-md-l--1">
                                        <label class="form-control-label">Mother Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control mother_name" type="text" name="voter_no" value="" placeholder="Enter Mother Name">
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label">Birth Date: <span class="tx-danger"></span></label>
                                        <input class="form-control birth_date" type="text" name="birth_date" value="" placeholder="Enter Birth Date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label">Father NID: <span class="tx-danger"></span></label>
                                        <input class="form-control father_nid_no" type="text" name="birth_date" value="" placeholder="Enter Father NID">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label">Mother NID: <span class="tx-danger"></span></label>
                                        <input class="form-control mother_nid_no" type="text" name="birth_date" value="" placeholder="Enter Mother NID">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label">জন্ম নিবন্ধন নং: <span class="tx-danger"></span></label>
                                        <input class="form-control birth_certificate" type="text" name="birth_date" value="" placeholder="Enter Birth Certificate NO">
                                    </div>
                                </div>
                            </div>`); 
                    $('.save_btn').css('display', 'block');                       
                    }else {
                        $('.get_nid_request_form').html('<h2> আপনার একাউন্টে টাকা কম, দয়া করে আগে রিচার্জ করুন। ');    
                    $('.save_btn').css('display', 'none');                    
                    }
                    $('.bal_value').html(now_balance);

                }
            });
        }

        function get_full_data_table(query_date) {
            let html_data;
            let sl = 1;
            $.ajax({
                type: "post",
                url: "admin/get_full_data_table_by_service",
                data: {
                    query_date: query_date,
                    services_list_id: 4,
                },
                dataType: "json",
                success: function (table_data) {
                    if (!$.trim(table_data)) {
                        $('.table_assign_data').html('<tr><td colspan="6" align="center"><h3 class="">No Data Found</h3></td></tr>')
                    }else {
                        for (let l = 0; l < table_data.length; l++) {
                            let this_status;
                            if (table_data[l].requ_status == 0) {
                                this_status = '<p style="background-color: #282923;color:white;font-weight:bold;">Wait</p>';
                            }else if (table_data[l].requ_status == 1) {
                                this_status = '<p style="background-color: #67D8EF;color:black;font-weight:bold;">Success</p><br><a href="'+table_data[l].online_copy_pdf_src+'" download> Download </a>';
                            }else if (table_data[l].requ_status == 2) {
                                this_status = '<p style="background-color: #F9245E;color:white;font-weight:bold;">Reject</p>';
                            }else {
                                this_status = '<p style="background-color: #F9245E;color:white;font-weight:bold;">Server Problem</p>';
                            }
                            html_data += `
                                        <tr>
                                            <td>${sl}</td>
                                            <td>${this_status}</td>
                                            <td class="des_col" >${table_data[l].des_cribe}, ব্যক্তির নামঃ ${table_data[l].person_name}, জন্ম তারিখঃ ${table_data[l].birth_date}</td>
                                            <td>${table_data[l].nid_no}</td>
                                            <td>${table_data[l].nid_pin_no}</td>
                                            <td>${table_data[l].coment_s}</td>
                                        </tr>`;
                            sl += 1;
                        }
                        $('.table_assign_data').html(html_data);
                    }
                }
            });
        }

        function insert_search_number_request() {

            let v_div = $('.div_list option:selected').text();
            let v_dist = $('.dis_list option:selected').text();
            let v_up = $('.up_list option:selected').text();
            let v_un = $('.un_list option:selected').text();
            let v_father = $('.father_name').val();
            let v_mother = $('.mother_name').val();

            let father_nid_no = $('.father_nid_no').val();
            let mother_nid_no = $('.mother_nid_no').val();

            let birth_certificate = $('.birth_certificate').val();
            
            if ($('.div_list').val() == '' || $('.dis_list').val() == '' || $('.up_list').val() == ''|| $('.un_list').val() == '' || $('.person_name').val() == '' || $('.father_name').val() == '' || $('.mother_name').val() == '' || $('.birth_date').val() == '') {
                $('.err_show').html('Please fill-up All Field');
            }else {
                $('.err_show').html('');                
                $.ajax({
                    type: "post",
                    url: "admin/insert_new_search_request",
                    data: {
                        description: `বিভাগঃ ${v_div}, জেলাঃ ${v_dist}, উপজেলাঃ ${v_up}, ইউনিয়নঃ ${v_un}, বাবাঃ ${v_father}, মাতাঃ ${v_mother}, বাবার এনআইডিঃ ${father_nid_no}, মাতার এনআইডিঃ ${mother_nid_no}, জন্ম নিবন্ধন নংঃ ${birth_certificate},`,
                        person_name: $('.person_name').val(),
                        birth_date:  $('.birth_date').val(),
                        services_rate: services_rate,
                    },
                    success: function () {
                        balance_query();
                        get_full_data_table();
                        $('#new_nid_requ').modal('hide');
                    }
                });

            }
        }














    $(document).on('change', '.div_list', function () {
        let div_id = $(this).val();
        $.ajax({
            type: "post",
            url: "welcome/getDistrict_byDivID",
            data: {
                div_id: div_id
            },
            dataType: "json",
            success: function (dist_info) {
                let dist_data = '';
                for (let n = 0; n < dist_info.length; n++) {
                    dist_data += `<option value="${dist_info[n].dist_id}" val_name="${dist_info[n].dist_bn_name}"> ${dist_info[n].dist_bn_name} </option>`;                    
                }
                $('.dis_list').html(`<option value="" > Select Upazilla </option>${dist_data}`);
            }
        });
    });



    $(document).on('change', '.dis_list', function () {
        let dist_id = $(this).val();
        $.ajax({
            type: "post",
            url: "welcome/getUpazilla_byDistID",
            data: {
                dist_id: dist_id
            },
            dataType: "json",
            success: function (up_info) {
                let up_data = '';
                for (let n = 0; n < up_info.length; n++) {
                    up_data += `<option value="${up_info[n].up_id}" val_name="${up_info[n].up_bn_name}"> ${up_info[n].up_bn_name} </option>`;                    
                }
                $('.up_list').html(`<option value="" > Select Upazilla </option>${up_data}`);
            }
        });
    });



    $(document).on('change', '.up_list', function () {
        let upid = $(this).val();
        $.ajax({
            type: "post",
            url: "welcome/getUnion_byUPID",
            data: {
                upid: upid
            },
            dataType: "json",
            success: function (un_info) {
                let un_data = '';
                for (let n = 0; n < un_info.length; n++) {
                    un_data += `<option value="${un_info[n].un_id}" val_name="${un_info[n].un_bn_name}" > ${un_info[n].un_bn_name} </option>`;                    
                }
                $('.un_list').html(`<option value="" > Select Union </option>${un_data}`);
            }
        });
    });

    
    </script>