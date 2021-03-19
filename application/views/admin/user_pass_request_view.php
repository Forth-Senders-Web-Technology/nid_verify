

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
            
            <a href="" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#new_nid_requ"> Username Password Request </a>


            <div class="br-section-wrapper">
                <div class="row">
                    <div class="input-group col-4">
                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        <input type="text" class="form-control fc-datepicker query_date" placeholder="DD/MM/YYYY">
                        <button class="btn btn-teal mg-b-2 search_datewise_data">Search</button>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table id="datatable2" class="table display responsive table-bordered table-colored table-dark">
                        <thead>
                            <tr>
                                <th class="wd-15p">SL</th>
                                <th class="wd-25p">Status</th>
                                <th class="wd-25p">NID No</th>
                                <th class="wd-25p">Pin No</th>
                                <th class="wd-25p">Birth Date</th>
                                <th class="wd-25p">Username</th>
                                <th class="wd-25p">Password</th>
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
            insert_user_pass_request();
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
                            <div class="row no-gutters">
                                <div class="err_show" >  </div><br><br><br>

                                <div class="col-md-8">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label"> NID NO <span class="tx-danger"></span></label>
                                        <input class="form-control nid_number" type="text"  value="" placeholder="Enter NID NO">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label">Birth Date: <span class="tx-danger"></span></label>
                                        <input class="form-control birth_date" type="text"  value="" placeholder="Enter Birth Date">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group bd-t-0-force">
                                        <label class="form-control-label"> PIN NO <span class="tx-danger"></span></label>
                                        <input class="form-control nid_pin_number" type="text"  value="" placeholder="Enter PIN NO">
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
                    services_list_id: 5,
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
                                            <td>${table_data[l].nid_no}</td>
                                            <td>${table_data[l].nid_pin_no}</td>
                                            <td>${table_data[l].birth_date}</td>
                                            <td>${table_data[l].set_username}</td>
                                            <td>${table_data[l].set_password}</td>
                                            <td>${table_data[l].coment_s}</td>
                                        </tr>`;
                            sl += 1;
                        }
                        $('.table_assign_data').html(html_data);
                    }
                }
            });
        }

        function insert_user_pass_request() {

            $.ajax({
                type: "post",
                url: "admin/insert_user_pass_request",
                data: {
                    nid_pin_number:     $('.nid_pin_number').val(),                        
                    birth_date:         $('.birth_date').val(),
                    nid_number:         $('.nid_number').val(),
                    services_rate:      services_rate,
                },
                success: function () {
                    balance_query();
                    get_full_data_table();
                    $('#new_nid_requ').modal('hide');
                }
            });

        }



    
    </script>