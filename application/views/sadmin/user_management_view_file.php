    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <!--  br-pagebody --> 
        <div class="br-pagebody">
            
            <div class="br-section-wrapper">

                <button class="btn btn-primary verify_by_mobile_no">Verify by Mobile</button>
                <button class="btn btn-primary verify_by_udc_select">Verify by UDC</button>

                <div class="verify_form" ></div>
                <div class="verify_data" ></div>

                <div class="user_edit_form_s "></div>



        <div class="row row-sm mg-t-20">
                
          <div class="col-sm-6 col-lg-4 mg-t-20 mg-sm-t-0 bal_value">
          </div><!-- col-4 -->


          <div class="col-sm-6 col-lg-4 mg-t-20 mg-sm-t-0 active_inactive_user" style="cursor:pointer; ">
          </div><!-- col-4 -->

          <div class="col-sm-6 col-lg-4 mg-t-20 mg-sm-t-0 money_cut_add_button">

          </div><!-- col-4 -->

        </div>

                
            </div>

        </div>

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    



    <script>

        let all_group = `<?php foreach ($user_group as $groups) { echo '<option value="'.$groups->id.'">'.$groups->name.'</option>'; } ?>`;

        $(document).on('click', '.active_inactive_user', function () {
            let confirmation = confirm("Want to change?");
            if (confirmation) {
                let this_user_idd = $('.active_inactive_user').attr('user_id_attr');
                user_activity_func(this_user_idd);
            }            
        });


        $(document).on('click', '.add_money_btn', function () {
            let customer_uniq_idd = $('.edit_username_group_s').attr('attr_this_customer_idd');
            let add_money_type = $('.add_money_type_amount').val();
            $.ajax({
                type: "post",
                url: "sadmin/add_payment_by_admin",
                data: {
                    customer_uniq_idd: customer_uniq_idd,
                    add_money_type: add_money_type
                },
                success: function () {
                    get_user_info_by_userid(customer_uniq_idd);
                }
            });
        });

        $(document).on('click', '.cut_money_btn', function () {
            let customer_uniq_idd = $('.edit_username_group_s').attr('attr_this_customer_idd');
            let cut_money_type = $('.cut_money_type_amount').val();
            $.ajax({
                type: "post",
                url: "sadmin/cut_payment_by_admin",
                data: {
                    customer_uniq_idd: customer_uniq_idd,
                    cut_money_type: cut_money_type
                },
                success: function () {
                    get_user_info_by_userid(customer_uniq_idd);
                }
            });
        });



        $(document).on('click', '.cut_money_box_assign', function () {
            $('.cut_money_box_set').html(`
                <div class="input-group">
                    <input type="text" maxlength="5" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" size="5" class="form-control cut_money_type_amount" placeholder=" Amount ">
                    <div class="input-group-btn">
                        <button class="btn btn-warning cut_money_btn" style="cursor:pointer"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            `);
        });

        $(document).on('click', '.add_money_box_assign', function () {
            $('.add_money_box_set').html(`
                <div class="input-group">
                    <input type="text" maxlength="5" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" size="5" class="form-control add_money_type_amount" placeholder=" Amount ">
                    <div class="input-group-btn">
                        <button class="btn btn-success add_money_btn" style="cursor:pointer"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            `);
        });

        $(document).on('click', '.verify_by_mobile_no',  function () {

            $('.verify_data').html('');
            $('.user_edit_form_s').html('');

            $('.verify_form').html(`            
                <div class="d-flex justify-content-center verify_box_set" style="margin-top: 40px; margin-bottom: 30px">
                    <div class="input-group wd-xs-300">
                        <input type="text" maxlength="17" onkeypress='return event.charCode >= 48 && event.charCode <= 57' size="17" class="form-control mobile_number_type" placeholder=" Type Mobile Number ">
                        <div class="input-group-btn">
                            <button class="btn btn-info udc_verify_data_search_btn" style="cursor:pointer"><i class="fa fa-search"></i></button>
                        </div>
                    </div>                                       
                </div>            
            `);

        });


        $(document).on('click', '.verify_by_udc_select',  function () {

            $('.verify_data').html('');
            $('.user_edit_form_s').html('');

            $('.verify_form').html(`            
                <div class="d-flex justify-content-center verify_box_set" style="margin-top: 40px; margin-bottom: 30px">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <select name="div_auto_iid" required="required" id="" class="form-control div_selection_opt">
                                <option value=""> Select Division </option>
                                <?php foreach ($div_info as $div) { ?>
                                    <option value="<?php echo $div->div_id; ?>"> <?php echo $div->div_bn_name; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select name="dis_a_iidddd" required="required" id="" class="form-control dis_select_opt">
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select name="up_auto_iidddd" required="required" id="" class="form-control select_up_opt">
                                <option value="">Select Upzila</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select name="un_a_idid" id="" required="required" class="form-control selection_un_opt">
                                <option value="">Select Union</option>
                            </select>
                        </div>
                    </div>            
                </div>            
            `);

        });


        $(document).on('click', '.udc_verify_data_search_btn', function () {
            $.ajax({
                type: "post",
                url: "sadmin/get_udc_verify_by_mobile",
                data: {
                    type_mobile_no: $('.mobile_number_type').val()
                },
                dataType: "json",
                success: function (resp) {
                    let html_data_element = '';
                    for (let a = 0; a < resp.length; a++) {
                        html_data_element += `
                                                <tr style="cursor:pointer;" this_cus_id_attr="${resp[a].udc_list_auto_p_iidd}" class="this_cus_table_row">
                                                    <td>${resp[a].user_person_name}</td>
                                                    <td>${resp[a].username}</td>
                                                    <td>${resp[a].user_phone_no}</td>
                                                    <td>${resp[a].user_email_no}</td>
                                                    <td>${resp[a].un_bn_name}</td>
                                                    <td>${resp[a].up_bn_name}</td>
                                                    <td>${resp[a].dist_bn_name}</td>
                                                    <td>${resp[a].div_bn_name}</td>
                                                </tr>
                                            `;                    
                    }
                    $('.verify_data').html(`
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>UDC Name</th>
                                                        <th>Username</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Union</th>
                                                        <th>Upzila</th>
                                                        <th>District</th>
                                                        <th>Division</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="udc_data_set">${html_data_element}</tbody>
                                            </table>
                                        `);
                }
            });
        });






    $(document).on('change', '.div_selection_opt', function () {
        let div_id = $(this).val();
        $.ajax({
            type: "post",
            url: "admin/getDistrict_byDivID",
            data: {
                div_id: div_id
            },
            dataType: "json",
            success: function (dist_info) {
                let dist_data = '';
                for (let n = 0; n < dist_info.length; n++) {
                    dist_data += '<option value="'+dist_info[n].dist_id+'" > '+dist_info[n].dist_bn_name+' </option>';                    
                }
                $('.dis_select_opt').html('<option value="" > Select District </option>'+dist_data);
            }
        });
    });



    $(document).on('change', '.dis_select_opt', function () {
        let dist_id = $(this).val();
        $.ajax({
            type: "post",
            url: "admin/getUpazilla_byDistID",
            data: {
                dist_id: dist_id
            },
            dataType: "json",
            success: function (up_info) {
                let up_data = '';
                for (let n = 0; n < up_info.length; n++) {
                    up_data += '<option value="'+up_info[n].up_id+'" > '+up_info[n].up_bn_name+' </option>';                    
                }
                $('.select_up_opt').html('<option value="" > Select Upazilla </option>'+up_data);
            }
        });
    });



    $(document).on('change', '.select_up_opt', function () {
        let upid = $(this).val();
        $.ajax({
            type: "post",
            url: "admin/getUnion_byUPID",
            data: {
                upid: upid
            },
            dataType: "json",
            success: function (un_info) {
                let un_data = '';
                for (let n = 0; n < un_info.length; n++) {
                    un_data += '<option value="'+un_info[n].un_id+'" > '+un_info[n].un_bn_name+' </option>';                    
                }
                $('.selection_un_opt').html('<option value="" > Select Union </option>'+un_data);
            }
        });
    });

    $(document).on('change', '.selection_un_opt', function () {
        let un_id = $(this).val();
        $.ajax({
            type: "post",
            url: "admin/get_udc_by_selected_union_id",
            data: {
                un_id: un_id
            },
            dataType: "json",
            success: function (resp) {
                    let html_data_element = '';
                    for (let a = 0; a < resp.length; a++) {
                        html_data_element += `
                                                <tr style="cursor:pointer;" this_cus_id_attr="${resp[a].udc_list_auto_p_iidd}" class="this_cus_table_row">
                                                    <td>${resp[a].user_person_name}</td>
                                                    <td>${resp[a].username}</td>
                                                    <td>${resp[a].user_phone_no}</td>
                                                    <td>${resp[a].user_email_no}</td>
                                                    <td>${resp[a].un_bn_name}</td>
                                                    <td>${resp[a].up_bn_name}</td>
                                                    <td>${resp[a].dist_bn_name}</td>
                                                    <td>${resp[a].div_bn_name}</td>
                                                </tr>
                                            `;                    
                    }
                    $('.verify_data').html(`
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>UDC Name</th>
                                                        <th>Username</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Union</th>
                                                        <th>Upzila</th>
                                                        <th>District</th>
                                                        <th>Division</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="udc_data_set">${html_data_element}</tbody>
                                            </table>
                                        `);
            }
        });
    });

    $(document).on('click', '.this_cus_table_row', function () {
        let this_user_idd = $(this).attr('this_cus_id_attr');
        get_user_info_by_userid(this_user_idd);
    });

    function get_user_info_by_userid(this_user_idd) {
        $.ajax({
            type: "post",
            url: "sadmin/get_customer_info_by_cus_id",
            data: {
                this_user_idd: this_user_idd
            },
            dataType: "json",
            success: function (respon) {

                let user_activity_bg;
                let user_activity_icon;
                let user_activity_text;

                if (respon.active == 1) {
                    user_activity_bg = 'success';
                    user_activity_icon = 'check';
                    user_activity_text = 'Active';
                }else {
                    user_activity_bg = 'danger';
                    user_activity_icon = 'close';
                    user_activity_text = 'Inactive';
                }

                $('.user_edit_form_s').html(`               

                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <div class="form-group">
                                <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
                                <input class="form-control customer_login_username" type="text" name="" value="${respon.username}" >
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                <label class="form-control-label">User Group: <span class="tx-danger">*</span></label>
                                <select class="form-control select2 selected_user_group" data-placeholder="Choose country">
                                    <option label="Choose Group "></option>${all_group}
                                </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">  <span class="tx-danger">*</span></label>
                                    <button class="btn btn-info edit_username_group_s" attr_this_customer_idd="${this_user_idd}" this_login_user_id="${respon.id}">Submit</button>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                <label class="form-control-label">Login Password: <span class="tx-danger">*</span></label>
                                <input class="form-control customer_login_password" type="text" name="" value="quickbd.org" >
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">  <span class="tx-danger">*</span></label>
                                    <button class="btn btn-info edit_password" this_login_user_id="${respon.id}">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `);

                $('.active_inactive_user').html(`
                    <div class="bg-${user_activity_bg} rounded shadow-base overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="icon ion-${user_activity_icon} tx-80 lh-0 tx-white op-8"></i>
                        <div class="mg-l-20">
                        <p class="tx-10 tx-spacing-1 tx-lato tx-black tx-medium tx-uppercase mg-b-10">This User</p>
                        <p class="tx-32  tx-lato tx-black mg-b-0 lh-1">${user_activity_text}</p>
                        <span class="tx-12 tx-lato tx-black">For Change Click Here</span>
                        </div>
                    </div>
                    <div id="ch6" class="ht-60 tr-y-1 rickshaw_graph"><svg width="341" height="60"><g><path d="" class="area" fill="#6F42C1"></path></g></svg></div>
                    </div>
                `);
                $('.active_inactive_user').attr('user_id_attr', respon.id);
                get_user_balance_query(respon.user_full_tbl_id);

                $('.money_cut_add_button').html(`

                    <div class="row">

                        <div class="col-sm-6 col-md-6 mg-t-50">
                            <button class="btn btn-teal btn-block mg-b-10 add_money_box_assign" this_customer_uniq_id="${this_user_idd}" style="cursor:pointer">Money Add</button>
                            <div class="mg-b-10 add_money_box_set"> </div>
                        </div><!-- col-sm-3 -->

                        <div class="col-sm-6 col-md-6 mg-t-50">
                            <button class="btn btn-teal btn-block mg-b-10 cut_money_box_assign" this_customer_uniq_id="${this_user_idd}" style="cursor:pointer">Money Cut</button>
                            <div class="mg-b-10 cut_money_box_set"> </div>
                        </div><!-- col-sm-3 -->

                    </div>
                `);

            }
        });
    }

    $(document).on('click', '.edit_username_group_s', function () {
        let attr_this_customer_idd = $(this).attr('attr_this_customer_idd');
        let this_login_user_id = $(this).attr('this_login_user_id');
        let type_user_name = $('.customer_login_username').val();
        let select_user_group = $( ".selected_user_group option:selected" ).val();

        $.ajax({
            type: "post",
            url: "sadmin/edit_user_group_user_name",
            data: {
                attr_this_customer_idd: attr_this_customer_idd,
                type_user_name: type_user_name,
                select_user_group: select_user_group,
                this_login_user_id: this_login_user_id
            },
            success: function () {
                get_user_info_by_userid(attr_this_customer_idd);
                toastr.success('Update username', 'Successfully');
            }
        });
    });

    $(document).on('click', '.edit_password', function () {
        let this_login_user_id = $(this).attr('this_login_user_id');
        let type_user_password = $('.customer_login_password').val();

        $.ajax({
            type: "post",
            url: "sadmin/update_login_user_password",
            data: {
                this_login_user_id: this_login_user_id,
                type_user_password: type_user_password
            },
            success: function () {
                toastr.success('Update Password', 'Successfully');
            }
        });
    });

        function get_user_balance_query(customer_uniq_id) {
            $.ajax({
                type: "post",
                url: "sadmin/customer_wallet_by_customer_id",
                data: {
                    customer_idd: customer_uniq_id
                },
                dataType: "json",
                success: function (bal) {

                    $('.bal_value').html(`
                    <div class="bg-white rounded shadow-base overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="fa fa-money tx-80 lh-0 tx-pink op-5"></i>
                            <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-10">Account Balance</p>
                            <p class="tx-32 tx-inverse tx-lato tx-black mg-b-0 lh-1">৳ ${bal}</p>
                            <span class="tx-12 tx-roboto tx-gray-600">Amount</span>
                            </div>
                        </div>
                        <div id="ch6" class="ht-60 tr-y-1 rickshaw_graph"><svg width="341" height="60"><g><path d="M0,30Q24.627777777777776,25.75,28.416666666666664,26.25C34.099999999999994,27,51.15,37.125,56.83333333333333,37.5S79.56666666666666,31.5,85.25,30S107.98333333333332,22.5,113.66666666666666,22.5S136.4,27.75,142.08333333333334,30S164.81666666666666,42.75,170.5,45S193.23333333333335,52.5,198.91666666666669,52.5S221.64999999999998,46.125,227.33333333333331,45S250.06666666666666,42.375,255.75,41.25S278.48333333333335,33.375,284.1666666666667,33.75S306.9,45.375,312.5833333333333,45Q316.3722222222222,44.75,341,30L341,60Q316.3722222222222,60,312.5833333333333,60C306.9,60,289.85,60,284.1666666666667,60S261.43333333333334,60,255.75,60S233.01666666666665,60,227.33333333333331,60S204.60000000000002,60,198.91666666666669,60S176.18333333333334,60,170.5,60S147.76666666666668,60,142.08333333333334,60S119.35,60,113.66666666666666,60S90.93333333333334,60,85.25,60S62.51666666666666,60,56.83333333333333,60S34.099999999999994,60,28.416666666666664,60Q24.627777777777776,60,0,60Z" class="area" fill="#6F42C1"></path></g></svg></div>
                    </div>
                    `); 

                }
            });
        }

        function user_activity_func(this_user_idd) {
            $.ajax({
                type: "post",
                url: "sadmin/active_inactive_user_fun",
                data: {
                    this_user_iidd: this_user_idd
                },
                dataType: "json",
                success: function (this_user_idd) {
                    get_user_info_by_userid(this_user_idd);
                toastr.success('Update User Activity', 'Successfully');
                }
            });
        }

    </script>
