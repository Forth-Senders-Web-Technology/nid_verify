    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <div class="mx-auto ">
            </div>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">

                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> Customer waiting payment list </h6>
                
            <button class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium reload_waiting_payment">Reload</button><br>

                <div class="table-wrapper">
                    <table id="services_data_table" class="table table-bordered table-colored table-indigo">
                        <thead>
                            <tr>
                                <th class="wd-5p"> SL </th>
                                <th class="wd-5p"> TrxID </th>
                                <th class="wd-5p"> Pay System </th>
                                <th class="wd-5p"> Customer </th>
                                <th class="wd-5p"> Institute </th>
                                <th class="wd-5p"> Action </th>
                            </tr>
                        </thead>
                        <tbody class="assign_payment_request_data"></tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <!-- ########## END: MAIN PANEL ########## -->






          <!-- MODAL PAYMENT APPROVE -->
            <div id="payment_approve_modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <h4 class="tx-success tx-semibold mg-b-20"> Provide NID No Service </h4>

                            <div class="form-layout form-layout-1">
                                <div class="form-group">
                                    <label class="form-control-label"> Amount of Payment: <span class="tx-danger">*</span></label>
                                    <input class="form-control payment_amount" type="text" name="payment_amount" value="" placeholder="Enter Amount of Payment">

                                    <input class="form-control payment_p_id" type="hidden" value="" >
                                    <input class="form-control payment_trxid_id" type="hidden" value="" >
                                    <input class="form-control cust_idd" type="hidden" value="" >

                                </div>
                            </div>
                        
                            <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20 payment_amount_submit_modal" data-dismiss="modal" aria-label="Close">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
          <!-- MODAL PAYMENT APPROVE -->



    <script type="text/javascript">

        $(document).on('click', '.reload_waiting_payment', function () {
            get_waiting_payment();
        });

        get_waiting_payment();

        function get_waiting_payment() {
            $.ajax({
                url: "sadmin/get_waiting_payment",
                type: "get",
                dataType: 'json',
                success: function (respon) {                    
                    let html_data = '';
                    let sl = 1;
                    for (let z = 0; z < respon.length; z++) {

                        html_data += `<tr class="services_table_row">
                                        <td >${sl}</td>
                                        <td>${respon[z].payment_trid}</td>
                                        <td>${respon[z].mobile_banking_name}</td>
                                        <td>${respon[z].user_person_name}</td>
                                        <td>${respon[z].institute_name}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm approve_pay_btn" data-toggle="modal" data-target="#payment_approve_modal" this_id="${respon[z].payment_request_list_idd}" this__pay_tr_id="${respon[z].payment_trid}" cust_request_id="${respon[z].udc_list_auto_p_iidd}" style="cursor:pointer;"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-sm reject_pay_btn" this_id="${respon[z].payment_request_list_idd}" style="cursor:pointer;"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>`;
                        sl += 1;
                    }

                    $('.assign_payment_request_data').html(html_data);
                }
            });
        }

        $(document).on('click', '.approve_pay_btn', function () {
            let this_pay_request_id = $(this).attr('this_id');
            let this_pay_trxid_id = $(this).attr('this__pay_tr_id');
            let cust_request_id = $(this).attr('cust_request_id');
            $('.payment_p_id').val(this_pay_request_id);
            $('.payment_trxid_id').val(this_pay_trxid_id);
            $('.cust_idd').val(cust_request_id);
        });

        $(document).on('click', '.reject_pay_btn', function () {
            let this_pay_request_id = $(this).attr('this_id');
            $('.payment_p_id').val(this_pay_request_id);
            reject_this_pay_request(this_pay_request_id);
        });

        $(document).on('click', '.payment_amount_submit_modal', function () {
            approve_payment_function();
        });

        function approve_payment_function() {

            let pay_request_id = $('.payment_p_id').val();
            let payment_amount = $('.payment_amount').val();
            let payment_trxid_id = $('.payment_trxid_id').val();
            let cust_idd = $('.cust_idd').val();

            if (payment_amount != '') {
                $.ajax({
                    type: "post",
                    url: "sadmin/approve_payment_request",
                    data: {
                        pay_request_id: pay_request_id,
                        payment_amount: payment_amount,
                        payment_trxid_id: payment_trxid_id,
                        cust_idd: cust_idd
                    },
                    success: function () {
                        toastr.success(payment_amount + ' Amount Added', 'Success');
                        get_waiting_payment();
                    }
                });
            }
        }

        function reject_this_pay_request(requ_idd) {
            $.ajax({
                type: "post",
                url: "sadmin/reject_this_pay_request",
                data: {
                    requ_idd: requ_idd
                },
                success: function () {
                    toastr.warning( 'Payment Request Rejected', 'Reject');
                    get_waiting_payment();
                }
            });
        }

    </script>



















