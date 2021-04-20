    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">

                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> Customer waiting payment list </h6>
                
            <button class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium reload_waiting_amount_withdraw">Reload</button><br>

                <div class="table-wrapper">
                    <table id="services_data_table" class="table table-bordered table-colored table-indigo">
                        <thead>
                            <tr>
                                <th class="wd-5p"> SL </th>
                                <th class="wd-5p"> Customer </th>
                                <th class="wd-5p"> Pay System </th>
                                <th class="wd-5p"> Mobile No </th>
                                <th class="wd-5p"> Amount </th>
                                <th class="wd-5p"> Cust Wallet </th>
                                <th class="wd-5p"> Action </th>
                            </tr>
                        </thead>
                        <tbody class="assign_amount_withdraw_request_data"></tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <!-- ########## END: MAIN PANEL ########## -->






    <!-- MODAL PAYMENT APPROVE -->
    <div id="withdraw_amount_approve_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="tx-success tx-semibold mg-b-20"> Provide NID No Service </h4>

                    <div class="form-layout form-layout-1">
                        <div class="form-group">
                            <label class="form-control-label"> Payment TRID: <span class="tx-danger">*</span></label>
                            <input class="form-control payment_trxid" type="text" name="payment_trxid" value="" placeholder="Enter Payment TrxID">

                            <input class="form-control payment_p_id" type="hidden" value="" >

                        </div>
                    </div>
                
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 withdraw_amount_submit_modal" data-dismiss="modal" aria-label="Close">Continue</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL PAYMENT APPROVE -->



    <script type="text/javascript">

        $(document).on('click', '.reload_waiting_amount_withdraw', function () {
            get_waiting_withdraw_amount();
        });

        get_waiting_withdraw_amount();

        function get_waiting_withdraw_amount() {
            $.ajax({
                url: "sadmin/get_waiting_withdraw_payment",
                type: "get",
                dataType: 'json',
                success: function (respon) {                    
                    let html_data = '';
                    let sl = 1;
                    for (let z = 0; z < respon.length; z++) {

                        html_data += `<tr class="services_table_row">
                                        <td >${sl}</td>
                                        <td>${respon[z].user_person_name}</td>
                                        <td>${respon[z].mobile_banking_name}</td>
                                        <td>${respon[z].payment_no_s}</td>
                                        <td>${respon[z].amount_s} /-</td>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-success btn-sm withdraw_payment_btn" data-toggle="modal" data-target="#withdraw_amount_approve_modal" this_id="${respon[z].withsraw_request_idd}" style="cursor:pointer;"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-sm reject_pay_btn" this_id="${respon[z].withsraw_request_idd}" style="cursor:pointer;"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>`;
                        sl += 1;
                    }

                    $('.assign_amount_withdraw_request_data').html(html_data);
                }
            });
        }

        $(document).on('click', '.withdraw_payment_btn', function () {
            let this_pay_request_id = $(this).attr('this_id');
            $('.payment_p_id').val(this_pay_request_id);
        });

        $(document).on('click', '.reject_pay_btn', function () {
            let this_withdraw_pay_request_id = $(this).attr('this_id');
            $('.payment_p_id').val(this_withdraw_pay_request_id);
            reject_this_pay_request(this_withdraw_pay_request_id);
        });

        $(document).on('click', '.withdraw_amount_submit_modal', function () {
            approve_payment_function();
        });

        function approve_payment_function() {

            let pay_request_id = $('.payment_p_id').val();
            let payment_trxid = $('.payment_trxid').val();

            if (payment_trxid != '') {
                $.ajax({
                    type: "post",
                    url: "sadmin/approve_withdraw_amount_request",
                    data: {
                        pay_request_id: pay_request_id,
                        payment_trxid: payment_trxid,
                    },
                    success: function () {
                        toastr.success(' Amount Withdraw Success ', 'Success');
                        get_waiting_withdraw_amount();
                    }
                });
            }
        }

        function reject_this_pay_request(this_withdraw_pay_request_id) {
            $.ajax({
                type: "post",
                url: "sadmin/reject_withdraw_pay_request",
                data: {
                    requ_idd: this_withdraw_pay_request_id
                },
                success: function () {
                    toastr.warning( 'Payment Request Rejected and the payment return in customer Wallet', 'Reject');
                    get_waiting_withdraw_amount();
                }
            });
        }

        function get_customer_wallet(customer_id) {

            $.ajax({
                type: "post",
                url: "sadmin/customer_wallet_by_customer_id",
                data: {
                    customer_idd: customer_id
                },
                dataType: "json",
                success: function (bal) {
                    

/*                     
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

                    parseInt(total_added_money) - parseInt(total_cut_money);
 */
                    


                }
            })

        }
        
    </script>



