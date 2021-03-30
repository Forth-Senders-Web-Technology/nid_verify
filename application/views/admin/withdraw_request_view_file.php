<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="admin"> Dashboard </a>
            <span class="breadcrumb-item active">
                Payment
            </span>
        </nav>
    </div>

    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h5 class="text-center"> </h5>
        <h4 class="tx-gray-800 mg-b-5">Your Balance: <span class="bal_value"></span></h4>
        <p class="mg-b-0"></p>
    </div>



    <div class="br-pagebody mg-t-5 pd-x-30">

        


          <div class="mt-5 btn btn-primary btn-lg" data-toggle="modal" data-target="#withdraw_modal">
                Payment withdraw 
          </div>





        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-80 mg-b-10"> Last 10 Withdraw List </h6>

        <div class="table-responsive">
            <table class="table table-bordered table-colored table-dark">
                <thead class="">
                    <tr>
                        <th class="wd-10p">ID</th>
                        <th class="wd-35p">Mobile Banking Name</th>
                        <th class="wd-35p">Amount</th>
                        <th class="wd-35p">Mobile No</th>
                        <th class="wd-35p">Status</th>
                        <th class="wd-35p">Payment trid</th>
                    </tr>
                </thead>
                <tbody class="panding_data_assign">
                </tbody>
            </table>
        </div>

    </div>

</div>
<!-- ########## END: MAIN PANEL ########## -->






          <!-- BASIC MODAL --> 
          <div id="withdraw_modal" class="modal fade payment_pop_model">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
              <div class="modal-content bd-0 tx-14 model_s_content">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Payment Withdraw Form </h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">                

                    <div class="form-layout form-layout-1" style="color:black;">
                        <div class="row mg-b-25">

                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <input type="radio" name="payment_system_list_id" class="payment_system_list_id" id=""> bKash
                                    <input type="radio" name="payment_system_list_id" class="payment_system_list_id" id=""> Rocket
                                    <input type="radio" name="payment_system_list_id" class="payment_system_list_id" id=""> Nagad
                                    <input type="radio" name="payment_system_list_id" class="payment_system_list_id" id=""> SureCash
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label">Mobile No: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="" style="border: .5px solid black" value="" placeholder="">
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="" style="border: .5px solid black"  value="" placeholder="">
                                </div>
                            </div>                    
                        
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium payment_requests" > Submit </button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!-- BASIC MODAL -->


<script>

    balance_query();

    get_pending_payment_ss();

    let now_balance;

    function balance_query() {

        let total_added_money;
        let total_cut_money;

        $.ajax({
            type: "get",
            url: "admin/balance_query",
            data: "",
            dataType: "json",
            success: function(bal) {

                if (bal.payment_added) {
                    total_added_money = bal.payment_added;
                } else {
                    total_added_money = 0;
                }

                if (bal.payment_cut) {
                    total_cut_money = bal.payment_cut;
                } else {
                    total_cut_money = 0;
                }
                now_balance = parseInt(total_added_money) - parseInt(total_cut_money);

                $('.bal_value').html(now_balance);

            }
        });
    }

    function get_pending_payment_ss() {
        $.ajax({
            type: "get",
            url: "admin/get_pending_withdraw_payment",
            data: "",
            dataType: "json",
            success: function (res_data) {
                if (!$.trim(res_data)) {
                    $('.panding_data_assign').html(`<tr>
                                                        <td class="text-center " colspan="4"> No data found.. </td>
                                                    </tr>`);                    
                }else {
                    let html_data = '';
                    let serial = 1;
                    for (let o = 0; o < res_data.length; o++) {
                        html_data += `<tr>
                                        <td class="wd-10p">${serial}</td>
                                        <td class="wd-35p">${res_data[o].mobile_banking_name}</td>
                                        <td class="wd-35p">${res_data[o].amount_s}</td>
                                        <td class="wd-35p">${res_data[o].payment_no_s}</td>
                                        <td class="wd-35p">${res_data[o].payment_status}</td>
                                        <td class="wd-35p">${res_data[o].payment_sending_trid}</td>
                                    </tr>`;
                        serial += 1; 
                    }
                    $('.panding_data_assign').html(html_data);
                }
            }
        });
    }


</script>