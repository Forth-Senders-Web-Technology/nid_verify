
<!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="admin"> Dashboard </a>
                <span class="breadcrumb-item active">
                    Payment 
                </span>
            </nav>
        </div><!-- br-pageheader -->


    <div class="br-pagebody mg-t-5 pd-x-30">
        
        <div class="row row-sm">







    <?php foreach ($payment_system_list as $payment_sys) { ?>

          <div class="col-sm-6 col-xl-3" data-toggle="modal" data-target="#<?php echo $payment_sys->mobile_banking_name; ?>_modal">
            <div class=" bd bd-5 rounded overflow-hidden">
                <img width="245px" height="125px" src="<?php echo $payment_sys->img_source; ?>" alt=""> 
            </div>
          </div><!-- col-3 -->


          <!-- BASIC MODAL -->
          <div id="<?php echo $payment_sys->mobile_banking_name; ?>_modal" class="modal fade payment_pop_model">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
              <div class="modal-content bd-0 tx-14 model_s_content">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Payment by <?php echo $payment_sys->mobile_banking_name; ?></h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                    <h4> প্রথমে <?php echo $payment_sys->payment_number; ?> এই নাম্বারে সেন্ড মানি করুন, তারপর নিছের বক্সে TRID বসিয়ে সাবমিট করুন  </h4>
                    
                    <div class="card-body pd-x-20 pd-xs-40">
                        <div class="form-group">
                        <input class="form-control trid_number" type="text" placeholder="Enter Transaction ID ">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium payment_requests" payment_sys_idds="<?php echo $payment_sys->payment_list_id; ?>"> Submit </button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
          <!-- BASIC MODAL -->

    <?php } ?>




          
        </div><!-- row -->
        

        <h6 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-80 mg-b-10"> Your Panding List </h6>

        <div class="table-responsive">
            <table class="table table-bordered table-colored table-dark">
              <thead class="">
                <tr>
                  <th class="wd-10p">ID</th>
                  <th class="wd-35p">Mobile Banking Name</th>
                  <th class="wd-35p">TRID</th>
                  <th class="wd-35p">Remark</th>
                </tr>
              </thead>
              <tbody class="panding_data_assign">
              </tbody>
            </table>
        </div><!-- table-responsive -->



    </div>


    </div>
<!-- ########## END: MAIN PANEL ########## -->







<script>

    $(document).on('click', '.payment_requests', function () {
        let pay_sys_id = $(this).attr('payment_sys_idds');
        let tr_id = $(this).parents('.model_s_content').find('.trid_number').val();
        insert_payment_request(tr_id, pay_sys_id)
    });

    get_pending_payment_ss();

    function get_pending_payment_ss() {
        $.ajax({
            type: "get",
            url: "admin/get_pending_payment_ss",
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
                                        <td class="wd-35p">${res_data[o].payment_trid}</td>
                                        <td class="wd-35p">${res_data[o].remark_s}</td>
                                    </tr>`;
                        serial += 1; 
                    }
                    $('.panding_data_assign').html(html_data);
                }
            }
        });
    }

    function insert_payment_request(tr_id, pay_sys_id) {

        $.ajax({
            type: "post",
            url: "admin/inser_payment_request_s",
            data: {
                trid: tr_id,
                pay_sys_id: pay_sys_id
            },
            success: function () {
                get_pending_payment_ss();
                $('.payment_pop_model').modal('hide');
            }
        });
    }
</script>






