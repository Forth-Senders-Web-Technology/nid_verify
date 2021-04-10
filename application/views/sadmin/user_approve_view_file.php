    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
               <h3>  </h3> 
            </div>
        </div><!-- br-pageheader -->
            
            
        
        <!--  br-pagebody     scope="row"   --> 
        <div class="br-pagebody">
        
            <div class="br-section-wrapper">

                <center><h3> User Waiting List </h3></center>

                <div class="table-wrapper">
                    <table class="table display table-bordered responsive nowrap">
                        <thead class="thead-colored thead-primary">
                            <tr>
                                <th class="wd-15p">SL</th>
                                <th class="wd-25p">Location</th>
                                <th class="wd-15p">Institute Name</th>
                                <th class="wd-15p">Person Name</th>
                                <th class="wd-15p">User Name</th>
                                <th class="wd-15p">Address</th>
                                <th class="wd-15p">Phone No</th>
                                <th class="wd-15p">NID</th>
                                <th class="wd-45p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="customer_table_data"></tbody>
                    </table>
                </div>

            </div>

        </div>

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<!-- 
    waiting_user_info -->

    <script>
        
        get_all_waiting_users();

        function get_all_waiting_users() {
            $.ajax({
                type: "get",
                url: "sadmin/get_all_waiting_users",
                dataType: "json",
                success: function (reqs) {

                    let sl = 1;
                    let html_element = '';

                    for (let e = 0; e < reqs.length; e++) {
                        html_element += `<tr>
                                            <th scope="row">${sl}</th>
                                            <th scope="row">
                                                বিভাগঃ ${reqs[e].div_bn_name},
                                                জেলাঃ ${reqs[e].dist_bn_name},
                                                উপজেলাঃ ${reqs[e].up_bn_name},
                                                ইউনিয়নঃ ${reqs[e].un_bn_name},
                                            </th>
                                            <th scope="row">${reqs[e].institute_name}</th>
                                            <th scope="row">${reqs[e].user_person_name}</th>
                                            <th scope="row">${reqs[e].username}</th>
                                            <th scope="row">${reqs[e].address_full}</th>
                                            <th scope="row">${reqs[e].user_phone_no}</th>
                                            <th scope="row">${reqs[e].nid_no}</th>
                                            <th scope="row">
                                                <button class="btn btn-success btn-sm approve_user_btn" this_user_email="${reqs[e].user_email_no}" this_user_iiddd="${reqs[e].udc_list_auto_p_iidd}" style="cursor:pointer;"><i class="fa fa-check"></i></button>
                                                <button class="btn btn-danger btn-sm cancel_user_btn" this_user_iiddd="${reqs[e].udc_list_auto_p_iidd}" style="cursor:pointer;"><i class="fa fa-times"></i></button>
                                            </th>
                                        </tr>`;
                    }
                    $('.customer_table_data').html(html_element);
                }
            });
        }

        $(document).on('click', '.approve_user_btn', function () {
            let this_clickable_user_id = $(this).attr('this_user_iiddd');
            let this_user_email = $(this).attr('this_user_email');
            $.ajax({
                type: "post",
                url: "sadmin/approve_user_by_id",
                data: {
                    clicked_user_id: this_clickable_user_id,
                    this_user_email: this_user_email,
                },
                success: function (rep) {
                    toastr.success('This user approve successfully', 'Success');
                    get_all_waiting_users();
                }
            });
        });


        $(document).on('click', '.cancel_user_btn', function () {
            let this_clickable_user_id = $(this).attr('this_user_iiddd');
            
            $.ajax({
                type: "post",
                url: "sadmin/cancel_user_by_id",
                data: {
                    clicked_user_id: this_clickable_user_id,
                },
                success: function (rep) {
                    toastr.warning('This user Canceled', 'Canceled');
                    get_all_waiting_users();
                }
            });
        });





    </script>