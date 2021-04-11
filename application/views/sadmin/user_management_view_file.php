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
                
            </div>

        </div>

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    



    <script>

        let all_group = `<?php foreach ($user_group as $groups) { echo '<option value="'.$groups->id.'">'.$groups->name.'</option>'; } ?>`;

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
            url: "sadmin/",
            data: {
                this_login_user_id: this_login_user_id,
                type_user_password: type_user_password
            },
            success: function () {
                toastr.success('Update Password', 'Successfully');
            }
        });
    });


    </script>